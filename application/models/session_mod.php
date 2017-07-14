<?php

class Session_mod extends CI_Model{
    
    function set_session($id,$value){
        $data = array('id'=>$id,
                      'value'=>$value);
        if($this->get_session($id) != 0){
            $this->update_session($id,$data);
        }else{
            $this->db->insert('session',$data);    
        }
    }
    
    function app_session($id,$value){
        $current = $this->get_session($id);
        if($current != 0){
            $data = array('id'=>$id,
                      'value'=>$current.','.$value);    
        }else{
            $data = array('id'=>$id,
                      'value'=>$value);
        }
        
        if($this->get_session($id) != 0){
            $this->update_session($id,$data);
        }else{
            $this->db->insert('session',$data);    
        }
    }
    
    function get_session($id){
        $q = "SELECT * FROM session WHERE id = '".$id."' LIMIT 1";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->first_row()->value;
        }
    }

    function update_session($id,$data){
        $this->db->where('id',$id);
        $this->db->update('session',$data);
    }
    
    function unset_session($id){
        $this->db->where('id',$id);
        $this->db->delete('session');
    }
}