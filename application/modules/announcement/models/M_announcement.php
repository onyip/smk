<?php 

class  M_announcement extends CI_Model{


	public function __construct ()
	{
		$this->load->database();

	}

	public function get_all() 
	{
		return $this->db->get('announcement')->result();
	}

	public function get_by_were($were)
	{
		return $this->db->get_where('announcement', $were);
	}

	public function insert($data)
	{
		$this->db->insert('announcement',$data);
	}

	public function delet($were)
	{
		$this->db->where($were)->delete('announcement');
	}

	public function update($were, $data)
	{
		$this->db->update('announcement', $data, $were);
		
	}
	public function get_tot()
	{
		return $this->db->get_where('announcement', ['is_active' => 1])->num_rows();
	}


}