<?php

class Jadwal_model extends CI_Model {

    public function insert_data($data){
        $this->db->insert('jadwal',$data);
    }

    public function edit_data($where,$table){

        return $this->db->get_where($table,$where);
    }
    public function update_data($where,$data,$table){

        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);   
    }
    public $table = 'jadwal';
    public $id = 'id_jadwal';
    public function get_by_id($id){

        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

}