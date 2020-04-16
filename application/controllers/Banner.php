<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('MBanner');
	}

	public function index()
	{
		//here
		$data['title'] = 'All Banner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['allBanners'] = $this->db->get('tb_banner')->result_array();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('banner/allBanner', $data);
        $this->load->view('templates/footer');
	}

	public function add()
	{
		//here
		$data['title'] = 'Add Banner';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('banner/addBanner', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_banner'])) {
        	$this->MBanner->addBanner($_POST);
        	redirect('banner');
        }
	}

	public function update($id)
	{
		//here
		$data['title'] = 'Update Banner';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['banners'] = $this->MBanner->getBannerById($id);

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('banner/updateBanner', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_banner'])) {
        	$this->MBanner->updateBanner($_POST,$id);
        	redirect('banner');
        }
	}

	public function delete($id)
	{
		//here
	}
}