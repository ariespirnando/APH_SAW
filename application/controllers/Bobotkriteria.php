<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bobotkriteria extends CI_Controller {
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
		$data['result'] = $this->db->query("SELECT * FROM master_kriteria")->result_array();
		$this->template->load('template_wp','bobotkriteria/kriteria', $data);
	}
	function index(){
		$data = array();
		$data['menu'] = 'Alternatif'; 
		$data['result'] = $this->db->query("SELECT * FROM kriteria_periode")->result_array(); 
		$this->template->load('template_wp','bobotkriteria/kriteria2', $data);
	}
	function view($id){
		$data['menu'] = 'Alternatif'; 
		$data['result'] = $this->db->query("SELECT * FROM master_kriteria m 
			JOIN kriteria_nilai k on k.imaster_kriteria = m.imaster_kriteria
			JOIN kriteria_periode p on k.ikriteria_periode = p.ikriteria_periode
			WHERE p.ikriteria_periode='".$id."'")->result_array(); 
		$this->template->load('template_wp','bobotkriteria/kriteria', $data);
	}
	 
}
?>