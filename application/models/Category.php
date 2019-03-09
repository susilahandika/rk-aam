<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model {

    private $table = 'category';
    private $primary_key = 'id';

    public function all()
    {
        $output = $this->db->get($this->table)->result();

        $db_error = $this->db->error();

        if(!empty($db_error) and $db_error['code'] !=0 ){
            return $db_error;
        } else{
            return $output;
        }
    }

    public function getCategoryByRegion($region_id, $dept_id)
    {
        $this->db->select('a.id, a.category_name');
        $this->db->from($this->table . ' as a');
        $this->db->join('item_checklist as b', 'a.id = b.category_id');
        $this->db->where('a.region_id', $region_id);
        $this->db->where('a.dept_id', $dept_id);
        $this->db->group_by('a.id, a.category_name');
        $output = $this->db->get()->result();

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