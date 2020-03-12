<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Submission extends CI_Controller
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
		//here
	}

	public function neworder()
	{
		$this->form_validation->set_rules('name_document', 'Name document', 'trim|required');
		$this->form_validation->set_rules('phone_document', 'Phone number', 'required|min_length[10]');
		$this->form_validation->set_rules('email_document', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('destination_document', 'Destination', 'required',[ 'required' => 'Please kindly choose one of the destinations']);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'New Order';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['destination'] = $this->MDocument->getDestination();
			$data['getLastId'] = $this->MDocument->getLastId();

			$this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('document/v_newOrder', $data);
	        $this->load->view('templates/footer');
		}else{
			$id_document_new = $this->input->post('id_document');
			$name = htmlspecialchars($this->input->post('name_document', true)) ;
			$phone = $this->input->post('phone_document');
			$email = htmlspecialchars($this->input->post('email_document', true));
			$birthday = $this->input->post('birthday_document');
			$destination = $this->input->post('destination_document');
			$pic = $this->input->post('pic_document');
			$date_created_document = $this->input->post('date_created_document');
			$id_status = 1;

			$this->db->query("INSERT INTO tb_document VALUES(NULL,'$name', '$phone', '$email', '$birthday', '$destination', '$pic', '$date_created_document', $id_status)");
			redirect('documents/details/'.$id_document_new);
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

	public function documentsubmited()
	{
		$data['title'] = 'Documents Submited';
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();

		$id_session = $this->session->userdata('id');
		$data['documentsubmited'] = $this->MDocument->documentsubmited($id_session, 1);

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

		$id_session = $this->session->userdata('id');
		$data['documentprocessed'] = $this->MDocument->documentprocessed($id_session, 2);

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
		$id_session = $this->session->userdata('id');
		$data['documentdone'] = $this->MDocument->documentdone($id_session, 3);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('document/documentdone', $data);
		$this->load->view('templates/footer');

	}

}