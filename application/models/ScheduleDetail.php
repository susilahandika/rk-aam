<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleDetail extends CI_Model {

    protected $table = "schedule_detail";

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

}