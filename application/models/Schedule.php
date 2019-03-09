<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Model {

    protected $tableHead = "schedule_head";
    protected $tableDetail = "schedule_detail";

    // public function deleteInsert($data, $id)
    // {
    //     try {
    //         $this->db->trans_begin();

    //         $res = $this->db->delete($this->table, array('schedule_id' => $id));
    //         $db_error = $this->db->error();
    //         if(!$res) throw new Exception();

    //         $res = $this->db->insert_batch($this->table, $data);
    //         $db_error = $this->db->error();
    //         if(!$res) throw new Exception();

    //         $this->db->trans_commit();
    //         $db_error['message'] = 'success insert data';

    //     } catch (Exception $e) {
    //         $this->db->trans_rollback();
    //     }

    //     return $db_error;

    // }

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

            // $this->approveSchedule($dataHead);

            $this->db->trans_commit();
            $db_error['message'] = 'success insert data';
            $db_error['id'] = $dataHead['id'];
            
        } catch (Exception $e) {
            $this->db->trans_rollback();
        }

        return $db_error;
    }

    public function deleteInsert($dataHead, $dataDetail)
    {
        try {
            $this->db->trans_begin();

            $res = $this->db->delete($this->tableHead, array('id' => $dataHead['id']));
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $res = $this->db->insert($this->tableHead, $dataHead);
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $res = $this->db->insert_batch($this->tableDetail, $dataDetail);
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $this->db->trans_commit();
            $db_error['message'] = 'success update data';
            $db_error['id'] = $dataHead['id'];
            
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

    public function all()
    {
        $this->db->select('a.id, a.region_id, b.region_name, a.created_date, c.full_name, a.status');
        $this->db->from('mm_checklist.schedule_head as a');
        $this->db->join('minimart.region as b', 'a.region_id = b.id');
        $this->db->join('minimart.user as c', 'a.created_id = c.id');

        $output = $this->db->get()->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function allByRegionDept()
    {
        $this->db->select('a.id, a.region_id, b.region_name, a.created_date, c.full_name, a.status');
        $this->db->from('mm_checklist.schedule_head as a');
        $this->db->join('minimart.region as b', 'a.region_id = b.id');
        $this->db->join('minimart.user as c', 'a.created_id = c.id');
        $this->db->where('a.region_id', $_SESSION['region_id']);
        $this->db->where('a.dept_id', $_SESSION['dept_id']);

        $output = $this->db->get()->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function schedulePending($user_id)
    {
        $this->db->select('a.id, a.region_id, b.region_name, a.created_date, c.full_name, a.status');
        $this->db->from('mm_checklist.schedule_head as a');
        $this->db->join('minimart.region as b', 'a.region_id = b.id');
        $this->db->join('minimart.user as c', 'a.created_id = c.id');
        $this->db->join('mm_checklist.schedule_app_pending as d', 'a.id = d.schedule_id');
        $this->db->where('d.user_id', $user_id);

        $output = $this->db->get()->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function getScheduleById($id)
    {
        $this->db->select('a.id, a.region_id, b.region_name, a.dept_id, a.month, a.year, a.created_date, c.full_name, a.status');
        $this->db->from('mm_checklist.schedule_head as a');
        $this->db->join('minimart.region as b', 'a.region_id = b.id');
        $this->db->join('minimart.user as c', 'a.created_id = c.id');
        $this->db->where('a.id', $id);

        $output = $this->db->get()->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function getScheduleDetail($id)
    {
        $this->db->select('a.schedule_id, a.store, a.checklist_date');
        $this->db->from('schedule_detail as a');
        $this->db->where('a.schedule_id', $id);

        $output = $this->db->get()->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function approveSchedule($data)
    {
        // $this->db->where('id', $id);
        // $this->db->update($this->tableHead, ['status' => 'approved']);

        // $db_error = $this->db->error();

        // if( $db_error['code'] == 0 ){
        //     $db_error['message'] = 'schedule has been approved';
        // }

        // return $db_error;

        try {
            $this->db->trans_begin();

            // $this->db->where('id', $data['schedule_id']);
            // $res = $this->db->update($this->tableHead, ['status' => 'approved']);
            // $db_error = $this->db->error();
            // if(!$res) throw new Exception();

            $res = $this->db->insert('schedule_app', $data);
            $db_error = $this->db->error();
            if(!$res) throw new Exception();

            $res = $this->db->query('call ins_next_app_sched(' . $data['schedule_id'] . ')');
            $db_error = $this->db->error();
            if(!$res) throw new Exception();


            $this->db->trans_commit();
            if( $db_error['code'] == 0 ){
                $db_error['message'] = 'schedule has been approved';
            }
            
        } catch (Exception $e) {
            $this->db->trans_rollback();
        }

        return $db_error;
    }

    public function isApproved($schedule_id, $user_id)
    {
        $output = $this->db->query("CALL last_level_app($schedule_id, $user_id)")->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function getApproveBy($schedule_id)
    {
        $this->db->select('`schedule_app`.`app_id`, minimart.`user`.`full_name`, minimart.`position`.`position_name`, DATE_FORMAT(`schedule_app`.`app_date`, "%d %M %Y") as appdate');
        $this->db->from('`schedule_app`');
        $this->db->join('minimart.`user`', '`schedule_app`.`app_id` = `minimart`.`user`.`id`');
        $this->db->join('minimart.`position`', 'minimart.`user`.`position_id` = minimart.`position`.`id`');
        $this->db->where('`schedule_app`.`schedule_id`', $schedule_id);
        $output = $this->db->get()->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

}