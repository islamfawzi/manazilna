<?php

class Siteword_model extends CI_Model{
    
    function get_siteword(){
        
        $q = "SELECT * FROM site_word WHERE active = 1 " ;
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return 0;
        }      
                
        }
        }
    
    
      


?>