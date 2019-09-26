<?php 

class  M_searceh extends CI_Model{


	public function __construct ()
	{
		$this->load->database();

	}

	public function searceh($keyword = null)
	{
		$this->db->select('a.nis, a.name, a.ijasah, b.name c, c.year y');
		$this->db->from('student a');
		$this->db->join('class b', 'b.id = a.class');
		$this->db->join('s_year c', 'c.id = a.period');
		$this->db->like('nis', $keyword);
		$this->db->or_like('a.name', $keyword);
		$this->db->order_by('a.nis', 'ASC');
		return $this->db->get();
	}

}