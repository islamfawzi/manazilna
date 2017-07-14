<?php

class Admincp_mod extends CI_Model {

    function update_settings($data) {
        $config = array('site_name' => $data['site_name'],
            'site_status' => $data['site_status'],
            'metakey' => $data['metakey'],
            'metadesc' => $data['metadesc'],
            'close_msg' => $data['close_msg'],
            'site_phone' => $data['site_phone'],
            'site_mob' => $data['site_mob'],
            'site_fax' => $data['site_fax'],
            'site_address' => $data['site_address'],
            'gmap' => $data['gmap'],
            'site_email' => $data['site_email'],
            'meta_tags' => $data['meta_tags'],
            'site_name_en' => $data['site_name_en'],
            'metakey_en' => $data['metakey_en'],
            'metadesc_en' => $data['metadesc_en'],
            'meta_tags_en' => $data['meta_tags_en'],
            'site_address_en' => $data['site_address_en'],
            'close_msg_en' => $data['close_msg_en'],
            'slider' => $data['slider']
        );
        // $social = array(
        //     'facebook' => $data['facebook'],
        //     'twitter' => $data['twitter'],
        //     'gplus' => $data['gplus'],
        //     'instagram' => $data['instagram'],
        //     'utube' => $data['utube'],
        //     'index_video' => str_replace('watch?v=', 'embed/', $data['index_video'])
        // );

        $social = $data['social'];

        $this->db->where('id', 1);
        $this->db->update('config', $config);

        if ($this->db->affected_rows()) {
            $x = 1;
        } else {
            $x = 0;
        }

        $this->db->update('social_media', $social);
        if ($this->db->affected_rows()) {
            $y = 1;
        } else {
            $y = 0;
        }

        if ($x == 1 || $y == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    function settings() {
        $query = $this->db->get('config');
        if ($query->num_rows() > 0) {
            return $query->first_row();
        }
    }

    function site_word($x = '', $data = '') {

        if ($data) {
            $data = array('title' => $data['title'],
                'content' => $data['content'],
                'active' => $data['active'],
                'title_en' => $data['title_en'],
                'content_en' => $data['content_en'],
                'active_en' => $data['active_en']);
            $this->db->where('id', $x);

            $this->db->update('site_word', $data);
            if ($this->db->affected_rows()) {
                return true;
            }
        } else {
            $this->db->where('id', $x);
            $query = $this->db->get('site_word');
            if ($query->num_rows() > 0) {
                return $query->first_row('array');
            }
        }
    }

    function social() {
        $query = $this->db->get('social_media');
        if ($query->num_rows() > 0) {
            return $query->first_row();
        }
    }

    function site_mail() {
        $query = $this->db->query("SELECT site_email FROM config WHERE id = 1 LIMIT 1");
        return $query->first_row()->site_email;
    }

    function get_property_feature($table){
      return $this->db->get($table)->result();
    }

    function search_query_filter($search){

        foreach ($search as $key => $item) {

            if(is_array($item)){
              foreach ($item as $subKey => $subItem) {
                if(!$subItem){
                  unset($search[$key][$subKey]);
                }
              }

              if(empty($search[$key])){
                unset($search[$key]);
              }
            }else{
              if(!$item && $item != 0){
                unset($search[$key]);
              }
            }
      }
     // unset($search['submit']);
      return $search;

    }

    function do_search($data){
      error_reporting(-1);
      if(!empty($data)){
        foreach ($data as $m => $a) {
          if (is_array($a)) {
            foreach ($a as $n => $b) {
              if ($b == '') {
                unset($data[$m][$n]);
              }
            }
            if (empty($data[$m])) {
              unset($data[$m]);
            }
          }else {
            if ($a == '') {
              unset($data[$m]);
            }
          }
        }

        $this->db->select('projects.*');
        $this->db->select('gallery.image as img');
        $this->db->join('gallery', 'gallery.id = projects.image', 'left');

        if (isset($data['property_type'])) $this->db->where('property_type', $data['property_type']);
        if (isset($data['finish_types'])) $this->db->where('finish_types', $data['finish_types']);
        if (isset($data['floor'])) $this->db->where('floor', $data['floor']);
        if (isset($data['purpose'])) $this->db->where('purpose', $data['purpose']);
        if (isset($data['baths'])) $this->db->where('baths', $data['baths']);
        if (isset($data['rooms'])) $this->db->where('rooms', $data['rooms']);
        if(!empty($data['price'])){
          if ('' != $data['price']['from']) $this->db->where('price >=', $data['price']['from']);
          if ('' != $data['price']['to']) $this->db->where('price <=', $data['price']['to']);
        }
        if(!empty($data['area'])){
          if ('' != $data['area']['from']) $this->db->where('area >=', $data['area']['from']);
          if ('' != $data['area']['to']) $this->db->where('area <=', $data['area']['to']);
        }
        if(!empty($data['amenities'])){
          foreach ($data['amenities'] as $value) {
            $this->db->or_like('amenities', '"' . $value . '"');
          }
        }

        if(!empty($data['query'])){
          $this->db->or_like('title', $data['query']);
          $this->db->or_like('title_ar', $data['query']);
          $this->db->or_like('description', $data['query']);
          $this->db->or_like('description_ar', $data['query']);
        }

        if(!empty($data['address'])){
          $this->db->or_like('address', $data['address']);
          $this->db->or_like('address_ar', $data['address']);
        }

        if(!empty($data['category'])){
          $this->db->where('projects.catid', $data['category']);
        }

         $this->db->where(array('projects.active' => 1));
         return $this->db->get('projects')->result();
      }
    }

}
