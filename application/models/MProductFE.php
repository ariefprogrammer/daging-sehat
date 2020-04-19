<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class MProductFE extends CI_Model
{
	//here
	public function productsHome()
	{
		$sql = $this->db->query("SELECT * FROM products WHERE status_barang = 2 ORDER BY id_barang DESC LIMIT 8 ");
		return $sql->result_array();
	}

	public function details($id_barang)
	{
		//here
		$sql = $this->db->query("SELECT * FROM products WHERE status_barang=2 AND id_barang=".intval($id_barang));
		return $sql->row_array();
	}

	public function getImageDetails($id_barang)
	{
		//here
		return $this->db->query("SELECT * FROM tb_sliders WHERE id_barang=".intval($id_barang))->result_array();
	}

	public function getAllProducts()
	{
		//here
		$sql = $this->db->query("SELECT * FROM products WHERE status_barang = 2 ORDER BY id_barang DESC");
		return $sql->result_array();
	}
}