<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->f_construct();

		$controller = 'permission';

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
		$data['title'] = "Permission";
		$data['group'] = $this->m_group->group();
		$this->render('index', $data);
	}
	//end fun
	public function edit()
	{
		$id = $this->input->post('id');
		$data = [
			'name' =>  $this->input->post('name'),
			'updated_by' =>  $this->session->userdata('name'),
			'is_active' =>  $this->input->post('is_active')
		];

		$this->m_permission->edit($id, $data);
		redirect(base_url('permission'));

	}
	//end fun
	public function form($id = null)
	{
		$data['title'] = $this->access->name;
		$data['group'] = $this->m_group->id($id);
		$data['access'] = $this->access;
		if ($id == null) {
			if ($this->access->_create) {
				$data['subtitle'] = 'Tambah Data';
				$data['action'] = 'insert';
				$data['main'] = null;
				$this->render('form', $data);
			} else {
				redirect($this->err());				
			}
		} else {
			if ($this->access->_update) {
				$data['subtitle'] = 'Ubah Data';
				$data['action'] = 'update';
				$data['main'] = $this->m_permission->get_by_id($id);
				$this->render('form', $data);
			} else {
				$this->err();				
			}
		}
	}
	//end fun
	public function update()
	{
		$data = $_POST;

		if ($data != null) {
			if($this->access->_update){
				$this->m_permission->empty_by_id_group($data['id_group']);

				$data2 = array();

				if(isset($data['_create'])){
					foreach ($data['_create'] as $row) {
						$data2[$row]['_create'] = 1;
					}
				}

				if(isset($data['_read'])){
					foreach ($data['_read'] as $row) {
						$data2[$row]['_read'] = 1;
					}
				}

				if(isset($data['_update'])){
					foreach ($data['_update'] as $row) {
						$data2[$row]['_update'] = 1;
					}
				}

				if(isset($data['_delet'])){
					foreach ($data['_delet'] as $row) {
						$data2[$row]['_delet'] = 1;
					}
				}

				foreach ($data2 as $key => $val) {
					$val['id_menu'] = $key;
					$val['id_group'] = $data['id_group'];
					// $val['created_by'] = $this->session->userdata('name');
					$this->m_permission->insert($val);
				}
				// $data['updated_by'] = $this->session->userdata('name');
				// insert_log('update',$this->access->name);
				$this->session->set_flashdata('success', 'Update');
				redirect(base_url('permission'));
			}else{
				$this->err();
			}
		} else {
			$this->err();
		}
	}


}
