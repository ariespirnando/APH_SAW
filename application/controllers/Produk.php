<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
	public function index()
	{
		$data = array();
		$data['menu'] = 'Produk';
		$data['result'] = $this->db->query("SELECT * FROM master_produk")->result_array();
		$this->template->load('template_wp','produk/produk', $data);
	}
	function add(){
		$data = array();
		$data['menu'] = 'Produk';
		$data['action'] = base_url().'Produk/save';
		$data['ckode_produk'] = '';
		$data['vnama_produk'] = ''; 
		$data['imaster_produk'] = '';  
		$data['jenis_produk'] = '';   
		$data['btn'] = 'Save';
		$this->template->load('template_wp','produk/formproduk', $data);
	}
	function save(){
		$data['ckode_produk'] = $this->input->post('ckode_produk');
		$data['vnama_produk'] = $this->input->post('vnama_produk'); 
		$data['jenis_produk'] = $this->input->post('jenis_produk');  
		$this->db->insert('master_produk',$data); 
		redirect('Produk');
	}
	function edit($id){
		$sql = "SELECT * FROM master_produk n where n.imaster_produk='".$id."'";
		$dt = $this->db->query($sql)->row_array();
		$data = array();
		$data['menu'] = 'Produk';
		$data['action'] = base_url().'Produk/Ubah';
		$data['ckode_produk']  =$dt['ckode_produk'];
		$data['vnama_produk'] = $dt['vnama_produk']; 
		$data['imaster_produk'] = $dt['imaster_produk']; 
		$data['jenis_produk'] = $dt['jenis_produk'];
		$data['btn'] = 'Edit'; 
		$this->template->load('template_wp','produk/formproduk', $data); 
	}
	function Ubah(){
		$data['ckode_produk'] = $this->input->post('ckode_produk');
		$data['vnama_produk'] = $this->input->post('vnama_produk'); 
		$data['jenis_produk'] = $this->input->post('jenis_produk');   
		$id = $this->input->post('imaster_produk');
		$this->db->where('imaster_produk',$id);
		$this->db->update('master_produk',$data);
		redirect('Produk');
	}
	function hapus($id){
		$this->db->where('imaster_produk',$id);
		$this->db->delete('master_produk');
		redirect('Produk');
	}
}
?>