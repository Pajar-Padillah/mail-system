<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_Sertifikat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Jenis_Sertifikat');
	}

	public function index()
	{
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$Data = array('queryAllJs'=> $queryAlljenis_sertifikat);
		
		$this->load->view('v_jenis_sertifikat',$Data);
	}

	public function halaman_tambah()
	{
		$this->load->view('tambah_js');
	}

	public function halaman_edit($id_jenis_sertifikat)
	{
		$queryDetailjenis_sertifikat= $this->M_Jenis_Sertifikat->getDataDetailJs($id_jenis_sertifikat);
		$Data=array('queryDetailJs'=>$queryDetailjenis_sertifikat);
		$this->load->view('edit_js',$Data);
	}

	public function fungsiTambah_js(){
		$id_jenis_sertifikat= $this->input->post('id_jenis_sertifikat');
		$jenis_sertifikat = $this->input->post('jenis_sertifikat');
		
		$Arr_Insert_js=array(
			'id_jenis_sertifikat'=>$id_jenis_sertifikat,
			'jenis_sertifikat'=>$jenis_sertifikat,
			
		);

		$this->M_Jenis_Sertifikat->InsertDataJs($Arr_Insert_js);
		redirect(base_url('jenis_sertifikat'));
	}

	public function fungsiEdit_js(){

		$id_jenis_sertifikat= $this->input->post('id_jenis_sertifikat');
		$jenis_sertifikat = $this->input->post('jenis_sertifikat');

		$Arr_Update_js=array(
			'id_jenis_sertifikat'=>$id_jenis_sertifikat,
			'jenis_sertifikat'=>$jenis_sertifikat,
		);

		$this->M_Jenis_Sertifikat->UpdateDataJs($id_jenis_sertifikat,$Arr_Update_js);
		redirect(base_url('jenis_sertifikat'));
	}

	public function fungsiDelete_js($id_jenis_sertifikat){
		$this->M_Jenis_Sertifikat->deleteDataJs($id_jenis_sertifikat);
		redirect(base_url('jenis_sertifikat'));
	}
}

