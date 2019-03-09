<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Model {
    public function all()
    {
        $output = $this->db->query('CALL list_checklist(219001287)')->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }
}