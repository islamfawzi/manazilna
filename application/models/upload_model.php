<?php

class Upload_model extends CI_Model {

    function upload_image($path = 'upload/', $old = '', $max_size = '2048', $max_width = '2048', $max_height = '2048', $allowed = 'gif|jpg|png', $thumb = FALSE, $thumb_path = './upload/thumb/', $width = 300, $height = 400, $marker = '', $ratio = TRUE) {
        $data = array();
        $errors = array();
        $config['upload_path'] = './' . $path;
        $config['allowed_types'] = $allowed;
        $config['max_size'] = $max_size;
        $config['max_width'] = $max_width;
        $config['max_height'] = $max_height;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        foreach ($_FILES as $key => $files) {
            if (is_array($_FILES[$key]['name'])) {
                $files_count = count($_FILES[$key]['name']);

                for ($i = 0; $i <= $files_count - 1; $i++) {
                    $_FILES[$key]['name'] = $files['name'][$i];
                    $_FILES[$key]['type'] = $files['type'][$i];
                    $_FILES[$key]['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES[$key]['error'] = $files['error'][$i];
                    $_FILES[$key]['size'] = $files['size'][$i];

                    if (!$this->upload->do_upload($key)) {
                        echo $this->upload->display_errors();
                        exit();
                        $errors[$i] = array('errors' => $this->upload->display_errors());
                    } else {
                        $data[$i] = array('upload_data' => $this->upload->data());
                        $img_path[] = $path . $data[$i]['upload_data']['file_name'];
                        if ($thumb == TRUE) {
                            $th_path[] = $thumb_path . $data[$i]['upload_data']['file_name'] . $marker;
                            $this->load->library('image_lib');
                            $this->resize($data[$i]['upload_data']['full_path'], $data[$i]['upload_data']['file_name'], $thumb_path, $width, $height, $marker, $ratio);
                        }
                    }
                }
            } else {
                if($_FILES[$key]['tmp_name'] != ''){
                    if (!$this->upload->do_upload($key)) {
                        $errors = array('errors' => $this->upload->display_errors());
                        echo '<pre>';
                        print_r($errors);
                        exit();
                    } else {
                        if (file_exists('./' . $old)) {
                            @unlink($old);
                        }

                        $data = array('upload_data' => $this->upload->data());
                        $img_path = $path . $data['upload_data']['file_name'];
                        if ($thumb == TRUE) {
                            $th_path[] = $thumb_path . $data['upload_data']['file_name'];
                            $this->load->library('image_lib');
                            $this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name'], $thumb_path, $width, $height, $marker, $ratio);
                        }
                    }
                }
                
            }
        }
        
        return $img_path;
    }

    function upload_gallery($path = 'upload/', $larg_width = '', $larg_hight = '', $thumb = FALSE, $thumb_path = './upload/thumb/', $width = 300, $height = 400, $marker = '', $ratio = TRUE, $file_name = '') {
        $data = array();
        $errors = array();
        $th_path = array();
        $img_path = array();
        $config['upload_path'] = './' . $path;
        $config['allowed_types'] = 'gif|jpg|png';
        //	$config['max_size']	= '2048';
        //	$config['max_width']  = '2048';
        //	$config['max_height']  = '1024';
        if ($file_name != '') {
            $config['file_name'] = $file_name;
        } else {
            $config['encrypt_name'] = TRUE;
        }


        $this->load->library('upload', $config);
        foreach ($_FILES as $key => $files) {

            if (is_array($_FILES[$key]['name'])) {
                $files_count = count($_FILES[$key]['name']);
                for ($i = 0; $i <= $files_count - 1; $i++) {
                    $_FILES[$key]['name'] = $files['name'][$i];
                    $_FILES[$key]['type'] = $files['type'][$i];
                    $_FILES[$key]['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES[$key]['error'] = $files['error'][$i];
                    $_FILES[$key]['size'] = $files['size'][$i];

                    if (!$this->upload->do_upload($key)) {
                        $errors[$i] = array('errors' => $this->upload->display_errors());
                    } else {
                        $data[$i] = array('upload_data' => $this->upload->data());
                        $img_path[] = $path . $data[$i]['upload_data']['file_name'];
                        $this->load->library('image_lib');
                        $this->resize($data[$i]['upload_data']['full_path'], $data[$i]['upload_data']['file_name'], $path, $larg_width, $larg_hight, '', $ratio);
                        if ($thumb == TRUE) {
                            $th_path[] = $thumb_path . $this->get_thumb_name($data[$i]['upload_data']['file_name'], $marker);
                            $this->resize($data[$i]['upload_data']['full_path'], $data[$i]['upload_data']['file_name'], $thumb_path, $width, $height, $marker, $ratio);
                        }
                    }
                }
            } else {
                if (!$this->upload->do_upload($key)) {
                    $errors = array('errors' => $this->upload->display_errors());
                } else {

                    $data = array('upload_data' => $this->upload->data());
                    $img_path = $path . $data['upload_data']['file_name'];
                    $this->load->library('image_lib');
                    $this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name'], $path, $larg_width, $larg_hight, '', $ratio);
                    if ($thumb == TRUE) {
                        $th_path[] = $thumb_path . $this->get_thumb_name($data[$i]['upload_data']['file_name'], $marker);
                        $this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name'], $thumb_path, $width, $height, $marker, $ratio);
                    }
                }
            }
        }
        $images['img_paths'] = $img_path;
        $images['thumb_paths'] = $th_path;
        return $images;
    }

    function resize($path, $file, $thumb_path, $width, $height, $marker, $ratio) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = TRUE;
        $config['thumb_marker'] = $marker;
        $config['maintain_ratio'] = $ratio;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['new_image'] = './' . $thumb_path . $file;

        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        if (!$this->image_lib->resize()) {
            $errors = array('errors' => $this->image_lib->display_errors());
            $this->load->view('upload_view', $errors);
        }
    }

    function get_thumb_name($filename, $thumb) {
        $file = explode('.', $filename);
        return $file[0] . $thumb . '.' . end($file);
    }

    function insert_gallery($data) {
        $img_paths = $data['img_paths'];
        $thumb_paths = $data['thumb_paths'];
        foreach ($img_paths as $key => $path) {
            $image['image'] = $path;
            if (isset($thumb_paths[$key])) {
                $image['thumb'] = $thumb_paths[$key];
            }
            $image['catid'] = $data['catid'];
            $image['sub_catid'] = $data['sub_catid'];
            $this->db->insert('gallery', $image);
        }
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /** Gallery Categories *********************** */
    function get_gallery($id = '', $subcat = '') {
        $where = '';
        if ($id != '') {
            $where = " WHERE catid = " . $id;
        }
        if ($subcat != '') {
            $where .= ' AND sub_catid = ' . $subcat;
        }
        $q = "SELECT * FROM gallery " . $where . " ORDER BY id DESC";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function get_last_gallery() {
        $q = "SELECT * FROM gallery  ORDER BY id DESC";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    /** ############################################################################# * */
    function add_cat($data) {
        $this->db->insert('gallery_cats', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_cats($catid = '', $keyword = '') {
        if ($catid != '') {
            $where[] = ' e.catid = ' . $catid;
        }
        if ($keyword != '') {
            $where[] = " e.title LIKE '%" . $keyword . "%' ";
        }

        if ($where != '') {
            $where = implode(' AND ', $where);
            $where = ' WHERE ' . $where;
        }

        $q = "SELECT e.*,m.title as par_title FROM gallery_cats e LEFT JOIN gallery_cats m ON e.catid = m.id " . $where . " ORDER BY e.catid,e.id DESC";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function get_cat($id) {
        $q = "SELECT * FROM gallery_cats WHERE id = " . $id . " LIMIT 1";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->first_row('array');
        } else {
            return 0;
        }
    }

    function get_main_cats() {
        $q = "SELECT * FROM gallery_cats WHERE catid = 0 ORDER BY id DESC";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_sub_cats($cat = '') {
        $where = '';
        if ($cat != '') {
            $where = ' AND catid = ' . $cat;
        }
        $q = "SELECT * FROM gallery_cats WHERE catid != 0 " . $where . " ORDER BY catid DESC";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    /** ############################################################################## * */
    function update_cat($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('gallery_cats', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    function delete_cat($id) {
        $this->db->where('id', $id);
        $this->db->delete('gallery_cats');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**  delete image ************************************** */
    function delete_image($id) {
        $image = $this->get_image($id);
        if (file_exists($image->image)) {
            @unlink('./' . $image->image);
        }
        if (file_exists($image->thumb)) {
            @unlink('./' . $image->thumb);
        }
        $this->db->where('id', $id);
        $this->db->delete('gallery');
    }

    /**  delete image Pathes ************************************** */
    function get_image($id) {
        $q = "SELECT * FROM gallery WHERE id = " . $id . " LIMIT 1";
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            return $query->first_row();
        }
    }

    function get_images($ids) {
        if ($ids != 0) {
            $ids = explode(',', $ids);
            foreach ($ids as $id) {
                $images['images'][$id] = $this->get_image($id)->image;
                $images['thumbs'][$id] = $this->get_image($id)->thumb;
            }
            return $images;
        }
    }

    function get_images2($ids) {
        if ($ids != 0) {
            $ids = explode(',', $ids);
            foreach ($ids as $id) {
                $images['images'] = $this->get_image($id)->image;
            }
            return $images;
        }
    }

    function get_multi_images($ids = '') {
        if ($ids != 0) {
            $ids = explode(',', $ids);
            foreach ($ids as $id) {
                $images[] = $this->get_image($id)->image;
            }
            return $images;
        }
    }

    function get_thumbs($ids) {
        if ($ids != 0) {
            $ids = explode(',', $ids);
            foreach ($ids as $id) {
                $images = $this->get_image($id)->thumb;
            }

            return $images;
        }
    }

    function get_larg_images($ids) {
        if ($ids != 0) {
            $ids = explode(',', $ids);
            foreach ($ids as $id) {
                $images = $this->get_image($id)->image;
            }

            return $images;
        }
    }

    function upload_file($path = 'upload/', $allowed = 'doc|docx|pdf') {
        $data = array();
        $errors = array();
        $config['upload_path'] = './' . $path;
        $config['allowed_types'] = $allowed;

        $this->load->library('upload', $config);
        foreach ($_FILES as $key => $files) {

            if (!$this->upload->do_upload($key)) {
                $errors = array('errors' => $this->upload->display_errors());
                echo '<pre>';
                print_r($errors);
                exit();
            } else {
                $data = array('upload_data' => $this->upload->data());
                $img_path = $path . $data['upload_data']['file_name'];
            }
        }
        if (is_array($img_path)) {
            $img_path = implode(',', $img_path);
        }
        //  return pathes array
        return $img_path;
    }

}
