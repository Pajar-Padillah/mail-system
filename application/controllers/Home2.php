<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home2 extends CI_Controller {

	function __construct(){
    parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }

          $this->load->model('M_Permintaan');
          $this->load->model('M_Wilker');
          $this->load->model('M_Jenis_Sertifikat');
          $this->load->model('M_Keluar');
  }


	public function index()
	{
		$id_wilker = $this->session->userdata('ses_wilker');
		// $queryCountPermintaan = $this->M_Permintaan->jumlah_permintaan();
		// $queryCountWilker = $this->M_Wilker->jumlah_wilker();
		// $queryCountJenis = $this->M_Jenis_Sertifikat->jumlah_jenis();
		// $Data = array('queryCountPmt'=> $queryCountPermintaan,
		// 	'queryCountWil'=> $queryCountWilker,
		// 	'queryCountJS'=> $queryCountJenis );

		$queryCountTransaksi = $this->M_Keluar->total_masuk($id_wilker);
		$queryCountPmtWilker = $this->M_Permintaan->totalP_wilker($id_wilker);
		$Data = array('queryCountTrsM'=> $queryCountTransaksi,'queryCountPmtWil'=> $queryCountPmtWilker  );

		
		return $this->load->view('home2',$Data);
		
	}

	
}

