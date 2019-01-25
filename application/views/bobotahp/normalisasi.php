<div class="page-content">
  <div class="row">
    <div class="col-xs-12">
      <div class="clearfix">
        <div class="page-header">
          <h1>
            Transaksi
            <small>
              <i class="ace-icon fa fa-angle-double-right"></i>
              Perhitungan (AHP)
            </small>
          </h1>
        </div>
        <div class="pull-right"><a href="<?php echo base_url().'Bobotahp'?>" class="btn-lg btn-warning">Kembali</a> </div>
      </div>
      <div>
        <br>  
<i class="ace-icon fa fa-angle-double-right"></i>
<b>Matriks Pairwise Comparison</b> 


<table class="table table-striped table-bordered table-hover" width="90%"> 
<thead>
  <tr>
    <?php 
      $wid = 90 / ($result_num+1);
    ?>
    <th width="<?php echo $wid ?>%"></th>
    <?php 
      foreach ($result as $x) {
        echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'</th>';
      }
    ?>
  </tr>
  </thead>
  <tbody>
  <?php 
    foreach ($result as $y) {
      echo '<tr>';
      ?>
      <td width="<?php echo $wid ?>%"><b><?php echo $y['vNama_kriteria'] ?></b></td>
      <?php 
        foreach ($result as $x) {
          $sql = "SELECT mk.fnilai_awal FROM kriteria_nilai_detail mk where mk.ikriteria_periode='".$ikriteria_periode."' AND mk.imaster_kriteria_x = '".$y['imaster_kriteria']."' and mk.imaster_kriteria_y = '".$x['imaster_kriteria']."'";
          $dt  = $this->db->query($sql)->row_array();
          if(empty($dt['fnilai_awal'])){
            $dt['fnilai_awal'] = 0;
          }
          echo '<td width="<?php echo $wid ?>%" style="text-align:center"> '.$dt['fnilai_awal'].'
                    </td>'; 
        }
      ?>
      <?php
      echo '</tr>';
    }
  ?>
</tbody> 
<tfoot>
  <tr bgcolor="#FFFF00">
    <td width="<?php echo $wid ?>%"><b>Total</b></td>
     <?php 
      foreach ($result as $x) {
        echo '<td width="<?php echo $wid ?>%" style="text-align:center">'.$x['fawal'].'
              </td>';
      }
    ?>
  </tr>
</tfoot>
</table> 


<hr> 
<i class="ace-icon fa fa-angle-double-right"></i>
<b>Normalisasi</b> 
<table class="table table-striped table-bordered table-hover" width="90%"> 
<thead>
  <tr>
    <?php 
      $wid = 90 / ($result_num+1);
    ?>
    <th width="<?php echo $wid ?>%"></th>
    <?php 
      foreach ($result as $x) {
        echo '<th class="center" width="<?php echo $wid ?>%">'.$x['vNama_kriteria'].'</th>';
      }
    ?>
  </tr>
</thead>
  <tbody>
  <?php 
    foreach ($result as $y) {
      echo '<tr>';
      ?>
      <td width="<?php echo $wid ?>%"><b><?php echo $y['vNama_kriteria'] ?></b></td>
      <?php 
        foreach ($result as $x) {
          $sql = "SELECT mk.fnilai_normalisasi FROM kriteria_nilai_detail mk where mk.ikriteria_periode='".$ikriteria_periode."' AND mk.imaster_kriteria_x = '".$y['imaster_kriteria']."' and mk.imaster_kriteria_y = '".$x['imaster_kriteria']."'";
          $dt  = $this->db->query($sql)->row_array();
          if(empty($dt['fnilai_normalisasi'])){
            $dt['fnilai_normalisasi'] = 0;
          }
          echo '<td width="<?php echo $wid ?>%" style="text-align:center"> '.$dt['fnilai_normalisasi'].'
                    </td>'; 
        }
      ?>
      <?php
      echo '</tr>';
    }
  ?>
</tbody> 
</table>  

<hr> 
<i class="ace-icon fa fa-angle-double-right"></i>
<b>Eigen Vaktor</b> 
<table class="table table-striped table-bordered table-hover" width="90%"> 
<thead>
  <tr>
    <?php 
      $wid = 90 / ($result_num+3);
    ?>
    <th width="<?php echo $wid ?>%"></th>
    <?php 
      foreach ($result as $x) {
        echo '<th class="center" width="<?php echo $wid ?>%">'.$x['vNama_kriteria'].'</th>';
      }
    ?>
    <th class="center" width="<?php echo $wid ?>%">Total</th>
    <th class="center" bgcolor="#FFFF00" width="<?php echo $wid ?>%">Eigen Vektor</th>
  </tr>
</thead>
  <tbody>
  <?php 
    foreach ($result as $y) {
      echo '<tr>';
      ?>
      <td width="<?php echo $wid ?>%"><b><?php echo $y['vNama_kriteria'] ?></b></td>
      <?php 
        foreach ($result as $x) {
          $sql = "SELECT mk.fnilai_normalisasi FROM kriteria_nilai_detail mk where mk.ikriteria_periode='".$ikriteria_periode."' AND mk.imaster_kriteria_x = '".$y['imaster_kriteria']."' and mk.imaster_kriteria_y = '".$x['imaster_kriteria']."'";
          $dt  = $this->db->query($sql)->row_array();
          if(empty($dt['fnilai_normalisasi'])){
            $dt['fnilai_normalisasi'] = 0;
          }
          echo '<td width="<?php echo $wid ?>%" style="text-align:center"> '.$dt['fnilai_normalisasi'].'
                    </td>'; 
        }
      ?>
      <td style="text-align:center"  width="<?php echo $wid ?>%"><?php echo $y['fjumlah'] ?></td>
      <td style="text-align:center" bgcolor="#FFFF00" width="<?php echo $wid ?>%"><?php echo $y['fvaktor'] ?></td>
      
      <?php
      echo '</tr>';
    }
  ?>
</tbody> 
</table>  

<hr> 
<i class="ace-icon fa fa-angle-double-right"></i>
<b>Rasio Konsistensi</b> 
<table class="table table-striped table-bordered table-hover" width="90%"> 
<tbody>
   <tr>
     <td width="20%"><b>Eigen Maksimum (λmaks)</b></td>
     <td width="70%"><?php  
                     $dtmax = $this->db->query("SELECT SUM(mk.ftmax) as ftmax FROM kriteria_nilai mk WHERE mk.ikriteria_periode='".$ikriteria_periode."'")->row_array(); 
                     echo number_format($dtmax['ftmax'],3)
                     ?></td>
   </tr>
   <tr>
     <td width="20%"><b>Consistency Index (CI)</b></td>
     <td width="70%">
      <?php 
        $jumlah_kriteria = $result_num; 
        $nilai = $dtmax['ftmax']-$jumlah_kriteria;
        $cons_i= $nilai/($jumlah_kriteria-1); 
        echo number_format($cons_i,3);
      ?></td>
   </tr>
   <tr>
     <td width="20%"><b>Consistency Ratio (CR)</b></td>
     <td width="70%">
      <?php  
        $r1 = $this->db->query('SELECT ri.nilai FROM random_index ri where ri.`index` = "'.$jumlah_kriteria.'"')->row_array();
        if(empty($r1['nilai']) || $r1['nilai']==0){
          $cr = 0;
        }else{
          $cr = $cons_i / $r1['nilai'];
        }
        echo number_format($cr,3);
      ?></td>
   </tr> 
</tbody> 
</table>   

</div>
      <br> 
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>

 