<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Shop extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MProductFE');
		
	}

	public function index()
	{
		//here
		$data['getAllProducts'] = $this->MProductFE->getAllProducts();

		$this->load->view('templatesFE/header');
		$this->load->view('productFE/all', $data);
		$this->load->view('templatesFE/footer');
	}

	public function details($id_barang)
	{
		//here
		$data['productsHome'] = $this->MProductFE->productsHome();
		$data['details'] = $this->MProductFE->details($id_barang);
		$data['imageSliders'] = $this->MProductFE->getImageDetails($id_barang);

		$this->load->view('templatesFE/header');
		$this->load->view('productFE/details', $data);
		$this->load->view('templatesFE/footer');
	}



}