<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Transaksi
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Bobot Kriteria
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
              <th width="5%" class="center">View</th>  
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
                    <td width="5%"><a href="<?php echo base_url().'Bobotkriteria/view/'.$r['ikriteria_periode']?>">View</a></td 
                  </tr>
                <?php
              }
             ?>
          </tbody> 
        </table>
        <br>
			</div> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
