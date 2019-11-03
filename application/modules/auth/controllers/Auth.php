<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->f_construct();
	}
	//end fun

	public function index()
	{
		//cek user sudal login atau belum

		if ($this->session->userdata('status') == 'logined') {
			redirect('dashboard');
		}

		$data['title'] = "Login Page";		
		$this->form_validation->set_rules('user', 'User', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('login', $data); 


		} else {

			$userdata = [
				'username' => $this->input->post('user')
			];
			$cek = $this->m_auth->login($userdata);
			if($cek > 0){
				if (password_verify($this->input->post('password'),$cek['password']) == false)  {
					
					$this->session->set_flashdata('pesan', '<div class=" text-center alert alert-danger" role="alert" id="pesan">
						Your password is wrong !</div>');
					$this->load->view('login', $data);

				} else {

					if ($cek['is_active'] != 1) {

						$this->session->set_flashdata('pesan', '<div class=" text-center alert alert-warning" role="alert" id="pesan">
							Your user has  been not activated !</div>');
						$this->load->view('login', $data);


					} else{

						$data = [
							'id' => $cek['id'],
							'name' => $cek['name'],
							'username' => $cek['username'],
							'created' => $cek['created'],
							'is_active' => $cek['is_active'],
							'status' => "logined",
							'id_group' => $cek['id_group']
						];

						$this->session->set_userdata($data);
						$this->session->set_flashdata('success', 'Login');
						redirect ('dashboard');
					}
				}

			} else{

				$this->session->set_flashdata('pesan', '<div class=" text-center alert alert-danger" role="alert" id="pesan">
					Your user was not found !</div>');

				$this->load->view('login', $data);
			}
		}
	}


	public function register()
	{
		$this->load->view('cek');
	}

	public function validasi()
	{
		$data = $this->input->post(NULL, TRUE);
		$were = [
			'nis' => $data['nis'],
			'tgl_lahir' => $data['d'].'/'.$data['m'].'/'.$data['y']
		];
		$validasi = $this->m_student->validasi($were);

		if ($validasi->num_rows() >= 1) {
			$cek = $this->m_user->validasi(['username' => $data['nis']]);
			if ($cek->num_rows() >= 1) {
				$this->session->set_flashdata('pesan', '<div class=" text-center alert alert-danger" role="alert" id="pesan">
					Your account already exists !</div>');
				$this->load->view('cek');
			} else {
				$main['main'] = $validasi->row();
				$this->load->view('register', $main);
			}
			
		} else {
			$this->session->set_flashdata('pesan', '<div class=" text-center alert alert-danger" role="alert" id="pesan">
				Your NIS not found or does not match your birthday !</div>');

			$this->load->view('cek');
		}
		
	}

	public function action()
	{ 
		if($this->session->userdata('is_active') == "1"){
			if ($this->session->userdata('level') == "1") {
				redirect('dasbor');
			}
			redirect('user');
		}

		$data['title'] = "Register";
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('user', 'User', 'required|min_length[4]|is_unique[user.username]',['is_unique'=>'This Username already exists.']);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|matches[repassword]');
		$this->form_validation->set_rules('repassword', 'Password', 'required|min_length[4]|matches[password]');

		if ($this->form_validation->run() == false) {

			$this->load->view('register');

		} else {

			$this->load->helper('string');
			$userdata = [
				'id' => random_string('basic'),
				'is_active' => 1,
				'name' => $this->input->post('name'),
				'username' => $this->input->post('user'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'created' => date("Y-m-d H:i:s")
			];

			$this->m_auth->register($userdata);
			$this->session->set_flashdata('pesan', '<div class=" text-center alert alert-success" role="alert" id="pesan">
				Selamat anda berhasil mendaftar. Silahkan Login !</div>');
			redirect ('auth');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect ();
	}
}
