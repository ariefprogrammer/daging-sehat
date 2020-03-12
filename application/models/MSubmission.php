<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class MSubmission extends CI_Model
{
	public function getDestination()
	{
		$sql = $this->db->query("SELECT * FROM tb_country");
		return $sql->result();
	}

	public function getLastId()
	{
		$sql = $this->db->query("SELECT id_document FROM tb_document ORDER BY id_document DESC LIMIT 1");
		return $sql->row();
	}

	public function myDocuments($id)
	{
		$this->db->select('tb_document.*, user.*, tb_country.*, tb_status.*');
		$this->db->from('tb_document');
		$this->db->join('user', 'user.id=tb_document.pic_document');
		$this->db->join('tb_country', 'tb_document.destination_document=tb_country.id_country');
		$this->db->join('tb_status', 'tb_status.id_status=tb_document.id_status');
		$this->db->where('pic_document', intval($id));
		return $this->db->get()->result();
	}

	public function getById($id)
	{
		$this->db->select('tb_document.*, user.*, tb_country.*, tb_status.*');
		$this->db->from('tb_document');
		$this->db->join('user', 'user.id=tb_document.pic_document');
		$this->db->join('tb_country', 'tb_document.destination_document=tb_country.id_country');
		$this->db->join('tb_status', 'tb_status.id_status=tb_document.id_status');
		$this->db->where('id_document', intval($id));
		return $this->db->get()->row();
	}

	public function getAllRecords($id)
	{
		$this->db->select('tb_document_update.*, user.*, tb_status.*');
		$this->db->from('tb_document_update');
		$this->db->join('user', 'user.id=tb_document_update.pic_updated');
		$this->db->join('tb_status', 'tb_status.id_status=tb_document_update.id_status');
		$this->db->where('id_document', $id);
		return $this->db->get()->result();
		// $sql = $this->db->query("SELECT * FROM tb_document_update WHERE id_document=".intval($id));
		// return $sql->result();
	}

	public function getFilesByDocument($id_document, $id_pic)
	{
		$sql = $this->db->query("SELECT image_document FROM tb_files WHERE id_document= $id_document AND pic=$id_pic");
		return $sql->result();
	}

	public function documentsubmited($id_session, $id_status)
	{
		$sql = $this->db->query("SELECT tb_document.*, user.*, tb_country.*, tb_status.* FROM tb_document JOIN user ON user.id=tb_document.pic_document JOIN tb_country ON tb_document.destination_document=tb_country.id_country JOIN tb_status ON tb_document.id_status=tb_status.id_status WHERE pic_document = $id_session AND tb_document.id_status = $id_status");
		return $sql->result();
	}

	public function documentprocessed($id_session, $id_status)
	{
		// $this->db->select('tb_document.*, user.*, tb_country.*, tb_status.*');
		// $this->db->from('tb_document');
		// $this->db->join('user', 'user.id=tb_document.pic_document');
		// $this->db->join('tb_country', 'tb_document.destination_document=tb_country.id_country');
		// $this->db->join('tb_status', 'tb_document.id_status=tb_status.id_status');
		// $this->db->where('pic_document', $id_session);
		// $this->db->where('id_status', $id_status);
		// return $this->db->get()->result();
		
		$sql = $this->db->query("SELECT tb_document.*, user.*, tb_country.*, tb_status.* FROM tb_document JOIN user ON user.id=tb_document.pic_document JOIN tb_country ON tb_document.destination_document=tb_country.id_country JOIN tb_status ON tb_document.id_status=tb_status.id_status WHERE pic_document = $id_session AND tb_document.id_status = $id_status");
		return $sql->result();
	}

	public function documentdone($id_session, $id_status)
	{
		$sql = $this->db->query("SELECT tb_document.*, user.*, tb_country.*, tb_status.* FROM tb_document JOIN user ON user.id=tb_document.pic_document JOIN tb_country ON tb_document.destination_document=tb_country.id_country JOIN tb_status ON tb_document.id_status=tb_status.id_status WHERE pic_document = $id_session AND tb_document.id_status = $id_status");
		return $sql->result();
	}

	public function addFile($post, $id_document, $id)
	{
		$id_document = $this->db->escape($post["id_document"]);
		if(!empty($_FILES['image_document']['name'])){
				$image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['image_document']['name']);
				$config['upload_path']      = './assets/img/document/';
				$config['allowed_types']    = 'gif|jpg|png|webp';
				$config['max_size']      	= '5048';
				$config['file_name']        = $image_name;
				$this->upload->initialize($config);
				$this->upload->do_upload('image_document');
				// echo "<pre>";
				// print_r($this->upload->data());
				// print_r($this->upload->display_errors());
				// echo "</pre>";
				// exit();
		}else{
				$image_name = '';
		}

		$image_document = $image_name;
		$id_pic = $id;

		$sql = $this->db->query("INSERT INTO tb_files VALUES(NULL, $id_document, '$image_document', $id_pic)");

		if ($sql) {
			return true;
		}else{
			return false;
		}
	}


}