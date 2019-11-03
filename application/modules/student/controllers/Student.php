<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

  public function __construct()
  {
   parent::__construct();
   $this->f_construct();
   $this->load->helper('string');
   $controller = 'student';

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
  }else{
    $data ['keyword'] = $this->session->userdata('keyword')	;
  }

  $where   = [
    'class'  => $this->session->userdata('by_class'),
    'period' =>$this->session->userdata('by_period')
  ];

  $data['title']   = "Student";
  $data['sub']     = "Student List";
  $data['class']   = $this->m_class->get_class();
  $data['year']    = $this->m_year->get_period();
  $data['student'] = $this->m_student->student($where, $data['keyword']);
  $data['total']   = $this->db->count_all_results();
 		// var_dump($data['student']); die();
  $this->render('index', $data);
}
	//end fun

public function cls()
{
  if ($this->input->get('cls') == "") {
    $data = $this->session->userdata('by_class');
    $this->session->set_userdata('by_class', $data);
  }else{
    $data = $this->input->get('cls');
    $this->session->set_userdata('by_class', $data);
  }
  $this->index();
}

public function per()
{
  if ($this->input->get('per') == "") {
    $data = $this->session->userdata('by_period');
    $this->session->set_userdata('by_period', $data);
  }else{
    $data = $this->input->get('per');
    $this->session->set_userdata('by_period', $data);
  }
  $this->index();
}

public function reset()
{

  $this->session->unset_userdata('keyword');
  $this->session->unset_userdata('controller');
  redirect('student');
}
	// end fun
public function add()
{
  $data['title'] = "Student";
  $data['sub'] = "Student Add";
  $data['class'] = $this->m_class->get_class();
  $data['year'] = $this->m_year->get_period();
  $this->render('add', $data);
}
	// end fun

public function insert()
{
  if ($this->access->_create == 0) {
    $this->session->set_flashdata('cus', 'You do not have access to add this data !');
    redirect('classs');
  }
    //
  $this->form_validation->set_rules('name','Name','required');
  $this->form_validation->set_rules('nis','NIS','required');

  if ($this->form_validation->run() == false)
  {
    $this->session->set_flashdata('err', 'Creating');
    redirect ('student');

  }else{
    $userdata = [
      'id' 			  => random_string('basic'),
      'nis' 			=> $this->input->post('nis'),
      'name' 			=> $this->input->post('name'),
      'tgl_lahir' => $this->input->post('tgl_lahir'),
      'class' 		=> $this->input->post('class'),
      'period' 		=> $this->input->post('period'),
      'ijasah' 		=> $this->do_upload(),
      'created_by'=> $this->session->userdata('name'),
    ];

    $this->m_student->insert($userdata);
    $this->session->set_flashdata('success', 'Create');
    redirect ('student');
  }
}
	//end fun
public function delet($id)
{
  if ($this->access->_delet == 0) {
    $this->session->set_flashdata('cus', 'You do not have access to delete this data !');
    redirect('classs');
  }
  $data = ['id' => $id];
  $target = $this->m_student->id($id);
  unlink("./assets/ijazah/$target->ijasah");
  $this->m_student->delet($data);
  $this->session->set_flashdata('success', 'Delete');
  redirect('student');
}
	//end fun

public function update($id = false)
{
  $data['title']   = "Student";
  $data['sub']     = "Update Student";
  $data['student'] = $this->m_student->id($id);
  $data['class']   = $this->m_class->get_class();
  $data['year']    = $this->m_year->get_period();

  if ($data['student'] == null) {
    redirect('student');
  }

  $this->render('update', $data);
}
	//end fun

public function edit()
{
  $id = $this->input->post('id');
  $data = [
    'nis'           => $this->input->post('nis'),
    'name'          => $this->input->post('name'),
    'tgl_lahir'     => $this->input->post('tgl_lahir'),
    'class'         => $this->input->post('class'),
    'period'        => $this->input->post('period'),
    'ijasah'        => $this->do_upload(),
    'updated_by'    => $this->session->userdata('name'),
  ];

  $this->m_student->edit($id, $data);
  $this->session->set_flashdata('success', 'Update');
  redirect('student');
}
	//end fun


public function export()
{
    // create file name
  $fileName = 'data-'.time().'.xlsx';  
    // load excel library
  $this->load->library('excel');
    //get data
  $where   = [
    'class'  => $this->session->userdata('by_class'),
    'period' =>$this->session->userdata('by_period')
  ];
  $id = $this->session->userdata('by_class');
  if ($id == "") {
    $this->session->set_flashdata('cus', 'Enter Class and Period to Export');
    redirect('student');
  }
  $user = $this->m_student->student($where);
  $class = $this->m_class->id($id);

    //excelconfig
  $objPHPExcel = new PHPExcel();
  $objPHPExcel->setActiveSheetIndex(0);
    // set Header
  $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'No');
  $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'NIS');
  $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Full Name');
  $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Class');
  $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Period');
  $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Ijazah');
    // set Row
  $no = 1;
  $rowCount = 2;
  foreach ($user as $list) {
    $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $no++);
    $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->nis);
    $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->name);
    $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->c);
    $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->y);
    $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, base_url("/assets/ijazah/$list->ijasah"));
    $rowCount++;
  }
  $filename = $class->name.' '. date("Y-m-d-H-i-s").".xlsx";
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
  header('Content-Disposition: attachment;filename="'.$filename.'"');
  header('Cache-Control: max-age=0'); 
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
  $objWriter->save('php://output'); 
}


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
  }else{
    $data = array('upload_data' => $this->upload->data());
  }

  if(empty($error)){

    if (!empty($data['upload_data']['file_name'])){
      $file_name = $data['upload_data']['file_name'];
    }else{
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
          'id' => random_string('basic').time(),
          'nis' => $value['A'],
          'name' => $value['B'],
          'tgl_lahir' => $value['C'],
          'class' => $this->input->post('class'),
          'period' => $this->input->post('period'),
          'created_by' => $this->session->userdata('name')
        ];
        $i++;
        $result = $this->m_student->insert($userdata);
      }
      unlink($fullpath);
      if(!$result){

        $this->session->set_flashdata('success', 'Import');
        redirect('student');

      }else{

        $this->session->set_flashdata('err', 'Importing');
        redirect('student/add');

      }
    }
    catch(Exception $e){
      die('Error loading file "' . pathinfo($fullpath, PATHINFO_BASENAME).'": ' .$e->getMessage());
    }

  }else{
    echo $error['error'];
  }
}

public function get_form()
{
  force_download('./assets/user/form_student.xlsx',NULL);
}


function do_upload() {
  $this->load->library('upload');
    //
  $src_file_name = 'ijasah';
    //
  $config['file_name']     = $this->input->post('name').date('dd/mm/yyyy');
  $config['upload_path']   = 'assets/ijazah/';
  $config['allowed_types'] = 'pdf';
  $config['max_size']      = 1024;
    //
  $this->upload->initialize($config);
  if(!empty($src_file_name)){
    if ($this->upload->do_upload($src_file_name)){
      $gbr = array('upload_data' => $this->upload->data()); 
        //
      $file_nm = $gbr['upload_data']['file_name'];
        //
      $result = $file_nm;
      $lspdf = $this->input->post('last-pdf');
      if ($lspdf != "") {
        unlink("./assets/ijazah/$lspdf");
      }
    }else{
      $result = $this->input->post('last-pdf');
    }
      //
    return $result;
  }   
}
}
