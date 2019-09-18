<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->f_construct();
		$this->load->library('upload');

		$controller = 'about';

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
		$data['title'] = "About Application";
		$data['app'] = $this->m_about->about();
		// var_dump($data['app']); die;
		$this->render('index', $data);
	}
	//end fun

	public function update($id = FALSE)
	{

		if ($id !=1 ) {
			$this->err();
		}
		$data['title'] = "Update Application Info ";
		$data['app'] = $this->m_about->id($id);
		$this->render('update', $data);

	}
	//end fun

	public function edit()
	{	

		$id = $this->input->post('id');
		$data = [
			'logo' =>  $this->do_upload(),
			'application' =>  $this->input->post('application'),
			'abbreviation' =>  $this->input->post('abbreviation'),
			'info' =>  $this->input->post('info'),
			'copyright' =>  $this->input->post('copyright'),
			'version' =>  $this->input->post('version'),
			'updated_by' =>  $this->session->userdata('name')
		];
		$this->m_about->edit($id, $data);
		$this->session->set_flashdata('success', 'Update');
		redirect(base_url('about'));

	}
	//end fun

	function do_upload() {
        //
		$this->load->library('upload');
		$this->load->helper('string');
        //
		$src_file_name = 'logo';
        //
		$config['file_name'] = random_string('basic');
		$config['upload_path'] = 'assets/img/logo/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->upload->initialize($config);
		if(!empty($src_file_name)){
			if ($this->upload->do_upload($src_file_name)){
				$gbr = array('upload_data' => $this->upload->data()); 
                //
				$file_nm = $gbr['upload_data']['file_name'];
                //
				$result = $file_nm;
			}else{
				$result = $this->input->post('last-img');
			}
            //
			return $result;
		}   
	}

}
