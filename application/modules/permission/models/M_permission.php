<?php 

class  M_permission extends CI_Model{


	public function __construct ()
	{
		$this->load->database();

	}
	// 
	public function get_permission($id_group, $controller)
	{
		$id_group = $this->session->userdata('id_group');
		$query = $this->db->query(
			"SELECT * 
			FROM
			permission a
			JOIN menu b ON a.id_menu = b.id
			WHERE
			a.id_group = '$id_group' AND
			b.controller = '$controller'"
		);
		return $query->row();
	}
	// 
	public function get_by_id($id)
	{
		$query = $this->db->query(
			"SELECT a.*, b._create, b._read, b._update, b._delet
			FROM 
			menu a
			LEFT JOIN permission b ON a.id = b.id_menu AND b.id_group = '$id'
			ORDER BY a.id ASC"
		);
		return $query->result();
	}
	// 
	public function total()
	{   
		$query = $this->db->get('permission')->num_rows();
	}
	// 
	public function permission($id) {
		$query = $this->db->query(
			"SELECT a.*, b.id_group, b._create, b._read, b._update, b._delet
			FROM 
			menu a
			LEFT JOIN permission b ON a.id = b.id_menu AND b.id_group = '$id'
			ORDER BY a.id ASC"
		);
		return $query->result();
	}
	// 
	public function insert($data)
	{
		$this->db->insert('permission',$data);
	}
	// 
	public function delet($data)
	{
		$this->db->where($data)->delete('permission');
	}
	// 
	public function id($id)
	{
		return $this->db
		->where('id', $id)
		->get('permission')
		->row();
	}
	// 
	public function edit($id, $data)
	{
		$this->db->where('id',$id)->update('permission', $data);
		
	}
	// 
	public function empty_by_id_group($id)
	{
		$this->db->where('id_group',$id)->delete('permission');
	}
	// 
}