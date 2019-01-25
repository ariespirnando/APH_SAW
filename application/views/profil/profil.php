<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        	<div class="page-header">
					<h1>
						Profil  
					</h1>
					
				</div>
				<div class="pull-right"></div>
			</div>
			 
				
			<div>
				<div class="widget-box">  
				 <div class="widget-body">
					 <div class="widget-main no-padding">
						 <form method="post">
							 <fieldset>
							 	<table class="table table-striped table-bordered table-hover" width="90%"> 
							 		<tbody>
							 			<tr>
							 				<td width="20%">Nama Lengkap</td>
							 				<td width="70%"><input readonly class="form-control" type="text" name="nama_user" value="<?php echo $this->session->userdata('nama_user')?>"></td> 
							 			</tr> 
							 			<tr>
							 				<td width="20%">Alamat</td>
							 				<td width="70%"><input readonly class="form-control" type="text" name="alamat" value="<?php echo $this->session->userdata('alamat')?>"></td> 
							 			</tr>
							 			<tr>
							 				<td width="20%">HP</td>
							 				<td width="70%"><input readonly class="form-control" type="text" name="telpon" value="<?php echo $this->session->userdata('telpon')?>"></td> 
							 			</tr> 
							 		</tbody>
							 	</table> 
							 </fieldset>
						 </form>
					 </div>
				 </div>
			 </div>
        <br>

			</div> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
