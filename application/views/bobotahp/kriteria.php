<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Transaksi
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Perhitungan (AHP)
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
          <div class="keluarlah center"><span>.................................................................................................................W A I T I N G   P R O G R E S S.................................................................................................................<br></span></div>
        <form> 
          <table class="table table-striped table-bordered " width="90%"> 
            <tbody>
              <tr>
                <td width="15%" class="center"><b>Periode</b></td>
                <td width="30%">
                  <?php  
                  $bulanS = array('1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'May','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
                  if($iedit==0){
                    ?>
                    <select name="bulan" class="form-control bulan" required=""> 
                      <?php
                        foreach ($bulanS as $va=>$val) {
                          $sel = '';
                          if($va==$bulan){
                            $sel = ' selected ';
                          }
                          echo '<option '.$sel.' value="'.$va.'">'.$val.'</option>';
                        }
                      ?> 
                    </select>
                  <?php 
                    }else{
                      if($bulan!=""){
                      echo $bulanS[$bulan];
                      echo '<input type="hidden" name="bulan" value="'.$bulan.'">';
                      }
                    }
                  ?>
                </td>
                <td width="15%" class="center"><b>Tahun</b></td>
                <td width="30%">
                  <?php 
                    if($iedit==0){
                  ?>
                  <select name="yTahun" class="form-control yTahun" required=""> 
                  <?php 
                    for($i=2010;$i<=2025;$i++){
                      $sel = '';
                        if($i==$yTahun){
                          $sel = ' selected ';
                        }
                      echo '<option '.$sel.' value="'.$i.'">'.$i.'</option>';
                    } 
                  ?>
                </select> 
                <?php 
                    }else{
                      echo $yTahun;
                      echo '<input type="hidden" name="yTahun" value="'.$yTahun.'">';
                    }
                  ?>
                </td>
              </tr>
            </tbody>
          </table>
          
          <table class="table table-striped table-bordered table-hover" width="90%"> 
          <thead> 
            <tr>
              <?php 
                $wid = 90 / ($result_num+1);
              ?>
              <th width="<?php echo $wid ?>%"></th>
              <?php 
                foreach ($result as $x) {
                  echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'</th>';
                }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php 
              foreach ($result as $r) {
                echo '<tr>';
                ?>
                <td width="<?php echo $wid ?>%"><b><?php echo $r['vNama_kriteria'] ?></b></td>
                <?php 
                  foreach ($result as $x) { 
                    if($r['imaster_kriteria'] == $x['imaster_kriteria']){
                      echo '<td width="<?php echo $wid ?>%" style="text-align:center">
                              <input name="kriteria_nilai['.$r['imaster_kriteria'].']['.$x['imaster_kriteria'].']" type="text" readonly value="1" class="validasi hitung_bawah_'.$x['imaster_kriteria'].' form-control hitung_'.$r['imaster_kriteria'].'_'.$x['imaster_kriteria'].'">
                            </td>';
                    }else{
                      if($x['imaster_kriteria'] < $r['imaster_kriteria']){

                        $sql = "SELECT mk.fnilai_awal FROM kriteria_nilai_detail mk where mk.ikriteria_periode='".$ikriteria_periode."' AND mk.imaster_kriteria_x = '".$r['imaster_kriteria']."' and mk.imaster_kriteria_y = '".$x['imaster_kriteria']."'";
                        $dt  = $this->db->query($sql)->row_array();
                        if(empty($dt['fnilai_awal'])){
                          $dt['fnilai_awal'] = 0;
                        }

                        echo '<td width="<?php echo $wid ?>%" style="text-align:center">
                              <select name="kriteria_nilai['.$r['imaster_kriteria'].']['.$x['imaster_kriteria'].']" onchange="HitNilai('.$r['imaster_kriteria'].','.$x['imaster_kriteria'].')" class="validasi hitung_bawah_'.$x['imaster_kriteria'].' form-control hitung_'.$r['imaster_kriteria'].'_'.$x['imaster_kriteria'].'">';
                              for($i=0;$i<10;$i++){
                                $sel = '';
                                if($dt['fnilai_awal']==$i){
                                  $sel = ' selected ';
                                }
                                echo '<option '.$sel.' value="'.$i.'">'.$i.'</option>';
                              }
                        echo '</select>
                              </td>';
                      }else{

                        $sql = "SELECT mk.fnilai_awal FROM kriteria_nilai_detail mk where mk.ikriteria_periode='".$ikriteria_periode."' AND mk.imaster_kriteria_x = '".$r['imaster_kriteria']."' and mk.imaster_kriteria_y = '".$x['imaster_kriteria']."'";
                        $dt  = $this->db->query($sql)->row_array();
                        if(empty($dt['fnilai_awal'])){
                          $dt['fnilai_awal'] = "0";
                        }

                        echo '<td width="<?php echo $wid ?>%" style="text-align:center">
                                <input name="kriteria_nilai['.$r['imaster_kriteria'].']['.$x['imaster_kriteria'].']" type="text" readonly value="'.$dt['fnilai_awal'].'" class="validasi hitung_bawah_'.$x['imaster_kriteria'].' form-control hitung_'.$r['imaster_kriteria'].'_'.$x['imaster_kriteria'].'">
                              </td>';
                      }
                    } 
                  }
                ?>
                <?php
                echo '</tr>';
              }
            ?>
          </tbody>
          <tfoot>
            <tr bgcolor="#FFFF00">
              <td width="<?php echo $wid ?>%"><b>Total</b></td>
               <?php 
                foreach ($result as $x) {
                  if($x['fawal']==""){
                    $x['fawal'] = "";
                  }
                  echo '<td width="<?php echo $wid ?>%">
                          <input name="kriteria_awal['.$x['imaster_kriteria'].']" type="text" readonly value="'.$x['fawal'].'" class="validasi hitung_akhir_'.$x['imaster_kriteria'].' form-control">
                        </td>';
                }
              ?>
            </tr>
          </tfoot>
          </table>
        </form>
        <table width="100%"> 
          <tr>
            <td width="45%">
              <?php 
                $kal = "Save";
                if($iedit==1){ 
                  $kal = "Ubah";
                }
              ?>
              <span class="btn-lg btn-primary" onclick="HitNormalisasi()">Hitung & <?php echo $kal ?></span> 
              <a href="<?php echo base_url().'Bobotahp'?>" class="btn-lg btn-warning">Kembali</a> 
            </td>
            <td width="45%" style="text-align:right;"> 
            </td>
          </tr>
        </table>
        <div class="keluarlah center"><span>.................................................................................................................W A I T I N G   P R O G R E S S.................................................................................................................<br></span></div>
        <div class="detail_normalisasi"></div>

			</div>
      <br> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>

<script type="text/javascript">
  $('.keluarlah').hide();
  function HitNilai(a,b){
    var nilai = $('.hitung_'+a+'_'+b+'').val();
    var nilai_akhir = 0;
    if(nilai!=0){
      nilai_akhir = 1/ nilai;
    }
    $('.hitung_'+b+'_'+a+'').val(nilai_akhir.toFixed(3)); 
    HitBawah(a);
    HitBawah(b);
  }

  function HitBawah(b){
    var output = 0;
    $(".hitung_bawah_"+b+"").each(function() {
      if($(this).val()!=""){ 
        var nilai = $(this).val();
        output = math.add(output, nilai);
      }
    });
    $(".hitung_akhir_"+b+"").val(output);
  }

  function HitNormalisasi(){
    var cek = 0;
    $(".validasi").each(function() {
      if($(this).val()==""){  
        cek++;
      }
    });

    if(cek>0){
      _costume_alert('Info', 'Data tidak diisi !!','red')
    }else{
      $('.keluarlah').show();
        var datas = $( "form" ).serialize();
        $.ajax({
         url: '<?php echo base_url()?>Bobotahp/hitnormalisasi',
         type: 'post',
         data: datas, 
         dataType: 'json',
         success: function(res){ 
          $('.detail_normalisasi').html("");
          if(res.success==1){
            _costume_alert('Info', 'Hitung Normalisasi Selesai, <br>KONSISTEN Dengan Nilai CR : <b>'+res.cr+'</b>','blue')
          }else{
            _costume_alert('Info', 'Hitung Normalisasi TIDAK Konsisten <br>Nilai CR : <b>'+res.cr+'</b>, <br>Silakan melakukan pengisian data kembali','red')
          }
          $('.keluarlah').hide();
         }
       });
    }
  }

  function DetailNormalisasi(){
    $.ajax({
       url: '<?php echo base_url()?>Bobotahp/ceknilai',  
       dataType: 'json',
       success: function(res){  
        if(res.ret == 0){
          _costume_alert('Info', 'Belum Hitung Normalisasi Kriteria !!','red')
        }else{
           $.ajax({
             url: '<?php echo base_url()?>Bobotahp/normalisasi',  
             success: function(response){ 
              $('.detail_normalisasi').html(response);
             }
           });
        }
       }
     }); 
  }

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
                       url: '<?php echo base_url()?>Bobotahp/cleardata',  
                       success: function(response){ 
                        window.location.href = "<?php echo base_url()?>Bobotahp";
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
</script>