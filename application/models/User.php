<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {


    public function getUsers()
    {
        $this->db2 = $this->load->database('hris', TRUE);

        $data = $this->db2
                ->select('login_id, password')
                ->where('login_id', 219001287)
                ->get('hr_app_user')->result();

        return $data;
    }
}