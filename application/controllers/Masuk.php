<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Masuk');
		$this->load->model('M_Jenis_Sertifikat');
	}

	public function index()
	{
		$queryAllMasuk = $this->M_Masuk->getDataMasuk();
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$queryTotalKH = $this->M_Masuk->totalKH();
		$queryTotalKT = $this->M_Masuk->totalKT();
		$Data = array(
			'queryAllMsk' => $queryAllMasuk,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'queryTotalKH' => $queryTotalKH,
			'queryTotalKT' => $queryTotalKT
		);

		$this->load->view('v_masuk', $Data);
	}

	public function halaman_tambah()
	{
		$queryAllMasuk = $this->M_Masuk->getDataMasuk();
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$querycekNoTerbesar = $this->M_Masuk->cek_NoTerbesar();
		$Data = array(
			'queryAllMsk' => $queryAllMasuk,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'querycekNoTerbesar' => $querycekNoTerbesar,
		);

		$this->load->view('tambah_masuk', $Data);
	}

	public function halaman_edit($id_masuk)
	{
		$queryDetailMasuk = $this->M_Masuk->getDataDetailMasuk($id_masuk);
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$Data = array('queryDetailMsk' => $queryDetailMasuk, 'queryAllJs' => $queryAlljenis_sertifikat);
		$this->load->view('edit_masuk', $Data);
	}

	public function persediaan()
	{
		$queryAllMasuk = $this->M_Masuk->getDataMasuk();
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$queryTotalKH = $this->M_Masuk->totalKH();
		$queryTotalKT = $this->M_Masuk->totalKT();
		$queryAllPersediaan = $this->M_Masuk->getPersediaan();
		$Data = array(
			'queryAllMsk' => $queryAllMasuk,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'queryTotalKH' => $queryTotalKH,
			'queryTotalKT' => $queryTotalKT,
			'queryAllPsd' => $queryAllPersediaan,
		);

		$this->load->view('v_persediaan', $Data);
	}



	public function fungsiTambah_Msk()
	{

		$id_masuk = $this->input->post('id_masuk');
		$no_masuk = $this->input->post('no_masuk');
		$tanggal_masuk = $this->input->post('tanggal_masuk');
		$id_jenis_sertifikat = $this->input->post('id_jenis_sertifikat');
		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');

		$Arr_Insert_Msk = array(
			'id_masuk' => $id_masuk,
			'no_masuk' => $no_masuk,
			'tanggal_masuk' => $tanggal_masuk,
			'id_jenis_sertifikat' => $id_jenis_sertifikat,
			'jumlah' => $jumlah,
			'keterangan' => $keterangan,
		);

		$this->M_Masuk->InsertDataMasuk($Arr_Insert_Msk);
		redirect(base_url('Masuk'));
	}

	public function fungsiEdit_Msk()
	{

		$id_masuk = $this->input->post('id_masuk');
		$no_masuk = $this->input->post('no_masuk');
		$tanggal_masuk = $this->input->post('tanggal_masuk');
		$id_jenis_sertifikat = $this->input->post('id_jenis_sertifikat');
		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');

		$Arr_Update_Msk = array(
			'id_masuk' => $id_masuk,
			'no_masuk' => $no_masuk,
			'tanggal_masuk' => $tanggal_masuk,
			'id_jenis_sertifikat' => $id_jenis_sertifikat,
			'jumlah' => $jumlah,
			'keterangan' => $keterangan,
		);

		$this->M_Masuk->UpdateDataMasuk($id_masuk, $Arr_Update_Msk);
		redirect(base_url('Masuk'));
	}

	public function fungsiDelete_Msk($id_masuk)
	{
		$this->M_Masuk->deleteDataMasuk($id_masuk);
		redirect(base_url('Masuk'));
	}
}
