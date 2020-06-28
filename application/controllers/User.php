<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['title'] = 'Karyawan';
		$data['subtitle'] = 'Master Data > User';
		$data['page'] = 'user/v_user';
		$data['query'] = $this->db->get('m_user');
		$this->load->view('v_index', $data);
	}
	public function add_user()
	{	
		$this->load->model('M_function');
		$autonumb = $this->M_function->autonumb('m_user','kode_karyawan','DT');
		$data['kode_karyawan']= $autonumb;
		$data['title'] = 'Data Karyawan';
		$data['subtitle'] = 'Master Data > User';
		$data['page'] = 'user/v_user_add';
		$this->load->view('v_index', $data);
	}
	public function save_detail()
	{
		$kode_karyawan = $this->input->post('kode_karyawan');
		$brg_id = explode("|",$this->input->post('id_user'))[0];
		$det_jumlah = $this->input->post('det_jumlah');
		$harga = explode("|",$this->input->post('id_user'))[1];

		$data = array();
		$data['kode_karyawan'] = $id_user;
		$data['id_user'] = $id_user;

		$this->db->insert('m_datakaryawan', $data);

		redirect('user/add_user');
	}
	public function delete_user($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('m_user');

		redirect('user');
	}
	function edit_user($id_karyawan)
	{
		$data['title']='Edit User';
		$data['subtitle'] = 'Master Data > Edit User';
		$data['editdata'] = $this->db->get_where('m_user',array('id_user'=>$id))->row();
		$data['page'] = "user/v_user_edit";
		$this->load->view('v_index',$data);
	}

	function update_user($id_karyawan)
	{
		$data = $this->input->post();
		$this->db->where('id_user',$id);
		$this->db->update('m_user', $data);

		redirect('user','refresh');
	}
}

