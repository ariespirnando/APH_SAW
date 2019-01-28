<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
 	
 	 
	public function index2()
	{
		$data = array();
		$data['menu'] = 'Alternatif';
		$data['result'] = $this->db->query("SELECT * FROM alternativ a JOIN master_produk mp on mp.imaster_produk = a.imaster_produk")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria")->num_rows();
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array(); 
		$this->template->load('template_wp','alternatif/alternatif', $data);
	}

	function index(){
		$data = array();
		$data['menu'] = 'Alternatif';
		$data['perkar'] = $this->db->query('SELECT * FROM kriteria_periode k')->result_array();
		$data['result'] = $this->db->query("SELECT * FROM alternatif_periode")->result_array(); 
		$this->template->load('template_wp','alternatif/alternatifperiode', $data);
	}
	 
	function add(){
		$data = array();
		$data['action'] = base_url().'Alternatif/save2';
		$data['menu'] = 'Alternatif';

		$data['vnama_produk'] = '';
		$data['imaster_produk'] = '';
		$data['ialternativ'] = '';

		$data['bulan'] = 0;
		$data['yTahun'] = 0;
		$data['iedit'] = 0;

		$data['btn'] = 'Save';
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		$data['result'] = $this->db->query("SELECT * FROM master_produk mp JOIN history_transaksi ht on ht.ckode_produk = mp.ckode_produk 
			WHERE mp.iLounching=0")->result_array();
		/*$data['result'] = $this->db->query("SELECT * FROM master_produk mp JOIN history_transaksi ht on ht.ckode_produk = mp.ckode_produk WHERE mp.imaster_produk NOT IN (SELECT a.imaster_produk FROM alternativ a)
			")->result_array();*/
		$this->template->load('template_wp','alternatif/formalternatif2', $data);
	}
	function Add_new($id){
		$data = array();
		$data['action'] = base_url().'Alternatif/save3';
		$data['menu'] = 'Alternatif'; 

		$data['ialternatif_periode'] = $id;

		$data['vnama_produk'] = '';
		$data['imaster_produk'] = '';
		$data['ialternativ'] = ''; 

		$dt = $this->db->query("SELECT a.bulan, a.yTahun FROM alternatif_periode a WHERE a.ialternatif_periode='".$id."'")->row_array();
		$data['bulan'] = $dt['bulan'];
		$data['yTahun'] = $dt['yTahun'];
		$data['iedit'] = 1;

		$data['btn'] = 'Save';
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		/*$data['result'] = $this->db->query("SELECT * FROM master_produk mp JOIN history_transaksi ht on ht.ckode_produk = mp.ckode_produk 
			")->result_array();*/
		$data['result'] = $this->db->query("SELECT * FROM master_produk mp JOIN history_transaksi ht on ht.ckode_produk = mp.ckode_produk WHERE mp.iLounching=0 AND mp.imaster_produk NOT IN (SELECT aa.imaster_produk FROM alternatif_periode a 
			JOIN alternativ aa on aa.ialternatif_periode = a.ialternatif_periode
			WHERE a.ialternatif_periode = '".$id."')
			")->result_array();
		$this->template->load('template_wp','alternatif/formalternatif3', $data);
	}
	function save(){
		$data['imaster_produk'] = $this->input->post('imaster_produk');  
		$this->db->insert('alternativ',$data); 
		$datas['ialternativ'] = $this->db->insert_id();
		$fnilai_awal = $this->input->post('fnilai_awal'); 
		foreach ($fnilai_awal as $k => $v) { 
			$datas['imaster_kriteria'] = $k;
			$datas['fnilai_awal']	  = $v;
			$this->db->insert('alternativ_detail',$datas);
		}

		$this->db->query('UPDATE alternativ a set a.fnilai_akhir =NULL');
		$this->db->query('UPDATE alternativ_detail ad SET ad.fnilai_normal = NULL'); 
		
		redirect('Alternatif');
	}

	function edit($id){
		$data = array();
		$data['menu'] = 'Alternatif';
		$data['ialternatif_periode'] = $id;
		$data['result'] = $this->db->query("SELECT * FROM alternatif_periode ap
			JOIN alternativ a on ap.ialternatif_periode = a.ialternatif_periode
			JOIN master_produk mp on mp.imaster_produk = a.imaster_produk
			WHERE ap.ialternatif_periode ='".$id."'")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria")->num_rows();
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array(); 
		$this->template->load('template_wp','alternatif/alternatif', $data);
	}
	function save3(){ 
		 
		$ialternatif_periode = $this->input->post('ialternatif_periode'); 

		$id_for = $this->input->post('insertALT'); 
		$kriteria = $this->db->query("SELECT m.imaster_kriteria, m.vNama_kriteria FROM master_kriteria m")->result_array();
		foreach ($id_for as $val) { 
			 $sql = "SELECT * FROM master_produk mp JOIN history_transaksi ht on ht.ckode_produk = mp.ckode_produk 
					WHERE mp.imaster_produk ='".$val."' LIMIT 1";
			 $datas = $this->db->query($sql)->row_array();
			 $alt['imaster_produk']     =$datas['imaster_produk'];
			 $alt['ialternatif_periode']= $ialternatif_periode;

			 $this->db->insert('alternativ',$alt);
			 $ialternativ = $this->db->insert_id();

			  foreach ($kriteria as $k) {
			  	$gabung = strtolower(str_replace(' ', '_', $k['vNama_kriteria'])); 
			  	/*$sql2 = "SELECT ms.fnilai FROM master_subkriteria ms WHERE ms.imaster_kriteria='".$k['imaster_kriteria']."' AND ms.imaster_subkriteria='".$datas[$gabung]."'";
			  	$sen = $this->db->query($sql2); */

			  	/*$sql2 = "SELECT ms.fnilai FROM master_subkriteria ms WHERE ms.imaster_kriteria='".$k['imaster_kriteria']."' AND ms.fnilai_range1>='".$datas[$gabung]."' AND ms.fnilai_range2<='".$datas[$gabung]."'"; */
			  	$sql2 = "SELECT ms.fnilai, ms.fnilai_range1, ms.fnilai_range2 FROM master_subkriteria ms WHERE ms.imaster_kriteria='".$k['imaster_kriteria']."'"; 
			  	$sen = $this->db->query($sql2); 

			  	$alt2['imaster_kriteria']=$k['imaster_kriteria'];
			  	$alt2['ialternativ']=$ialternativ;
			  	$alt2['ialternatif_periode']=$ialternatif_periode; 

			  	if($sen->num_rows()>0){ 
			  		$res = $sen->result_array();
			  		foreach ($res as $v) {
			  			echo $v['fnilai_range1'];
			  			if($datas[$gabung]>=$v['fnilai_range1'] && $datas[$gabung]<=$v['fnilai_range2']){
			  				$alt2['fnilai_awal'] = $v['fnilai'];
			  				break;
			  			}
			  		} 
			  	}else{
			  		$alt2['fnilai_awal'] = $datas[$gabung];
			  	}
			  	$alt2['fnilai_awal2'] = $datas[$gabung]; 
			  	$this->db->insert('alternativ_detail',$alt2);

			  }

		}  
		 

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

		redirect('Alternatif/edit/'.$ialternatif_periode); 

		
	}
	function save2(){ 

		$bulan = $this->input->post('bulan'); 
		$yTahun = $this->input->post('yTahun');  

		$data_periode['bulan'] = $bulan;
		$data_periode['yTahun'] = $yTahun;

		$cek=$this->db->query("SELECT mk.ialternatif_periode FROM alternatif_periode mk WHERE 
			mk.bulan='".$bulan."' AND mk.yTahun='".$yTahun."'");

		if($cek->num_rows()>0){
			$this->session->set_flashdata('message', 'Periode Sudah dipilih !!'); 
			redirect('Alternatif/add');
		}else{ 
			$this->db->insert('alternatif_periode',$data_periode);
			$ialternatif_periode = $this->db->insert_id();

			$id_for = $this->input->post('insertALT'); 
			$kriteria = $this->db->query("SELECT m.imaster_kriteria, m.vNama_kriteria FROM master_kriteria m")->result_array();
			foreach ($id_for as $val) { 
				 $sql = "SELECT * FROM master_produk mp JOIN history_transaksi ht on ht.ckode_produk = mp.ckode_produk 
						WHERE mp.imaster_produk ='".$val."' LIMIT 1";
				 $datas = $this->db->query($sql)->row_array();
				 $alt['imaster_produk']     =$datas['imaster_produk'];
				 $alt['ialternatif_periode']= $ialternatif_periode;

				 $this->db->insert('alternativ',$alt);
				 $ialternativ = $this->db->insert_id();

				  foreach ($kriteria as $k) {
				  	$gabung = strtolower(str_replace(' ', '_', $k['vNama_kriteria'])); 
				  	/*$sql2 = "SELECT ms.fnilai FROM master_subkriteria ms WHERE ms.imaster_kriteria='".$k['imaster_kriteria']."' AND ms.imaster_subkriteria='".$datas[$gabung]."'";
				  	$sen = $this->db->query($sql2); */

				  	$sql2 = "SELECT ms.fnilai FROM master_subkriteria ms WHERE ms.imaster_kriteria='".$k['imaster_kriteria']."' AND ms.fnilai_range1>='".$datas[$gabung]."' AND ms.fnilai_range2<='".$datas[$gabung]."'"; 
				  	$sen = $this->db->query($sql2); 

				  	$alt2['imaster_kriteria']=$k['imaster_kriteria'];
				  	$alt2['ialternativ']=$ialternativ;
				  	$alt2['ialternatif_periode']=$ialternatif_periode; 

				  	if($sen->num_rows()>0){
				  		$ds = $sen->row_array();
				  		$alt2['fnilai_awal'] = $ds['fnilai'];
				  	}else{
				  		$alt2['fnilai_awal'] = $datas[$gabung];
				  	}
				  	$this->db->insert('alternativ_detail',$alt2);

				  }

			}  
			
			$this->db->query('UPDATE alternativ a set a.fnilai_akhir =NULL');
			$this->db->query('UPDATE alternativ_detail ad SET ad.fnilai_normal = NULL');  
			redirect('Alternatif');
		}
	}

	 
	 
	function hapus($id){
		$this->db->where('ialternativ',$id);
		$this->db->delete('alternativ');  

		$this->db->where('ialternativ',$id);
		$this->db->delete('alternativ_detail');  

		 $ialternatif_periode = $this->input->get('ialternatif_periode');
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
 

		redirect('Alternatif/edit/'.$ialternatif_periode);
	}

	function hapus2($id){
		$this->db->query('Delete from alternativ_detail WHERE ialternatif_periode="'.$id.'"');
		$this->db->query('Delete from alternativ WHERE ialternatif_periode="'.$id.'"');
		$this->db->query('Delete from alternatif_periode WHERE ialternatif_periode="'.$id.'"'); 
		redirect('Alternatif');
	}

	function cleardata($id){
		$this->db->query('Delete from alternativ_detail WHERE ialternatif_periode="'.$id.'"');
		$this->db->query('Delete from alternativ WHERE ialternatif_periode="'.$id.'"');
	}

	function normalisasi(){
		$data = array(); 
		//Hitung Disini

		$kriteria = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		foreach ($kriteria as $kri) {
			$benefit = $this->db->query("SELECT MAX(ad.fnilai_awal) as Benefit FROM alternativ_detail ad JOIN master_kriteria mk on 
											mk.imaster_kriteria = ad.imaster_kriteria
											WHERE mk.vAtribut = 'Benefit' AND ad.imaster_kriteria='".$kri['imaster_kriteria']."' 
											LIMIT 1")->row_array();
			$cost = $this->db->query("SELECT MIN(ad.fnilai_awal) as Cost FROM alternativ_detail ad JOIN master_kriteria mk on 
											mk.imaster_kriteria = ad.imaster_kriteria
											WHERE mk.vAtribut = 'Cost' AND ad.imaster_kriteria='".$kri['imaster_kriteria']."' 
											LIMIT 1")->row_array();

			$nilai = $this->db->query("SELECT ad.ialternativ_detail, ad.ialternativ, ad.fnilai_awal 
						FROM alternativ_detail ad WHERE ad.imaster_kriteria = '".$kri['imaster_kriteria']."'")->result_array();
			foreach ($nilai as $nn) {
				$this->db->where('ialternativ_detail',$nn['ialternativ_detail']);

				if($kri['vAtribut']=="Benefit"){
					if(!empty($benefit['Benefit'])){
						if($nn['fnilai_awal']==0){
							$dUpdate['fnilai_normal'] = 0;
							$dUpdate['fnilai_bobot'] = 0; 
						}else{
							$nilai_normal  = number_format(($nn['fnilai_awal']/$benefit['Benefit']),3);
							$dUpdate['fnilai_normal'] = $nilai_normal;
							$dUpdate['fnilai_bobot'] = number_format(($nilai_normal*$kri['fbobot']),3);
						}
						$this->db->update('alternativ_detail',$dUpdate);
					}
				}else{
					if(!empty($cost['Cost'])){
						if($nn['fnilai_awal']==0){
							$dUpdate['fnilai_normal'] = 0;
							$dUpdate['fnilai_bobot'] = 0;
						}else{
							$nilai_normal = number_format(($cost['Cost']/$nn['fnilai_awal']),3);
							$dUpdate['fnilai_normal'] = $nilai_normal;
							$dUpdate['fnilai_bobot'] = number_format(($nilai_normal*$kri['fbobot']),3);
						}
						$this->db->update('alternativ_detail',$dUpdate);
					}
				}
			}  
		}

		$Alternatif = $this->db->query("SELECT * FROM alternativ")->result_array();
		foreach ($Alternatif as $al) {
			$sqN = $this->db->query("SELECT SUM(ad.fnilai_bobot) as nilai FROM  alternativ_detail ad where ad.ialternativ = '".$al['ialternativ']."'")->row_array();
			if(empty($sqN['nilai'])){
				$dtAlt['fnilai_akhir'] = 0;
			}else{
				$dtAlt['fnilai_akhir'] = $sqN['nilai'];
			}

			$this->db->where('ialternativ',$al['ialternativ']);
			$this->db->update('alternativ',$dtAlt); 
		}
		
		$data['result'] = $this->db->query("SELECT * FROM alternativ a JOIN master_produk mp on mp.imaster_produk = a.imaster_produk")->result_array(); 
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria")->num_rows();

		echo $this->load->view('alternatif/normalisasi', $data,true);
	}

	function view($id){
		$data = array();
		$ikriteria_periode = $this->input->get('ikriteria_periode');
		$data['menu'] = 'Alternatif';
		$data['result'] = $this->db->query("SELECT * FROM alternativ a JOIN master_produk mp on mp.imaster_produk = a.imaster_produk WHERE a.ialternatif_periode = '".$id."'")->result_array(); 
		$data['kriteria'] = $this->db->query("SELECT * FROM master_kriteria mk
								JOIN kriteria_nilai kn ON kn.imaster_kriteria = mk.imaster_kriteria
								JOIN kriteria_periode kp ON kp.ikriteria_periode = kn.ikriteria_periode
								WHERE kp.ikriteria_periode='".$ikriteria_periode."'")->result_array();
		$data['result_num'] = $this->db->query("SELECT * FROM master_kriteria mk
								JOIN kriteria_nilai kn ON kn.imaster_kriteria = mk.imaster_kriteria
								JOIN kriteria_periode kp ON kp.ikriteria_periode = kn.ikriteria_periode
								WHERE kp.ikriteria_periode='".$ikriteria_periode."'")->num_rows(); 
		$this->template->load('template_wp','alternatif/normalisasi', $data); 
	}
	function normalisasi2($id){
		$ialternatif_periode = $id;
		$ikriteria_periode   = $this->input->get('periode');
		
		$dt['ikriteria_periode'] = $ikriteria_periode;
		$this->db->where('ialternatif_periode',$id);
		$this->db->update('alternatif_periode',$dt); 

		$data = array(); 
		//Hitung Disini 
		$kriteria = $this->db->query("SELECT * FROM kriteria_periode kp
			JOIN kriteria_nilai kn ON kn.ikriteria_periode = kp.ikriteria_periode
			JOIN master_kriteria mk ON mk.imaster_kriteria = kn.imaster_kriteria
			WHERE kp.ikriteria_periode ='".$ikriteria_periode."'")->result_array();
		foreach ($kriteria as $kri) {
			$benefit = $this->db->query("SELECT MAX(ad.fnilai_awal) as Benefit FROM alternativ_detail ad JOIN master_kriteria mk on 
											mk.imaster_kriteria = ad.imaster_kriteria
											WHERE mk.vAtribut = 'Benefit' AND ad.imaster_kriteria='".$kri['imaster_kriteria']."' AND ad.ialternatif_periode='".$ialternatif_periode."'
											LIMIT 1")->row_array();
			$cost = $this->db->query("SELECT MIN(ad.fnilai_awal) as Cost FROM alternativ_detail ad JOIN master_kriteria mk on 
											mk.imaster_kriteria = ad.imaster_kriteria
											WHERE mk.vAtribut = 'Cost' AND ad.imaster_kriteria='".$kri['imaster_kriteria']."' AND ad.ialternatif_periode='".$ialternatif_periode."'
											LIMIT 1")->row_array();

			$nilai = $this->db->query("SELECT ad.ialternativ_detail, ad.ialternativ, ad.fnilai_awal 
						FROM alternativ_detail ad WHERE ad.imaster_kriteria = '".$kri['imaster_kriteria']."' AND ad.ialternatif_periode='".$ialternatif_periode."'")->result_array();
			foreach ($nilai as $nn) {
				$this->db->where('ialternativ_detail',$nn['ialternativ_detail']); 
				if($kri['vAtribut']=="Benefit"){
					if(!empty($benefit['Benefit'])){
						if($nn['fnilai_awal']==0){
							$dUpdate['fnilai_normal'] = 0;
							$dUpdate['fnilai_bobot'] = 0; 
						}else{
							$nilai_normal  = number_format(($nn['fnilai_awal']/$benefit['Benefit']),3);
							$dUpdate['fnilai_normal'] = $nilai_normal;
							$dUpdate['fnilai_bobot'] = number_format(($nilai_normal*$kri['fbobot']),3);
						}
						$dUpdate['ikriteria_nilai'] = $kri['ikriteria_nilai'];
						$this->db->update('alternativ_detail',$dUpdate);
					}
				}else{
					if(!empty($cost['Cost'])){
						if($nn['fnilai_awal']==0){
							$dUpdate['fnilai_normal'] = 0;
							$dUpdate['fnilai_bobot'] = 0;
						}else{
							$nilai_normal = number_format(($cost['Cost']/$nn['fnilai_awal']),3);
							$dUpdate['fnilai_normal'] = $nilai_normal;
							$dUpdate['fnilai_bobot'] = number_format(($nilai_normal*$kri['fbobot']),3);
						}
						$dUpdate['ikriteria_nilai'] = $kri['ikriteria_nilai'];
						$this->db->update('alternativ_detail',$dUpdate);
					}
				}
			}  
		}

		$Alternatif = $this->db->query("SELECT * FROM alternativ WHERE ialternatif_periode='".$ialternatif_periode."'")->result_array();
		foreach ($Alternatif as $al) {
			$sqN = $this->db->query("SELECT SUM(ad.fnilai_bobot) as nilai FROM  alternativ_detail ad where ad.ialternativ = '".$al['ialternativ']."' AND ad.ialternatif_periode='".$ialternatif_periode."'")->row_array();
			if(empty($sqN['nilai'])){
				$dtAlt['fnilai_akhir'] = 0;
			}else{
				$dtAlt['fnilai_akhir'] = $sqN['nilai'];
			}

			$this->db->where('ialternativ',$al['ialternativ']);
			$this->db->update('alternativ',$dtAlt); 
		} 


		//set rank in here
		$setrank = $this->db->query("SELECT a.ialternativ FROM alternativ a WHERE a.ialternatif_periode = '".$ialternatif_periode."' ORDER BY a.fnilai_akhir DESC")->result_array();
		$i=1;
		foreach ($setrank as $s) {
			$srank['irangking'] = $i++;
			$srank['iset'] = 0; 
			$this->db->where('ialternativ',$s['ialternativ']);
			$this->db->update('alternativ',$srank); 
		}

	}

	function ceknormalisasi(){
		$num = $this->db->query("SELECT * FROM master_kriteria mk WHERE mk.fbobot IS NULL")->num_rows();
		if($num>0){
			$ds['output'] = 0;
		}else{
			$num2 = $this->db->query('SELECT a.ialternativ FROM alternativ a')->num_rows();
			if($num2>0){
				$ds['output'] = 2;
			}else{
				$ds['output'] = 1;
			}
			
		}
		echo json_encode($ds);
	}
}
?>