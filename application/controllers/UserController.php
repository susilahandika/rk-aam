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
        $users = $this->User->getUsers();
        
        echo "<pre>";
        print_r($users);
        echo "</pre>";
	}
}
