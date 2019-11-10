<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public function f_construct()
	{
		$this->load->helper('url_helper');
		$this->load->helper('my_helper');
		$this->load->model('permission/m_permission');	
		$this->load->model('menu/m_menu');	
		$this->load->model('group/m_group');	
		$this->load->model('auth/m_auth');	
		$this->load->model('about/m_about');	
		$this->load->model('user/m_user');	
		$this->load->model('student/m_student');	
		$this->load->model('classs/m_class');	
		$this->load->model('year/m_year');	
		$this->load->model('announcement/m_announcement');	
	}

	public function render($content, $data = null)
	{
		if ($this->session->userdata('status') != 'logined') {
			redirect('auth');
		}

		// Load menu
		$this->load->model('menu/m_menu');
		$data['sidenav'] = $this->m_menu->get_menu();	
		
		//load profil
		$this->load->model('about/m_about');
		$data['about'] = $this->m_about->about();


		$data['header'] = $this->load->view('template/header', $data, true);
		$data['topbar'] = $this->load->view('template/topbar', $data, true);
		$data['sidebar'] = $this->load->view('template/sidebar', $data, true);
		$data['footer'] = $this->load->view('template/footer', $data, true);
		$data['content'] = $this->load->view($content, $data, true);

		$this->load->view('template/index', $data);
	}


	public function err()
	{
		// $this->load->view('template/header');
		$this->load->view('template/error');
	}

	public function pg($config)
	{
		
		// stayling
		$config['num_link'] = 3;
		$config['full_tag_open'] = '<nav><ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
	}

}