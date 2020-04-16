<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class MProduct extends CI_Model
{
	
	public function addFile($post)
	{
		$id_barang = $this->db->escape($post["id_barang"]);
		if(!empty($_FILES['image_slider']['name'])){
				$image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['image_slider']['name']);
				$config['upload_path']      = './assets/img/slider/';
				$config['allowed_types']    = 'gif|jpg|png|webp';
				$config['max_size']      	= '5048';
				$config['file_name']        = $image_name;
				$this->upload->initialize($config);
				$this->upload->do_upload('image_slider');
				// echo "<pre>";
				// print_r($this->upload->data());
				// print_r($this->upload->display_errors());
				// echo "</pre>";
				// exit();
		}else{
				$image_name = '';
		}

		$image_slider = $image_name;

		$sql = $this->db->query("INSERT INTO tb_sliders VALUES(NULL, $id_barang, '$image_slider')");

		if ($sql) {
			return true;
		}else{
			return false;
		}
	}

	public function getById($id_barang)
	{
		//here
		$sql = $this->db->query("SELECT * FROM products WHERE id_barang =".intval($id_barang));
		return $sql->row_array();
	}

	public function getLastId()
	{
		$sql = $this->db->query("SELECT id_barang FROM products ORDER BY id_barang DESC LIMIT 1");
		return $sql->row();
	}

	public function getSlider($id_barang)
	{
		$sql = $this->db->query("SELECT * FROM tb_sliders WHERE id_barang=".intval($id_barang));
		return $sql->result_array();
	}

	public function update($id_barang){
		//here
		$nama_barang = $this->input->post('nama_barang');
        $harga_barang = $this->input->post('harga_barang');
        $bagian_barang = $this->input->post('bagian_barang');
        $deskripsi_barang = $this->input->post('deskripsi_barang');
        
        if(!empty($_FILES['thumbnail_barang']['name'])){
			$image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['thumbnail_barang']['name']);
			$config['upload_path']      = './assets/img/thumbnail/';
			$config['allowed_types']    = 'gif|jpg|png|webp';
			$config['max_size']      	= '5048';
			$config['file_name']        = $image_name;
			$this->upload->initialize($config);
			$this->upload->do_upload('thumbnail_barang');
			// echo "<pre>";
			// print_r($this->upload->data());
			// print_r($this->upload->display_errors());
			// echo "</pre>";
			// exit();
		}else{
			$image_name = $this->input->post('old_thumbnail');

	}
		$thumbnail_barang = $image_name;
        $status_barang = $this->input->post('status_barang');
        $id_baru = $this->input->post('id_baru');
        $link_tokopedia = $this->input->post('link_tokopedia');
        $link_instagram = $this->input->post('link_instagram');

        $this->db->query("UPDATE products SET nama_barang='$nama_barang', harga_barang='$harga_barang', bagian_barang='$bagian_barang', deskripsi_barang='$deskripsi_barang', thumbnail_barang = '$thumbnail_barang', status_barang = '$status_barang', link_tokopedia='$link_tokopedia', link_instagram='$link_instagram' WHERE id_barang=".intval($id_barang));
        return true;
	}

	public function getImageById($id_slider_image)
	{
		return $this->db->query("SELECT * FROM tb_sliders WHERE id_slider_image =".intval($id_slider_image))->row();
	}

	public function updateFile($post, $id_slider_image)
	{
		//here
		if(!empty($_FILES['image_slider']['name'])){
				$image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['image_slider']['name']);
				$config['upload_path']      = './assets/img/slider/';
				$config['allowed_types']    = 'gif|jpg|png|webp';
				$config['max_size']      	= '5048';
				$config['file_name']        = $image_name;
				$this->upload->initialize($config);
				$this->upload->do_upload('image_slider');
				// echo "<pre>";
				// print_r($this->upload->data());
				// print_r($this->upload->display_errors());
				// echo "</pre>";
				// exit();
		}else{
				$image_name = $this->input->post('old_image_slider');
		}

		$image_slider = $image_name;

		$sql = $this->db->query("UPDATE tb_sliders SET image_slider = '$image_slider' WHERE id_slider_image=".intval($id_slider_image));

		if ($sql) {
			return true;
		}else{
			return false;
		}
	}
}