<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_permintaan extends CI_Model
{

	function getDataPermintaan()
	{
		$query = $this->db->get('permintaan');
		return $query->result();
	}

	function insertDataPermintaan($data)
	{
		$this->db->insert('permintaan', $data);
	}

	function getDataDetailPermintaan($id_permintaan)
	{
		$this->db->where('id_permintaan', $id_permintaan);
		$query = $this->db->get('permintaan');
		return $query->row();
	}

	function updateDataPermintaan($id_permintaan, $data)
	{
		$this->db->where('id_permintaan', $id_permintaan);
		$this->db->update('permintaan', $data);
	}

	function deleteDataPermintaan($id_permintaan)
	{
		$this->db->where('id_permintaan', $id_permintaan);
		$this->db->delete('permintaan');
	}

	function getDataDiajukan()
	{
		$query = $this->db->get('view_diajukan');
		return $query->result();
	}
	function getVerifikasi()
	{
		$query = $this->db->get('view_verifikasi');
		return $query->result();
	}

	public function jumlah_permintaan()
	{
		$query = $this->db->query("SELECT COUNT(id_permintaan) as jumlah_permintaan FROM permintaan;");
		return $query->row();
	}
	public function permintaan_wilker($id_wilker)
	{
		$query = $this->db->query("SELECT * FROM `view_permintaan` WHERE id_wilker=$id_wilker;");
		return $query->result();
	}
	public function totalP_wilker($id_wilker)
	{
		$query = $this->db->query("SELECT count(*) as totalP_wilker1 FROM `view_permintaan` WHERE id_wilker=$id_wilker;");
		return $query->row();
	}

	public function cek_NoTerbesar()
	{
		$query = $this->db->query("SELECT max(no_permintaan) as NoTerbesar FROM permintaan;");
		return $query->row();
	}
}
