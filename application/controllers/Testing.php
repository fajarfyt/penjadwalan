<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (is_logged_in() == false) {
			redirect(base_url('index.php/'));
		}

        $this->load->model('M_schedules', 'sch');
	}

	public function index()
	{	
		$this->load->helper('url');
		$data['crane'] = $this->sch->get_crane();
		$get_user = $this->session->userdata('sess_auth');
		$data['user'] = $get_user['nama_user'];
		$data['title'] = 'Home | Testing';
		$data['header'] = 'Testing';
		$data['content'] = 'pages/Testing/index';
		$this->load->view('templates/main', $data);
    }
    
    public function add()
    {
        var_dump($this->input->post('bobot'));die();
    }
    
}
