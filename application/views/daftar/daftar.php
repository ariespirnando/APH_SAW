<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        	<div class="page-header">
					<h1>
						Daftar  
					</h1>
					
				</div>
				<div class="pull-right"></div>
			</div>
			
			<?php
			    if($this->session->userdata('message') <> ''){
			        echo '<div class="alert alert-info">
					            <button class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>
											'.$this->session->userdata('message').'
			        			</div>';
			    }
			?>
				
			<div>
				<div class="widget-box">  
				 <div class="widget-body">
					 <div class="widget-main no-padding">
						 <form action="<?php echo $action ?>" method="post">
							 <fieldset>
							 	<table class="table table-striped table-bordered table-hover" width="90%"> 
							 		<tbody>
							 			<tr>
							 				<td width="20%">Nama Lengkap</td>
							 				<td width="70%"><input class="form-control" type="text" name="nama_user" value=""></td> 
							 			</tr>
							 			<tr>
							 				<td width="20%">Username</td>
							 				<td width="70%"><input class="form-control" type="text" name="user" value=""></td> 
							 			</tr>
							 			<tr>
							 				<td width="20%">Password</td>
							 				<td width="70%"><input class="form-control" type="password" name="pass" value=""></td> 
							 			</tr>
							 			<tr>
							 				<td width="20%">Alamat</td>
							 				<td width="70%"><input class="form-control" type="text" name="alamat" value=""></td> 
							 			</tr>
							 			<tr>
							 				<td width="20%">HP</td>
							 				<td width="70%"><input class="form-control" type="text" name="telpon" value=""></td> 
							 			</tr> 
							 		</tbody>
							 	</table>
								
								 <br>
								 <button type="submit" class="btn-lg btn-success">
									 Submit
								 </button> 
								 <a href="<?php echo base_url().'Login'?>" class="btn-lg btn-warning">Back</a>
								 <br>
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
