<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller {

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

	public function __construct(){
		parent ::__construct();
		$this->load->model('M_lap_penjualan');
	}

	public function index()
	{
		$jual_kode = $this->input->post('jual_kode');
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		$data['jual_kode'] = $jual_kode;
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		
		$data['title'] = 'Laporan Penjualan';
		$data['subtitle'] = 'Laporan Penjualan';
		$data['page'] = 'laporan/v_lap_penjualan';
		$data['query'] = $this->M_lap_penjualan->get_penjualan($jual_kode, $from_date, $to_date);
		$this->load->view('v_index', $data);
	}

	public function delete_penjualan($kode)
	{
		$this->db->where("jual_kode", $kode);
		$this->db->delete("tr_penjualan");
		$this->db->where("jual_kode", $kode);
		$this->db->delete("tr_penjualandetail");

		redirect('laporan_penjualan');
	}

}

