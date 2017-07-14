<?php

class Pages_mod extends CI_Model{
    
    
    function add_page($data){
        $this->db->insert('pages',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{ return false; }
    }
    
    function edit_page($id,$data){
     
        $this->db->where('id',$id);
       $this->db->update('pages', $data);
       if($this->db->affected_rows()){
        return true;
       } else{
          return false;
       }
    }
    
    function get_Pages($id = ''){
        $where = '';
        if($id != ''){
            $where = " WHERE pages.id = ".$id." ";
        }
        $q = "SELECT pages.*,gallery.image as img "
            . "FROM pages "
            . "LEFT JOIN gallery "
            . "ON pages.image= gallery.id "
            .$where.
            " ORDER BY id DESC";
        
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            if($id != ''){
                return $query->first_row('array');    
            }else{
                return $query->result();
            }    
        }else{
            return 0;
        }   
    }
    function get_P ($id=''){
        $where = '';
        if($id != ''){
            $where = ' WHERE pages.id = '.$id;
        }
        $q = "SELECT pages.* FROM pages".$where."";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            if($id != ''){
                return $query->first_row('array');    
            }else{
                return $query->result();
            }    
        }else{
            return 0;
        }   
    } 
    
    
    function get_page($id = '',$lang = ''){
        
        
        $q = "SELECT pages.*,gallery.image as img FROM pages LEFT JOIN gallery ON pages.image= gallery.id WHERE pages.id = ".$id." AND pages.active = 1 ORDER BY id DESC";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            if($id != ''){
                return $query->first_row();    
            }else{
                return $query->result();
            }    
        } 
    }
    
    function get_fet_pages($lang = ''){
        if ($lang == 'ar') {
            $where = "pages.active = 1 AND pages.fet = 1";
        } else {
            $where = "pages.active_en = 1 AND pages.fet_en = 1";
        }
          $q = "SELECT pages.*,gallery.image 
                FROM pages 
                LEFT JOIN gallery 
                ON pages.image = gallery.id  
                WHERE " . $where ."  
                ORDER BY id ASC 
                LIMIT 3";
       $query = $this->db->query($q);
       if($query->num_rows() > 0){
        return $query->result();
       }
    }
    
    function get_page_where($where = ''){
        if($where != ''){
            $where = "WHERE ".$where;
        }
        $query = $this->db->query("SELECT * FROM pages ".$where." ORDER BY id DESC");
        if($query->num_rows() > 0){
            return $query->result();
        }
    }
    
    function delete_page($id){
        $this->db->where('id',$id);
        $this->db->delete('pages');
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
    
    function add_cat($data){
        $this->db->insert('page_cats',$data);
        if($this->db->affected_rows() > 0){
            return 1;
        }else{ return 0; }
    }
    
    function get_cat($id = ''){
        $where = '';
        if($id != ''){
            $where = " WHERE id = ".$id;
        }
        
        $query = $this->db->query("SELECT * FROM page_cats ".$where." ORDER BY id DESC");
        if($query->num_rows() > 0){
            if($id != ''){
                return $query->first_row('array');
            }else{
                return $query->result();
            }
        }
    }
    
    function get_cat_like($keyword = ''){
        $where = '';
        if($keyword != ''){
            $where = " WHERE title LIKE '%".$keyword."%'";
        }
        
        $query = $this->db->query("SELECT * FROM page_cats ".$where." ORDER BY id DESC");
        if($query->num_rows() > 0){
           return $query->result();   
        }
    }
    
    function update_cat($id,$data){
        $this->db->where('id',$id);
        $this->db->update('page_cats',$data);
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
    
    
    function del_cat($id){
        $this->db->where('id',$id);
        $this->db->delete('page_cats');
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
    
    function get_page_like($page = '',$page_cat = '',$page_type = ''){
       
        $where = '';
        if($page != ''){
            $where[] = " (title LIKE '%".$page."%' OR title_en LIKE '%".$page."%') ";
        }
        if($page_cat != '' && $page_cat != 0){
            $where[] = " (cat_FK = ".$page_cat.")";
        }
        if($page_type != '' && $page_type != 0){
            $where[] = " (type = ".$page_type." OR type_en = ".$page_type.")";
        } 
        $where = implode(' AND ',$where);
        if($where != ''){
            $where = ' WHERE '.$where;
        }
        
        $query = $this->db->query("SELECT * FROM pages ".$where." ORDER BY id DESC");
        if($query->num_rows() > 0){
            return $query->result();
        }
        
    }
    
     
}