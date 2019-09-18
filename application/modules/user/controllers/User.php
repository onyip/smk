<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->f_construct();
		$this->load->helper('string');
		$controller = 'user';

		if($this->session->userdata('controller') != $controller){
			$this->session->unset_userdata('keyword');
			// $this->session->unset_userdata('order');
			// $this->session->unset_userdata('per_page');
			$this->session->set_userdata(array('controller' => $controller));
		}
		$this->id_group = $this->session->userdata('id_group');
		$this->access = $this->m_permission->get_permission($this->id_group, $controller);
		if ($this->access == null) {
			$this->err();
		}
	}
	//end fun

	public function index()
	{
		if ($this->input->post('submit')) {
			$data ['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data ['keyword'] = $this->session->userdata('keyword')	;
		}

		$this->db->like('name', $data ['keyword']);
		$this->db->or_like('username', $data ['keyword']);
		$this->db->from('user');

		// pagination config
		$config['base_url'] = base_url('user/index');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 7;

		$this->pg($config);

		$data['start'] = $this->uri->segment(3);
		$data['total'] = $config['total_rows'];
		$data['title'] = "User";
		$data['sub'] = "User List";
		$data['user'] = $this->m_user->user($config['per_page'], $data['start'], $data['keyword']);
		$data['group'] = $this->m_group->group();
		$this->render('index', $data);
	}
	//end fun
	public function reset()
	{
		$this->session->unset_userdata('keyword');
		$this->session->unset_userdata('controller');
		redirect('user');

	}
	// end fun
	public function add()
	{
		if ($this->access->_create == 0) {
			$this->session->set_flashdata('cus', 'You do not have access to add this data !');
			redirect('classs');
		}
    	//
		$data['title'] = "User";
		$data['sub'] = "User Add";
		$this->render('add', $data);
	}
	// end fun

	public function insert()
	{ 
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('user','User','required|min_length[4]|is_unique[user.username]',['is_unique'=>'This Username already exists.']);
		$this->form_validation->set_rules('password','Password','required|min_length[4]|matches[repassword]');
		$this->form_validation->set_rules('repassword','Password','required|min_length[4]|matches[password]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('err', 'Creating');
			redirect ('user');

		} else {

			$userdata = [
				'id' => random_string('basic'),
				'name' => $this->input->post('name'),
				'username' => $this->input->post('user'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'created' => date("Y-m-d H:i:s"),
				'id_group' => 3,
				'is_active' => 1
			];

			$this->m_user->insert($userdata);
			$this->session->set_flashdata('success', 'Create');
			redirect ('user');
		}
	}
	//end fun
	public function delet($id)
	{
		if ($this->access->_delet == 0) {
			$this->session->set_flashdata('cus', 'You do not have access to delete this data !');
			redirect('classs');
		}
 		//
		$data = ['id' => $id];
		$this->m_user->delet($data);
		$this->session->set_flashdata('success', 'Delete');
		redirect('user');
	}
	//end fun
	
	public function update($id = false)
	{
		$data['title'] = "User";
		$data['sub'] = "Update User";
		$data['user'] = $this->m_user->id($id);
		$data['group'] = $this->m_group->group();
		if ($data['user'] == null) {
			redirect('user');
		}
		$this->render('update', $data);
	}
	//end fun

	public function edit()
	{
		if ($this->access->_update == 0) {
			$this->session->set_flashdata('cus', 'You do not have access to update this data !');
			redirect('classs');
		}
 		//
		$id = $this->input->post('id');
		$data = [
			'name' =>  $this->input->post('name'),
			'username' =>  $this->input->post('username'),
			'id_group' =>  $this->input->post('id_group'),
			'is_active' =>  $this->input->post('is_active')
		];

		$this->m_user->edit($id, $data);
		$this->session->set_flashdata('success', 'Update');
		redirect('user');
	}
	//end fun

	public function chang_pwd()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|matches[repassword]');
		$this->form_validation->set_rules('repassword', 'Password', 'required|min_length[4]|matches[password]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('err', 'Creating');
			redirect("user/update/$id");
		} else {

			$data = [
				'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];

			$this->m_user->edit($id, $data);
			$this->session->set_flashdata('success', 'Update');
			redirect("user/update/$id");
		}
	}
	//end fun

	public function pdf()
	{

		$this->load->library('pdf');
		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		$pdf->Cell(280,7,'USER LIST ',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(280,7,'INTEGRAL STORE',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
		$pdf->SetFont('Arial','B',10,'C');
		$pdf->Cell(10,6,'No',1,0,'C');
		$pdf->Cell(85,6,'Full Name',1,0,'C');
		$pdf->Cell(45,6,'Username',1,0,'C');
		$pdf->Cell(50,6,'Created',1,0,'C');
		$pdf->Cell(50,6,'Updated',1,0,'C');
		$pdf->Cell(35,6,'ID Group',1,1,'C');
		$pdf->SetFont('Arial','',10);
		$user = $this->m_user->get_user();
		$no = 1;
		foreach ($user as $row){
			$pdf->Cell(10,6,$no++,1,0,'C');
			$pdf->Cell(85,6,$row->c,1,0);
			$pdf->Cell(45,6,$row->username,1,0);
			$pdf->Cell(50,6,$row->created,1,0,'C');
			$pdf->Cell(50,6,$row->updated,1,0,'C'); 
			$pdf->Cell(35,6,$row->name,1,1,'C'); 
		}
		$pdf->Output("userlist.pdf", 'I');
	}
 	//
	public function export()
	{
 		// create file name
		$fileName = 'data-'.time().'.xlsx';  
        // load excel library
		$this->load->library('excel');
		$user = $this->m_user->get_user();
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
        // set Header
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Full Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Username');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Created');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Group');
        // set Row
		$rowCount = 2;
		foreach ($user as $list) {
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->c);
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->username);
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->created);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->name);
			$rowCount++;
		}
		$filename = "User List". date("Y-m-d-H-i-s").".csv";
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0'); 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
		$objWriter->save('php://output'); 
	}
 	//
	public function inport()
	{
		$this->load->library('excel');	
		$path = './assets/user/';
		$filename = time();
		$config['upload_path'] = $path;
		$config['file_name'] = $filename;
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);            
		if (!$this->upload->do_upload('excel')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
		}
		if(empty($error)){
			if (!empty($data['upload_data']['file_name'])) {
				$file_name = $data['upload_data']['file_name'];
			} else {
				$file_name = 0;
			}
			$fullpath = $path . $file_name;

			try {
				$inputFileType = PHPExcel_IOFactory::identify($fullpath);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($fullpath);
				$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
				$flag = true;
				$i=0;
				
				foreach ($allDataInSheet as $key => $value) {
					$userdata = [
						'id' => random_string('basic'),
						'name' => $value['A'],
						'username' => $value['B'],
						'password' => password_hash($value['C'], PASSWORD_DEFAULT),
						'created' => date("Y-m-d H:i:s"),
						'id_group' => 3,
						'is_active' => 1
					];	
					$i++;
				}
				unlink($fullpath);
				$result = $this->m_user->insert($userdata);
				if($result = run){

					$this->session->set_flashdata('success', 'Import');
					redirect('user');

				}else{
					
					$this->session->set_flashdata('err', 'Importing');
					redirect('user/add');

				}
			} catch (Exception $e) {
				die('Error loading file "' . pathinfo($fullpath, PATHINFO_BASENAME).'": ' .$e->getMessage());
			}
		}else{
			echo $error['error'];
		}
	}
 	//
	public function get_form()
	{
		force_download('./assets/user/form_user.csv',NULL);
	}
}
