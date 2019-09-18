<?php 

class  M_menu extends CI_Model{


	public function __construct ()
	{
		$this->load->database();

	}

	public function daftarmenu($page, $start, $keyword = null) {

		if ($keyword) {
			$this->db->like('name', $keyword);
			$this->db->or_like('controller', $keyword);
			$this->db->or_like('parent', $keyword);
			$this->db->or_like('type', $keyword);
			$this->db->or_like('url', $keyword);
		}

		return $this->db->get('menu', $page, $start)->result_array();
	}

	public function get_parent()
	{
		$this->db->select('id ,name');
		$this->db->from('menu');
		$query = $this->db->get();
		return $query->result();
	}

	public function insertmenu($data)
	{
		$this->db->insert('menu',$data);
	}

	public function delet($data)
	{
		$this->db->where($data)->delete('menu');
	}

	public function id($id)
	{
		return $this->db
		->where('id', $id)
		->get('menu')
		->row();

	}

	public function edit($id, $data)
	{
		$this->db->where('id',$id)->update('menu', $data);
		
	}


	public function get_menu($parent = null)
	{
		$id_group = $this->session->userdata('id_group');

		$sql_where = '';
		$sql_where .= ($parent != '') ? "b.parent = '$parent'" : 'b.parent = ""';

		$query = $this->db->query(
			"SELECT * 
			FROM
			permission a
			JOIN menu b ON a.id_menu = b.id
			WHERE
			a.id_group = '$id_group' AND 
			$sql_where
			ORDER BY a.id_menu"
		);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			foreach ($result as $key => $val) {
				$result[$key]['child'] = $this->get_menu($result[$key]['id_menu']);
			}
			return $result;
		}else{
			return array();
		}
	}

	public function get_menu_first($id_group)
	{
		$query = $this->db->query(
			"SELECT * 
			FROM
			permission a
			JOIN menu b ON a.id_menu = b.id
			WHERE
			a.id_group = '$id_group' AND
			b.type = 1 AND
			b.url != '#'
			ORDER BY a.id_menu"
		);

		return $query->row();
	}


	public function total()
	{
		return $this->db->get('menu')->num_rows();
	}

}