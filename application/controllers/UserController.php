<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User', 'user');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $this->session->sess_destroy();
        $this->load->view('admin/login');
    }

    public function loginChecklist()
    {
        $this->session->sess_destroy();
        $this->load->view('checklist/login');
    }
    
    public function auth()
    {
        $userid = $this->input->post('userid');
        $password = $this->input->post('password');

        $users = $this->user->getUsers($userid, $password);
        $users_mm = $this->user->getUsersMinimart($userid);
        $users_menu = $this->user->getUsersMenu($userid);

        if (!empty($users)) {
            if(!empty($users_mm)){
                $newdata = array(
                            'nik' => $users[0]->login_id,
                            'username' => $users[0]->full_name,
                            'region_id' => $users_mm[0]->region_id,
                            'dept_id' => $users_mm[0]->dept_id,
                            'menu' => $users_menu[0]->menu_id,
                            'logged_in' => TRUE
                        );

                $this->session->set_userdata($newdata);
                redirect('home');
            }else{
                $this->session->set_flashdata('error_login', '<strong>Login failed!</strong> User not registered');
                redirect('login/checklist');
            }
        }else{
            $this->session->set_flashdata('error_login', '<strong>Login failed!</strong> Pleace check your user ID and password');
            redirect(base_url());
        }
    }

    public function authChecklist()
    {
        $userid = $this->input->post('userid');
        $password = $this->input->post('password');

        $users = $this->user->getUsers($userid, $password);
        $users_mm = $this->user->getUsersMinimart($userid);

        if (!empty($users)) {
            if(!empty($users_mm)){
                $newdata = array(
                            'nik' => $users[0]->login_id,
                            'username' => $users[0]->full_name,
                            'region_id' => $users_mm[0]->region_id,
                            'dept_id' => $users_mm[0]->dept_id,
                            'logged_in' => TRUE
                        );

                $this->session->set_userdata($newdata);
                redirect('checklist');
            }else{
                $this->session->set_flashdata('error_login', '<strong>Login failed!</strong> User not registered');
                redirect('login/checklist');
            }
        }else{
            $this->session->set_flashdata('error_login', '<strong>Login failed!</strong> Pleace check your user ID and password');
            redirect('login/checklist');
        }
    }

    public function userList()
    {
         $data = array(
            'parent' => 'setting',
            'child' => 'user'
        );

        $this->load->view('admin/user', [
            'data' => $data
        ]);
    }

    public function select()
    {
        $process = $this->user->all();

        $this->_toJson($process);
    }

    public function store()
    {
        $data = $this->input->post();

        if($this->validate() == true){
            $process = $this->user->insert($data);
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
        // $process = $this->data->getItemById($id);

        // $this->_toJson($process);
    }

    public function update($id)
    {
        $data = $this->input->post();

        if($this->validate() == true){
            $process = $this->user->update($data, $id);
        } else {
            $process = array(
                'code' => 13,
                'message' => $this->form_validation->error_array(),
            );
        }

        $this->_toJson($process);
    }

    public function listDept()
    {   
        // $data = $this->input->post();

        $process = $this->user->getDept('1000');

        $this->_toJson($process);   
    }

    public function listRegion()
    {   
        $process = $this->user->getRegion();

        $this->_toJson($process);   
    }

    public function listPosition()
    {   
        $process = $this->user->getPosition();

        $this->_toJson($process);   
    }

    public function listStore()
    {   
        $process = $this->user->getStore();

        $this->_toJson($process);   
    }

    public function userHrisByNik()
    {
        $data = $this->input->post();

        $process = $this->user->getUsersHris($data['id']);

        $this->_toJson($process); 
    }

    public function validate()
    {
        $this->form_validation->set_rules('id', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('region_id', 'Region', 'required');
        $this->form_validation->set_rules('dept_id', 'Department', 'required');
        $this->form_validation->set_rules('position_id', 'Position', 'required');

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
