<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Model {
    private $table_head = 'checklist_head';
    private $table_detail = 'checklist_detail';

    public function insert($data)
    {
        try {
            $this->db->trans_begin();

            $res = $this->db->insert($this->table_head, $data['head']);
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $res = $this->db->insert_batch($this->table_detail, $data['detail']);
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $this->db->trans_commit();
            $db_error['message'] = 'success insert data';
            
        } catch (Exception $e) {
            $this->db->trans_rollback();
        }

        return $db_error;
    }

    public function getChecklistStore($data)
    {
        $this->db->from($this->table_head);
        $this->db->where('region_id', $data['region_id']);
        $this->db->where('dept_id', $data['dept_id']);
        $this->db->where('store', $data['store_id']);
        $this->db->where('year', $data['year']);
        $this->db->where('month', $data['month']);

        $output = $this->db->get()->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }
}