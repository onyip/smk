<?php 

class  M_year extends CI_Model{


	public function __construct ()
	{	
		$this->load->database();

	}

	public function total()
	{   
		return $this->db->get('s_year')->num_rows();
	}

	public function year($per_page, $start, $keyword = null) 
	{
		if ($keyword) {
			$this->db->like('year', $keyword);
		}
		$this->db->order_by('year');
		return $this->db->get('s_year',$per_page, $start)->result();
	}
	public function get_period()
	{
		return	$this->db->get('s_year')->result();
	}

	public function insert($data)
	{
		$this->db->insert('s_year',$data);
	}

	public function delet($data)
	{
		$this->db->where($data)->delete('s_year');
	}

	public function id($id)
	{
		return $this->db
		->where('id', $id)
		->get('s_year')
		->row();

	}

	public function edit($id, $data)
	{
		$this->db->where('id',$id)->update('s_year', $data);
		
	}

}