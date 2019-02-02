<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends CI_Model {
    private $table = 'region';

    public function getRegion()
    {
        $region = array();
        $output = $this->db->get('region')->result_array();

        $region[''] = '---';
        foreach ($output as $val) {
            $region[$val['id']] = $val['region_name'];
        }

        return $region;
    }
}