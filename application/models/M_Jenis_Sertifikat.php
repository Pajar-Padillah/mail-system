<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jenis_Sertifikat extends CI_Model {

	function getDataJs(){
		$query = $this->db->get('jenis_sertifikat');
		return $query->result();
	}

	function insertDataJs($data){
		$this->db->insert('jenis_sertifikat', $data);
	}

	function getDataDetailJs($id_jenis_sertifikat){
		$this->db->where('id_jenis_sertifikat',$id_jenis_sertifikat);
		$query = $this->db->get('jenis_sertifikat');
		return $query->row();
	}

	function updateDataJs($id_jenis_sertifikat,$data){
		$this->db->where('id_jenis_sertifikat',$id_jenis_sertifikat);
		$this->db->update('jenis_sertifikat',$data);
	}

	function deleteDataJs($id_jenis_sertifikat){
		$this->db->where('id_jenis_sertifikat',$id_jenis_sertifikat);
		$this->db->delete('jenis_sertifikat');
	}

	public function jumlah_jenis() {
   	$query=$this->db->query("SELECT COUNT(id_jenis_sertifikat) as jumlah_jenis FROM jenis_sertifikat;");
        return $query->row();
    }

}