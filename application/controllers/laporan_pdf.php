<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan_pdf extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_Status');
    $this->load->model('M_Jenis_Sertifikat');
    $this->load->model('M_Keluar');
    $this->load->model('M_Masuk');
  }



  public function semuaTransaksi()
  {

    $queryAllTransaksi = $this->M_Keluar->getTransaksi();
    $Data = array('queryAllTrs' => $queryAllTransaksi);

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan_transaksi";
    $this->pdf->load_view('cetakAllTransaksi', $Data);
  }

  public function perTransaksi($id_keluar)
  {

    $queryPerTransaksi = $this->M_Keluar->getperTransaksi($id_keluar);
    $Data = array('queryPerTrs' => $queryPerTransaksi);

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan_pertransaksi";
    $this->pdf->load_view('cetakperTransaksi', $Data);
  }

  public function transaksiByDate($tanggal)
  {

    $querytransaksiByDate = $this->M_Keluar->getByDate($tanggal);
    $Data = array('queryByDate' => $querytransaksiByDate);

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan_transaksi";
    $this->pdf->load_view('cetakByDate', $Data);
  }

  public function transaksiByWilker($wilker)
  {

    $querytransaksiByWilker = $this->M_Keluar->getByWilker($wilker);
    $Data = array('queryByWilker' => $querytransaksiByWilker);

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan_transaksi";
    $this->pdf->load_view('cetakByWilker', $Data);
  }

  public function semuaPersediaan()
  {

    $queryAllPersediaan = $this->M_Masuk->getPersediaan();
    $Data = array('queryAllPsd' => $queryAllPersediaan);

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan_transaksi";
    $this->pdf->load_view('cetakPersediaan', $Data);
  }
}
