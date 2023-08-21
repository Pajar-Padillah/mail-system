<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Permintaan');
		$this->load->model('M_Jenis_Sertifikat');
		$this->load->model('M_Status');
		$this->load->model('M_Wilker');
	}

	public function index()
	{
		$queryAllpermintaan = $this->M_Permintaan->getDataPermintaan();
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$queryAllStatus = $this->M_Status->getDataStatus();
		$queryAllWilker = $this->M_Wilker->getDataWilker();

		$Data = array(
			'queryAllPmt' => $queryAllpermintaan,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'queryAllSts' => $queryAllStatus, 'queryAllWil' => $queryAllWilker
		);

		$this->load->view('v_permintaan', $Data);
	}

	public function halaman_tambah()
	{
		$queryAllpermintaan = $this->M_Permintaan->getDataPermintaan();
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$queryAllStatus = $this->M_Status->getDataStatus();
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		$querycekNoTerbesar = $this->M_Permintaan->cek_NoTerbesar();

		$Data = array(
			'queryAllPmt' => $queryAllpermintaan,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'queryAllSts' => $queryAllStatus,
			'queryAllWil' => $queryAllWilker,
			'querycekNoTerbesar' => $querycekNoTerbesar
		);
		if ($this->session->userdata('akses') == 1) {
			$this->load->view('tambah_permintaan', $Data);
		} else {
			$this->load->view('tambah_permintaan_bywilker', $Data);
		}
	}


	public function halaman_edit($id_permintaan)
	{
		$queryDetailpermintaan = $this->M_Permintaan->getDataDetailPermintaan($id_permintaan);
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		$queryAllStatus = $this->M_Status->getDataStatus();
		$Data = array(
			'queryDetailPmt' => $queryDetailpermintaan,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'queryAllWil' => $queryAllWilker,
			'queryAllSts' => $queryAllStatus
		);

		$this->load->view('edit_permintaan', $Data);
	}

	public function diajukan()
	{
		$queryAllpermintaan = $this->M_Permintaan->getDataPermintaan();
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$queryAllStatus = $this->M_Status->getDataStatus();
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		$queryAllDiajukan = $this->M_Permintaan->getDataDiajukan();
		$Data = array(
			'queryAllPmt' => $queryAllpermintaan,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'queryAllSts' => $queryAllStatus,
			'queryAllWil' => $queryAllWilker,
			'queryAllDA' => $queryAllDiajukan
		);

		$this->load->view('v_diajukan', $Data);
	}

	public function verifikasi()
	{
		$queryAllVerifikasi = $this->M_Permintaan->getVerifikasi();

		$Data = array('queryAllVrf' => $queryAllVerifikasi);

		$this->load->view('v_verifikasi', $Data);
	}

	public function permintaan_wilker($id_wilker)
	{
		$queryPermintaanWilker = $this->M_Permintaan->permintaan_wilker($id_wilker);

		$Data = array('queryAllPmtWil' => $queryPermintaanWilker);
		$this->load->view('v_permintaan_wilker', $Data);
	}

	public function fungsiTambah_Pmt()
	{

		$id_permintaan = $this->input->post('id_permintaan', true);
		$no_permintaan = $this->input->post('no_permintaan', true);
		$id_wilker = $this->input->post('id_wilker', true);
		$tanggal = $this->input->post('tanggal', true);
		// $file = $this->upload->data();
		// $file = $file['file_name'];
		$id_jenis_sertifikat = $this->input->post('id_jenis_sertifikat', true);
		$jumlah = $this->input->post('jumlah', true);
		$id_status = $this->input->post('id_status', true);



		$data = array(
			'id_permintaan' => $id_permintaan,
			'no_permintaan' => $no_permintaan,
			'id_wilker' => $id_wilker,
			'tanggal' => $tanggal,
			// 'file' => $file,
			'id_jenis_sertifikat' => $id_jenis_sertifikat,
			'jumlah' => $jumlah,
			'id_status' => $id_status
		);
		$this->M_Permintaan->insertDataPermintaan($data);


		if ($this->session->userdata('akses') == 1) {
			redirect(base_url('permintaan'));
		} else {
			redirect('permintaan/permintaan_wilker/' . $this->session->userdata('ses_wilker'));
		}
	}

	public function fungsiEdit_Pmt_bckup()
	{
		$config['upload_path']          = './data_file/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$id_permintaan = $this->input->post('id_permintaan', true);
			$no_permintaan = $this->input->post('no_permintaan', true);
			$id_wilker = $this->input->post('id_wilker', true);
			$tanggal = $this->input->post('tanggal', true);
			$id_jenis_sertifikat = $this->input->post('id_jenis_sertifikat', true);
			$jumlah = $this->input->post('jumlah', true);
			$id_status = $this->input->post('id_status', true);

			$data = array(
				'id_permintaan' => $id_permintaan,
				'no_permintaan' => $no_permintaan,
				'id_wilker' => $id_wilker,
				'tanggal' => $tanggal,
				'id_jenis_sertifikat' => $id_jenis_sertifikat,
				'jumlah' => $jumlah,
				'id_status' => $id_status
			);
			$this->M_Permintaan->updateDataPermintaan($id_permintaan, $data);
			redirect(base_url('permintaan'));
		} else {


			$id_permintaan = $this->input->post('id_permintaan', true);
			$no_permintaan = $this->input->post('no_permintaan', true);
			$id_wilker = $this->input->post('id_wilker', true);
			$tanggal = $this->input->post('tanggal', true);
			$file = $this->upload->data();
			$file = $file['file_name'];
			$id_jenis_sertifikat = $this->input->post('id_jenis_sertifikat', true);
			$jumlah = $this->input->post('jumlah', true);
			$id_status = $this->input->post('id_status', true);



			$data = array(
				'id_permintaan' => $id_permintaan,
				'no_permintaan' => $no_permintaan,
				'id_wilker' => $id_wilker,
				'tanggal' => $tanggal,
				'file' => $file,
				'id_jenis_sertifikat' => $id_jenis_sertifikat,
				'jumlah' => $jumlah,
				'id_status' => $id_status
			);
			$this->M_Permintaan->insertDataPermintaan($data);
			redirect(base_url('permintaan/halaman_tambah'));
		}
	}

	public function fungsiEdit_Pmt()
	{
		$id_permintaan = $this->input->post('id_permintaan', true);
		$no_permintaan = $this->input->post('no_permintaan', true);
		$id_wilker = $this->input->post('id_wilker', true);
		$tanggal = $this->input->post('tanggal', true);
		$id_jenis_sertifikat = $this->input->post('id_jenis_sertifikat', true);
		$jumlah = $this->input->post('jumlah', true);
		$id_status = $this->input->post('id_status', true);

		$data = array(
			'id_permintaan' => $id_permintaan,
			'no_permintaan' => $no_permintaan,
			'id_wilker' => $id_wilker,
			'tanggal' => $tanggal,
			'id_jenis_sertifikat' => $id_jenis_sertifikat,
			'jumlah' => $jumlah,
			'id_status' => $id_status
		);
		$this->M_Permintaan->updateDataPermintaan($id_permintaan, $data);
		redirect(base_url('permintaan'));
	}

	public function fungsiDelete_Pmt($id_permintaan)
	{
		$this->M_Permintaan->deleteDataPermintaan($id_permintaan);
		redirect(base_url('permintaan'));
	}
}
