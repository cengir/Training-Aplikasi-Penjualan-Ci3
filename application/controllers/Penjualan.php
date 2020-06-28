<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

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
	public function index()
	{
		$data['title'] = 'Barang';
		$data['subtitle'] = 'Master Data > Barang';
		$data['page'] = 'barang/v_barang';
		$data['query'] = $this->db->get('m_barang');
		$this->load->view('v_index', $data);
	}
	public function add_penjualan()
	{	
		$this->load->model('M_function');
		$autonumb = $this->M_function->autonumb('tr_penjualan', 'jual_kode', 'TR');
		$data['jual_kode'] = $autonumb;
		$data['title'] = 'Transaksi Penjualan';
		$data['subtitle'] = 'Master Data > Transaksi Penjualan';
		$data['page'] = 'penjualan/v_penjualan_add';
		$this->load->view('v_index', $data);
	}
	public function save_detail()
	{		
		$jual_kode = $this->input->post('jual_kode');
		$brg_id = explode("|",$this->input->post('brg_id'))[0];
		$det_jumlah = $this->input->post('det_jumlah');
		$harga = explode("|",$this->input->post('brg_id'))[1];

		$data = array();
		$data['jual_kode'] = $jual_kode;
		$data['brg_id'] = $brg_id;
		$data['det_jumlah'] = $det_jumlah;
		$data['det_subtotal'] = $det_jumlah * $harga;

		$this->db->insert('tr_penjualandetail', $data);

		redirect('penjualan/add_penjualan');
	}
	public function delete_detail_penjualan($id)
	{
		$this->db->where('det_id', $id);
		$this->db->delete('tr_penjualandetail');

		redirect('penjualan/add_penjualan');
	}

	function save_trans()
	{
		$data = $this->input->post();
		$this->db->insert('tr_penjualan', $data);

		redirect('penjualan/add_penjualan','refresh');
	}
}

