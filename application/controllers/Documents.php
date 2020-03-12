<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Documents extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("MDocument");
		is_logged_in();
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$data['title'] = 'All Documents';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['documents'] = $this->MDocument->getAllDocuments();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/index', $data);
        $this->load->view('templates/footer');
	}


	public function details($id_document)
	{
		$id_session = $this->session->userdata('id');
		$data['title'] = 'Tracking Record';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detailsDocument'] = $this->MDocument->getById($id_document);
        $data['records'] = $this->MDocument->getAllRecords($id_document);
        $data['filesByDocument'] = $this->MDocument->getFilesByDocument($id_document, $id_session);

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/v_detailsOrder', $data);
        $this->load->view('templates/footer');
	}

	public function newRecord($id)
	{
		$data['title'] = 'New Record';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['thisrecord'] = $this->MDocument->getById($id);
		$data['destination'] = $this->MDocument->getDestination();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/v_newRecord', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_record'])) {
        	$this->MDocument->newRecord($_POST);
        	$this->MDocument->updateStatus($_POST, $id);
        	redirect('documents/details/'.intval($id));
        }
	}

	public function documentsubmited()
	{
		$data['title'] = 'Documents Submited';
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();

		$data['documentsubmited'] = $this->MDocument->documentsubmited(1);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('document/documentsubmited', $data);
		$this->load->view('templates/footer');
	}

	public function documentprocessed()
	{
		$data['title'] = 'Documents Processed';
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();

		$data['documentprocessed'] = $this->MDocument->documentprocessed(2);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('document/documentprocessed', $data);
		$this->load->view('templates/footer');
	}

	public function documentdone()
	{
		$data['title'] = 'Document Accepted';
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['documentdone'] = $this->MDocument->documentdone(3);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('document/documentdone', $data);
		$this->load->view('templates/footer');

	}

}

?>