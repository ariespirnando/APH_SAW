<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bobotahp extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  

    function index(){
		$data = array();
		$data['menu'] = 'Bobot';
		$data['result'] = $this->db->query("SELECT * FROM kriteria_periode")->result_array(); 
		$this->template->load('template_wp','bobotahp/kriteriaperiode', $data);
	}

	public function add()
	{
		$data = array();
		$data['menu'] = 'Bobot';
		$data['result'] = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria")->num_rows();
		$data['bulan'] = 0;
		$data['yTahun'] = 0;
		$data['fawal'] = "";
		
		$data['ikriteria_periode'] = 0;
		$data['iedit'] = 0;
		$this->template->load('template_wp','bobotahp/kriteria', $data);
	}

	public function edit($id)
	{	

		// $cek = $this->db->query("SELECT k.ikriteria_periode FROM kriteria_periode k 
		// 	WHERE k.ikriteria_periode='".$id."'")->num_rows();
		// if($cek>0){}else{
		// 	$dt = $this->db->query("SELECT k.ikriteria_periode_new FROM kriteria_history k WHERE k.ikriteria_periode_old='".$id."' ORDER BY k.ikriteria_history DESC")->row_array();
		// 	if(empty($dt['ikriteria_periode_new'])){
		// 		$id=0;
		// 	}else{
		// 		$id = $dt['ikriteria_periode_new'];
		// 	}
		// }

		$data = array();
		$data['menu'] = 'Bobot';
		$data['result'] = $this->db->query("SELECT * FROM master_kriteria m 
			JOIN kriteria_nilai k on k.imaster_kriteria = m.imaster_kriteria
			JOIN kriteria_periode p on k.ikriteria_periode = p.ikriteria_periode
			WHERE p.ikriteria_periode='".$id."'")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria m 
			JOIN kriteria_nilai k on k.imaster_kriteria = m.imaster_kriteria
			JOIN kriteria_periode p on k.ikriteria_periode = p.ikriteria_periode
			WHERE p.ikriteria_periode='".$id."'")->num_rows();

		$re = $this->db->query("SELECT kp.bulan, kp.yTahun FROM kriteria_periode kp WHERE kp.ikriteria_periode='".$id."'")->row_array();
		$data['ikriteria_periode'] = $id;
		$data['bulan'] = $re['bulan'];
		$data['yTahun'] = $re['yTahun'];
		$data['iedit'] = 1;
		$this->template->load('template_wp','bobotahp/kriteria', $data);
	}

	function ceknilai(){
		$sql = "SELECT mn.imaster_kriteria_nilai FROM master_kriteria_nilai mn";
		if($this->db->query($sql)->num_rows()>0){
			$output['ret'] = 1;
		}else{
			$output['ret'] = 0;
		}
		echo json_encode($output);
	}
	/*function hitnormalisasi(){
		$bulan = $this->input->post('bulan');
		$yTahun = $this->input->post('yTahun');
		$jumlahKriteria = $this->db->query("SELECT * FROM master_kriteria")->num_rows(); 
		$kriteria_nilai = $this->input->post('kriteria_nilai');
		$kriteria_awal  = $this->input->post('kriteria_awal'); 
		$this->db->query('Delete from master_kriteria_nilai');
		foreach ($kriteria_awal as $x => $val) { 
			 $jum = 0;
			 foreach ($kriteria_awal as $y => $val2) {
			 	$kritAk['imaster_kriteria_x'] = $x;
			 	$kritAk['imaster_kriteria_y'] = $y;
			 	$kritAk['fnilai_awal']    = $kriteria_nilai[$x][$y];
			 	$nilai = $kriteria_nilai[$x][$y];
			 	if($nilai==0 || $val2==0){
			 		$kritAk['fnilai_normalisasi'] = 0;
			 	}else{
			 		$kritAk['fnilai_normalisasi'] = number_format(($kriteria_nilai[$x][$y]/$val2),3);
			 	} 
			 	$this->db->insert('master_kriteria_nilai',$kritAk);

			 	$jum += $kritAk['fnilai_normalisasi'];
			 }

			 $imaster_kriteria = $x; 
			 $krit['fawal'] = $val;  
			 $krit['fjumlah'] = $jum;
			 $krit['fvaktor'] = number_format(($jum/$jumlahKriteria),3);
			 $krit['fbobot']  = $krit['fvaktor'] * 100;
			 $this->db->where('imaster_kriteria',$imaster_kriteria);
			 $this->db->update('master_kriteria',$krit); 
		} 

		//Hitung TMAXS
		$dt = $this->db->query("SELECT mk.fawal, mk.fvaktor, mk.imaster_kriteria FROM master_kriteria mk")->result_array();
		foreach ($dt as $v) {
			$upd['ftmax'] = number_format($v['fvaktor'] * $v['fawal'],3);
			$this->db->where('imaster_kriteria',$v['imaster_kriteria']);
			$this->db->update('master_kriteria',$upd); 
		}

		//HITUNG CR , < 0.1
		$jumlah_kriteria = $this->db->query("SELECT * FROM master_kriteria")->num_rows();
		$dtmax = $this->db->query("SELECT SUM(mk.ftmax) as ftmax FROM master_kriteria mk")->row_array();
		$nilai = $dtmax['ftmax']-$jumlah_kriteria;
		$cons_i= $nilai/$dtmax['ftmax']; 
		$r1 = $this->db->query('SELECT ri.nilai FROM random_index ri where ri.`index` = "'.$jumlah_kriteria.'"')->row_array();
		if(empty($r1['nilai']) || $r1['nilai']==0){
			$cr = 0;
		}else{
			$cr = $cons_i / $r1['nilai'];
		}
 		
 		$output['cr'] = number_format($cr,3);
		if($cr<0.1){
			$output['success'] = 1;
			$this->cleardata2();
		}else{
			$this->cleardata();
			$output['success'] = 0;
			$this->cleardata2();
		}
		echo json_encode($output);
	}*/

	function hapus($id){
		$this->db->query('Delete from kriteria_periode WHERE ikriteria_periode="'.$id.'"');
		$this->db->query('Delete from kriteria_nilai WHERE ikriteria_periode="'.$id.'"'); 
		$this->db->query('Delete from kriteria_nilai_detail WHERE ikriteria_periode="'.$id.'"');
		redirect('Bobotahp');
	}
	function hitnormalisasi(){

		$bulan = $this->input->post('bulan');
		$yTahun = $this->input->post('yTahun');

		$dataPeriode['bulan'] = $bulan;
		$dataPeriode['yTahun']= $yTahun; 

		$cek=$this->db->query("SELECT mk.ikriteria_periode FROM kriteria_periode mk WHERE 
			mk.bulan='".$bulan."' AND mk.yTahun='".$yTahun."'");
		if($cek->num_rows()>0){
			$dt = $cek->row_array();
			$kriteria_history['ikriteria_periode_old'] = $dt['ikriteria_periode'];  
			$ikriteria_periode = $dt['ikriteria_periode']; 

			//$this->db->query('Delete from kriteria_periode WHERE ikriteria_periode="'.$dt['ikriteria_periode'].'"');
			$this->db->query('Delete from kriteria_nilai WHERE ikriteria_periode="'.$dt['ikriteria_periode'].'"'); 
			$this->db->query('Delete from kriteria_nilai_detail WHERE ikriteria_periode="'.$dt['ikriteria_periode'].'"');  	
		}else{
			$dataPeriode['bulan'] = $bulan;
			$dataPeriode['yTahun']= $yTahun;
			$this->db->insert('kriteria_periode',$dataPeriode);
			$ikriteria_periode = $this->db->insert_id();
		} 

		

		// $kriteria_history['ikriteria_periode_new'] = $ikriteria_periode; 
		// $this->db->insert('kriteria_history',$kriteria_history);



		$jumlahKriteria = $this->db->query("SELECT * FROM master_kriteria")->num_rows(); 
		$kriteria_nilai = $this->input->post('kriteria_nilai');
		$kriteria_awal  = $this->input->post('kriteria_awal');  

		foreach ($kriteria_awal as $x => $val) { 

			 $krit_n['imaster_kriteria']  		= $x;
			 $krit_n['ikriteria_periode']  = $ikriteria_periode;
			 $krit_n['fawal'] 					= $val;   
			 $this->db->insert('kriteria_nilai',$krit_n); 

			 $jum = 0;
			 foreach ($kriteria_awal as $y => $val2) {
			 	$kritAk['ikriteria_periode']  = $ikriteria_periode;
			 	$kritAk['imaster_kriteria_x'] = $x;
			 	$kritAk['imaster_kriteria_y'] = $y;
			 	$kritAk['fnilai_awal']    = $kriteria_nilai[$x][$y];
			 	$nilai = $kriteria_nilai[$x][$y];
			 	if($nilai==0 || $val2==0){
			 		$kritAk['fnilai_normalisasi'] = 0;
			 	}else{
			 		$kritAk['fnilai_normalisasi'] = number_format(($kriteria_nilai[$x][$y]/$val2),3);
			 	} 
			 	$this->db->insert('kriteria_nilai_detail',$kritAk);

			 	$jum += $kritAk['fnilai_normalisasi'];
			 }

			 $imaster_kriteria = $x;  
			 $krit['fjumlah'] = $jum;
			 $krit['fvaktor'] = number_format(($jum/$jumlahKriteria),3);
			 //$krit['fbobot']  = $krit['fvaktor'] * 100;
			 $krit['fbobot']  = $krit['fvaktor'];  
			 $this->db->where('imaster_kriteria',$imaster_kriteria);
			 $this->db->where('ikriteria_periode',$ikriteria_periode);
			 $this->db->update('kriteria_nilai',$krit); 
		} 

		//Hitung TMAXS
		$dt = $this->db->query("SELECT mk.fawal, mk.fvaktor, mk.imaster_kriteria FROM kriteria_nilai mk WHERE mk.ikriteria_periode='".$ikriteria_periode."'")->result_array();
		foreach ($dt as $v) {
			$upd['ftmax'] = number_format($v['fvaktor'] * $v['fawal'],3);
			$this->db->where('imaster_kriteria',$v['imaster_kriteria']);
			$this->db->where('ikriteria_periode',$ikriteria_periode);
			$this->db->update('kriteria_nilai',$upd); 
		}

		//HITUNG CR , < 0.1
		$jumlah_kriteria = $this->db->query("SELECT * FROM kriteria_nilai mk WHERE mk.ikriteria_periode='".$ikriteria_periode."'")->num_rows();
		$dtmax = $this->db->query("SELECT SUM(mk.ftmax) as ftmax FROM kriteria_nilai mk WHERE mk.ikriteria_periode='".$ikriteria_periode."'")->row_array();
		$nilai = $dtmax['ftmax']-$jumlah_kriteria;
		$cons_i= $nilai/($jumlah_kriteria-1); 
		$r1 = $this->db->query('SELECT ri.nilai FROM random_index ri where ri.`index` = "'.$jumlah_kriteria.'"')->row_array();
		if(empty($r1['nilai']) || $r1['nilai']==0){
			$cr = 0;
		}else{
			$cr = $cons_i / $r1['nilai'];
		}
 		
 		$output['cr'] = number_format($cr,3);
		if($cr<0.1){
			$output['success'] = 1; 
		}else{
			//$this->cleardata();
			$output['success'] = 0;
			$this->db->query('Delete from kriteria_periode WHERE ikriteria_periode="'.$ikriteria_periode.'"');
			$this->db->query('Delete from kriteria_nilai WHERE ikriteria_periode="'.$ikriteria_periode.'"'); 
			$this->db->query('Delete from kriteria_nilai_detail WHERE ikriteria_periode="'.$ikriteria_periode.'"');
		}

		//HILANGKAN JIKA ADA
		$sqlC = 'SELECT * FROM alternatif_periode a WHERE a.ikriteria_periode="'.$ikriteria_periode.'"';
		if($this->db->query($sqlC)->num_rows()>0){
			$re = $this->db->query($sqlC)->result_array();
			foreach ($re as $r) {
				 $ialternatif_periode = $r['ialternatif_periode'];

				 $alt_per['ikriteria_periode']  = ""; 
				 $this->db->where('ialternatif_periode',$ialternatif_periode);
				 $this->db->update('alternatif_periode',$alt_per);

				 $alt_per2['fnilai_akhir']  = ""; 
				 $alt_per2['irangking']  = ""; 
				 $alt_per2['iset']  = ""; 
				 $this->db->where('ialternatif_periode',$ialternatif_periode);
				 $this->db->update('alternativ',$alt_per2);

				 $alt_per3['ikriteria_nilai']  = ""; 
				 $alt_per3['fnilai_normal']  = ""; 
				 $alt_per3['fnilai_bobot']  = ""; 
				 $this->db->where('ialternatif_periode',$ialternatif_periode);
				 $this->db->update('alternativ_detail',$alt_per3);
			}
		}

		echo json_encode($output);
	}

	function normalisasi(){
		$data = array();
		$data['result'] = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria")->num_rows(); 
		echo $this->load->view('bobotahp/normalisasi', $data, true);
	}
	function view($id){
		$data = array();
		$data['menu'] = 'Bobot';
		$data['result'] = $this->db->query("SELECT * FROM master_kriteria m 
			JOIN kriteria_nilai k on k.imaster_kriteria = m.imaster_kriteria
			JOIN kriteria_periode p on k.ikriteria_periode = p.ikriteria_periode
			WHERE p.ikriteria_periode='".$id."'")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria m 
			JOIN kriteria_nilai k on k.imaster_kriteria = m.imaster_kriteria
			JOIN kriteria_periode p on k.ikriteria_periode = p.ikriteria_periode
			WHERE p.ikriteria_periode='".$id."'")->num_rows();

		$re = $this->db->query("SELECT kp.bulan, kp.yTahun FROM kriteria_periode kp WHERE kp.ikriteria_periode='".$id."'")->row_array();
		$data['ikriteria_periode'] = $id;
		$data['bulan'] = $re['bulan'];
		$data['yTahun'] = $re['yTahun'];
		$data['iedit'] = 1;
		$this->template->load('template_wp','bobotahp/normalisasi', $data);
	}

	// function cleardata(){
	// 	$this->db->query('UPDATE master_kriteria mk SET mk.fawal = NULL, mk.fjumlah = NULL, mk.fvaktor = NULL, mk.ftmax = NULL, mk.fbobot = NULL');
	// 	$this->db->query('Delete from master_kriteria_nilai');
	// }
	// function cleardata2(){
	// 	$this->db->query('Delete from alternativ_detail');
	// 	$this->db->query('Delete from alternativ');
	// }
	
}
?>