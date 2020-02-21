<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Documents extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("MDocument");
	}

	public function index()
	{
		$data['title'] = 'All Documents';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['documents'] = $this->MDocument->getAllDocuments();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/index', $data);
        $this->load->view('templates/footer');
	}

	public function newOrder()
	{
		$data['title'] = 'New Order';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['destination'] = $this->MDocument->getDestination();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/v_newOrder', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_document'])) {
        	$this->MDocument->save($_POST);
        	redirect('documents');
        }
	}

}

?>