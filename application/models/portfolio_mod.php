<?php

class Portfolio_mod extends CI_Model {

    function add_cat($data) {

        $this->db->insert('portfolio_cats', $data);
        if ($this->db->affected_rows()) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_cat($id = '') {
        $where = '';
        if ($id != '') {
            $where = ' WHERE portfolio_cats.id = ' . $id;
        }
        $q = "SELECT portfolio_cats.* , gallery.image as img
              FROM portfolio_cats 
              LEFT JOIN gallery
              ON portfolio_cats.image = gallery.id
              " . $where . " ORDER BY id ASC ";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            if ($id != '') {
                return $query->first_row('array');
            } else {
                return $query->result();
            }
        }
    }

    function get_subCate($id = '') {
        $where = '';
        if ($id != '') {
            $where = ' WHERE portfolio_subcats.cat_FK = ' . $id;
        }
        $q = "SELECT portfolio_subcats.*, gallery.image as img  "
                . "FROM portfolio_subcats LEFT JOIN gallery "
                . "ON portfolio_subcats.image = gallery.id "
                . "WHERE portfolio_subcats.cat_FK = " . $id;
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function update_cat($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('portfolio_cats', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete_cat($id = '') {
        $this->db->where('id', $id);
        $this->db->delete('portfolio_cats');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    /*     * ********************************************************************************* */

    function add_subcat($data) {
        $this->db->insert('portfolio_subcats', $data);
        if ($this->db->affected_rows()) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_subcat($id = '') {
        $where = '';
        if ($id != '') {
            $where = ' WHERE portfolio_subcats.id = ' . $id;
        }
        $q = "SELECT portfolio_subcats.*,portfolio_cats.title as cat_title
              FROM portfolio_subcats 
              LEFT JOIN portfolio_cats 
              ON portfolio_subcats.cat_FK = portfolio_cats.id 
              
              " . $where . " ORDER BY portfolio_subcats.id DESC ";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            if ($id != '') {
                return $query->first_row('array');
            } else {
                return $query->result();
            }
        }
    }

    function get_subcat_cat($cat = '') {
        $where = '';
        if ($cat != '') {
            $where = ' WHERE portfolio_subcats.cat_FK = ' . $cat;
        }
        $q = "SELECT portfolio_subcats.*,portfolio_cats.title as cat_title FROM portfolio_subcats LEFT JOIN portfolio_cats ON  
                                                                                portfolio_subcats.cat_FK = portfolio_cats.id 
                                                                                " . $where . " ORDER BY portfolio_subcats.id DESC ";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            if ($id != '') {
                return $query->first_row('array');
            } else {
                return $query->result();
            }
        }
    }

    function get_subcat_cat_like($keyword = '', $main_cat = '') {
        $where = '';
        if ($keyword != '') {
            $where = " WHERE (portfolio_subcats.title LIKE '%" . $keyword . "%' OR portfolio_subcats.title_en LIKE '%" . $keyword . "%') ";
        }
        if ($main_cat != '') {
            $where .= " AND portfolio_subcats.cat_FK = " . $main_cat;
        }
        $q = "SELECT portfolio_subcats.*,portfolio_cats.title as cat_title FROM portfolio_subcats LEFT JOIN portfolio_cats ON  
                                                                                portfolio_subcats.cat_FK = portfolio_cats.id 
                                                                                " . $where . " ORDER BY portfolio_subcats.id DESC ";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            if ($id != '') {
                return $query->first_row('array');
            } else {
                return $query->result();
            }
        }
    }

    function update_subcat($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('portfolio_subcats', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete_subcat($id = '') {
        $this->db->where('id', $id);
        $this->db->delete('portfolio_subcats');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    /*     * ******************************************************************************************** */

    function add_port($data) {
        if ($data['ytubelink']) {
            $data['ytubelink'] = str_replace("watch?v=", "embed/", $data['ytubelink']);
        }

        $this->db->insert('portfolio', $data);
        if ($this->db->affected_rows()) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_port($id = '', $lim = '', $start = 0) {
        $where = $limit = '';
        if ($id != '') {
            $where = ' WHERE portfolio.id = ' . $id;
        }

        if ($lim != '') {
            $limit = " LIMIT " . $start . "," . $lim;
        }

        $q = "SELECT portfolio.*,gallery.image as img 
              FROM portfolio 
              LEFT JOIN gallery 
              ON portfolio.image = gallery.id 
              " . $where . " 
              ORDER BY portfolio.id DESC " . $limit;
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            if ($id != '') {
                return $query->first_row('array');
            } else {
                return $query->result();
            }
        }
    }

    function all_products($lang = '', $limit, $start = 0) {
        if ($lang == 'ar') {
            $where = "portfolio.active = 1";
        } else {
            $where = "portfolio.active_en = 1";
        }

        if ($limit != '') {
            $limit = "LIMIT " . $limit . " , " . $start . " ";
        }
        $q = "SELECT portfolio.*,gallery.image as img FROM portfolio LEFT JOIN gallery ON  
                                                              portfolio.image = gallery.id 
                                                              WHERE " . $where . " ORDER BY portfolio.id DESC " . $limit . " ";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            if ($id != '') {
                return $query->first_row('array');
            } else {
                return $query->result();
            }
        }
    }

    function get_fet_port($lang = '') {
        if ($lang == 'ar') {
            $where = "portfolio.active = 1 AND portfolio.fet = 1";
        } else {
            $where = "portfolio.active_en = 1 AND portfolio.fet_en = 1";
        }
        $q = "SELECT portfolio.*,gallery.image as img 
                    FROM portfolio 
                    LEFT JOIN gallery 
                    ON portfolio.image = gallery.id
                    WHERE " . $where . "
                    ORDER BY portfolio.id DESC";

        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_port_like($keyword = '', $cat = '', $subcat = '', $lim = '', $start = 0) {
        $where = '';
        if ($keyword != '') {
            $where = " WHERE (portfolio.title LIKE '%" . $keyword . "%' OR portfolio.title_en LIKE '%" . $keyword . "%'
                       OR portfolio.link LIKE '%" . $keyword . "%'  OR portfolio.link_en LIKE '%" . $keyword . "%'    ) ";
        }
        if ($cat != '') {
            $where .= " AND portfolio.catid = " . $cat;
        }
        if ($subcat != '') {
            $where .= " AND portfolio.sub_catid = " . $subcat;
        }
        if ($lim != '') {
            $limit = " LIMIT " . $start . "," . $lim;
        }

        $q = "SELECT portfolio.*,portfolio_cats.title as cat_title FROM portfolio LEFT JOIN portfolio_cats ON  
                                                                        portfolio.catid = portfolio_cats.id 
                                                                        " . $where . " ORDER BY portfolio.id DESC " . $limit;
        #  echo $q; exit();
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_port_like_count($keyword = '', $cat = '', $subcat = '') {
        $where = '';
        if ($keyword != '') {
            $where = " WHERE (portfolio.title LIKE '%" . $keyword . "%' OR portfolio.title_en LIKE '%" . $keyword . "%'
                       OR portfolio.link LIKE '%" . $keyword . "%'  OR portfolio.link_en LIKE '%" . $keyword . "%'    ) ";
        }
        if ($cat != '') {
            $where .= " AND portfolio.catid = " . $cat;
        }
        if ($subcat != '') {
            $where .= " AND portfolio.sub_catid = " . $subcat;
        }

        $q = "SELECT portfolio.*,portfolio_cats.title as cat_title FROM portfolio LEFT JOIN portfolio_cats ON  
                                                                        portfolio.catid = portfolio_cats.id 
                                                                        " . $where . " ORDER BY portfolio.id DESC " . $limit;
        #  echo $q; exit();
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
    }

    function get_port_where_cat($catid = '', $lim = '', $start = 0, $lang = '') {
        $where = $limit = $order = '';
        $active = '';
        if ($lang == 'ar') {
            $active = ' AND portfolio.active = 1 AND portfolio_cats.active = 1 ';
            $order = ' ORDER BY portfolio.fet ,portfolio.fet DESC ';
        } elseif ($lang == 'en') {
            $active = ' AND portfolio.active_en = 1 AND portfolio_cats.active = 1 ';
            $order = ' ORDER BY portfolio.fet_en ,portfolio.fet DESC ';
        }
        if ($catid != '') {
            $where = ' WHERE portfolio.catid = ' . $catid . $active;
        }
        if ($lim != '') {
            $limit = " LIMIT " . $start . "," . $lim;
        }

        $q = "SELECT portfolio.*,portfolio_cats.title as cat_title FROM portfolio LEFT JOIN portfolio_cats ON  
                                                                        portfolio.catid = portfolio_cats.id 
                                                                        " . $where . $order . $limit;

        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_port_where_subcat($catid = '', $lim = '', $start = 0, $lang = '') {
        $limit = $order = '';

        if ($lim != '') {
            $limit = "LIMIT " . $start . "," . $lim;
        }

        if ($lang == 'ar') {
            $order = ' ORDER BY portfolio.fet ';
        } else {
            $order = ' ORDER BY portfolio.fet_en ';
        }

        $q = "SELECT portfolio.*  FROM  portfolio  WHERE portfolio.sub_catid = " . $catid . " " . $order . " " . $limit;

        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_port_where($where = '', $lim = '', $start = 0) {
        $limit = '';
        if ($lim != '') {
            $limit = " LIMIT " . $start . "," . $lim;
        }
        if ($where != '') {
            $where = ' WHERE ' . $where;
        }

        $q = "SELECT portfolio.*,gallery.image as img FROM portfolio LEFT JOIN gallery ON  
                                                                        portfolio.image = gallery.id 
                                                                        " . $where . $limit;
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_port_count($catid = '') {
        $where = '';
        if ($catid != '') {
            $where = ' WHERE portfolio.catid = ' . $catid;
        }
        $query = $this->db->query("SELECT portfolio.id FROM portfolio " . $where);

        return $query->num_rows();
    }

    function get_port_count_sub($catid = '') {
        $where = '';
        if ($catid != '') {
            $where = ' WHERE portfolio.sub_catid = ' . $catid;
        }
        $query = $this->db->query("SELECT portfolio.id FROM portfolio " . $where);

        return $query->num_rows();
    }

    function get_port_count_where($where = '') {
        $where = '';
        if ($where != '') {
            $where = ' WHERE ' . $where;
        }
        $query = $this->db->query("SELECT portfolio.id FROM portfolio " . $where);

        return $query->num_rows();
    }

    function update_port($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('portfolio', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete_port($id = '') {
        $this->db->where('id', $id);
        $this->db->delete('portfolio');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_sub_cats($cat = '', $lang = '') {
        $where = $active = '';
        if ($lang != '') {
            $active = ' AND active = 1 ';
        }
        if ($cat != '') {
            $where = ' WHERE cat_FK = ' . $cat . $active;
        }
        $query = $this->db->query("SELECT * FROM portfolio_subcats " . $where . " ORDER BY id DESC");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

}
