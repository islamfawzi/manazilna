<?php

class Projects_mod extends CI_Model {

    function add_cat($data) {

        $this->db->insert('projects_cats', $data);
        if ($this->db->affected_rows()) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_cat($id = '') {
        $where = '';
        if ($id != '') {
            $where = ' WHERE projects_cats.id = ' . $id;
        }
        $q = "SELECT projects_cats.* , gallery.image as img
              FROM projects_cats
              LEFT JOIN gallery
              ON projects_cats.image = gallery.id
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

    function update_cat($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('projects_cats', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete_cat($id = '') {
        $this->db->where('id', $id);
        $this->db->delete('projects_cats');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    /*     * ********************************************************************************* */

    function add_subcat($data) {
        $this->db->insert('projects_subcats', $data);
        if ($this->db->affected_rows()) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_subcat($id = '') {
        $where = '';
        if ($id != '') {
            $where = ' WHERE projects_subcats.id = ' . $id;
        }
        $q = "SELECT projects_subcats.*,projects_cats.title as cat_title FROM projects_subcats LEFT JOIN projects_cats ON
                                                                                projects_subcats.cat_FK = projects_cats.id
                                                                                " . $where . " ORDER BY projects_subcats.id DESC ";
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
            $where = ' WHERE projects_subcats.cat_FK = ' . $id;
        }
        $q = "SELECT projects_subcats.*, gallery.image as img  "
                . "FROM projects_subcats LEFT JOIN gallery "
                . "ON projects_subcats.image = gallery.id "
                . "WHERE projects_subcats.cat_FK = " . $id;
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_subcat_cat($cat = '') {
        $where = '';
        if ($cat != '') {
            $where = ' WHERE projects_subcats.cat_FK = ' . $cat;
        }
        $q = "SELECT projects_subcats.*,projects_cats.title as cat_title FROM projects_subcats LEFT JOIN projects_cats ON
                                                                                projects_subcats.cat_FK = projects_cats.id
                                                                                " . $where . " ORDER BY projects_subcats.id DESC ";
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
            $where = " WHERE (projects_subcats.title LIKE '%" . $keyword . "%' OR projects_subcats.title_en LIKE '%" . $keyword . "%') ";
        }
        if ($main_cat != '') {
            $where .= " AND projects_subcats.cat_FK = " . $main_cat;
        }
        $q = "SELECT projects_subcats.*,projects_cats.title as cat_title FROM projects_subcats LEFT JOIN projects_cats ON
                                                                                projects_subcats.cat_FK = projects_cats.id
                                                                                " . $where . " ORDER BY projects_subcats.id DESC ";
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
        $this->db->update('projects_subcats', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete_subcat($id = '') {
        $this->db->where('id', $id);
        $this->db->delete('projects_subcats');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    /*     * ******************************************************************************************** */

    function add_port($data) {
        if ($data['video']) {
            $data['video'] = str_replace("watch?v=", "embed/", $data['video']);
        }

        $this->db->insert('projects', $data);
        if ($this->db->affected_rows()) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_port($id = '', $lim = '', $start = 0) {
        $where = $limit = '';
        if ($id != '') {
            $where = ' WHERE projects.id = ' . $id;
        }

        if ($lim != '') {
            $limit = " LIMIT " . $start . "," . $lim;
        }

        $q = "SELECT projects.*,gallery.image as img,projects_cats.title as cat_title,projects_cats.title_en as cat_title_en
              FROM projects

              LEFT JOIN gallery
              ON projects.image = gallery.id

              LEFT JOIN projects_cats
              ON projects.catid = projects_cats.id
              " . $where . " ORDER BY projects.id DESC " . $limit;
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
            $where = "projects.active = 1";
        } else {
            $where = "projects.active_en = 1";
        }

        if ($limit != '') {
            $limit = "LIMIT " . $limit . " , " . $start . " ";
        }
        $q = "SELECT projects.*,gallery.image as img
                FROM projects LEFT JOIN gallery ON
                projects.image = gallery.id
                WHERE " . $where . " ORDER BY projects.id DESC " . $limit . " ";

        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            if ($id != '') {
                return $query->first_row('array');
            } else {
                return $query->result();
            }
        }
    }

    function get_fet_port($limit = 3, $start = 0) {
        $this->db->select('projects.*,gallery.image as img, projects_cats.title_en as cat_title, projects_cats.title as cat_title_ar ');
        $this->db->join('gallery', 'projects.image = gallery.id', 'left');
		$this->db->join('projects_cats', 'projects.catid = projects_cats.id', 'left');
        $this->db->order_by('projects.id', 'DESC');
        return $this->db->get_where('projects', array('projects.active' => 1, 'projects.feature' => 1), $limit, $start)->result();
    }

    function get_port_like($keyword = '', $cat = '', $subcat = '', $lim = '', $start = 0) {
        $where = '';
        if ($keyword != '') {
            $where = " WHERE (projects.title LIKE '%" . $keyword . "%' OR projects.title_en LIKE '%" . $keyword . "%'
                       OR projects.link LIKE '%" . $keyword . "%'  OR projects.link_en LIKE '%" . $keyword . "%'    ) ";
        }
        if ($cat != '') {
            $where .= " AND projects.catid = " . $cat;
        }
        if ($subcat != '') {
            $where .= " AND projects.sub_catid = " . $subcat;
        }
        if ($lim != '') {
            $limit = " LIMIT " . $start . "," . $lim;
        }

        $q = "SELECT projects.*,projects_cats.title as cat_title FROM projects LEFT JOIN projects_cats ON
                                                                        projects.catid = projects_cats.id
                                                                        " . $where . " ORDER BY projects.id DESC " . $limit;
        #  echo $q; exit();
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_port_like_count($keyword = '', $cat = '', $subcat = '') {
        $where = '';
        if ($keyword != '') {
            $where = " WHERE (projects.title LIKE '%" . $keyword . "%' OR projects.title_en LIKE '%" . $keyword . "%'
                       OR projects.link LIKE '%" . $keyword . "%'  OR projects.link_en LIKE '%" . $keyword . "%'    ) ";
        }
        if ($cat != '') {
            $where .= " AND projects.catid = " . $cat;
        }
        if ($subcat != '') {
            $where .= " AND projects.sub_catid = " . $subcat;
        }

        $q = "SELECT projects.*,projects_cats.title as cat_title FROM projects LEFT JOIN projects_cats ON
                                                                        projects.catid = projects_cats.id
                                                                        " . $where . " ORDER BY projects.id DESC " . $limit;
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
            $active = ' AND projects.active = 1 AND projects_cats.active = 1 ';
            $order = ' ORDER BY projects.fet ,projects.fet DESC ';
        } elseif ($lang == 'en') {
            $active = ' AND projects.active_en = 1 AND projects_cats.active = 1 ';
            $order = ' ORDER BY projects.fet_en ,projects.fet DESC ';
        }
        if ($catid != '') {
            $where = ' WHERE projects.catid = ' . $catid . $active;
        }
        if ($lim != '') {
            $limit = " LIMIT " . $start . "," . $lim;
        }

        $q = "SELECT projects.*,projects_cats.title as cat_title FROM projects LEFT JOIN projects_cats ON
                                                                        projects.catid = projects_cats.id
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
            $order = ' ORDER BY projects.fet ';
        } else {
            $order = ' ORDER BY projects.fet_en ';
        }

        $q = "SELECT projects.*  FROM  projects  WHERE projects.sub_catid = " . $catid . " " . $order . " " . $limit;

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

        $q = "SELECT projects.*,gallery.image as img
                FROM projects LEFT JOIN gallery ON
                projects.image = gallery.id
                " . $where . $limit;
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_port_count($catid = '') {
        $where = '';
        if ($catid != '') {
            $where = ' WHERE projects.catid = ' . $catid;
        }
        $query = $this->db->query("SELECT projects.id FROM projects " . $where);

        return $query->num_rows();
    }

    function get_port_count_sub($catid = '') {
        $where = '';
        if ($catid != '') {
            $where = ' WHERE projects.sub_catid = ' . $catid;
        }
        $query = $this->db->query("SELECT projects.id FROM projects " . $where);

        return $query->num_rows();
    }

    function get_port_count_where($where = '') {
        $where = '';
        if ($where != '') {
            $where = ' WHERE ' . $where;
        }
        $query = $this->db->query("SELECT projects.id FROM projects " . $where);

        return $query->num_rows();
    }

    function update_port($id, $data) {
        if ($data['video']) {
            $data['video'] = str_replace("watch?v=", "embed/", $data['video']);
        }        
        $this->db->where('id', $id)->update('projects', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete_port($id = '') {
        $this->db->where('id', $id);
        $this->db->delete('projects');
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
        $query = $this->db->query("SELECT * FROM projects_subcats " . $where . " ORDER BY id DESC");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

        function getProductPagination($start = 0, $ar = '') {
        
        $this->load->library('pagination');

        $url = isset($ar)? "$ar/properties/page" : "properties/page"; 
        $config['base_url'] = base_url($url);
        $this->db->where(['active' => 1]);
        $config['total_rows'] = $this->db->get('projects')->num_rows();
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);

        $this->db->select('projects.*');
        $this->db->select('gallery.image as img');
        $this->db->join('gallery', 'gallery.id = projects.image', 'left');
        $this->db->where(['projects.active' => 1]);
        $this->db->order_by('projects.id', 'DESC');

        $data['projects'] = $this->db->get('projects', $config['per_page'], $start)->result();
        $data['links'] = $this->pagination->create_links();

        return $data;
    }


    function getProductAjax($start = 0, $soled = 0) {
        $this->load->library('pagination');

        $config['anchor_class'] = 'class="cat" ';
        $config['base_url'] = base_url('getProjects');
        $this->db->where(['active' => 1]);
        $config['total_rows'] = $this->db->get('projects')->num_rows();
        $config['per_page'] = 9;
        $config['uri_segment'] = 2;
        $this->pagination->initialize($config);

        $this->db->select('projects.*');
        $this->db->select('gallery.image as img');
        $this->db->join('gallery', 'gallery.id = projects.image', 'left');
        $this->db->where(['projects.active' => 1]);
		$this->db->where('projects.soled', $soled);
        $this->db->order_by('projects.id', 'DESC');

        $data['projects'] = $this->db->get('projects', $config['per_page'], $start)->result();
        $data['links'] = $this->pagination->create_links();

        return $data;
    }

}
