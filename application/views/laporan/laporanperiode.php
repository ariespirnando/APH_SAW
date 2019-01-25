<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Laporan 
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
              <th width="10%"class="center">Tahun</th>  
              <th width="5%" class="center">Cetak PDF</th>     
            </tr> 
          </thead>
          <tbody>
             <?php
              $i = 1;
              $bulan = array('1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'May','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
             	foreach ($result as $r) {
                if(!empty($r['ikriteria_periode'])){
                      $sqBobot = "SELECT * FROM kriteria_periode k where k.ikriteria_periode='".$r['ikriteria_periode']."'";
                      $ck = $this->db->query($sqBobot);
                      if($ck->num_rows()>0){ 
             		?>
             			<tr>
             				<td width="2%"><?php echo $i++ ?></td>
                    <td width="5%"><?php echo $bulan[$r['bulan']]?></td>  
                    <td width="10%"><?php echo $r['yTahun']?></td>  
                     
                    <td width="5%" class="center">
                      <a class="btn-lg btn-default" href="<?php echo base_url().'Laporan/ctpdf/'.$r['ialternatif_periode'] ?>">Cetak</a>
                    </td>  
             			</tr>
             		<?php
                      }
                  }
             	}
             ?>
          </tbody> 
        </table>
        <br>
			</div> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>

 
