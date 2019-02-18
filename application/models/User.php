<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    private $tbl_user = 'user';
    private $primary_key = 'id';

    public function all()
    {
        $this->db3 = $this->load->database('mm', TRUE);

        $output = $this->db3->get('view_select_user')->result();

        $db_error = $this->db3->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function getUsers($user, $password)
    {
        $this->db2 = $this->load->database('hris', TRUE);
        $this->db3 = $this->load->database('mm', TRUE);

        $data = $this->db2
                ->select('login_id, password, full_name')
                ->where('login_id', $user)
                ->where('password', $password)
                ->get('hr_app_user')->result();

        return $data;
    }

    public function getUsersHris($nik)
    {
        $this->db2 = $this->load->database('hris', TRUE);

        $output = $this->db2
                ->select('login_id, full_name')
                ->where('login_id', $nik)
                ->get('hr_app_user')->result();

        $db_error = $this->db2->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }

        return $output;
    }

    public function getUsersMinimart($nik)
    {
        $this->db3 = $this->load->database('mm', TRUE);

        $data = $this->db3
                ->select('*')
                ->where('id', $nik)
                ->get('view_select_user')->result();

        return $data;
    }

    public function getUsersMenu($nik)
    {
        $data = $this->db
                ->select('user_id, menu_id')
                ->where('user_id', $nik)
                ->get('user_menu')->result();

        return $data;
    }

    public function getDept($region_id)
    {
        $this->db3 = $this->load->database('mm', TRUE);
        
        $output = $this->db3
                ->select('id, dept_name')
                ->where('region_id', $region_id)
                ->get('department')->result();

        $db_error = $this->db3->error();

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

    public function getPosition()
    {
        $this->db3 = $this->load->database('mm', TRUE);
        
        $output = $this->db3
                ->get('position')->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function getStore()
    {
        $this->db = $this->load->database('mm', TRUE);
        $output = $this->db
                ->get('store')->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function getStoreByRegion($region_id)
    {
        $this->db = $this->load->database('mm', TRUE);

        $this->db->where('region_id', $region_id);
        $output = $this->db
                ->get('store')->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function insert($data)
    {
        $this->db3 = $this->load->database('mm', TRUE);
        $this->db3->insert($this->tbl_user, $data);

        $db_error = $this->db3->error();

        if( $db_error['code'] == 0 ){
            $db_error['message'] = 'success insert data';
        }

        return $db_error;

    }

    public function update($data, $id)
    {
        $this->db3 = $this->load->database('mm', TRUE);
        $this->db3->where($this->primary_key, $id);
        $this->db3->update($this->tbl_user, $data);

        $db_error = $this->db3->error();

        if( $db_error['code'] == 0 ){
            $db_error['message'] = 'success update data';
        }

        return $db_error;
    }
}