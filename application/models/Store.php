<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Model {
    private $table = 'store';
    private $primary_key = 'id';

    public function getStoreRegion($store, $region)
    {
        $this->db3 = $this->load->database('mm', TRUE);

        $output = $this->db3
                    ->where('region_id', $region)
                    ->where($this->primary_key, $store)
                    ->get($this->table)->result_array();

        $db_error = $this->db3->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }
}