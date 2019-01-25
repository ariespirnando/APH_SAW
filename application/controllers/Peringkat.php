<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peringkat extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
	public function index2()
	{
		$data = array();
		$num_data  = $this->db->query("SELECT a.fnilai_akhir, a.ialternativ, mp.ckode_produk, mp.vnama_produk FROM alternativ a 
						JOIN master_produk mp on mp.imaster_produk = a.imaster_produk
						ORDER by a.fnilai_akhir DESC"); 
		$data['tampil'] = 0;
		if($num_data->num_rows()>0){
			$num2 = $this->db->query("SELECT a.ialternativ FROM alternativ a WHERE a.fnilai_akhir IS NULL")->num_rows();
			if($num2>0){}else{
				$data['tampil'] = 1;
				$data['result'] = $num_data->result_array();
			}
		}
		$data['menu'] = 'Peringkat';
		$this->template->load('template_wp','peringkat/peringkat', $data);
	}

	public function index()
	{
		$data = array();
		$data['menu'] = 'Peringkat'; 
		$data['result'] = $this->db->query("SELECT * FROM alternatif_periode")->result_array(); 
		$this->template->load('template_wp','peringkat/peringkatperiode', $data);
	}

	public function view($id){
		$data = array();
		$data['menu'] = 'Peringkat'; 
		$data['result'] = $this->db->query("SELECT * FROM alternativ a 
			JOIN master_produk mp ON mp.imaster_produk = a.imaster_produk WHERE a.ialternatif_periode = '".$id."' ORDER BY a.irangking")->result_array();
		$data['menu'] = 'Peringkat';
		$data['tampil'] = 1;
		$data['btn'] = 'Simpan';
		$data['ialternatif_periode'] = $id;
		$data['action'] = base_url().'Peringkat/simpan';
		$this->template->load('template_wp','peringkat/peringkat', $data);
	}
	function simpan(){
		$checked_date = $this->input->post('isChecked');
		$ialternatif_periode = $this->input->post('ialternatif_periode');
		$sto['iset'] = 0;
		$this->db->where('ialternatif_periode',$ialternatif_periode);
		$this->db->update('alternativ',$sto); 

		foreach ($checked_date as $k=>$v) {
			$ds['iset'] = 1;
			$this->db->where('ialternativ',$v);
			$this->db->update('alternativ',$ds); 
		}
		redirect('Peringkat/view/'.$ialternatif_periode);
	}
	 
}
?>