<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Wilker extends CI_Model
{

	function getDataWilker()
	{
		$query = $this->db->get('wilker');
		return $query->result();
	}

	function insertDataWilker($data)
	{
		$this->db->insert('wilker', $data);
	}

	function getDataDetailWilker($id_wilker)
	{
		$this->db->where('id_wilker', $id_wilker);
		$query = $this->db->get('wilker');
		return $query->row();
	}

	function updateDataWilker($id_wilker, $data)
	{
		$this->db->where('id_wilker', $id_wilker);
		$this->db->update('wilker', $data);
	}

	function deleteDataWilker($id_wilker)
	{
		$this->db->where('id_wilker', $id_wilker);
		$this->db->delete('wilker');
	}

	public function jumlah_wilker()
	{
		$query = $this->db->query("SELECT COUNT(id_wilker) as jumlah_wilker FROM wilker;");
		return $query->row();
	}
}
