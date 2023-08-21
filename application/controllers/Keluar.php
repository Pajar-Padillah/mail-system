<?php
defined('BASEPATH') or exit('No direct script access allowed');

class keluar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Keluar');
		$this->load->model('M_Permintaan');

		$this->load->model('M_Jenis_Sertifikat');
		$this->load->model('M_Status');
		$this->load->model('M_Wilker');
	}

	public function index()
	{
		$queryAllStatus = $this->M_Status->getDataStatus();
		$queryAllkeluar = $this->M_Keluar->getDataKeluar();
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$queryAllpermintaan = $this->M_Permintaan->getDataPermintaan();
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		$queryTotalKH = $this->M_Keluar->totalKH();
		$queryTotalKT = $this->M_Keluar->totalKT();
		$Data = array(
			'queryTotalKH' => $queryTotalKH,
			'queryTotalKT' => $queryTotalKT,
			'queryAllKlr' => $queryAllkeluar,
			'queryAllPmt' => $queryAllpermintaan,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'queryAllSts' => $queryAllStatus, 'queryAllWil' => $queryAllWilker,
			'KH_keluar' => $this->M_Keluar->kh_keluar(),
			'KT_keluar' => $this->M_Keluar->kt_keluar()
		);

		$this->load->view('v_keluar', $Data);
	}

	public function halaman_tambah()
	{
		$queryAllStatus = $this->M_Status->getDataStatus();
		$queryAllkeluar = $this->M_Keluar->getDataKeluar();
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$queryAllpermintaan = $this->M_Permintaan->getDataPermintaan();
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		$querycekNoTerbesar = $this->M_Keluar->cek_NoTerbesar();

		$Data = array(
			'queryAllKlr' => $queryAllkeluar,
			'queryAllPmt' => $queryAllpermintaan,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'queryAllSts' => $queryAllStatus, 'queryAllWil' => $queryAllWilker, 'querycekNoTerbesar' => $querycekNoTerbesar
		);

		$this->load->view('tambah_keluar', $Data);
	}

	public function halaman_edit($id_keluar)
	{
		$queryAllStatus = $this->M_Status->getDataStatus();
		$queryDetailkeluar = $this->M_Keluar->getDataDetailKeluar($id_keluar);
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		$queryAllpermintaan = $this->M_Permintaan->getDataPermintaan();
		$Data = array(
			'queryDetailKlr' => $queryDetailkeluar,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'queryAllWil' => $queryAllWilker,
			'queryAllSts' => $queryAllStatus,
			'queryAllPmt' => $queryAllpermintaan,
		);
		$this->load->view('edit_keluar', $Data);
	}

	public function transaksi_wilker($id_wilker)
	{
		$queryTransaksi = $this->M_Keluar->transaksi_wilker($id_wilker);

		$Data = array('queryAllTrsWil' => $queryTransaksi);
		$this->load->view('v_transaksi_wilker', $Data);
	}

	public function transaksi()
	{
		$queryAllStatus = $this->M_Status->getDataStatus();
		$queryAllkeluar = $this->M_Keluar->getDataKeluar();
		$queryAlljenis_sertifikat = $this->M_Jenis_Sertifikat->getDataJs();
		$queryAllpermintaan = $this->M_Permintaan->getDataPermintaan();
		$queryAllWilker = $this->M_Wilker->getDataWilker();
		$queryAllTransaksi = $this->M_Keluar->getTransaksi();
		$Data = array(
			'queryAllKlr' => $queryAllkeluar,
			'queryAllPmt' => $queryAllpermintaan,
			'queryAllJs' => $queryAlljenis_sertifikat,
			'queryAllSts' => $queryAllStatus,
			'queryAllWil' => $queryAllWilker,
			'queryAllTrs' => $queryAllTransaksi
		);

		$this->load->view('v_transaksi', $Data);
	}

	public function fungsiTambah_Klr()
	{
		$config['upload_path']          = './data_file/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			echo 'Gagal Tambah, file harus berekstensi .pdf';
		} else {
			$id_keluar = $this->input->post('id_keluar', true);
			$no_transaksi = $this->input->post('no_transaksi', true);
			$id_permintaan = $this->input->post('id_permintaan', true);
			$tanggal_surat = $this->input->post('tanggal_surat', true);
			$id_wilker = $this->input->post('id_wilker', true);
			$tanggal_kirim = $this->input->post('tanggal_kirim', true);
			$id_jenis_sertifikat = $this->input->post('id_jenis_sertifikat', true);
			$jumlah = $this->input->post('jumlah', true);
			$id_status = $this->input->post('id_status', true);
			$file = $this->upload->data();
			$file = $file['file_name'];

			$Arr_Insert_Klr = array(
				'id_keluar' => $id_keluar,
				'no_transaksi' => $no_transaksi,
				'id_permintaan' => $id_permintaan,
				'tanggal_surat' => $tanggal_surat,
				'id_wilker' => $id_wilker,
				'tanggal_kirim' => $tanggal_kirim,
				'file' => $file,
				'id_jenis_sertifikat' => $id_jenis_sertifikat,
				'jumlah' => $jumlah,
				'id_status' => $id_status,
			);

			$this->M_Keluar->InsertDataKeluar($Arr_Insert_Klr);
			redirect(base_url('keluar'));
		}
	}

	public function fungsiEdit_Klr()
	{
		$config['upload_path']          = './data_file/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$id_keluar = $this->input->post('id_keluar', true);
			$no_transaksi = $this->input->post('no_transaksi', true);
			$id_permintaan = $this->input->post('id_permintaan', true);
			$tanggal_surat = $this->input->post('tanggal_surat', true);
			$id_wilker = $this->input->post('id_wilker', true);
			$tanggal_kirim = $this->input->post('tanggal_kirim', true);
			$id_jenis_sertifikat = $this->input->post('id_jenis_sertifikat', true);
			$jumlah = $this->input->post('jumlah', true);
			$id_status = $this->input->post('id_status', true);

			$Arr_Update_Klr = array(
				'id_keluar' => $id_keluar,
				'no_transaksi' => $no_transaksi,
				'id_permintaan' => $id_permintaan,
				'tanggal_surat' => $tanggal_surat,
				'id_wilker' => $id_wilker,
				'tanggal_kirim' => $tanggal_kirim,
				'id_jenis_sertifikat' => $id_jenis_sertifikat,
				'jumlah' => $jumlah,
				'id_status' => $id_status,
			);

			$this->M_Keluar->UpdateDataKeluar($id_keluar, $Arr_Update_Klr);
			redirect(base_url('keluar'));
		} else {
			$id_keluar = $this->input->post('id_keluar', true);
			$no_transaksi = $this->input->post('no_transaksi', true);
			$id_permintaan = $this->input->post('id_permintaan', true);
			$tanggal_surat = $this->input->post('tanggal_surat', true);
			$id_wilker = $this->input->post('id_wilker', true);
			$tanggal_kirim = $this->input->post('tanggal_kirim', true);
			$id_jenis_sertifikat = $this->input->post('id_jenis_sertifikat', true);
			$jumlah = $this->input->post('jumlah', true);
			$id_status = $this->input->post('id_status', true);
			$file = $this->upload->data();
			$file = $file['file_name'];

			$Arr_Update_Klr = array(
				'id_keluar' => $id_keluar,
				'no_transaksi' => $no_transaksi,
				'id_permintaan' => $id_permintaan,
				'tanggal_surat' => $tanggal_surat,
				'id_wilker' => $id_wilker,
				'tanggal_kirim' => $tanggal_kirim,
				'id_jenis_sertifikat' => $id_jenis_sertifikat,
				'jumlah' => $jumlah,
				'id_status' => $id_status,
				'file' => $file
			);
			$this->M_Keluar->UpdateDataKeluar($id_keluar, $Arr_Update_Klr);
			redirect(base_url('keluar'));
		}
	}

	// public function fungsiEdit_Klr1()
	// {

	// 	$id_keluar = $this->input->post('id_keluar');
	// 	$no_transaksi = $this->input->post('no_transaksi');
	// 	$id_permintaan = $this->input->post('id_permintaan');
	// 	$tanggal_surat = $this->input->post('tanggal_surat');
	// 	$id_wilker = $this->input->post('id_wilker');
	// 	$tanggal_kirim = $this->input->post('tanggal_kirim');
	// 	$id_jenis_sertifikat = $this->input->post('id_jenis_sertifikat');
	// 	$jumlah = $this->input->post('jumlah');
	// 	$id_status = $this->input->post('id_status');


	// 	$Arr_Update_Klr = array(
	// 		'id_keluar' => $id_keluar,
	// 		'no_transaksi' => $no_transaksi,
	// 		'id_permintaan' => $id_permintaan,
	// 		'tanggal_surat' => $tanggal_surat,
	// 		'id_wilker' => $id_wilker,
	// 		'tanggal_kirim' => $tanggal_kirim,
	// 		'id_jenis_sertifikat' => $id_jenis_sertifikat,
	// 		'jumlah' => $jumlah,
	// 		'id_status' => $id_status,
	// 	);

	// 	$this->M_Keluar->UpdateDataKeluar($id_keluar, $Arr_Update_Klr);
	// 	redirect(base_url('keluar'));
	// }

	public function fungsiDelete_Klr($id_keluar)
	{
		$this->M_Keluar->deleteDataKeluar($id_keluar);
		redirect(base_url('keluar'));
	}
}
