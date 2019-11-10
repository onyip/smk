<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->f_construct();

		$controller = 'announcement';

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
		$this->load->helper('string');
	}
	//end fun

	public function index(){
		$data['title'] = "Announcement";
		$data['sub'] = "Announcement List";
		$data['main'] = $this->m_announcement->get_all();
		$this->render('index', $data);
	}
	//end fun

	public function form($id = NULL)
	{
		if ($id == NULL) {
			$data['title'] = "Announcement";
			$data['sub'] = "Add Announcement";
			$data['action'] = 'insert';
			$data['main'] = NULL;
			$this->render('form', $data);
		} else {
			$were = ['id' => $id];
			$data['title'] = "Announcement";
			$data['sub'] = "Add Announcement";
			$data['action'] = 'update';
			$data['main'] = $this->m_announcement->get_by_were($were)->row();
			$this->render('form', $data);
		}
		
	}

	public function insert()
	{
		if ($this->access->_create == 0) {
			$this->session->set_flashdata('cus', 'You do not have access to add this data !');
			redirect('announcement');
		}
		$data = $this->input->post(NULL, TRUE);
		$data['created_by'] = $this->session->userdata('name');
		$data['id'] = random_string('basic');
		$this->m_announcement->insert($data);
		$this->session->set_flashdata('success', 'Create');
		redirect('announcement');
	}

	public function update()
	{

		if ($this->access->_update == 0) {
			$this->session->set_flashdata('cus', 'You do not have access to add this data !');
			redirect('announcement');
		}
		$data = $this->input->post(NULL, TRUE);
		$data['updated_by'] = $this->session->userdata('name');
		$were = ['id' => $data['id']];
		$this->m_announcement->update($were, $data);
		$this->session->set_flashdata('success', 'Update');
		redirect('announcement');

	}

	public function delet($id)
	{
		if ($this->access->_delet == 0) {
			$this->session->set_flashdata('cus', 'You do not have access to add this data !');
			redirect('announcement');
		}
		$were =['id' => $id];
		$this->m_announcement->delet($were);
		$this->session->set_flashdata('success', 'Delete');
		redirect('announcement');

	}
	public function ganti($act, $id)
	{
		$were = ['id' => $id];
		switch ($act) {
			case 'dis':
			$data = ['is_active' => 0];
			$this->m_announcement->update($were, $data);
			redirect('announcement');
			break;
			
			case 'ena':
			$data = ['is_active' => 1];
			$this->m_announcement->update($were, $data);
			redirect('announcement');
			break;
		}
	}
}
