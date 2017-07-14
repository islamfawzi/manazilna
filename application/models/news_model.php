<?php

class News_model extends CI_Model{
 
        
        function get_siteword($id = ''){
        
        $q = "SELECT * FROM site_word WHERE id = ".$id." LIMIT 1 " ;
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->first_row();
        }else{
            return 0;
        }      
                
        }
        function get_news ($id){
            $where ='';
            if($id){
                $where =" AND clients.id = ".$id."" ;
            }
          $q = "SELECT clients.* , gallery.image FROM clients LEFT JOIN gallery ON 
                clients.image = gallery.id  WHERE clients.active = 1".$where." " ; 
          
           $query = $this->db->query($q);
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return 0;
        }                                                         
        }
      

   
    
  }


?>