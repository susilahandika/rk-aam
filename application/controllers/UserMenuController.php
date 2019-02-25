<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserMenuController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('UserMenu', 'usermenu');
        $this->load->library('form_validation');
        $this->load->model('User', 'user');
        if (!$this->session->logged_in) {
			header('Location:' . base_url());
		}
    }

    public function index()
	{
        $data = array(
			'parent' => 'setting',
            'child' => 'user_menu',
            'notif' => $this->user->getCountPendingApp($_SESSION['nik']),
		);
        $this->load->view('admin/usermenu', [
            'data' => $data,
        ]);
    }
}