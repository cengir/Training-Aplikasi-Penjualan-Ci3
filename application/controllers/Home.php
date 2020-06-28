<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// if($this->session->userdata('status')==''){
		// 	redirect('login');
		// }
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';
		$data['page'] = 'v_dashboard';
		$this->load->view('v_index', $data);
	}

}
