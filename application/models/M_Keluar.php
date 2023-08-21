<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Keluar extends CI_Model
{

	function getDataKeluar()
	{
		$query = $this->db->get('keluar');
		return $query->result();
	}

	function insertDataKeluar($data)
	{
		$this->db->insert('keluar', $data);
	}

	function totalKH()
	{
		$query = $this->db->get('total_kh');
		return $query->row();
	}
	function totalKT()
	{
		$query = $this->db->get('total_kt');
		return $query->row();
	}

	function getDataDetailKeluar($id_keluar)
	{
		$this->db->where('id_keluar', $id_keluar);
		$query = $this->db->get('keluar');
		return $query->row();
	}

	function updateDataKeluar($id_keluar, $data)
	{
		$this->db->where('id_keluar', $id_keluar);
		$this->db->update('keluar', $data);
	}

	function deleteDataKeluar($id_keluar)
	{
		$this->db->where('id_keluar', $id_keluar);
		$this->db->delete('keluar');
	}
	function getTransaksi()
	{
		$query = $this->db->get('view_transaksi');
		return $query->result();
	}
	public function getperTransaksi($id_keluar)
	{
		$query = $this->db->query("SELECT * FROM `view_transaksi` WHERE id_keluar=$id_keluar;");
		return $query->result();
	}
	public function transaksi_wilker($id_wilker)
	{
		$query = $this->db->query("SELECT * FROM `view_transaksi` WHERE id_wilker=$id_wilker;");
		return $query->result();
	}

	public function total_masuk($id_wilker)
	{
		$query = $this->db->query("SELECT COUNT(*) as total_masuk FROM `view_transaksi` WHERE id_wilker=$id_wilker;");
		return $query->row();
	}
	function getByDate($tanggal_surat)
	{

		$query = $this->db->query("SELECT * FROM `view_transaksi` WHERE tanggal_surat=$tanggal_surat;");
		return $query->row();
	}
	function getByWilker($wilker)
	{

		$query = $this->db->query("SELECT * FROM `view_transaksi` WHERE wilker=$wilker;");
		return $query->row();
	}



	public function cek_NoTerbesar()
	{
		$query = $this->db->query("SELECT max(no_transaksi) as NoTerbesar FROM keluar;");
		return $query->row();
	}

	public function transaksi_masuk($id_wilker)
	{
		$query = $this->db->query("SELECT COUNT(id_keluar) AS jumlah_masuk FROM keluar WHERE id_wilker=$id_wilker;");
		return $query->row();
	}

	public function kh_keluar()
	{
		$query = $this->db->query("SELECT sum(jumlah) as jumlah_kh FROM keluar WHERE id_jenis_sertifikat = 1;");
		return $query->row();
	}

	public function kt_keluar()
	{
		$query = $this->db->query("SELECT sum(jumlah) as jumlah_kt FROM keluar WHERE id_jenis_sertifikat = 3;");
		return $query->row();
	}
}
