<div class="page-content">
  <div class="row">
    <div class="col-xs-12">
      <div class="clearfix">
        <div class="page-header">
          <h1>
            Transaksi
            <small>
              <i class="ace-icon fa fa-angle-double-right"></i>
              Perhitungan (SAW) - View Data Matrik
            </small>
          </h1>
        </div>
        <div class="pull-right"><a href="<?php echo base_url().'Alternatif'?>" class="btn-lg btn-warning">Kembali</a></div><br>
      </div>
      <div> 
<small>
  <i class="ace-icon fa fa-angle-double-right"></i>
  Matrik
</small>
<table class="table table-striped table-bordered table-hover" width="92%">
  <thead>
    <?php  
      $col = $result_num+1;
      $wid = 92 / $col;
    ?> 
    <tr>  
      <th width="<?php echo $wid ?>%" class="center">Alternatif</th>
      <?php 
        foreach ($kriteria as $x) {
          echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>['.$x['vAtribut'].']</th>';
        }
      ?>  
    </tr>
  </thead> 
  <tbody>
    <?php
      $i = 1;
      foreach ($result as $r) {
        ?>
          <tr> 
            <td><?php echo '['.$r['ckode_produk'].'] '.$r['vnama_produk'].''; ?></td>   
            <?php 
              foreach ($kriteria as $x) {
                $sqlNilai = "SELECT ad.fnilai_awal FROM alternativ_detail ad where ad.ialternativ = '".$r['ialternativ']."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                $nilai    = $this->db->query($sqlNilai)->row_array();
                if(empty($nilai['fnilai_awal'])){
                  $nilai['fnilai_awal'] = 0;
                }
                ?>
                  <td class="center"><?php echo $nilai['fnilai_awal']?></td> 
                <?php
              }
            ?> 
          </tr>
        <?php
      }
     ?>  
  </tbody>
</table>
<div class="hr hr2 hr-double"></div>
<i class="ace-icon fa fa-angle-double-right"></i>
  Normalisasi
</small>
<table class="table table-striped table-bordered table-hover" width="92%">
  <thead>
    <?php  
      $col = $result_num+1;
      $wid = 92 / $col;
    ?> 
    <tr>  
      <th width="<?php echo $wid ?>%" class="center">Alternatif</th>
      <?php 
        foreach ($kriteria as $x) {
          echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>['.$x['vAtribut'].']</th>';
        }
      ?>  
    </tr>
  </thead> 
  <tbody>
    <?php
      $i = 1;
      foreach ($result as $r) {
        ?>
          <tr> 
            <td><?php echo '['.$r['ckode_produk'].'] '.$r['vnama_produk'].''; ?></td>   
            <?php 
              foreach ($kriteria as $x) {
                $sqlNilai = "SELECT ad.fnilai_normal FROM alternativ_detail ad where ad.ialternativ = '".$r['ialternativ']."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                $nilai    = $this->db->query($sqlNilai)->row_array();
                if(empty($nilai['fnilai_normal'])){
                  $nilai['fnilai_normal'] = 0;
                }
                ?>
                  <td class="center"><?php echo $nilai['fnilai_normal']?></td> 
                <?php
              }
            ?> 
          </tr>
        <?php
      }
     ?>  
  </tbody>
</table>
<div class="hr hr2 hr-double"></div>
<small>
  <i class="ace-icon fa fa-angle-double-right"></i>
  Normalisasi * Kriteria (Bobot AHP)
</small>
<table class="table table-striped table-bordered table-hover" width="92%">
  <thead>
    <?php  
      $col = $result_num+2;
      $wid = 92 / $col;
    ?> 
    <tr>  
      <th width="<?php echo $wid ?>%" class="center">Alternatif</th>
      <?php 
        foreach ($kriteria as $x) {
          echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>['.$x['vAtribut'].' ('.$x['fbobot'].')]</th>';
        }
      ?>  
      <th width="<?php echo $wid ?>%" class="center">Total</th>
    </tr>
  </thead> 
  <tbody>
    <?php
      $i = 1;
      foreach ($result as $r) {
        ?>
          <tr> 
            <td><?php echo '['.$r['ckode_produk'].'] '.$r['vnama_produk'].''; ?></td>   
            <?php 
              foreach ($kriteria as $x) {
                $sqlNilai = "SELECT ad.fnilai_bobot FROM alternativ_detail ad where ad.ialternativ = '".$r['ialternativ']."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                $nilai    = $this->db->query($sqlNilai)->row_array();
                if(empty($nilai['fnilai_bobot'])){
                  $nilai['fnilai_bobot'] = 0;
                }
                ?>
                  <td class="center"><?php echo $nilai['fnilai_bobot']?></td> 
                <?php
              }
            ?> 
            <td class="center"><?php echo $r['fnilai_akhir']?></td> 
            
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