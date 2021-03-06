<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Model {

    protected $table = 'item_checklist';
    protected $primary_key = 'id';

    public function all()
    {
        $output = $this->db->get('vw_item')->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function getItemById($id)
    {
        $this->db->where($this->primary_key, $id);
        $output = $this->db
                    ->get($this->table)
                    ->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function getItemByCategory($category_id, $region_id, $dept_id)
    {
        $this->db->where('category_id', $category_id);
        $this->db->where('region_id', $region_id);
        $this->db->where('dept_id', $dept_id);
        $output = $this->db
                    ->get($this->table)
                    ->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);

        $db_error = $this->db->error();

        if( $db_error['code'] == 0 ){
            $db_error['message'] = 'success insert data';
        }

        return $db_error;

    }

    public function update($data, $id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->table, $data);

        $db_error = $this->db->error();

        if( $db_error['code'] == 0 ){
            $db_error['message'] = 'success update data';
        }

        return $db_error;
    }

}