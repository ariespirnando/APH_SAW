<html>
    <head>
        <style> 
            @page {
                margin: 100px 25px;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }
        </style>
    </head>
    <body>  
        <main> 
                <?php 
                    $bulan = array('1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'May','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
                ?>
                <b>Laporan Penjadwalan Produksi Periode <?php echo $bulan[$periode['bulan']].'-'.$periode['yTahun'] ?></b><br><hr>
                <i class="ace-icon fa fa-angle-double-right"></i> <b>Bobot</b><hr>
                <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1" width="100%">
                  <thead>
                     <tr>
                         <th width="50%">Kriteria</th>
                         <th width="50%">Bobot</th>
                     </tr>
                  </thead> 
                  <tbody>
                    <?php 
                        foreach ($krite_bbt as $v) {
                           echo '<tr>';
                            echo '<td>'.$v['cKode'].'-'.$v['vNama_kriteria'].'</td>';
                            echo '<td>'.$v['fbobot'].' % </td>';
                           echo '</tr>';
                        }
                    ?>
                     
                  </tbody> 
                </table>  
                
                <?php 
                if($num>0){
                    ?>
                    <hr>
                    <i class="ace-icon fa fa-angle-double-right"></i> <b>Rangking Terseleksi</b><hr>
                    <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1" width="100%">
                      <thead>
                         <tr>
                             <th width="50%">Produk</th>
                             <th width="25%">Rangking</th>
                             <th width="25%">Nilai</th>
                         </tr>
                      </thead> 
                      <tbody>
                        <?php 
                            foreach ($result_tr as $v) {
                               echo '<tr>';
                                echo '<td>'.$v['ckode_produk'].'-'.$v['vnama_produk'].'</td>';
                                echo '<td>'.$v['irangking'].' </td>';
                                echo '<td>'.$v['fnilai_akhir'].' % </td>';
                               echo '</tr>';
                            }
                        ?>
                         
                      </tbody> 
                    </table>  

                    <?php
                }
                ?>

                <hr>
                    <i class="ace-icon fa fa-angle-double-right"></i> <b>Rangking</b><hr>
                    <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1" width="100%">
                      <thead>
                         <tr>
                             <th width="50%">Produk</th>
                             <th width="25%">Rangking</th>
                             <th width="25%">Nilai</th>
                         </tr>
                      </thead> 
                      <tbody>
                        <?php 
                            foreach ($result_alt as $v) {
                               echo '<tr>';
                                echo '<td>'.$v['ckode_produk'].'-'.$v['vnama_produk'].'</td>';
                                echo '<td>'.$v['irangking'].' </td>';
                                echo '<td>'.$v['fnilai_akhir'].' % </td>';
                               echo '</tr>';
                            }
                        ?>
                         
                      </tbody> 
                    </table> 
        </main>
    </body>
</html>