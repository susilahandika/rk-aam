<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $process = $this->Item->all();

        echo json_encode($process);   
    }
    
    public function store()
    {
        $data = $this->input->post();

        if($this->validate() == true){
            $process = $this->Item->insert($data);
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
        $process = $this->Item->getItemById($id);

        echo json_encode($process);  
    }

    public function update($id)
    {
        $data = $this->input->post();

        if($this->validate() == true){
            $process = $this->Item->update($data, $id);
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
        $this->form_validation->set_rules('id', 'Item ID', 'required|numeric');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('category_id', 'Category ID', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('order', 'Order', 'required');

        return $this->form_validation->run();
    }
}
