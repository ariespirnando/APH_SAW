<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Master
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Produk - Add Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div class="col-xs-6">
        <form method="post" action="<?php echo $action ?>">
        <table class="table table-striped table-bordered table-hover" width="90%">
          <tbody>
             
            <tr>
              <th width="25%" class="center">No Batch</th> 
              <th width="65%">
                <input type="text" name="ckode_produk" value="<?php echo $ckode_produk ?>" class="form-control" required>
                <input type="hidden" name="imaster_produk" value="<?php echo $imaster_produk ?>" class="">
              </th>  
            </tr>

            <tr>
              <th width="25%" class="center">Nama Produk</th> 
              <th width="65%">
                <input type="text" name="vnama_produk" value="<?php echo $vnama_produk ?>" class="form-control" required> 
              </th>  
            </tr>
            
            <tr>
              <th width="25%" class="center">Jenis Produk</th> 
              <th width="65%"> 
                <?php  
                  $jenisProd = $this->db->query("SELECT  ms.vnama, ms.imaster_subkriteria  FROM master_subkriteria ms JOIN
                                master_kriteria mk ON ms.imaster_kriteria = mk.imaster_kriteria 
                                WHERE mk.cKode = 'C1'")->result_array();
                ?>
                <select name="jenis_produk" class="form-control jenis_produk" required=""> 
                  <?php
                    foreach ($jenisProd as $val) {
                      $sel = '';
                      if($val['imaster_subkriteria']==$jenis_produk){
                        $sel = ' selected ';
                      }
                      echo '<option '.$sel.' value="'.$val['imaster_subkriteria'].'">'.$val['vnama'].'</option>';
                    }
                  ?> 
                </select>
              </th>  
            </tr>
            <tr>
              <th colspan="2">
                <button type="submit" class="btn-lg btn-primary"><?php echo $btn ?></button>
                <a href="<?php echo base_url().'Produk'?>" class="btn-lg btn-warning">Back</a>
              </th>  
            </tr>
          </tbody>
        </table>
        </form>
        <br>
			</div>
      <div class="col-xs-6"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
 

<script type="text/javascript"> 
  $(".angka2").keyup(function(){
    this.value = this.value.replace(/[^0-9\.]/g,"");
  })
</script>