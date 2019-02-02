<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcelController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('PHPExcel');
	}

	public function index()
	{
		$file = './assets/file/schedule.xlsx';
		
		$objPHPExcel = PHPExcel_IOFactory::load($file);

		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

		foreach ($cell_collection as $cell) {
			$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
		
			if ($row == 1) {
				$header[$row][$column] = $data_value;
			} else {
				if($column == 'C'){
					$arr_data[$row][$column] = $this->cekDate($data_value);
				} else{
					$arr_data[$row][$column] = $data_value;
				}
			}
		}
		
		//send the data in an array format
		$data['header'] = $header;
		$data['values'] = $arr_data;

		$this->_toJson($data);

	}

	public function cekDate($date)
	{
		$mindate = (new DateTime('2019-01-01 00:00:00'))->format('Y-01-d');
		$maxdate = (new DateTime('2019-01-01 00:00:00'))->format('Y-m-t');

		if (date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($date)) < $mindate OR date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($date)) > $maxdate) {
			return 'Date value not in range';
		} else{
			return date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($date));
		}
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
}
