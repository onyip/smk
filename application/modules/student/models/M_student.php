<?php 

class  M_student extends CI_Model{


	public function __construct ()
	{
		$this->load->database();

	}

	public function total()
	{   
		return $this->db->get('student')->num_rows();
	}

	public function get_student()
	{
		$this->db->select('a.nis, a.name, a.ijasah, b.name c, c.year y', $per_page, $start);
		$this->db->from('student a');
		$this->db->join('class b', 'b.id = a.class');
		$this->db->join('s_year c', 'c.id = a.period');
		$this->db->order_by('a.name', 'ASC');
		$qwery = $this->db->get();
		return $qwery->result();
	}

	public function student($where, $keyword = null) {
		if ($keyword) {
			$this->db->like('a.name', $keyword);
			$this->db->or_like('a.nis', $keyword);
		}

		$this->db->select('a.id, a.nis, a.name, a.ijasah, b.name c, c.year y');
		$this->db->from('student a');
		$this->db->join('class b', 'b.id = a.class');
		$this->db->join('s_year c', 'c.id = a.period');
		$this->db->where($where);
		$this->db->order_by('a.name', 'ASC');
		$qwery = $this->db->get();
		return $qwery->result();

		// $this->db->order_by('id_group');
		// return	$this->db->get('student', $per_page, $start)->result();
	}


	public function insert($userdata)
	{
		$this->db->insert('student',$userdata);
	}

	public function delet($id)
	{
		$this->db->where($id)->delete('student');
	}

	public function id($id)
	{
		return $this->db->get_where('student', $id);
	}

	public function edit($id, $data)
	{
		$this->db->where('id',$id)->update('student', $data);
		
	}

	public function validasi($were)
	{
		return $this->db->get_where('student', $were);
	}

}