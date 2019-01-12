<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {

    private $model = 'Category';

    public function __construct()
    {
        parent::__construct();
        $this->load->model($this->model, 'data');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'parent' => 'setting',
            'child' => 'category'
        );

        $this->load->view('admin/category', [
            'data' => $data
        ]);
    }

	public function select()
	{
        $process = $this->data->all();

        echo json_encode($process);   
    }
    
    public function store()
    {
        $data = $this->input->post();

        if($this->validate() == true){
            $process = $this->data->insert($data);
        } else {
            $process = array(
                'code' => 13,
                'message' => $this->form_validation->error_array(),
            );
        }

        echo json_encode($process); 
    }

    public function edit($id)
    {
        $process = $this->data->getItemById($id);

        echo json_encode($process);  
    }

    public function update($id)
    {
        $data = $this->input->post();

        if($this->validate() == true){
            $process = $this->data->update($data, $id);
        } else {
            $process = array(
                'code' => 13,
                'message' => $this->form_validation->error_array(),
            );
        }

        echo json_encode($process);
    }

    public function validate()
    {
        $this->form_validation->set_rules('id', 'Category ID', 'required|numeric');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required');

        return $this->form_validation->run();
    }
}
