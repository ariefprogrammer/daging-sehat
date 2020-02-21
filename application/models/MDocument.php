<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class MDocument extends CI_Model
{
	
	public function save($post)
	{
		$name = $this->db->escape($post["name_document"]);
		$phone = $this->db->escape($post["phone_document"]);
		$email = $this->db->escape($post["email_document"]);
		$birthday = $this->db->escape($post["birthday_document"]);
		$destination = $this->db->escape($post["destination_document"]);

		// cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image_document']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|webp';
            $config['max_size']      = '5048';
            $config['upload_path'] = './assets/img/document/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image_document')) {
                $old_image = $data['user']['image_document'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/document/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image_document', $new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }
        $image = $upload_image;
        $pic = $this->db->escape($post["pic_document"]);

		$sql = $this->db->query("INSERT INTO tb_document VALUES(NULL,$name, $phone, $email, $birthday, $destination, '$image', $pic)");

		if ($sql) {
			return true;
		}else{
			return false;
		}
	}

	public function edit($id)
	{
		//here
	}

	public function delete($id)
	{
		//here
	}

	public function getAllDocuments()
	{
		$sql = $this->db->query("SELECT tb_document.*, user.* FROM tb_document INNER JOIN user ON user.id=tb_document.pic_document");
		return $sql->result();
	}

	public function getDestination()
	{
		$sql = $this->db->query("SELECT * FROM tb_country");
		return $sql->result();
	}
}

?>