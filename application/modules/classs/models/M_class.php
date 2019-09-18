<?php 

class  M_class extends CI_Model{


	public function __construct ()
	{
		$this->load->database();

	}

	public function total()
	{   
		return $this->db->get('class')->num_rows();
	}

	public function class($per_page, $start, $keyword = null) 
	{
		if ($keyword) {
			$this->db->like('name', $keyword);
		}
		$this->db->order_by('name');
		return $this->db->get('class',$per_page, $start)->result();
	}

	public function get_class()
	{
		$this->db->order_by('name');
		return	$this->db->get('class')->result();
	}


	public function insert($data)
	{
		$this->db->insert('class',$data);
	}

	public function delet($data)
	{
		$this->db->where($data)->delete('class');
	}

	public function id($id)
	{
		return $this->db
		->where('id', $id)
		->get('class')
		->row();

	}

	public function edit($id, $data)
	{
		$this->db->where('id',$id)->update('class', $data);
		
	}

}