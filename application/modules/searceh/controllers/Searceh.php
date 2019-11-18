<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searceh extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->f_construct();

		$controller = 'searceh';

		if($this->session->userdata('controller') != $controller){
			$this->session->unset_userdata('keyword');
			// $this->session->unset_userdata('order');
			// $this->session->unset_userdata('per_page');
			$this->session->set_userdata(array('controller' => $controller));
		}
		$this->id_group = $this->session->userdata('id_group');
		$this->access = $this->m_permission->get_permission($this->id_group, $controller);

	}
	//end fun

	public function index()
	{
		$data['about'] = $this->m_about->about();
		$data['ann'] = $this->m_announcement->get_all();
		$data['ann_tot'] = $this->m_announcement->get_tot();

		$this->load->view('index',$data);
	}
	
	public function coba()
	{
		$this->load->view('coba');

	}


	public function livesrc()
	{
		$output = '';
		$this->load->model('m_searceh');
		if($this->input->get('keyword') != null)
		{
			$keyword = $this->input->get('keyword');
		}else{
			die();
		}
		$data = $this->m_searceh->searceh($keyword);
		$output .= '<div class="table-responsive table-responsive-lg">
		<table class="table table-bordered table-striped table-condensed">
		<thead>
		<tr>
		<th class="text-center" width="10">No</th>
		<th class="text-center" >Full Name</th>
		<th class="text-center" width="150">Class</th>
		<th class="text-center" width="150">Period</th>
		<th class="text-center" width="50">Ijazah</th>
		</tr>
		</thead>
		<tbody>
		';
		if($data->num_rows() > 0)
		{
			$no = 1;
			foreach($data->result() as $row)
			{
				$output .= '
				<tr>
				<td class="text-center">'.$no++.'</td>
				<td>'.$row->name.'</td>
				<td class="text-center">'.$row->c.'</td>
				<td class="text-center">'.$row->y.'</td>
				<td class="text-center">';
				if ($row->ijasah != "" && $this->session->userdata('username') == $row->nis) {
					$output .=	'<a href="'.base_url("assets/ijazah/").$row->ijasah.'" target="_blank">
					<i class="fa fa fa-download btn btn-sm text-info"></i>
					</a>';	
				}
				if ($row->ijasah != "" && $this->session->userdata('id_group') != 3 && $this->session->userdata('status') == 'logined') {
					$output .=	'<a href="'.base_url("assets/ijazah/").$row->ijasah.'" target="_blank">
					<i class="fa fa fa-download btn btn-sm text-info"></i>
					</a>';	
				}
				'</td>
				</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
			<td colspan="99" class="text-center">Data not found!</td>
			</tr>';
		}
		$output .= '
		</tbody>
		</table></div>';
		echo $output;
	}
}
