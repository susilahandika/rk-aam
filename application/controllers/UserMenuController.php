<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserMenuController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('UserMenu', 'usermenu');
        $this->load->library('form_validation');
        if (!$this->session->logged_in) {
			header('Location:' . base_url());
		}
    }

    public function index()
	{
        $data = array(
			'parent' => 'setting',
			'child' => 'user_menu'
		);
        $this->load->view('admin/usermenu', [
            'data' => $data,
        ]);
    }
}