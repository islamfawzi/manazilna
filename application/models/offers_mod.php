<?php


class Offers_mod extends CI_Model{
    
    function add_offer_cat($data){
        $this->db->insert('offers_cats',$data);
        if($this->db->affected_rows() > 0){
            return 1;
        }else{ return 0; }
    }
    
    function get_offer_cat($id = ''){
        $where = '';
        if($id != ''){
            $where = " WHERE id = ".$id;
        }
        
        $query = $this->db->query("SELECT * FROM offers_cats ".$where." ORDER BY id DESC");
        if($query->num_rows() > 0){
            if($id != ''){
                return $query->first_row('array');
            }else{
                return $query->result();
            }
        }
    }
    
    function get_offer_like($keyword = ''){
        $where = '';
        if($keyword != ''){
            $where = " WHERE title LIKE '%".$keyword."%' OR title_en LIKE '%".$keyword."%'";
        }
        
        $query = $this->db->query("SELECT * FROM offers_cats ".$where." ORDER BY id DESC");
        if($query->num_rows() > 0){
             return $query->result();   
        }
    }
    
    function update_offer_cat($id,$data){
        $this->db->where('id',$id);
       $this->db->update('offers_cats', $data);
       if($this->db->affected_rows()){
        return true;
       } else{
          return false;
       }
    }

    
   function del_offer_cat($id = ''){
     if($id != ''){
        $this->db->where('id',$id);
     }
        $this->db->delete('offers_cats');
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
   }
   
  function get_cat_alias($alias = '',$cat = ''){
    $where = '';
    if($alias != ''){
        $where = " WHERE alias = '".$alias."' ";
    }
    if($cat != ''){
        $where .= " AND catid = ".$cat;
        $tab    = " packages ";
    }else{
        $tab    = " offers_cats ";
    }

    $query = $this->db->query("SELECT * FROM  ".$tab.$where." LIMIT 1");
    if($query->num_rows() > 0){
         return $query->first_row();
    }
  } 
  /** ***************************************************************************************** **/
  
  function add_package($data){
        $this->db->insert('packages',$data);
        if($this->db->affected_rows() > 0){
            return 1;
        }else{ return 0; }
    }
    
    function get_package($id = ''){
        $where = '';
        if($id != ''){
            $where = " WHERE packages.id = ".$id;
        }
        
        $query = $this->db->query("SELECT packages.*,offers_cats.title as cat_title,offers_cats.title_en as cat_title_en 
                                          FROM packages LEFT JOIN offers_cats ON packages.catid = offers_cats.id ".$where." ORDER BY packages.id DESC");
        if($query->num_rows() > 0){
            if($id != ''){
                return $query->first_row('array');
            }else{
                return $query->result();
            }
        }
    }
    
    function get_package_like($keyword = ''){
        $where = '';
        if($keyword != ''){
            $where = " WHERE packages.title LIKE '%".$keyword."%' OR packages.title_en LIKE '%".$keyword."%'";
        }
  
        $query = $this->db->query("SELECT packages.*,offers_cats.title as cat_title,offers_cats.title_en as cat_title_en 
                                          FROM packages LEFT JOIN offers_cats ON packages.catid = offers_cats.id ".$where." ORDER BY packages.id DESC");
        if($query->num_rows() > 0){
             return $query->result();   
        }
    }
    
    function get_packages_cat($cat = ''){
        $where = '';
        if($cat != ''){
            $where = ' AND catid = '.$cat;
        } 
        $query = $this->db->query("SELECT * FROM packages WHERE active = 1 ".$where);
        if($query->num_rows() > 0){
            return $query->result();
        }
    }
    
    function get_packages_cattitle($cat = ''){
        $where = '';
        if($cat != ''){
            $where = " WHERE offers_cats.title = '".$cat."'";
        } 
        $query = $this->db->query("SELECT packages.* FROM packages LEFT JOIN offers_cats ON packages.catid = offers_cats.id
                                          ".$where);
        if($query->num_rows() > 0){
            return $query->result();
        }
    }
    
    function update_package($id,$data){
        $this->db->where('id',$id);
       $this->db->update('packages', $data);
       if($this->db->affected_rows()){
        return true;
       } else{
          return false;
       }
    }

    
   function del_package($id = ''){
     if($id != ''){
        $this->db->where('id',$id);
     }
        $this->db->delete('packages');
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
   } 
   
   function validate_alias($alias = '',$catid = ''){
        $alias = " alias = '".$alias."' ";
        if($catid != ''){
            $tab = " packages ";
            $catid = " AND catid = ".$catid;
        }else{
            $tab = " offers_cats ";
        }
        $query = $this->db->query("SELECT id FROM ".$tab." WHERE ".$alias.$catid);
        return $query->num_rows();
    }
    
    
   
}