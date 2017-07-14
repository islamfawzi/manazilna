<?php

class Contact_model extends CI_Model{
    
    function edit_page($data){
        $this->db->where('id',1);
        $this->db->update('contact_page',$data);
       if($this->db->affected_rows()){
         return true;
       } else{
          return false;
       }
    }
    
    function get_contact(){
        $query = $this->db->query("SELECT * FROM contact_page WHERE id = 1 LIMIT 1");
        return $query->first_row('array');
    }
    
    
   function set_contact($data){
        $this->db->insert('contact_inbox',$data);
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    } 
    
    function get_inbox($id = ''){
    //    exit('here');
        $where = '';
        if($id != ''){
            $where = ' AND id = '.$id;
        }
        $query = $this->db->query('SELECT * FROM contact_inbox WHERE contact_type = 0 '.$where.' ORDER BY send_time DESC ');
        if($query->num_rows() > 0){
            if($id != ''){
                return $query->first_row('array');
            }else{
                return $query->result();
            }
        }
    }
    
    
    function del_msg($id){
        $this->db->where('id',$id);
        $this->db->delete('contact_inbox');
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
   
   
   function get_orders($id = ''){
        $where = '';
        if($id != ''){
            $where = ' AND id = '.$id;
        }
        $query = $this->db->query('SELECT * FROM contact_inbox WHERE contact_type = 1 '.$where.' ORDER BY send_time DESC ');
        if($query->num_rows() > 0){
            if($id != ''){
                return $query->first_row('array');
            }else{
                return $query->result();
            }
        }
    }
    
  function get_order_cat($cat = '',$package = ''){
        $where = '';
        if($cat != ''){
            $where .= " AND offer_cat = '".$cat."'";
        }
        if($package != ''){
            $where .= " AND package = '".$package."'";
        }
        $query = $this->db->query('SELECT * FROM contact_inbox WHERE contact_type = 1 '.$where.' ORDER BY send_time DESC ');
        if($query->num_rows() > 0){
             return $query->result();  
        }
  } 
    
}