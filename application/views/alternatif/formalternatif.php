<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Alternatif
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Alternatif - Add Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <form method="post" action="<?php echo $action ?>">
        <table class="table table-striped table-bordered table-hover" width="90%">
          <tbody> 
            <tr>
              <th width="10%" class="center">Produk</th> 
              <th width="80%">
                <input type="text" name="vnama_produk" value="<?php echo $vnama_produk ?>" class="form-control vnama_produk" required>
                <input type="hidden" name="imaster_produk" value="<?php echo $imaster_produk ?>" class="form-control imaster_produk" required>
                <input type="hidden" name="ialternativ" value="<?php echo $ialternativ ?>" class="">
              </th>  
            </tr>

            <tr bgcolor="#FFFF00"><th colspan="2"></th></tr>

            <?php 
              foreach ($kriteria as $x) { 

                  $sqlNilai = "SELECT ad.fnilai_awal FROM alternativ_detail ad where ad.ialternativ = '".$ialternativ."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                  $nilai    = $this->db->query($sqlNilai)->row_array();
                  if(empty($nilai['fnilai_awal'])){
                    $nilai['fnilai_awal'] = "";
                  }

                ?>
                  <tr>
                    <th width="10%" class="center"><?php echo $x['vNama_kriteria'] ?></th> 
                    <th width="80%">
                      <input type="text" value="<?php echo $nilai['fnilai_awal'] ?>" name="fnilai_awal[<?php echo $x['imaster_kriteria'] ?>]" value="" class="form-control angka2" required> 
                    </th>  
                  </tr>
                <?php
              }
            ?> 
             
            <tr>
              <th colspan="2">
                <button type="submit" class="btn-lg btn-primary"><?php echo $btn ?></button>
                <a href="<?php echo base_url().'Alternatif'?>" class="btn-lg btn-warning">Back</a>
              </th>  
            </tr>
          </tbody>
        </table>
        </form>
        <br>
			</div> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
 

<script type="text/javascript"> 
  $(".angka2").keyup(function(){
    this.value = this.value.replace(/[^0-9\.]/g,"");
  })

  $('.vnama_produk').keyup(function(e) {  
    var config = {
        source: function(request, response) {
            $.getJSON("<?php echo base_url() ?>Alternatif/produk", { term: $('.vnama_produk').val()}, 
                      response);
        },                     
        select: function(event, ui){
            $('.imaster_produk').val(ui.item.id);
            $('.vnama_produk').val(ui.item.value);  
            return false;                           
        },
        minLength: 2,
        autoFocus: true,
        };  
        $('.vnama_produk').autocomplete(config);   
        $(this).keypress(function(e){
        if(e.which != 13 ) {
              if(e.which != 9 ) {
               $('.imaster_produk').val('');
              }
          }           
        });
        $(this).blur(function(){
            if($('.imaster_produk').val() == '') {
                $(this).val('');
            }           
        });  
  });
</script>