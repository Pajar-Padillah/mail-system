<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
		$this->load->model('M_Wilker');
	
	}

	public function index()
	{
		$queryAllUser = $this->M_User->getDataUser();
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		$Data = array('queryAllUsr'=> $queryAllUser,'queryAllWil'=> $queryAllWilker);
		
		$this->load->view('v_user',$Data);
	}

	public function halaman_tambah()
	{
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		
		$Data = array('queryAllWil'=> $queryAllWilker);
		$this->load->view('tambah_user',$Data);
	}

	public function halaman_edit($id_user)
	{
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		
		$queryDetailUser= $this->M_User->getDataDetailUser($id_user);
		$Data=array('queryDetailUsr'=>$queryDetailUser,'queryAllWil'=> $queryAllWilker);
		$this->load->view('edit_user',$Data);
	}

	public function fungsiTambah_usr(){
		$id_user= $this->input->post('id_user');
		$id_wilker= $this->input->post('id_wilker');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$Arr_Insert_Usr=array(
			'id_user'=>$id_user,
			'id_wilker'=>$id_wilker,
			'nama'=>$nama,
			'username'=>$username,
			'password'=> $password,
			'level'=>$level
		);

		$this->M_User->InsertDataUser($Arr_Insert_Usr);
		redirect(base_url('user'));
	}

	public function fungsiEdit_usr(){

		$id_user= $this->input->post('id_user');
		$id_wilker= $this->input->post('id_wilker');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$Arr_Update_Usr=array(
			'id_user'=>$id_user,
			'id_wilker'=>$id_wilker,
			'nama'=>$nama,
			'username'=>$username,
			'password'=> $password,
			'level'=>$level
		);

		$this->M_User->UpdateDataUser($id_user,$Arr_Update_Usr);
		redirect(base_url('user'));
	}

	public function fungsiDelete_usr($id_user){
		$this->M_User->deleteDataUser($id_user);
		redirect(base_url('user'));
	}
}

