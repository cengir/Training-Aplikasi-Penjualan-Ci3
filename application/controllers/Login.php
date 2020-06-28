<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('v_login');
	}
	public function proses_login(){
		// cara ambil data post dibuat array
		$dataarr = array();
		$dataarr['user_name'] = $this->input->post('user_name');
		$dataarr['user_password'] = $this->input->post('user_password');
		// cara bikin array yang lain
		// $where = array(
		// 	'user_name' => $name,
		// 	'user_password' => $pass,
		// );
		// cara get data dari db tanpa model
		$cek = $this->db->get_where('m_user', $dataarr); //untuk mengambil data dengan menggunakan parameter
		$cekrow = $cek->num_rows(); //untuk mengecek jumlah data di table
		if($cekrow > 0){
			// echo "ada";
			$datasession = array();
			$datasession['nama'] = $this->input->post('user_name');
			$datasession['email'] = $this->input->post('email');
			$datasession['status'] = 'login';
			$this->session->set_userdata($datasession);

			redirect('home'); // jika sukses login
		}else{
			redirect('login'); // jika gagal login
		}
	}
	public function sukses(){
		if($this->session->userdata('nama') == ''){
			redirect('login');
			// echo "gagal masuk";
		}
			echo "Selamat datang ".$this->session->userdata('nama')." <a href='".base_url()."index.php/login/logout'>Logout</a>";
		
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}
