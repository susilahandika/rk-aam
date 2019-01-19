<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    public function getUsers($user, $password)
    {
        $this->db2 = $this->load->database('hris', TRUE);

        $data = $this->db2
                ->select('login_id, password')
                ->where('login_id', $user)
                ->where('password', $password)
                ->get('hr_app_user')->result();

        return $data;
    }

    public function getDept()
    {
        $this->db2 = $this->load->database('hris', TRUE);
        
        $output = $this->db2
                ->select('department_id, department')
                ->where('division_id', '504404639948302485')
                ->get('hr_department')->result();

        $db_error = $this->db2->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function getRegion()
    {
        
        $output = $this->db
                ->get('region')->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }
}