<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
  }


	public function index()
	{
		// $queryCountSertifikat = $this->M_Sertifikat->cek_jumlah_sertifikat();
		// $querySertifikatMasuk = $this->M_Sertifikat->sertifikat_masuk();
		// $querySertifikatKeluar = $this->M_Sertifikat->sertifikat_keluar();
		
		// $Data = array('queryCountSrt'=> $queryCountSertifikat,
		// 				'queryCountSrtM'=> $querySertifikatMasuk,
		// 				'queryCountSrtK'=> $querySertifikatKeluar,);
		$queryCountPermintaan = $this->M_Permintaan->jumlah_permintaan();
		$queryCountWilker = $this->M_Wilker->jumlah_wilker();
		$queryCountJenis = $this->M_Jenis_Sertifikat->jumlah_jenis();
		$Data = array('queryCountPmt'=> $queryCountPermintaan,
			'queryCountWil'=> $queryCountWilker,
			'queryCountJS'=> $queryCountJenis );
		
		return $this->load->view('home',$Data);
		
	}

	
}

