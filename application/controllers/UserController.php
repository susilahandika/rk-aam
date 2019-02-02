<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

	public function index()
	{
        $this->load->view('admin/login');
    }
    
    public function auth()
    {
        $userid = $this->input->post('userid');
        $password = $this->input->post('password');

        $users = $this->User->getUsers($userid, $password);
        
        if (!empty($users)) {
            $newdata = array(
                        'nik' => $users[0]->login_id,
                        'username' => $users[0]->full_name,
                        'logged_in' => TRUE
                    );

            $this->session->set_userdata($newdata);
            redirect('home');
        }else{
            $this->session->set_flashdata('error_login', '<strong>Login failed!</strong> Pleace check your user ID and password');
            redirect(base_url());
        }
    }

    public function listDept()
    {   
        $process = $this->User->getDept();

        $this->_toJson($process);   
    }

    public function listRegion()
    {   
        $process = $this->User->getRegion();

        $this->_toJson($process);   
    }

    public function listStore()
    {   
        $process = $this->User->getStore();

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
}
