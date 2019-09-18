<?php 

class  M_auth extends CI_Model{


	public function __construct ()
	{
		$this->load->database();

	}

	public function login($userdata)
	{
		return $this->db->get_where('user', $userdata)->row_array();
	}

	public function register($userdata)
	{
		$this->db->insert('user', $userdata);
	}
}