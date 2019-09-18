<?php 

class  M_about extends CI_Model{


	public function __construct ()
	{
		$this->load->database();

	}

	public function hitung()
	{   
		// $query = $this->db->get('about');
		// if($query->num_rows()>0)
		// {
		// 	return $query->num_rows();
		// }
		// else
		// {
		// 	return 0;
		// }
	}

	public function about() 
	{
		return $this->db->get('about')->row();
	}


	public function insert($data)
	{
		// $this->db->insert('about',$data);
	}

	public function delet($data)
	{
		// $this->db->where($data)->delete('about');
	}

	public function id($id)
	{
		return $this->db
		->where('id', $id)
		->get('about')
		->row();

	}

	public function edit($id, $data)
	{
		$this->db->where('id',$id)->update('about', $data);
		
	}

}