<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Masuk extends CI_Model
{

	function getDataMasuk()
	{
		$query = $this->db->get('masuk');
		return $query->result();
	}

	function insertDataMasuk($data)
	{
		$this->db->insert('masuk', $data);
	}

	function getDataDetailMasuk($id_masuk)
	{
		$this->db->where('id_masuk', $id_masuk);
		$query = $this->db->get('masuk');
		return $query->row();
	}

	function updateDataMasuk($id_masuk, $data)
	{
		$this->db->where('id_masuk', $id_masuk);
		$this->db->update('masuk', $data);
	}

	function deleteDataMasuk($id_masuk)
	{
		$this->db->where('id_masuk', $id_masuk);
		$this->db->delete('masuk');
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

	function getPersediaan()
	{
		$query = $this->db->get('view_persediaan');
		return $query->result();
	}

	public function cek_NoTerbesar()
	{
		$query = $this->db->query("SELECT max(no_masuk) as NoTerbesar FROM masuk;");
		return $query->row();
	}
}
