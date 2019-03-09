<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportChecklist extends CI_Model {
    public function all()
    {
        $output = $this->db->query('CALL list_checklist(' . $_SESSION['nik'] . ')')->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function countPerStoreLimit()
    {
        $output = $this->db->query('CALL count_per_store(' . $_SESSION['nik'] . ')')->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function countPerMonthYear()
    {
        $output = $this->db->query('CALL count_per_monthyear(' . $_SESSION['nik'] . ')')->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function countPerItem()
    {
        $output = $this->db->query('CALL count_per_item(' . $_SESSION['region_id'] . ', ' . $_SESSION['dept_id'] . ')')->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }
}