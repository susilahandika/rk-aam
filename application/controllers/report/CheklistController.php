<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChecklistController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('report/Checklist', 'reportchecklist');
    }

    public function checklistAmm()
    {
        $process = $this->data->all();

        print_r($process);
    }
}