<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->f_construct();

		$controller = 'dashboard';

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


	public function index()
	{
		$data['usertitle'] = 'User Registrations';
		$data['user'] = $this->m_user->total();

		$data['studenttitle'] = 'Student';
		$data['student'] = $this->m_student->total();
		
		$data['classtitle'] = 'Class';
		$data['class'] = $this->m_class->total();
		
		$data['yeartitle'] = 'School Year';
		$data['year'] = $this->m_year->total();
		
		$data['title'] = 'Dashboard';
		$this->render('index', $data);
	}

}