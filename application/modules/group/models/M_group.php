<?php 

class  M_group extends CI_Model{


	public function __construct ()
	{
		$this->load->database();

	}

	public function total()
	{   
		return $this->db->get('group_user')->num_rows();
	}

	public function group() 
	{
		return $this->db->get('group_user')->result();
	}


	public function insert($data)
	{
		$this->db->insert('group_user',$data);
	}

	public function delet($data)
	{
		$this->db->where($data)->delete('group_user');
	}

	public function id($id)
	{
		return $this->db
		->where('id', $id)
		->get('group_user')
		->row();

	}

	public function edit($id, $data)
	{
		$this->db->where('id',$id)->update('group_user', $data);
		
	}

}