<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MatriksappController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Matriksapp', 'matriksapp');
        $this->load->model('User', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
         $data = array(
            'parent' => 'setting',
            'child' => 'matriks_app',
            'notif' => $this->user->getCountPendingApp($_SESSION['nik']),
        );

        $this->load->view('admin/matriksapp', [
            'data' => $data
        ]);
    }

    public function getMatriks()
    {
        $data = $this->input->post();
        $matriks_group = array();
        $output = array();

        $process = $this->matriksapp->selectMatriks($data);

        $matriks = json_decode(json_encode($process), true);

        foreach ($matriks as $value) {
            $matriks_group[$value['level_app']][] = $value['user_id'];
        }

        $this->_toJson($matriks_group);
    }

    public function store()
    {
        $data = $this->input->post();
        $detail = array();
        $matriks_id = $data['region_id'] . $data['dept_id'];

        $head = array(
            'id' => $matriks_id,
            'region_id' => $data['region_id'],
            'dept_id' => $data['dept_id'],
            'count_app' => count($data['select_form']),
        );

        foreach ($data['select_form'] as $key => $value) {
            foreach ($value as $i => $v) {
                $dtl = array(
                    'matriks_id' => $matriks_id,
                    'user_id' => $v,
                    'level_app' => ($key + 1)
                );

                $detail[] = $dtl;
            }
        }

        $data_matriks = array(
            'head' => $head,
            'detail' => $detail
        );

        $process = $this->matriksapp->insert($data_matriks);

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