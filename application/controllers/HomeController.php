<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User', 'user');
		if (!$this->session->logged_in) {
			header('Location:' . base_url());
		}
	}

	public function index()
	{

		$data = array(
			'parent' => 'home',
			'child' => '',
			'notif' => $this->user->getCountPendingApp($_SESSION['nik']),
		);

		$this->load->view('admin/home', [
			'data' => $data
		]);
	}
}
