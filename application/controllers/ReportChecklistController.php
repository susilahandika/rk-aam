<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportChecklistController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ReportChecklist', 'reportchecklist');
        $this->load->model('User', 'user');
    }

    public function index()
    {
        $data = array(
            'parent' => 'report',
            'child' => 'rchecklist',
            'notif' => $this->user->getCountPendingApp($_SESSION['nik']),
        );

        $this->load->view('admin/reportchecklist', [
            'data' => $data
        ]);
    }

    public function checklistAmm()
    {
        $process = $this->reportchecklist->all();

        $this->_toJson($process);
    }

    public function countPerStoreLimit()
    {
        $process = $this->reportchecklist->countPerStoreLimit();

        $this->_toJson($process);
    }

    public function countPerMonthYear()
    {
        $process = $this->reportchecklist->countPerMonthYear();

        $this->_toJson($process);
    }

    public function countPerItem()
    {
        $process = $this->reportchecklist->countPerItem();

        $this->_toJson($process);
    }

    public function validate()
    {
        $this->form_validation->set_rules('id', 'Category ID', 'required|numeric');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required');

        return $this->form_validation->run();
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