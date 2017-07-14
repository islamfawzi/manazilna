<?php

class Slider_mod extends CI_Model{

    function add_slider($data){
        $this->db->insert('slider', $data);
        if($this->db->affected_rows()){
            return true;
        } else{
            return false;
        }
    }

    function get_all_slider($x = null){
        if ($x == 1){

            $where = " WHERE active = 1 " ;
        }
        $q = "SELECT * FROM slider ".$where." ORDER BY id DESC";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return 0;
        }
    }

    function get_item_slider($id){
        $q = "SELECT * FROM slider WHERE id = ".$id." LIMIT 1";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->first_row('array');
        }else{
            return 0;
        }
    }

    function update_slider($data,$id){
        $this->db->where('id', $id);
        $this->db->update('slider', $data);
        if($this->db->affected_rows()){
            return true;
        } else{
            return false;
        }
    }

    function del_slider($id){
        $img = $this->get_item_slider($id);
        if(file_exists($img['image'])){
            @unlink($img['image']);
        }
        $this->db->where('id', $id);
        $this->db->delete('slider');
        if($this->db->affected_rows() > 0){
            return true;
        } else{
            return false;
        }
    }
}
