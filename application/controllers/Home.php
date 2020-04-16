<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("MProductFE");
	}

	public function index()
	{
		$data['productsHome'] = $this->MProductFE->productsHome();

		$this->load->view('templatesFE/header');
		$this->load->view('homeFE/homeFE', $data);
		$this->load->view('templatesFE/footer');
	}
}