<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct() {
        parent::__construct();
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        }  
    }
	public function index()
	{
		$data = array(); 
		$data['menu'] = 'Profil';
		$this->template->load('template_wp','profil/profil',$data);
	}

	public function password(){
		$data = array(); 
		$data['menu'] = 'Profil';
		$data['action'] = base_url().'index.php/Profil/update';
		$this->template->load('template_wp','profil/password',$data);
	}
	 
	function update(){    

		if( null !== ($this->input->post('id_user')) &&
			null !== ($this->input->post('pass')) && 
			null !== ($this->input->post('passLama')) &&  
			null !== ($this->input->post('user'))){

			$alamat = $this->input->post('id_user');
			$pass = $this->input->post('pass');
			$passLama = $this->input->post('passLama');
			$user = $this->input->post('user');  

			$data['pass'] = $pass; 

			if($passLama!=$this->session->userdata('pass')){ 
				$this->session->set_flashdata('message', 'Paswword Lama Tidak Sama !!'); 
				redirect('Profil/password');
			}else{
				$this->db->where('id_user',$id_user);
				$this->db->update('tb_user',$data); 
				 
			    $fls['pass'] = $pass;
	            $this->session->set_userdata($fls); 

	            $this->session->set_flashdata('message', 'Password berhasil di Update'); 
				redirect('Profil/password');
			} 
			
		}else{
			$this->session->set_flashdata('message', 'Data belum diiisi !!'); 
			redirect('Profil/password');
		} 
	}
 
 
}
