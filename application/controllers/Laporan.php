<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
        parent::__construct();  
        if(!$this->session->userdata('loggedin')){   
            redirect('Login');
        } 
    }   

	public function index()
	{
		$data = array();
		$data['menu'] = 'Laporan'; 
		$data['result'] = $this->db->query("SELECT * FROM alternatif_periode")->result_array(); 
		$this->template->load('template_wp','laporan/laporanperiode', $data);
	}

	public function ctpdf($id){
		$data = array();
		$data['menu'] = 'Laporan'; 
		$data['periode'] = $this->db->query("SELECT ap.bulan, ap.yTahun FROM alternatif_periode ap WHERE ap.ialternatif_periode = '".$id."'")->row_array(); 
		$data['result_alt'] = $this->db->query("SELECT * FROM alternativ a 
			JOIN master_produk mp ON mp.imaster_produk = a.imaster_produk WHERE a.ialternatif_periode = '".$id."' ORDER BY a.irangking")->result_array();
		$data['result_tr'] = $this->db->query("SELECT * FROM alternativ a 
			JOIN master_produk mp ON mp.imaster_produk = a.imaster_produk WHERE a.iset=1 AND a.ialternatif_periode = '".$id."' ORDER BY a.irangking")->result_array(); 
		$data['num'] = $this->db->query("SELECT * FROM alternativ a 
			JOIN master_produk mp ON mp.imaster_produk = a.imaster_produk WHERE a.iset=1 AND a.ialternatif_periode = '".$id."' ORDER BY a.irangking")->num_rows();  
		$data['krite_bbt'] = $this->db->query("SELECT * FROM alternatif_periode ap 
			JOIN kriteria_periode kp ON ap.ikriteria_periode = kp.ikriteria_periode
			JOIN kriteria_nilai kn ON kn.ikriteria_periode = kp.ikriteria_periode
			JOIN master_kriteria mk ON mk.imaster_kriteria = kn.imaster_kriteria
			WHERE ap.ialternatif_periode = '".$id."'
			")->result_array();

		$this->load->library('pdf'); 
	    $this->pdf->setPaper('A4', 'potrait');
	    $date=date('Y-m-d H:i:s');
	    $date=str_replace(':','_',(str_replace('-','_',str_replace(' ', '_', $date))));
	    $this->pdf->filename = "laporan_".$date.".pdf";
	    $this->pdf->load_view('laporan/cetak',$data); 
 
	}
	 

	 
	 
}
?>