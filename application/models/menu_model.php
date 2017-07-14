<?php

class Menu_model extends CI_Model{
    
    function get_main_menu(){
        $q = 'SELECT * FROM menu WHERE sub = 0 AND active = 1 ORDER BY pos2,ordering ASC';
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
        	return 0;
        }
    }
    
    function get_sub_menu($menu){
       $q = "SELECT * FROM menu WHERE menu = $menu AND active = 1 ORDER BY ordering ASC";
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
        	return 0;
        } 
        
    }
    
      function get_up_menu($lang = ''){
        if($lang == 'ar'){
            $active = ' active ';
            
        }else{
            $active = ' active_en ';
            
        }
        $q = 'SELECT * FROM menu WHERE sub = 0 AND '.$active.' = 1 ORDER BY ordering ASC';
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
        	return 0;
        }
    }
    
   
    
    function get_all_menu(){
        $q = 'SELECT e.*,m.title as parent_title FROM menu e LEFT JOIN menu m ON e.menu = m.id ORDER BY e.pos2,e.menu,e.ordering ASC';
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
        	return 0;
        }
    }
    
    function get_sub_menus($id = '',$lang = ''){
        $where = '';
        $active = '';
        if($lang == 'ar'){
            $active = ' AND e.active = 1';
        }elseif($lang == 'en'){
            $active = ' AND e.active_en = 1';
        }
        if($id != ''){
            $where =  ' WHERE e.menu = '.$id.$active;
        }
        $q = 'SELECT e.*,m.title as parent_title ,m.alias as parent_alias,pages.id as page_id,portfolio_cats.id as protcatid  
              FROM menu e LEFT JOIN menu m ON e.menu = m.id 
                          LEFT JOIN pages  ON e.parent = pages.id 
                          LEFT JOIN portfolio_cats ON pages.catid = portfolio_cats.id '.$where.' ORDER BY e.ordering ASC';
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
        	return 0;
        }
    }
    
    
     function get_submenus_by_Alias($menu = '',$lang = ''){
        $where = '';
        if($lang == 'ar'){
            //$al = ' m.alias ';
            $active = '  e.active ';            
         }else{
            //$al = ' m.alias_en ';
            $active = '  e.active_en ';                              
         }        
                                            
        if($menu != ''){
            $where =  " WHERE e.menu = '".$menu."' AND ".$active." = 1 AND e.pos1 = 1";
        }
        $q = 'SELECT e.*,m.title as parent_title,m.title_en as parent_title_en,m.image as parent_image FROM menu e LEFT JOIN menu m ON e.menu = m.id '.$where.' ORDER BY e.ordering ASC';
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
           
            return $query->result();
        }
    }
    
    function new_fn ($x='' ,$y=''){
        if($y != ''){
            $x =$x."/".$y ;
        }
        
        $this->db->where('link',$x);
        $this->db->select('parent');
        $query = $this->db->get('menu');
                 
          if($query->num_rows() > 0){
       
        
          
          echo '<pre>';
          print_r();
          die();
              
          return $query->first_row();
        
        
    }
    }
    
   function get_sub_menu_by_alias_ar($alias = '',$sub = ''){
      if($sub != ''){
        $alias=$sub;
        $menu = ' AND e.menu != 0 ';
    }else{
     //   $menu = ' AND e.menu = 0  ';
        $menu = '';
    }
    $q = "SELECT e.*,m.title as parent_title,m.title_en as parent_title_en FROM menu e LEFT JOIN menu m ON e.menu = m.id  WHERE e.active = 1 AND e.alias = '".$alias."' ".$menu." LIMIT 1";
    $query = $this->db->query($q);
    if($query->num_rows() > 0){
        return $query->first_row();
    }
   } 
   
   function get_sub_menu_by_alias_en($alias_en = '',$sub = ''){
    if($sub != ''){
        $menu = ' AND e.menu != 0 ';
    }else{
        $menu = ' AND e.menu = 0  ';
    }
    $q = "SELECT e.*,m.title as parent_title,m.title_en as parent_title_en FROM menu e LEFT JOIN menu m ON e.menu = m.id  WHERE e.active_en = 1 AND e.alias_en = '".$alias_en."' ".$menu." LIMIT 1";
    $query = $this->db->query($q);
    if($query->num_rows() > 0){
        return $query->first_row();
    }
   } 
   
    function add_menu($data){
        $this->db->insert('menu', $data);
        if($this->db->affected_rows()){
            return true;
        } else{
            return false;
        }
    
    }
    
    function get_item($id){
        $q = 'SELECT e.*,m.title as parent_title FROM menu e LEFT JOIN menu m ON e.menu = m.id WHERE e.id = '.$id.' LIMIT 1';
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
          //  echo '<pre>'; print_r($query->result()); exit();
            return $query->first_row('array');
        }else{
        	return 0;
        }
    }
    
    function update_menu($data,$id){
        $this->db->where('id', $id);
        $this->db->update('menu', $data);
        if($this->db->affected_rows()){
            return 1;
        } else{
            return 0;
        }
    }
    
    function del_menu($id){
        $this->db->where('id', $id);
        $this->db->delete('menu');
        if($this->db->affected_rows() > 0){
            return true;
        } else{
            return false;
        }
    }
    
    function alias($alias){
        $a = explode(' ',$alias);
        return implode('-',$a);
    }
    
    function get_alias($id = ''){
        $query =$this->db->query("SELECT alias FROM menu WHERE id = ".$id." LIMIT 1");
        if($query->num_rows() > 0){
            return $query->first_row()->alias;
        }
    }
    
    function get_alias_en($id = ''){
        $query =$this->db->query("SELECT alias_en FROM menu WHERE id = ".$id." LIMIT 1");
        if($query->num_rows() > 0){
            return $query->first_row()->alias_en;
        }
    }
    
    function get_menu_by_alias($alias = '',$lang = ''){
        if($lang == 'ar'){
            $al = ' alias ';
        }else{
            $al = ' alias_en ';
        }
  
        $query =$this->db->query("SELECT * FROM menu WHERE ".$al." = '".$alias."' LIMIT 1");
        
        if($query->num_rows() > 0){
            return $query->first_row();
        }
    }
    
    function update_link($menu,$alias,$alias_en){
        $sub_menus = $this->db->query("SELECT alias,id FROM menu WHERE menu.menu = ".$menu);
   
        if($sub_menus->num_rows() > 0){
            $sub_menus = $sub_menus->result();
            foreach($sub_menus as $sub){
               $this->db->query("UPDATE menu SET link  = '".$alias."/".$sub->alias."',
                                                
                                                 WHERE menu.menu = ".$menu." AND menu.id = ".$sub->id);
            }    
           
        }
        
    }
    
    function get_menu_like($keyword = '',$cat = ''){
        $where = '';
        if($keyword != ''){
            $where = " WHERE (e.title LIKE '%".$keyword."%' OR e.title_en LIKE '%".$keyword."%')";
        }
        if($cat != ''){
            $where .= " AND e.menu = ".$cat;
        }
        $q = 'SELECT e.*,m.title as parent_title FROM menu e LEFT JOIN menu m ON e.menu = m.id '.$where.' ORDER BY e.id,e.ordering ASC';
        $query = $this->db->query($q);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
        	return 0;
        }
    }
    
    function validate_alias($alias = '',$lang = '',$menu = ''){
        if($alias == ''){
            return 0;
        }
        if($lang == 'ar'){
            $alias = " alias = '".$alias."' ";
        }else{
            $alias = " alias_en = '".$alias."' ";
        }
        
         $query = $this->db->query("SELECT id FROM menu WHERE ".$alias);
         return $query->num_rows();
        
    }
    
        
    
}