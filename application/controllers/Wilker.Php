<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Wilker');
	}

	public function index()
	{
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		$Data = array('queryAllWil'=> $queryAllWilker);
		
		$this->load->view('v_wilker',$Data);
	}

	public function halaman_tambah()
	{
		$this->load->view('tambah_wilker');
	}

	public function halaman_edit($id_wilker)
	{
		$queryDetailWilker= $this->M_Wilker->getDataDetailWilker($id_wilker);
		$Data=array('queryDetailWil'=>$queryDetailWilker);
		$this->load->view('edit_wilker',$Data);
	}

	public function fungsiTambah_Wil(){
		$id_wilker= $this->input->post('id_wilker');
		$wilker = $this->input->post('wilker');
		
		$Arr_Insert_Wil=array(
			'id_wilker'=>$id_wilker,
			'wilker'=>$wilker,
			
		);

		$this->M_Wilker->InsertDataWilker($Arr_Insert_Wil);
		redirect(base_url('Wilker'));
	}

	public function fungsiEdit_Wil(){

		$id_wilker= $this->input->post('id_wilker');
		$wilker = $this->input->post('wilker');

		$Arr_Update_Wil=array(
			'id_wilker'=>$id_wilker,
			'wilker'=>$wilker,
		);

		$this->M_Wilker->UpdateDataWilker($id_wilker,$Arr_Update_Wil);
		redirect(base_url('Wilker'));
	}

	public function fungsiDelete_Wil($id_wilker){
		$this->M_Wilker->deleteDataWilker($id_wilker);
		redirect(base_url('Wilker'));
	}
}


