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
      <br>
        <form method="post" action="<?php echo $action ?>">

          <table class="table table-striped table-bordered " width="90%"> 
            <tbody>
              <tr>
                <td width="15%" class="center"><b>Periode</b></td>
                <td width="30%">
                  <?php  
                  $bulanS = array('1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'May','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
                  if($iedit==0){
                    ?>
                    <select name="bulan" class="form-control bulan" required=""> 
                      <?php
                        foreach ($bulanS as $va=>$val) {
                          $sel = '';
                          if($va==$bulan){
                            $sel = ' selected ';
                          }
                          echo '<option '.$sel.' value="'.$va.'">'.$val.'</option>';
                        }
                      ?> 
                    </select>
                  <?php 
                    }else{
                      if($bulan!=""){
                      echo $bulanS[$bulan];
                      echo '<input type="hidden" name="bulan" value="'.$bulan.'">';
                      }
                    }
                  ?>
                </td>
                <td width="15%" class="center"><b>Tahun</b></td>
                <td width="30%">
                  <?php 
                    if($iedit==0){
                  ?>
                  <select name="yTahun" class="form-control yTahun" required=""> 
                  <?php 
                    for($i=2010;$i<=2025;$i++){
                      $sel = '';
                        if($i==$yTahun){
                          $sel = ' selected ';
                        }
                      echo '<option '.$sel.' value="'.$i.'">'.$i.'</option>';
                    } 
                  ?>
                </select> 
                <?php 
                    }else{
                      echo $yTahun;
                      echo '<input type="hidden" name="yTahun" value="'.$yTahun.'">';
                    }
                  ?>
                </td>
              </tr>
            </tbody>
          </table>
          
        <table class="table dataTables table-striped table-bordered table-hover" width="100%">
          <thead> 
            <tr>
              <th width="2%" class="center">No</th> 
              <th width="5%" class="center">No Batch</th> 
              <th width="40%"class="center">Nama Produk</th>  
              <th width="10%" class="center">PILIH</th>   
            </tr>
          </thead>
          <tbody>
             <?php
              $i = 1;
              foreach ($result as $r) { 
                ?>
                  <tr>
                    <td width="2%"><?php echo $i++ ?></td>
                    <td width="5%"><?php echo $r['ckode_produk']?></td> 
                    <td width="40%"><?php echo $r['vnama_produk']?></td>
                    <td width="10%" class="center"><input type="checkbox" class="checkAll" name="insertALT[]" value="<?php echo $r['imaster_produk'] ?>"></td>  
                  </tr>
                <?php 
              }
             ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4">
                <button type="submit" class="btn-lg btn-primary"><?php echo $btn ?></button>
                <a href="<?php echo base_url().'Alternatif'?>" class="btn-lg btn-warning">Back</a> 
              </td>  
            </tr>
          </tfoot>
        </table>
        </form>
        <br>
      </div> 
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>

<script type="text/javascript">
  function click(id){
    alert("haloo");
  }
</script>
