<?php 

class  M_user extends CI_Model{


	public function __construct ()
	{
		$this->load->database();

	}

	public function total()
	{   
		return $this->db->get('user')->num_rows();
	}

	public function get_user()
	{
		$this->db->select('a.name c, a.username, a.created, a.updated, b.name');
		$this->db->from('user a');
		$this->db->join('group_user b', 'b.id = a.id_group');
		$this->db->order_by('id_group', 'ASC');
		$qwery = $this->db->get();
		return $qwery->result();
	}


	public function user($per_page, $start, $keyword = null) {
		if ($keyword) {
			$this->db->like('name', $keyword);
			$this->db->or_like('username', $keyword);
		}
		$this->db->order_by('id_group');
		return	$this->db->get('user', $per_page, $start)->result();
	}


	public function insert($userdata)
	{
		$this->db->insert('user',$userdata);
	}

	public function delet($data)
	{
		$this->db->where($data)->delete('user');
	}

	public function id($id)
	{
		$data = $this->db->where('id', $id)->get('user');
		if ($data == null) {
			return null;
		} 

		return $data->row();

	}

	public function edit($id, $data)
	{
		$this->db->where('id',$id)->update('user', $data);
		
	}

	public function validasi($were)
	{
		return $this->db->get_where('user', $were);
	}

}