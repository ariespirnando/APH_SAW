<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Transaksi
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Perhitungan (SAW) - List Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
 
        <table>
          <tbody>
            <tr>
              <td><a href="<?php echo base_url().'Alternatif/Add_new/'.$ialternatif_periode?>" class="btn-lg btn-primary"> Add Alternatif</a></td>
              <td>| <span class="btn-lg btn-warning" onclick="clearData(<?php echo $ialternatif_periode?>)">Clear Data</span>  </td> 
              <td>| <a href="<?php echo base_url().'Alternatif'?>" class="btn-lg btn-warning">Kembali</a>  </td>
            </tr>
          </tbody>
        </table>

        <hr>

        <table class="table dataTables table-striped table-bordered table-hover" width="100%">
          <thead>
            <?php  
              $col = $result_num+4;
              $wid = 100 / $col;
            ?> 
            <tr>
              <th width="2%" class="center">No</th> 
              <th width="<?php echo $wid ?>%" class="center">Alternatif</th>
              <?php 
                foreach ($kriteria as $x) {
                  echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'</th>';
                }
              ?>  
              <th width="5%" class="center">Hapus</th>
            </tr>
          </thead> 
          <tbody>
            <?php
              $i = 1;
              foreach ($result as $r) {
                ?>
                  <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo '['.$r['ckode_produk'].'] '.$r['vnama_produk'].''; ?></td>   
                    <?php 
                      foreach ($kriteria as $x) {
                        $sqlNilai = "SELECT ad.fnilai_awal FROM alternativ_detail ad where ad.ialternativ = '".$r['ialternativ']."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                        $nilai    = $this->db->query($sqlNilai)->row_array();
                        if(empty($nilai['fnilai_awal'])){
                          $nilai['fnilai_awal'] = 0;
                        }
                        ?>
                          <td class="center"><?php echo $nilai['fnilai_awal']?></td> 
                        <?php
                      }
                    ?>
                     
                    <td><a href="<?php echo base_url().'Alternatif/hapus/'.$r['ialternativ'].'?ialternatif_periode='.$ialternatif_periode ?>">Hapus</a></td> 
                  </tr>
                <?php
              }
             ?>  
          </tbody>
          
        </table>
        <br>
        <div class="data_normalisasi"></div>
			</div> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>

<script type="text/javascript">
  function clearData(){
     $.confirm({
        title: 'Warning',
        content: 'Apakah Yakin ?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            formSubmit: {
                text: 'Ya',
                btnClass: 'btn-blue',
                action: function () {
                    $.ajax({
                       url: '<?php echo base_url()?>Alternatif/cleardata/<?php echo $ialternatif_periode ?>',  
                       success: function(response){ 
                        window.location.href = "<?php echo base_url()?>Alternatif/edit/<?php echo $ialternatif_periode ?>";
                       }
                     });
                }
            },
            cancel: function () {
                //close
            },
        }, 
    });
  }
  function hitungNormalisasi(){
    $.confirm({
        title: 'Warning',
        content: 'Apakah Yakin melakukan Normalisasi Data ?',
        type: 'blue',
        typeAnimated: true,
        buttons: {
            formSubmit: {
                text: 'Ya',
                btnClass: 'btn-blue',
                action: function () {
                    $.ajax({
                       url: '<?php echo base_url()?>Alternatif/ceknormalisasi',  
                       async:false,
                       dataType: 'json',
                       success: function(res){  
                        if(res.output==0){
                          alertback('Anda Belum Melakukan Transaksi <b>BOBOT (AHP)','Bobotahp');
                        }else if(res.output==1){
                          alertback('Anda Belum Melakukan Transaksi <b>Alternatif (SAW)','Alternatif');
                        }else{
                          $.ajax({
                           url: '<?php echo base_url()?>Alternatif/normalisasi',  
                           async:false,
                           success: function(resp){  
                            $('.data_normalisasi').html(resp);
                           }
                         });
                        }
                       }
                     });
                }
            },
            cancel: function () {
                //close
            },
        }, 
    });
  }

  function alertback(cont,URL){
    $.confirm({
              title: 'Warning',
              content: cont,
              type: 'red',
              typeAnimated: true,
              buttons: {
                  formSubmit: {
                      text: 'Ya',
                      btnClass: 'btn-blue',
                      action: function () { 
                              window.location.href = "<?php echo base_url()?>"+URL; 
                      }
                  }, 
              }, 
          });
  }
</script>
