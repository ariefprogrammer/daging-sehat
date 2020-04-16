<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MBanner extends CI_Model
{
	public function addBanner($post)
	{
		//here
		$title_banner = $this->input->post('title_banner');
		$title2_banner = $this->input->post('title2_banner');
		if(!empty($_FILES['image_banner']['name'])){
				$image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['image_banner']['name']);
				$config['upload_path']      = './assets/img/banner/';
				$config['allowed_types']    = 'gif|jpg|png|webp';
				$config['max_size']      	= '5048';
				$config['file_name']        = $image_name;
				$this->upload->initialize($config);
				$this->upload->do_upload('image_banner');
				// echo "<pre>";
				// print_r($this->upload->data());
				// print_r($this->upload->display_errors());
				// echo "</pre>";
				// exit();
		}else{
				$image_name = '';
		}
		$image_banner = $image_name;
		$id_status = $this->input->post('id_status');

		$sql = $this->db->query("INSERT INTO tb_banner VALUES(NULL, '$title_banner', '$title2_banner', '$image_banner', '$id_status')");
		if ($sql) {
			return true;
		}else{
			return false;
		}
	}

	public function getBannerById($id)
	{
		//here
		return $this->db->query("SELECT * FROM tb_banner WHERE id_banner=".intval($id))->row_array();
	}

	public function updateBanner($post, $id)
	{
		//here
		$title_banner = $this->input->post('title_banner');
		$title2_banner = $this->input->post('title2_banner');
		if(!empty($_FILES['image_banner']['name'])){
				$image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['image_banner']['name']);
				$config['upload_path']      = './assets/img/banner/';
				$config['allowed_types']    = 'gif|jpg|png|webp';
				$config['max_size']      	= '5048';
				$config['file_name']        = $image_name;
				$this->upload->initialize($config);
				$this->upload->do_upload('image_banner');
				// echo "<pre>";
				// print_r($this->upload->data());
				// print_r($this->upload->display_errors());
				// echo "</pre>";
				// exit();
		}else{
				$image_name = $this->input->post('old_banner');
		}
		$image_banner = $image_name;
		$id_status = $this->input->post('id_status');

		$sql = $this->db->query("UPDATE tb_banner SET title_banner = '$title_banner', title2_banner = '$title2_banner', image_banner = '$image_banner', id_status = '$id_status' WHERE id_banner=".intval($id));
	}
}
