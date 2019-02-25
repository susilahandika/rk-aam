<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemController extends CI_Controller {

    private $model = 'Item';

    public function __construct()
    {
        parent::__construct();
        $this->load->model($this->model, 'data');
        $this->load->model('User', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'parent' => 'setting',
            'child' => 'item',
            'notif' => $this->user->getCountPendingApp($_SESSION['nik']),
        );

        $this->load->view('admin/item', [
            'data' => $data
        ]);
    }

	public function select()
	{
        $process = $this->data->all();

        $this->_toJson($process);   
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

        $this->_toJson($process);  
    }

    public function edit($id)
    {
        $process = $this->data->getItemById($id);

        $this->_toJson($process);  
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

        $this->_toJson($process);  
    }

    public function validate()
    {
        $this->form_validation->set_rules('id', 'Item ID', 'required|numeric');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('category_id', 'Category ID', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('order', 'Order', 'required');

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
