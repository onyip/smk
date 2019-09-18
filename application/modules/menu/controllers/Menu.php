<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->f_construct();

		$controller = 'menu';

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
		// library
		$this->load->library('pagination');

		if ($this->input->post('submit')) {
			$data ['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data ['keyword'] = $this->session->userdata('keyword')	;
			// $this->session->unset_userdata('keyword');
		}

		$this->db->like('name', $data ['keyword']);
		$this->db->or_like('controller', $data ['keyword']);
		$this->db->or_like('parent', $data ['keyword']);
		$this->db->or_like('url', $data ['keyword']);
		$this->db->or_like('type', $data ['keyword']);
		$this->db->from('menu');

		// pagination config
		$config['base_url'] = base_url('menu/index');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 7;

		$this->pg($config);

		$data['start'] = $this->uri->segment(3);
		$data['total'] = $config['total_rows'];
		$data['title'] = "Menu";
		$data['sub'] = "Menu List";
		$data['menu'] = $this->m_menu->daftarmenu($config['per_page'], $data['start'], $data['keyword']);
		// var_dump($data['menu']); die;
		$this->render('index', $data);
	}
	//end fun

	public function addmenu()
	{
		$data['title'] = "Menu";
		$data['sub'] = "Add Memu";
		$data['parent'] = $this->m_menu->get_parent();
		$this->render('addmenu', $data);


	}
	//end fun

	public function insertmenu()
	{	

		$this->form_validation->set_rules('id', 'ID', 'required|is_unique[menu.id]',['is_unique'=>'This Menu ID already exists.']);

		if ($this->form_validation->run() == false) {

			$this->session->set_flashdata('err', 'Creating');
			redirect('menu/addmenu');

		} else {

			$icon = $this->input->post('icon');

			$data = [

				'id' =>  $this->input->post('id'),
				'parent' =>  $this->input->post('parent'),
				'type' =>  $this->input->post('type'),
				'name' =>  $this->input->post('name'),
				'controller' =>  $this->input->post('controller'),
				'icon' =>   $icon,
				'url' =>  $this->input->post('url'),
				'created_by' =>  "Super Admin",
				'created' =>  date("Y-m-d H:i:s")

			// 'created_by' =>  $this->session->userdata('name')

			];
		//
			$this->m_menu->insertmenu($data);
			$this->session->set_flashdata('success', 'Create');
			redirect(base_url('menu'));
		}
	}
	//end fun
	public function deletmenu($id)
	{
		$data = ['id' => $id];
		$this->m_menu->delet($data);
		$this->session->set_flashdata('success', 'Delete');
		redirect(base_url('menu'));

	}
	//end fun

	public function updatemenu($id)
	{
		$data['title'] = "Menu";
		$data['sub'] = "Update Menu";
		$data['parent'] = $this->m_menu->get_parent();
		$data['menu'] = $this->m_menu->id($id);
		$this->render('updatemenu', $data);

	}
	//end fun

	public function editmenu()
	{
		$id = $this->input->post('update');
		$data = [
			'parent' =>  $this->input->post('parent'),
			'type' =>  $this->input->post('type'),
			'name' =>  $this->input->post('name'),
			'controller' =>  $this->input->post('controller'),
			'icon' =>  $this->input->post('icon'),
			'url' =>  $this->input->post('url'),
			'updated_by' =>  "Super Admin",
			'is_active' =>  $this->input->post('is_active'),
			'id' =>  $this->input->post('id'),
		];

		$this->m_menu->edit($id, $data);
		$this->session->set_flashdata('success', 'Update');
		redirect(base_url('menu'));

	}
	//end fun

	public function reset()
	{
		$this->session->unset_userdata('keyword');
		$this->session->unset_userdata('controller');
		redirect('menu');

	}
}
