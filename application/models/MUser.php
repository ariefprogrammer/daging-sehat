<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class MUser extends CI_Model
{
	
	public function update_profile($post, $id)
	{
		$nama = $this->db->escape($post['name']);

		if(!empty($_FILES['image']['name'])){
		    $img_user =  str_replace(' ','_',date('Ymdhis').$_FILES['image']['name']);
		    $config['upload_path']      = './assets/img/profile/';
		    $config['allowed_types']    = 'gif|jpg|png|webp';
		    $config['max_size']      	= '5048';
		    $config['file_name']        = $img_user;
		    $this->upload->initialize($config);
		    $this->upload->do_upload('image');
		 	// echo "<pre>";
			// print_r($this->upload->data());
			// print_r($this->upload->display_errors());
			// echo "</pre>";
			// exit();
		}else{
		    $img_user = $this->input->post('old_image');
		}

		$image = $img_user;

		$sql = $this->db->query("UPDATE user set name = $nama, image = '$image' WHERE id = ".intval($id));
		return true;
	}
}

?>