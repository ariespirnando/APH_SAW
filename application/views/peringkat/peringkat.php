<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Transaksi
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Peringkat Alternatif
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <?php 
          if($tampil==1){
        ?>
        <form method="post" action="<?php echo $action ?>">
          <input type="hidden" name="ialternatif_periode" value="<?php echo $ialternatif_periode ?>">
        <table class="dataTables table table-striped table-bordered table-hover" width="100%">
          <thead> 
            <tr>
              <th width="2%" class="center">No</th> 
              <th width="5%" class="center">Kode Produk</th> 
              <th width="40%" class="center">Nama Produk</th> 
              <th width="10%" class="center">Nilai</th>  
              <th width="5%" class="center">Peringkat</th>   
              <th width="10%" class="center">Pilih</th>    
            </tr>
          </thead>
          <tbody>
             <?php
              $i = 1;
             	foreach ($result as $r) {
                $set = "";
                if($r['iset']==1){
                  $set = "checked";
                }
             		?>
             			<tr>
             				<td width="2%"><?php echo $i++ ?></td>
                    <td width="5%"><?php echo $r['ckode_produk']?></td> 
                    <td width="40%"><?php echo $r['vnama_produk']?></td> 
                    <td width="10%"><?php echo $r['fnilai_akhir']?></td> 
                    <td width="5%"><?php echo $r['irangking']?></td> 
                    <td width="10%">
                      <input <?php echo $set ?> type="checkbox" name="isChecked[]" value="<?php echo $r['ialternativ'] ?>">
                    </td>   
             			</tr>
             		<?php
             	}
             ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6">
                <button type="submit" class="btn-lg btn-primary"><?php echo $btn ?></button>
                <a href="<?php echo base_url().'Peringkat'?>" class="btn-lg btn-warning">Back</a>
              </td>
            </tr>
          </tfoot>
        </table>
      <?php }else{ ?>
      <script type="text/javascript">
         $.confirm({
              title: 'Warning',
              content: 'Anda Belum Melakukan Transaksi <b>BOBOT (AHP) & ALTERNATIF (SAW)</b>',
              type: 'red',
              typeAnimated: true,
              buttons: {
                  formSubmit: {
                      text: 'Ya',
                      btnClass: 'btn-blue',
                      action: function () { 
                              window.location.href = "<?php echo base_url()?>"; 
                      }
                  }, 
              }, 
          });
      </script> 
      <?php } ?>
        <br>
			</div> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
