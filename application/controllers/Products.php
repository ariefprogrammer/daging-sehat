<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Products extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('MProduct');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Add Products';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['allProducts'] = $this->db->get('products')->result_array();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/all', $data);
        $this->load->view('templates/footer');
	}

	public function add()
	{
		$data['title'] = 'Add Products';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lastId'] = $this->MProduct->getLastId();

        $this->form_validation->set_rules('nama_barang', 'Title product', 'required');
        $this->form_validation->set_rules('harga_barang', 'Harga product', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('product/add', $data);
            $this->load->view('templates/footer');
        } else {
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
				$image_name = '';
		}
			$thumbnail_barang = $image_name;
            $status_barang = $this->input->post('status_barang');
            $id_baru = $this->input->post('id_baru');

            $this->db->query("INSERT INTO products VALUES(NULL, '$nama_barang', '$harga_barang', '$bagian_barang', '$deskripsi_barang', '$thumbnail_barang', '$status_barang')");

            redirect('products/details/'.$id_baru);
        }
	}

	public function update($id_barang)
	{
		// $data['title'] = 'Update Product';
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['product'] = $this->MProduct->getById($id_barang);

  //       if ($this->form_validation->run() == false) {
  //       	//here
		// 	$this->load->view('templates/header', $data);
	 //        $this->load->view('templates/sidebar', $data);
	 //        $this->load->view('templates/topbar', $data);
	 //        $this->load->view('product/update', $data);
	 //        $this->load->view('templates/footer');
  //       }else{
  //       	$nama_barang = $this->input->post('nama_barang');
  //           $harga_barang = $this->input->post('harga_barang');
  //           $bagian_barang = $this->input->post('bagian_barang');
  //           $deskripsi_barang = $this->input->post('deskripsi_barang');
            
  //           if(!empty($_FILES['thumbnail_barang']['name'])){
		// 		$image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['thumbnail_barang']['name']);
		// 		$config['upload_path']      = './assets/img/thumbnail/';
		// 		$config['allowed_types']    = 'gif|jpg|png|webp';
		// 		$config['max_size']      	= '5048';
		// 		$config['file_name']        = $image_name;
		// 		$this->upload->initialize($config);
		// 		$this->upload->do_upload('thumbnail_barang');
		// 		// echo "<pre>";
		// 		// print_r($this->upload->data());
		// 		// print_r($this->upload->display_errors());
		// 		// echo "</pre>";
		// 		// exit();
		// 	}else{
		// 		$image_name = $this->input->post('old_thumbnail');
		// }
		// 	$thumbnail_barang = $image_name;
  //           $status_barang = $this->input->post('status_barang');
  //           $id_baru = $this->input->post('id_baru');

  //           $this->db->query("UPDATE products SET nama_barang=$nama_barang, harga_barang=$harga_barang, bagian_barang=$bagian_barang, deskripsi_barang=$deskripsi_barang, thumbnail_barang = $thumbnail_barang WHERE id_barang=".intval($id_barang));

  //           redirect('products/details/'.$id_baru);
  //       }
		$id_baru = $this->input->post('id_baru');

		if (isset($_POST['update_barang'])) {
			$this->MProduct->update($id_barang);
			redirect('products/details/'.$id_baru);
		}else{
			$data['title'] = 'Update Product';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['product'] = $this->MProduct->getById($id_barang);

			$this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('product/update', $data);
	        $this->load->view('templates/footer');

		}

	}

	public function details($id_barang)
	{
		//here
		$data['title'] = 'Details Products';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->MProduct->getById($id_barang);
        $data['sliders'] = $this->MProduct->getSlider($id_barang);

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/details', $data);
        $this->load->view('templates/footer');
	}

	public function addFile($id_barang)
	{
		$data['title'] = 'Add File Attachment';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/addFile', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_slider_image'])) {
        	$this->MProduct->addFile($_POST);
        	redirect('products/details/'.intval($id_barang));
        }
	}

	public function published()
	{
		//here
	}

	public function draft()
	{
		//here
	}
}
