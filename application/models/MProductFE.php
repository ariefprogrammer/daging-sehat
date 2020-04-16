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
		$sql = $this->db->query("SELECT * FROM products WHERE status_barang = 2 LIMIT 8");
		return $sql->result_array();
	}
}