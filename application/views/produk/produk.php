<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Master
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Produk - List Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <table class="table dataTables table-striped table-bordered table-hover" width="100%">
          <thead> 
            <tr>
              <th width="2%" class="center">No</th> 
              <th width="5%" class="center">No Batch</th> 
              <th width="40%"class="center">Nama Produk</th>
              <th width="5%" class="center">Jenis Produk</th>  
              <th width="5%" class="center">Status</th>  
              <th width="5%" class="center">Edit</th> 
              <th width="5%" class="center">Hapus</th>  
            </tr>
          </thead>
          <tbody>
             <?php
              $i = 1;
             	foreach ($result as $r) {
                $sq = "SELECT ms.vnama, ms.imaster_subkriteria FROM master_subkriteria ms JOIN
master_kriteria mk ON ms.imaster_kriteria = mk.imaster_kriteria 
WHERE mk.cKode = 'C4' AND ms.imaster_subkriteria ='".$r['jenis_produk']."'";
                $dt = $this->db->query($sq);
                if($dt->num_rows()>0){
                  $res = $dt->row_array();
             		?>
             			<tr>
             				<td width="2%"><?php echo $i++ ?></td>
                    <td width="5%"><?php echo $r['ckode_produk']?></td> 
                    <td width="40%"><?php echo $r['vnama_produk']?></td>
                    <td width="5%"><?php echo $res['vnama']?></td>   
                    <td width="5%"><?php 
                      if($r['iLounching']==0){
                        echo '-';
                      }else{
                        echo 'Lounching';
                      }?>
                    </td>  
                    <td width="5%"><a href="<?php echo base_url().'Produk/edit/'.$r['imaster_produk']?>">Edit</a></td> 
                    <td width="5%"><a href="<?php echo base_url().'Produk/hapus/'.$r['imaster_produk']?>">Hapus</a></td> 
             			</tr>
             		<?php
             	  }
              }
             ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6"><a href="<?php echo base_url().'Produk/Add'?>" class="btn-lg btn-primary"> Add </a></td>  
            </tr>
          </tfoot>
        </table>
        <br>
			</div> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
