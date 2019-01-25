<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }  
	public function index()
	{
		$data = array();
		$data['menu'] = 'Home';
		$this->template->load('template_wp','welcome_message', $data);
	}
}
