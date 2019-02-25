<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matriksapp extends CI_Model {
    protected $tableHead = 'matriks_app_head';
    protected $tableDetail = 'matriks_app_detail';
    protected $primary_key = 'id';

    public function selectMatriks($data)
    {
        $this->db->select('*');
        $this->db->from($this->tableHead . ' as a');
        $this->db->join($this->tableDetail . ' as b', 'a.id = b.matriks_id');
        $this->db->where('a.region_id', $data['region_id']);
        $this->db->where('a.dept_id', $data['dept_id']);

        $output = $this->db->get()->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }

    }

    public function insert($data)
    {
        try {
            $this->db->trans_begin();

            $res = $this->db->delete($this->tableHead, array('id' => $data['head']['id']));
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $res = $this->db->insert($this->tableHead, $data['head']);
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $res = $this->db->insert_batch($this->tableDetail, $data['detail']);
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $this->db->trans_commit();
            $db_error['message'] = 'success update data';

        } catch (Exception $e) {
            $this->db->trans_rollback();
        }

        return $db_error;
    }
}