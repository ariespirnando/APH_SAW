<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
        parent::__construct(); 
    }  
	public function index()
	{
		$this->session->sess_destroy();  
		$data = array();
		$data['menu'] = 'Login';
		$data['action'] = base_url().'Login/cek';
		$this->template->load('template_wp','login/login', $data);
		
	}
	 
	function cek(){   
		if( null !== ($this->input->post('pass')) && 
			null !== ($this->input->post('user'))){ 

			$user = $this->input->post('user');
			$pass = $this->input->post('pass');  
			
			$sql = 'SELECT * FROM `tb_user` t WHERE t.`pass` = "'.$pass.'" AND t.`user`="'.$user.'"';
			$dt = $this->db->query($sql);
			if($dt->num_rows()>0){
				$dts = $dt->row_array();
				$data = array(
			      'id_user' => $dts['id_user'],
			      'nama_user' => $dts['nama_user'],
			      'alamat'    => $dts['alamat'],
			      'telpon'    => $dts['telpon'], 
			      'pass'      => $dts['pass'], 
			      'user'      => $dts['user'],  
			      'loggedin'     => 1,
			    );
	            $this->session->set_userdata($data); 

				redirect('Welcome');
			}else{
				$this->session->set_flashdata('message', 'Username / Password Salah !!'); 
				redirect('Login');
			}
			
		}else{
			$this->session->set_flashdata('message', 'Data belum diiisi !!'); 
			redirect('Login');
		} 
	}

	public function logout(){
		$this->session->sess_destroy();  
	    redirect('Login');
    }
 
 
}
