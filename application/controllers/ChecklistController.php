<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChecklistController extends CI_Controller {
    private $model_item = 'Item';
    private $model_category = 'Category';

    public function __construct()
    {
        parent::__construct();
        $this->load->model($this->model_item, 'item');
        $this->load->model($this->model_category, 'category');
        date_default_timezone_set("Asia/Makassar");
    }

    public function index()
    {
        echo "test";
    }

    public function checklistCategory($region_id)
    {
        $process = $this->category->getCategoryByRegion($region_id);

        $this->load->view('checklist/checklist', [
            'data' => $process,
            'region' => $region_id,
            'controller' => $this,
            'checklist_date' => date("Y-m-d H:i:s"),
        ]);
    }

    public function checklistItem($category_id, $region_id)
    {   
        $process = $this->item->getItemByCategory($category_id, $region_id);

        $this->load->view('checklist/checklistDetail', [
            'data' => $process
        ]);
    }

    public function store(){
        $data = $this->input->post();
        $data_save = array();

        for ($i=0; $i < count($data['choice']); $i++) { 
            $data_checklist = array(
                'item_id' => array_keys($data['choice'])[$i],
                'choice' => $data['choice'][array_keys($data['choice'])[$i]],
                'information' => $data['txt_info'][array_keys($data['choice'])[$i]],
                'img' => $_FILES['img_checklist']['name'][array_keys($data['choice'])[$i]],
            );

            $data_save[] = $data_checklist;
        }

        echo "<pre>";
        print_r($data_save);
        echo "</pre>";
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