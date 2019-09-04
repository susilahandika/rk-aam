<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChecklistController extends CI_Controller {
    private $model_item = 'Item';
    private $model_category = 'Category';
    private $model_store = 'Store';
    private $model_checklist = 'Checklist';
    private $img_name = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->model($this->model_item, 'item');
        $this->load->model($this->model_category, 'category');
        $this->load->model($this->model_store, 'store');
        $this->load->model($this->model_checklist, 'checklist');
        date_default_timezone_set("Asia/Makassar");
        $this->load->library('upload');
        $this->load->library('form_validation');

        if (!$_SESSION['logged_in']) {
			header('Location:' . base_url() . 'login/checklist');
		}
    }

    public function index()
    {
        $this->load->view('checklist/home');
    }

    public function checklistDone()
    {
        $this->load->view('checklist/checklistdone');
    }

    public function startChecklist()
    {
        $data = $this->input->post();
        $data['year'] = date('Y');
        $data['month'] = date('m');
        $data['date'] = date('Y-m-d');

        if($this->isStoreRegion($data['store_id'], $data['region_id']) == false){
            $process['error'] = 13;
            $process['message'] = array(
                                    'error' => 'Store is not in region'
                                );
            $process['url'] = base_url() . 'checklist';
        } elseif($this->isAlreadyChecklist($data)){
            $process['error'] = 13;
            $process['message'] = array(
                                    'error' => 'Store is already checklist'
                                );
            $process['url'] = base_url() . 'checklist';           
        } elseif($this->isOnShcedule($data)==false){
            $process['error'] = 13;
            $process['message'] = array(
                                    'error' => 'Store is not on schedule'
                                );
        } else{
            $process['error'] = 0;
            $process['url'] = base_url() . 'checklist/' . $data['region_id'] . '/' . $data['store_id'];
        }

        $this->_toJson($process);
    }

    public function checklistCategory($region_id, $store_id)
    {
        $process = $this->category->getCategoryByRegion($region_id, $_SESSION['dept_id']);

        $this->load->view('checklist/checklist', [
            'data' => $process,
            'region' => $region_id,
            'store' => $store_id,
            'controller' => $this,
            'checklist_date' => date("Y-m-d H:i:s"),
        ]);
    }

    public function checklistItem($category_id, $region_id)
    {   
        $process = $this->item->getItemByCategory($category_id, $region_id, $_SESSION['dept_id']);

        $this->load->view('checklist/checklistDetail', [
            'data' => $process
        ]);
    }

    public function store(){
        $data = $this->input->post();
        $data_save = array();

        $checklist_date = new DateTime($data['checklist_date']);

        $id = $checklist_date->format('Y') . 
              $checklist_date->format('m') . 
              $data['hdn_region'] . 
              (($data['hdn_dept'] < 10) ? '0' . $data['hdn_dept'] : $data['hdn_dept']) . 
              $data['store'] . 
              substr($data['hdn_id'], 4);

        $checklist['head'] = array(
            'id' => $id,
            'checklist_date' => $data['checklist_date'],
            'checklist_id' =>$data['hdn_id'],
            'region_id' => $data['hdn_region'],
            'dept_id' => $data['hdn_dept'],
            'store' => $data['store'],
            'year' => $checklist_date->format('Y'),
            'month' => $checklist_date->format('m'),
            'status' => 'checked'
        );

        for ($i=0; $i < count($data['choice']); $i++) { 
            $this->img_name = '';
            $this->uploadImage('img_checklist' . array_keys($data['choice'])[$i]);

            $data_checklist = array(
                'checklist_id' => $id,
                'item_id' => array_keys($data['choice'])[$i],
                'choice' => $data['choice'][array_keys($data['choice'])[$i]],
                'information' => $data['txt_info'][array_keys($data['choice'])[$i]],
                'img' => $this->img_name,
            );

            $checklist['detail'][] = $data_checklist;
        }

        $process = $this->checklist->insert($checklist);

        // echo "<pre>";
        // print_r($process);
        // echo "</pre>";

        $this->_toJson($process);
    }

    public function uploadImage($img_name)
    {
        $status = false;
        $this->load->library('upload');
        $config['upload_path'] = './assets/public/images'; //path folder
        $config['allowed_types'] = 'jpg|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);

        if(!empty($_FILES[$img_name]['name'])){
            if ($this->upload->do_upload($img_name)){

                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] ='gd2';
                $config['source_image'] = $gbr['full_path'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 600;
                $config['height'] = 400;
                $config['new_image'] = $gbr['full_path'];

                $this->load->library('image_lib');
                
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
                $this->img_name = $gambar;
            }else{
                echo $this->upload->display_errors();
            }
                      
        }else{
            // echo "Image yang diupload kosong";
        }
    }

    public function isStoreRegion($store, $region){
        $process = $this->store->getStoreRegion($store, $region);
        $output = false;

        if(count($process) > 0){
            $output = true;
        }

        return $output;
    }   

    public function isAlreadyChecklist($data)
    {
        $process = $this->checklist->getChecklistStore($data);
        $output = true;

        if(count($process) == 0){
            $output = false;
        }

        return $output;
        
    }

    public function isOnShcedule($data)
    {
        $process = $this->checklist->getChecklistShedule($data);
        $output = false;

        if($process[0]->output > 0){
            $output = true;
        }

        return $output;
    }

    public function validate()
    {
        $this->form_validation->set_rules('region_id', 'Region', 'required');
        $this->form_validation->set_rules('store_id', 'Store', 'required');

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