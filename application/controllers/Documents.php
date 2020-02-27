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

	public function newOrder()
	{
		$data['title'] = 'New Order';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['destination'] = $this->MDocument->getDestination();
		$data['getLastId'] = $this->MDocument->getLastId();


		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/v_newOrder', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_document'])) {
        	$this->MDocument->save($_POST);
        	$id_document_new = $this->input->post('id_document');
        	redirect('documents/details/'.$id_document_new);
        }
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

	public function mydocuments()
	{
		$id = $this->session->userdata('id');
		$data['title'] = 'My Documents';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['documents'] = $this->MDocument->myDocuments($id);
		$data['id'] = $this->session->userdata('id');

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/mydocuments', $data);
        $this->load->view('templates/footer');
	}

	public function addFile($id_document)
	{
		$id = $this->session->userdata('id');
		$data['title'] = 'Add File Attachment';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detailsDocument'] = $this->MDocument->getById($id_document);
		$data['id'] = $this->session->userdata('id');

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/v_addFile', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_file_document'])) {
        	// $this->MDocument->newRecord($_POST);
        	// $this->MDocument->updateStatus($_POST, $id);
        	$this->MDocument->addFile($_POST, $id_document, $id); 
        	redirect('documents/details/'.intval($id_document));
        }
	}

}

?>