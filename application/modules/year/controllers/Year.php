<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Year extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->f_construct();
		$this->load->helper('string');

		$controller = 'year';

		if($this->session->userdata('controller') != $controller){
			$this->session->unset_userdata('keyword');
			// $this->session->unset_userdata('order');
			// $this->session->unset_userdata('per_page');
			$this->session->set_userdata(array('controller' => $controller));
		}
		$this->id_group = $this->session->userdata('id_group');
		$this->access = $this->m_permission->get_permission($this->id_group, $controller);

		if ($this->access == null) {
			$this->err();
		}
	}
	//end fun
	public function index($id = null){
		if ($this->input->post('submit')) {
			$data ['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data ['keyword'] = $this->session->userdata('keyword')	;
		}

		$this->db->like('year', $data ['keyword']);
		$this->db->from('s_year');

		// pagination config
		$config['base_url'] = base_url('year/index');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 10;

		$this->pg($config);

		$data['start'] = $this->uri->segment(3);
		$data['total'] = $config['total_rows'];
		$data['title'] = "School Year";
		$data['sub'] = "Period List";

		if ($id != null) {
			$data['update'] = $this->m_year->id($id);
		}else{
			$data['update'] = null;
		}
		$data['class'] = $this->m_year->year($config['per_page'], $data['start'], $data['keyword']);
		$this->render('index', $data);
	}
	//end fun
	public function insert()
	{
		if ($this->access->_create == 0) {
			$this->session->set_flashdata('cus', 'You do not have access to delete this data !');
			redirect('year');
		}
		$data = [
			'id' => random_string('basic'),
			'year' =>  $this->input->post('year'),
			'created' =>  date("Y-m-d H:i:s"),
			'created_by' =>  $this->session->userdata('name')
		];
		//
		$this->m_year->insert($data);
		$this->session->set_flashdata('success', 'Create');
		redirect('year');
	}
	//end fun
	public function delet($id)
	{
		if ($this->access->_delet == 0) {
			$this->session->set_flashdata('cus', 'You do not have access to delete this data !');
			redirect('year');
		}
		$data = ['id' => $id];
		$this->m_year->delet($data);
		$this->session->set_flashdata('success', 'Delete');
		redirect('year');

	}

	public function edit()
	{
		if ($this->access->_update == 0) {
			$this->session->set_flashdata('cus', 'You do not have access to update this data !');
			redirect('year');
		}

		$id = $this->input->post('id');
		$data = [
			'year' =>  $this->input->post('year'),
			'updated_by' =>  $this->session->userdata('name')
		];

		$this->m_year->edit($id, $data);
		$this->session->set_flashdata('success', 'Update');
		redirect('year');

	}
	//end fun
	public function reset()
	{
		$this->session->unset_userdata('keyword');
		$this->session->unset_userdata('controller');
		redirect('year');

	}
	// end fun
}
