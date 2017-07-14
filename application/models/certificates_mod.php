<?php

class Certificates_mod extends CI_Model{        
    
     function add_port($data){
               
        
        $this->db->insert('certificates', $data);
        if($this->db->affected_rows()){
            return 1;
        } else{
            return 0;
        }
    }
    
    function get_port($id = '',$lim = '',$start = 0){
        $where = $limit = '';
        if($id != ''){
            $where = ' WHERE certificates.id = '.$id;
        }
        
        if($lim != ''){
            $limit = " LIMIT ".$start.",".$lim;
        }
        
        $q = "SELECT certificates.*,gallery.image as img 
              FROM certificates 
              LEFT JOIN gallery 
              ON certificates.image = gallery.id 
              ".$where." 
              ORDER BY certificates.id DESC ".$limit;
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            if($id != ''){
                return $query->first_row('array');
            }else{
                return $query->result();
            }
        }
    }
    
    function all_products ($lang='',$limit,$start = 0){
        if($lang=='ar'){
            $where = "certificates.active = 1";
        }else{
            $where = "certificates.active_en = 1";
        }
        
        if($limit != ''){
           $limit = "LIMIT ".$limit." , ".$start." "; 
        }
      $q = "SELECT certificates.*,gallery.image as img FROM certificates LEFT JOIN gallery ON  
                                                              certificates.image = gallery.id 
                                                              WHERE ".$where." ORDER BY certificates.id DESC ".$limit." ";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            if($id != ''){
                return $query->first_row('array');
            }else{
                return $query->result();
            }
        }                          
    }
       
 
    
    function update_port($id,$data){
        $this->db->where('id',$id);
        $this->db->update('certificates',$data);
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
    
    function delete_port($id = ''){
        $this->db->where('id',$id);
        $this->db->delete('certificates');
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
    
       function get_port_count($catid = ''){
        $where = '';
        if($catid != ''){
            $where = ' WHERE projects.catid = '.$catid;
        }
        $query = $this->db->query("SELECT projects.id FROM projects ".$where);
        
        return $query->num_rows();	
	}
    
  
    
     
}