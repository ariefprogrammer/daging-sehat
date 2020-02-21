<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Country extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	public function index()
	{
		$data['title'] = 'List of countries';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('country/index', $data);
		$this->load->view('templates/footer');
	}

	public function addCountry()
	{
		//here
	}

	public function editCountry()
	{
		//
	}

	public function deleteCountry()
	{
		//
	}
}

?>