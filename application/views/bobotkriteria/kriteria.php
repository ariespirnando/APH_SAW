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
				<div class="pull-right"><a href="<?php echo base_url().'Bobotkriteria'?>" class="btn-lg btn-warning">Kembali</a></div>
			</div>
      <br>  
			<div>
        <table class="dataTables table table-striped table-bordered table-hover" width="100%">
          <thead> 
            <tr>
              <th width="2%" class="center">No</th> 
              <th width="5%" class="center">Kode Kriteria</th> 
              <th width="40%" class="center">Nama Kriteria</th> 
              <th width="10%" class="center">Bobot</th>   
            </tr>
          </thead>
          <tbody>
             <?php
              $i = 1;
             	foreach ($result as $r) {
             		?>
             			<tr>
             				<td width="2%"><?php echo $i++ ?></td>
                    <td width="5%"><?php echo $r['cKode']?></td> 
                    <td width="40%"><?php echo $r['vNama_kriteria']?></td> 
                    <td width="10%"><?php echo $r['fbobot']?></td>  
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
