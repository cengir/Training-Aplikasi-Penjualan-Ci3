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
		$data['title'] = 'Transaksi Penjualan';
		$data['subtitle'] = 'Master Data > Transaksi Penjualan';
		$data['page'] = 'penjualan/v_penjualan_add';
		$this->load->view('v_index', $data);
	}
	public function save_barang()
	{
		$data = $this->input->post();
		$this->db->insert('m_barang', $data);

		redirect('barang');
	}
	public function delete_barang($id)
	{
		$this->db->where('brg_id', $id);
		$this->db->delete('m_barang');

		redirect('barang');
	}
	function edit_barang($id)
	{
		$data['title']='Edit Barang';
		$data['subtitle'] = 'Master Data > Edit Barang';
		$data['editdata'] = $this->db->get_where('m_barang',array('brg_id'=>$id))->row();
		$data['page'] = "barang/v_barang_edit";
		$this->load->view('v_index',$data);
	}

	function update_barang($id)
	{
		$data = $this->input->post();
		$this->db->where('brg_id',$id);
		$this->db->update('m_barang', $data);

		redirect('barang','refresh');
	}
}

