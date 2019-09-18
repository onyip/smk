<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->f_construct();

		$controller = 'group';

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
	public function index(){
		$data['title'] = "Group";
		$data['sub'] = "Group List";
		$data['group'] = $this->m_group->group();
		$this->render('index', $data);
	}
	//end fun
	public function insert()
	{	

		$icon = $this->input->post('icon');

		$data = [

			'name' =>  $this->input->post('name'),
			'created' =>  date("Y-m-d H:i:s")
		];
		//
		$this->m_group->insert($data);
		$this->session->set_flashdata('success', 'Create');
		redirect(base_url('group'));
	}
	//end fun
	public function delet($id)
	{
		$data = ['id' => $id];
		$this->m_group->delet($data);
		$this->session->set_flashdata('success', 'Delete');
		redirect(base_url('group'));

	}
	//end fun
	
	public function update($id)
	{
		$data['title'] = "Group";
		$data['sub'] = "Update Group";
		$data['group'] = $this->m_group->id($id);
		$this->render('update', $data);

	}
	//end fun

	public function edit()
	{
		$id = $this->input->post('id');
		$data = [
			'name' =>  $this->input->post('name'),
			// 'updated_by' =>  $this->session->userdata('name'),
			'is_active' =>  $this->input->post('is_active')
		];

		$this->m_group->edit($id, $data);
		$this->session->set_flashdata('success', 'Update');
		redirect(base_url('group'));

	}
	//end fun
}
