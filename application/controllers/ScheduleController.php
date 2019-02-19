<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleController extends CI_Controller {

	private $mindate;
	private $maxdate;
	private $model = 'Schedule';
	private $model2 = 'ScheduleDetail';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('PHPExcel');
		$this->load->model($this->model, 'schedule');
		$this->load->model($this->model2, 'sched_detail');
		$this->load->model('User', 'user');
		$this->load->model('Region', 'region');
	}

	public function index()
	{
		$data = array(
			'parent' => 'schedule',
			'child' => ''
		);
		
		$this->load->view('admin/schedule', [
			'data' => $data,
		]);
	}

	public function select()
	{
		$process = $this->schedule->all();

		$this->_toJson($process);
	}

	public function create()
	{
		$data = array(
			'parent' => 'schedule',
			'child' => ''
		);

		$list_region = $this->user->getRegion();
		$list_dept = $this->user->getDept(1000);

		$list_regions = $this->_setSelectVal(json_decode(json_encode($list_region),true), 'id', 'region_name', 'Region');
		$list_depts = $this->_setSelectVal(json_decode(json_encode($list_dept),true), 'id', 'dept_name', 'Department');

		$options = array(
			'1' => 'Januari',
			'2' => 'Februari',
			'3' => 'Maret',
			'4' => 'April',
			'5' => 'Mei',
			'6' => 'Juni',
			'7' => 'Juli',
			'8' => 'Agustus',
			'9' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		);

		$this->load->view('admin/addschedule', [
			'data' => $data,
			'options' => $options,
			'monthNow' => $this->nextPeriode(date("m")),
			'yearNow' =>date("Y"),
			'list_region' => $list_regions,
			'list_dept' => $list_depts,
		]);
	}

	public function store()
	{
		$data = $this->input->post();

		$dataDetail = $data['detail'];
		unset($data['detail']);
		$dataHead = $data;

		$process = $this->schedule->insert($dataHead, $dataDetail);

		$this->_toJson($process);
	}

	public function edit($id)
	{
		$data = array(
			'parent' => 'schedule',
			'child' => ''
		);

		$schedule = $this->schedule->getScheduleById($id);
		$schedule_detail = $this->schedule->getScheduleDetail($id);
		$list_region = $this->user->getRegion();
		$list_dept = $this->user->getDept($schedule[0]->region_id);

		$list_regions = $this->_setSelectVal(json_decode(json_encode($list_region),true), 'id', 'region_name', '');
		$list_depts = $this->_setSelectVal(json_decode(json_encode($list_dept),true), 'id', 'dept_name', '');

		$options = array(
			'1' => 'Januari',
			'2' => 'Februari',
			'3' => 'Maret',
			'4' => 'April',
			'5' => 'Mei',
			'6' => 'Juni',
			'7' => 'Juli',
			'8' => 'Agustus',
			'9' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		);
		
		$this->load->view('admin/editschedule', [
			'data' => $data,
			'options' => $options,
			'schedule' => $schedule,
			'schedule_detail' => $schedule_detail,
			'list_region' => $list_regions,
			'list_dept' => $list_depts,
		]);
	}
	
	public function update()
	{
		$data = $this->input->post();

		$dataDetail = $data['detail'];
		unset($data['detail']);
		$dataHead = $data;

		$process = $this->schedule->deleteInsert($dataHead, $dataDetail);

		$this->_toJson($process);
	}

	public function approve()
	{
		$data = $this->input->post();

		$process = $this->schedule->approveSchedule($data['id']);

		$this->_toJson($process);
	}

	public function showSchedule()
	{
		$config['upload_path']   = './assets/file/';
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size']      = 100;
		$config['overwrite']     = true;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('schedule_file')){
			$this->_toJson($this->upload->display_errors());
		}else{
			$month = $this->input->post('periode');

			$this->mindate = (new DateTime('2019-' . $month . '-01 00:00:00'))->format('Y-01-d');
			$this->maxdate = (new DateTime('2019-' . $month . '-01 00:00:00'))->format('Y-m-t');

			$this->processFile($this->upload->file_name);
		}
	}

	public function processFile($filename)
	{
		$file = './assets/file/schedule.xlsx';
		$data = array();
		$schedule_id = 1;
		
		$objPHPExcel = PHPExcel_IOFactory::load($file);

		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

		foreach ($cell_collection as $cell) {
			$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
		
			if ($row == 1) { 
				/* Get header excel */
				$header[$row][$column] = $data_value;
			} else {
				/* Get data excel */
				$arr_data[$row-2]['schedule_id'] = $schedule_id;				
				switch ($column) {
					case 'A':
						/* If data in column A, change column name to store */
						$arr_data[$row-2]['store'] = $data_value;
						break;

					case 'B':
						/* If data in column B change column name to checklist_date */
						$arr_data[$row-2]['checklist_date'] = $this->cekDate($data_value);
						break;
					
					default:
						$arr_data[$row-2][$column] = $data_value;
						break;
				}
			}
		}
		
		//send the data in an array format
		// $data['header'] = $header;
		// $data['values'] = $arr_data;

		$process = $this->sched_detail->deleteInsert($arr_data, $schedule_id);

		$this->_toJson($process);
	}

	public function nextPeriode($month)
	{
		if ($month >= 12) {
			return 1;
		} else{
			return ($month + 1);
		}
	}

	public function cekDate($date)
	{
		// $mindate = (new DateTime('2019-01-01 00:00:00'))->format('Y-01-d');
		// $maxdate = (new DateTime('2019-01-01 00:00:00'))->format('Y-m-t');

		if (date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($date)) < $this->mindate OR date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($date)) > $this->maxdate) {
			return 'Date value not in range';
		} else{
			return date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($date));
		}
	}

	public function cekStoreChecklist()
	{
		$data = $this->input->post();

		$process = $this->schedule->getStoreChecklist($data);

		$this->_toJson($process);
	}

	public function _toJson($data)
    {
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT))
            ->_display();

        exit;
	}

	public function _setSelectVal($data, $key, $val, $placeholder)
	{
		$list = array();

		if($placeholder != ''){
			$list[''] = $placeholder;
		}

		foreach ($data as $value) {
			$list[$value[$key]] = $value[$val];
		}

		return $list;
	}
	
}
