<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Transaksi
            <small>
              <i class="ace-icon fa fa-angle-double-right"></i>
              Perhitungan (SAW) - Add Periode
            </small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <table class="dataTables table table-striped table-bordered table-hover" width="100%">
          <thead> 
            <tr>
              <th width="2%" class="center">No</th> 
              <th width="5%" class="center">Bulan</th>  
              <th width="10%" class="center">Tahun</th>  
              <th width="10%" class="center">Periode Bobot</th>  
              <th width="5%" class="center">Hitung</th>
              <th width="5%" class="center">Edit</th>
              <th width="5%" class="center">View</th> 
              <th width="5%" class="center">Hapus</th>  
            </tr>
          </thead>
          <tbody>
             <?php
              $i = 1;
              $bulan = array('1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'May','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
             	foreach ($result as $r) {
             		?>
             			<tr>
             				<td width="2%"><?php echo $i++ ?></td>
                    <td width="5%"><?php echo $bulan[$r['bulan']]?></td>  
                    <td width="10%"><?php echo $r['yTahun']?></td>  
                    <td width="10%"><div class="periode_kr_<?php echo $r['ialternatif_periode'] ?>"><?php 
                    $default = 'default';
                    if(!empty($r['ikriteria_periode'])){
                      $sqBobot = "SELECT * FROM kriteria_periode k where k.ikriteria_periode='".$r['ikriteria_periode']."'";
                      $ck = $this->db->query($sqBobot);
                      if($ck->num_rows()>0){
                        $default = 'primary';
                        $ds = $ck->row_array();
                        echo $bulan[$ds['bulan']].'-'.$ds['yTahun'];
                      }
                    } 
                    ?>
                    </div></td>  
                    <td width="5%" class="center"><span onclick="hitungNormalisasi(<?php echo $r['ialternatif_periode'] ?>)"  class="btn-lg btn-<?php echo $default ?>">HItung</span></td>
                    <td width="5%"><a href="<?php echo base_url().'Alternatif/edit/'.$r['ialternatif_periode']?>">Edit</a></td>
                    <td width="5%"><a href="<?php echo base_url().'Alternatif/view/'.$r['ialternatif_periode'].'?ikriteria_periode='.$r['ikriteria_periode'] ?>">View</a></td><td width="5%"><a href="<?php echo base_url().'Alternatif/hapus2/'.$r['ialternatif_periode']?>">Hapus</a></td> 
             			</tr>
             		<?php
             	}
             ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="8" "><a href="<?php echo base_url().'Alternatif/Add'?>" class="btn-lg btn-primary"> Add </a></td>
            </tr>
          </tfoot>
        </table>
        <br>
			</div> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>

<script type="text/javascript">
  function hitungNormalisasi(id){
    $.confirm({
        title: 'Pilih Periode Bobot Kriteria',
        content: '' +
        '<form action="" class="formName">' +
        '<div class="form-group">' +
        '<label></label>' +
        '<select class="periode form-control" required >'+
        <?php     
    $opt ="";
    foreach ($perkar as $v) {
      $nil = '"'.$v['ikriteria_periode'].'"';
      $val = $bulan[$v['bulan']].'-'.$v['yTahun'];
      echo "'<option value=".$nil.">'+";
      echo "'".$val."'+";
      echo "'</option>'+";
     }
    ?>
    '</select>' +
        '</div>' +
        '</form>',
        type: 'blue',
        typeAnimated: true,
        buttons: {
            formSubmit: {
                text: 'Submit',
                btnClass: 'btn-blue',
                action: function () {
                    var periode = this.$content.find('.periode').val(); 
                    $('.loadload').show();
                    $.ajax({
                     url: '<?php echo base_url()?>Alternatif/normalisasi2/'+id,  
                     data: {periode:periode}, 
                     async:false,
                     success: function(resp){  
                      alertback();
                     }
                    });
                    
                }
            },
            cancel: function () {
                //close
            },
        },
        onContentReady: function () { 
            var jc = this;
            this.$content.find('form').on('submit', function (e) { 
                e.preventDefault();
                jc.$$formSubmit.trigger('click');
            });
        }
    });
  }

  function alertback(){
    $.confirm({
        title: 'Warning',
        content: 'Alternatif berhasil Dihitung ',
        type: 'red',
        typeAnimated: true,
        buttons: {
            formSubmit: {
                text: 'Ya',
                btnClass: 'btn-blue',
                action: function () { 
                    window.location.href = "<?php echo base_url()?>Alternatif"; 
                }
            }, 
        }, 
    });
  }
</script>
