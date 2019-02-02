<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function index()
	{
        $this->session->sess_destroy();
		$this->load->view('admin/login');
    }
    
    public function login()
    {

    }
}
