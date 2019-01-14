<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index()
	{
		$data = array(
			'parent' => 'home',
			'child' => ''
		);
		
		$this->load->view('admin/home', [
			'data' => $data
		]);
	}
}
