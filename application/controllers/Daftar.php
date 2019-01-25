<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	function __construct(){
        parent::__construct();   
    }  
	public function index()
	{
		$data = array();
		$data['action'] = base_url().'index.php/Daftar/add';
		$data['menu'] = 'Login';
		$this->template->load('template_wp','daftar/daftar', $data);
	}
	 
	function add(){   
		if( null !== ($this->input->post('alamat')) &&
			null !== ($this->input->post('nama_user')) &&
			null !== ($this->input->post('pass')) &&
			null !== ($this->input->post('telpon')) &&  
			null !== ($this->input->post('user'))){

			$alamat = $this->input->post('alamat');
			$nama_user = $this->input->post('nama_user');
			$telpon = $this->input->post('telpon');
			$user = $this->input->post('user');
			$pass = $this->input->post('pass');  
			$data['pass'] = $pass;
			$data['user'] = $user;
			$data['telpon'] = $telpon;
			$data['nama_user'] = $nama_user;
			$data['alamat'] = $alamat;  
			$this->db->insert('tb_user',$data);
			redirect('Login');
		}else{
			$this->session->set_flashdata('message', 'Data belum diiisi !!'); 
			redirect('Daftar');
		} 
	}
 
 
}
