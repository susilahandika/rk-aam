<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Model {

    protected $tableHead = "schedule_head";
    protected $tableDetail = "schedule_detail";

    public function deleteInsert($data, $id)
    {
        try {
            $this->db->trans_begin();

            $res = $this->db->delete($this->table, array('schedule_id' => $id));
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $res = $this->db->insert_batch($this->table, $data);
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $this->db->trans_commit();
            $db_error['message'] = 'success insert data';

        } catch (Exception $e) {
            $this->db->trans_rollback();
        }

        return $db_error;

    }

    public function insert($dataHead, $dataDetail)
    {
        try {
            $this->db->trans_begin();

            $res = $this->db->insert($this->tableHead, $dataHead);
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $res = $this->db->insert_batch($this->tableDetail, $dataDetail);
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $this->db->trans_commit();
            $db_error['message'] = 'success insert data';
            
        } catch (Exception $e) {
            $this->db->trans_rollback();
        }

        return $db_error;
    }

    public function getStoreChecklist($data)
    {
        $data_in = array('active', 'input');
    
        $this->db->select('a.`region_id`, a.`dept_id`, a.`month`, a.`year`, b.`store`, b.`checklist_date`');
        $this->db->from($this->tableHead . ' as a');
        $this->db->join($this->tableDetail . ' as b', 'a.id = b.schedule_id');
        $this->db->where_in('a.status', $data_in);
        $this->db->where('a.region_id', $data['region_id']);
        $this->db->where('a.dept_id', $data['dept_id']);
        $this->db->where('a.month', $data['month']);
        $this->db->where('a.year', $data['year']);
        $this->db->where('b.store', $data['store']);

        $output = $this->db->get()->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

}