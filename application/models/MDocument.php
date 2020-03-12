<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class MDocument extends CI_Model
{
	
	public function save($post)
	{
		//here 
		$this->form_validation->set_rules('name_document', 'Name_document', 'trim|required');
		$this->form_validation->set_rules('phone_document', 'Phone_document', 'required');

		$name = $this->db->escape($post["name_document"]);
		$phone = $this->db->escape($post["phone_document"]);
		$email = $this->db->escape($post["email_document"]);
		$birthday = $this->db->escape($post["birthday_document"]);
		$destination = $this->db->escape($post["destination_document"]);

		// cek jika ada gambar yang akan diupload
    //     $image_name = $_FILES['image_document']['name'];

    //     if ($image_name) {
    //         $config['allowed_types'] = 'gif|jpg|png|webp';
    //         $config['max_size']      = '5048';
    //         $config['upload_path'] = 'C:\xampp\htdocs\hidayat\assets\img\document';

    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload('image_document')) {
    //             $old_image = $data['user']['image_document'];
    //             // if ($old_image != 'default.jpg') {
    //             //     unlink(FCPATH . 'assets/img/document/' . $old_image);
    //             // }
    //             $new_image = $this->upload->data('file_name');
    //             $this->db->set('image_document', $new_image);
    //             echo "<pre>";
				// print_r($this->upload->data());
				// print_r($this->upload->display_errors());
				// echo "</pre>";
				// exit();
    //         } else {
    //             echo $this->upload->display_errors();
    //             echo "<pre>";
				// print_r($this->upload->data());
				// print_r($this->upload->display_errors());
				// echo "</pre>";
				// exit();
    //         }
    //     }

  //       if(!empty($_FILES['image_document']['name'])){
		// 		$image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['image_document']['name']);
		// 		$config['upload_path']      = './assets/img/document/';
		// 		$config['allowed_types']    = 'gif|jpg|png|webp';
		// 		$config['max_size']      	= '5048';
		// 		$config['file_name']        = $image_name;
		// 		$this->upload->initialize($config);
		// 		$this->upload->do_upload('image_document');
		// 		echo "<pre>";
		// 		print_r($this->upload->data());
		// 		print_r($this->upload->display_errors());
		// 		echo "</pre>";
		// 		exit();
		// }else{
		// 		$image_name = '';
		// }
  //       $image = $image_name;
        $pic = $this->db->escape($post["pic_document"]);
        $date_created_document = $this->db->escape($post["date_created_document"]);
        $id_status = 1;

		$sql = $this->db->query("INSERT INTO tb_document VALUES(NULL,$name, $phone, $email, $birthday, $destination, $pic, $date_created_document, $id_status)");

		if ($sql) {
			return true;
		}else{
			return false;
		}
	}

	public function newRecord($post)
	{
		$id_document = $this->db->escape($post["id_document"]);
		$name_document = $this->db->escape($post["name_document"]);
		$date_updated = $this->db->escape($post["date_updated"]);
		$pic_updated = $this->db->escape($post["pic_updated"]);
		$notes_updated = $this->db->escape($post["notes_updated"]);
		$id_status = $this->db->escape($post["id_status"]);

		$sql = $this->db->query("INSERT INTO tb_document_update VALUES (NULL, $id_document, $name_document, $date_updated, $pic_updated, $notes_updated, $id_status)");
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

	public function getStatus($id)
	{
		// SELECT * FROM tb_document_update WHERE id_document=11 ORDER BY id_document_update DESC LIMIT 1
		$sql = $this->db->query("SELECT * FROM tb_document_update WHERE id_document = 13 ORDER BY id_document_update DESC LIMIT 1");
		return $sql->row();

	}

	public function delete($id)
	{
		//here
	}

	public function getAllDocuments()
	{
		$this->db->select('tb_document.*, user.*, tb_country.*, tb_status.*');
		$this->db->from('tb_document');
		$this->db->join('user', 'user.id=tb_document.pic_document');
		$this->db->join('tb_country', 'tb_document.destination_document=tb_country.id_country');
		$this->db->join('tb_status', 'tb_document.id_status=tb_status.id_status');
		return $this->db->get()->result();
		// $sql = $this->db->query("SELECT tb_document.*, user.* FROM tb_document INNER JOIN user ON user.id=tb_document.pic_document");
		// return $sql->result();
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

	public function getDestination()
	{
		$sql = $this->db->query("SELECT * FROM tb_country");
		return $sql->result();
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

	public function updateStatus($post, $id)
	{
		//here
		$id_status = $this->db->escape($post["id_status"]);

		$sql = $this->db->query("UPDATE tb_document SET id_status=$id_status WHERE id_document = ".intval($id));
		return true;

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

	public function getFilesByDocument($id_document, $id_pic)
	{
		$sql = $this->db->query("SELECT image_document FROM tb_files WHERE id_document= $id_document AND pic=$id_pic");
		return $sql->result();
	}

	public function getLastId()
	{
		$sql = $this->db->query("SELECT id_document FROM tb_document ORDER BY id_document DESC LIMIT 1");
		return $sql->row();
	}

	public function documentprocessed($id_status)
	{
		// $this->db->select('tb_document.*, user.*, tb_country.*, tb_status.*');
		// $this->db->from('tb_document');
		// $this->db->join('user', 'user.id=tb_document.pic_document');
		// $this->db->join('tb_country', 'tb_document.destination_document=tb_country.id_country');
		// $this->db->join('tb_status', 'tb_document.id_status=tb_status.id_status');
		// $this->db->where('pic_document', $id_session);
		// $this->db->where('id_status', $id_status);
		// return $this->db->get()->result();
		
		$sql = $this->db->query("SELECT tb_document.*, user.*, tb_country.*, tb_status.* FROM tb_document JOIN user ON user.id=tb_document.pic_document JOIN tb_country ON tb_document.destination_document=tb_country.id_country JOIN tb_status ON tb_document.id_status=tb_status.id_status WHERE tb_document.id_status = $id_status");
		return $sql->result();
	}

	public function documentdone($id_status)
	{
		$sql = $this->db->query("SELECT tb_document.*, user.*, tb_country.*, tb_status.* FROM tb_document JOIN user ON user.id=tb_document.pic_document JOIN tb_country ON tb_document.destination_document=tb_country.id_country JOIN tb_status ON tb_document.id_status=tb_status.id_status WHERE tb_document.id_status = $id_status");
		return $sql->result();
	}

	public function documentsubmited($id_status)
	{
		$sql = $this->db->query("SELECT tb_document.*, user.*, tb_country.*, tb_status.* FROM tb_document JOIN user ON user.id=tb_document.pic_document JOIN tb_country ON tb_document.destination_document=tb_country.id_country JOIN tb_status ON tb_document.id_status=tb_status.id_status WHERE tb_document.id_status = $id_status");
		return $sql->result();
	}
}

?>