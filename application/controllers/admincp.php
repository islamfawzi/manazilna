<?php

class Admincp extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('user');
        $this->load->model('mac');
        $this->load->model('admincp_mod');
        $this->load->model('upload_model');

        $this->load->library('session');
        $this->load->model('session_mod');
        if ($this->session->userdata('fullname') == '') {
            redirect(base_url() . 'login');
        }
        $userid = $this->session->userdata('user_id');
        $GLOBALS['privacy'] = $this->user->get_user_privacy($userid);

        session_start();
        $_SESSION['active_users'][] = session_id();
        $usersNumber = count($_SESSION['active_users']);

        $number_of_users = count(glob(session_save_path() . '/*'));
    }

    function index() {
        $logged = $this->user->get_logged($this->mac->get_mac());
        if ($logged->logged == 1) {
            $this->session->set_userdata('fullname', $logged->fullname);
            $this->session->set_userdata('user_id', $logged->id);
            $data["title"] = 'لوحة التحكم';
            $this->settings();
            //   $this->load->view('admincp/setting_view',$data);
        } else {
            $data = array('username' => '', 'password' => '', 'title' => 'تسجيل الدخول');
            $this->load->view('admincp/login_view', $data);
        }
    }

    /** Site Settings ***************************************************************************** */
    function settings() {
        $this->check_privacy(1);/** check privacy * */
        $data['config'] = $this->admincp_mod->settings();
        $data['social'] = $this->admincp_mod->social();
        if (isset($_REQUEST['setting_submit'])) {
            if ('' != @file_get_contents($_FILES["logo"]["tmp_name"])) {
                $this->load->model('upload_model');
                $image = $this->upload_model->upload_image('upload/config/', $data['site_logo']);
                $_POST['site_logo'] = $image;
            }
            unset($_POST['setting_submit']);

            $update = $this->admincp_mod->update_settings($_POST);
            if ($update == 1) {
                $data['config'] = $this->admincp_mod->settings();
                $data['social'] = $this->admincp_mod->social();
                $data['config']->updated = 1;
            } else {
                $data['config'] = $this->admincp_mod->settings();
                $data['social'] = $this->admincp_mod->social();
                $data['config']->updated = 2;
            }
        }
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/setting_view', $data);
    }

    function site_word($x = '') {
        $this->check_privacy(1);
        $this->load->model('admincp_mod');
        $data = $this->admincp_mod->site_word($x);

        if (isset($_REQUEST['save'])) {

            $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
            $this->session_mod->unset_session('sel_imgs');

            unset($_POST['save']);
            unset($_POST['news_id']);

            if ($this->admincp_mod->site_word($x, $_POST)) {
                $data['added'] = 1;
                $data = $_POST;
            } else {
                $data['added'] = 2;
            }
        }

        $data['x'] = $x;
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/site_word', $data);
    }

    /** Main Menu ***************************************************************************** */
    function add_menu($main = '') {
        $this->check_privacy(2);/** check privacy * */
        $this->load->model('menu_model');
        $this->load->model('pages_mod');
        if (isset($_REQUEST['add_menu_submit'])) { /** add Menu  * */


            //   $this->load->library('form_validation');
            //   $this->form_validation->set_rules('alias', 'Alias', 'is_unique[menu.alias]');
            //   $this->form_validation->set_rules('alias_en', 'Alias En', 'is_unique[menu.alias_en]');

            $valid = $this->menu_model->validate_alias($_POST['alias'], 'ar', $_POST['menu']);
            $valid_en = $this->menu_model->validate_alias($_POST['alias_en'], 'en', $_POST['menu']);
            if ($valid == 1 || $valid_en == 1) {
                $data = $_POST;
                $data['add'] = 1;
                $data['added'] = 3;
            } else {
                $alias = $this->menu_model->alias($_POST['alias']);
                $alias_en = $this->menu_model->alias($_POST['alias_en']);
                $_POST['alias'] = trim(strtolower($alias));
                $_POST['alias_en'] = trim(strtolower($alias_en));

                if ($_POST['menu'] != 0) {
                    $parent_alias = $this->menu_model->get_alias($_POST['menu']);
                    $_POST['link'] = $parent_alias . '/' . strtolower($alias);

                    $parent_alias_en = $this->menu_model->get_alias_en($_POST['menu']);
                    $_POST['link_en'] = $parent_alias_en . '/' . strtolower($alias_en);
                } else {
                    $_POST['link'] = strtolower($alias);
                    $_POST['link_en'] = strtolower($alias_en);
                }
                if (!isset($_POST['pos1'])) {
                    $_POST['pos1'] = 0;
                }
                if (!isset($_POST['pos2'])) {
                    $_POST['pos2'] = 0;
                }
                if (!isset($_POST['pos1_en'])) {
                    $_POST['pos1_en'] = 0;
                }
                if (!isset($_POST['pos2_en'])) {
                    $_POST['pos2_en'] = 0;
                }

                $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
                $this->session_mod->unset_session('sel_imgs');
                unset($_POST['add_menu_submit']);
                unset($_POST['old_alias']);
                unset($_POST['old_alias_en']);
                unset($_POST['old_parent']);
                $added = $this->menu_model->add_menu($_POST);
                if ($added == true) {
                    $data['added'] = 1;
                    $data['add'] = 1;
                } else {
                    $data['added'] = 2;
                }
            }
        } elseif (isset($_REQUEST['edit_menu_submit'])) { /** edit Menu  * */

            $menu_id = $_REQUEST['menu_id'];

            $valid = $this->menu_model->validate_alias($_POST['alias'], 'ar', $_POST['menu']);
            $valid_en = $this->menu_model->validate_alias($_POST['alias_en'], 'en', $_POST['menu']);

            if (($valid == 1 || $valid_en == 1) && $_POST['old_alias'] != $_POST['alias'] && $_POST['old_alias_en'] != $_POST['alias_en']) {
                $data = $_POST;
                $data['added'] = 3;
            } else {
                $alias = $this->menu_model->alias($_POST['alias']);
                $alias_en = $this->menu_model->alias($_POST['alias_en']);
                $_POST['alias'] = trim(strtolower($alias));
                $_POST['alias_en'] = trim(strtolower($alias_en));


                if (!empty($_POST['page_images'])) {
                    $_POST['image'] = implode(',', $_POST['page_images']);
                } else {
                    $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
                    $this->session_mod->unset_session('sel_imgs');
                }

                if ($_POST['menu'] != 0) {
                    $parent_alias = $this->menu_model->get_alias($_POST['menu']);
                    $_POST['link'] = $parent_alias . '/' . strtolower($alias);

                    $parent_alias_en = $this->menu_model->get_alias_en($_POST['menu']);
                    $_POST['link_en'] = $parent_alias_en . '/' . strtolower($alias_en);
                } else {
                    $_POST['link'] = strtolower($alias);
                    $_POST['link_en'] = strtolower($alias_en);
                }

                if (!isset($_POST['pos1'])) {
                    $_POST['pos1'] = 0;
                }
                if (!isset($_POST['pos2'])) {
                    $_POST['pos2'] = 0;
                }
                if (!isset($_POST['pos1_en'])) {
                    $_POST['pos1_en'] = 0;
                }
                if (!isset($_POST['pos2_en'])) {
                    $_POST['pos2_en'] = 0;
                }
                unset($_POST['edit_menu_submit']);
                unset($_POST['old_alias']);
                unset($_POST['old_alias_en']);
                unset($_POST['menu_id']);
                unset($_POST['page_images']);
                unset($_POST['old_parent']);
                if ($this->input->post('sub') == 0) {

                    $this->menu_model->update_link($menu_id, $_POST['alias'], $_POST['alias_en']);/** update sub menus links* */
                }
                if ($this->menu_model->update_menu($_POST, $menu_id) == 1) {


                    $data = $_POST;
                    $data['updated'] = 1;
                } else {
                    $data = $_POST;
                    $data['updated'] = 2;
                }
            }
        } else {
            $data['add'] = 1;
        }

        $data['n_main'] = $main;

        $data['all_pages'] = $this->pages_mod->get_Pages();
        // $data['all_page_cats'] = $this->pages_mod->get_cat();
        $data['main_menus'] = $this->menu_model->get_main_menu();
        $data['page_index'] = 1;
        $data['privacy'] = $this->get_privacy();
        $this->parser->parse('admincp/menu_view', $data);
    }

    function edit_menu($id = '', $title = '') {
        $this->check_privacy(2);/** check privacy * */
        $this->load->model('menu_model');
        $this->load->model('pages_mod');
        if ($id != '') {
            $data = $this->menu_model->get_item($id);
            if ($data['image'] != '' && $data['image'] != 0) {
                $images = $this->upload_model->get_images($data['image']);
                $data['images'] = $images['images'];
            }
            $data['page_index'] = 1;
        } else {
            if (isset($_REQUEST['menu_del'])) {
                foreach ($_POST['sel_menu'] as $menu) {
                    if ($this->menu_model->del_menu($menu)) {
                        $data['deleted'] = 1;
                    }
                }
                $data['all_menus'] = $this->menu_model->get_all_menu();
            } elseif (isset($_REQUEST['search'])) {
                $data['all_menus'] = $this->menu_model->get_menu_like($this->input->post('keyword'), $_REQUEST['main_menu']);
                $data['search_word'] = $this->input->post('keyword');
                $data['search_id'] = $_REQUEST['main_menu'];
            } elseif ($_REQUEST['main_menu'] != '') {
                $menu_id = $_REQUEST['main_menu'];
                $data['all_menus'] = $this->menu_model->get_sub_menus($menu_id);
                $data['search_id'] = $menu_id;
            } else {
                $data['all_menus'] = $this->menu_model->get_all_menu();
            }

            $data['page_index'] = 2;
        }
        $data['main_menus'] = $this->menu_model->get_main_menu();
        $data['all_pages'] = $this->pages_mod->get_Pages();
        $data['all_page_cats'] = $this->pages_mod->get_cat();
        $data['privacy'] = $this->get_privacy();
        $this->parser->parse('admincp/menu_view', $data);
    }

    function get_pages_cat($x = '', $parent = '') {
        $this->load->model('pages_mod');
        $pages = $this->pages_mod->get_page_where("cat_FK = " . $x);
        $out = '<option value="">بدون رابط</option>';
        foreach ($pages as $page) {

            $out .= "<option ";
            if ($page->id == $parent) {
                $out .= " selected='true' ";
            }
            $out .= " value=" . $page->id . "> " . $page->title . " </option>";
        }

        echo $out;
    }

    /** Slider *****************************************************************************
      add image to slider * */
    function add_slider() {
        $this->check_privacy(3);/** check privacy * */
        $this->load->model('slider_mod');
        if (isset($_REQUEST['add_slider_submit'])) { /** add Slider Image  * */


            if ('' != @file_get_contents($_FILES["slider"]["tmp_name"])) {

                /** upload banner image with width 400  * */
                $image = $this->upload_model->upload_image('upload/slider/', '', '2048', '2048', '2048', 'gif|jpg|png', FALSE, $thumb_path = './upload/slider/', 1349, 500);
                $_POST['image'] = $image;
            }

            unset($_POST['add_slider_submit']);
            if ($this->slider_mod->add_slider($_POST) == true) {
                $data['added'] = 1;
                $data['add'] = 1;
            } else {
                $data['added'] = 2;
            }
        } elseif (isset($_REQUEST['edit_slider_submit'])) { /** edit Slider Image  * */
            $img_id = $_POST['slider_id'];
            if ('' != @file_get_contents($_FILES["slider"]["tmp_name"])) {

                /** upload banner image with width 400  * */
                $image = $this->upload_model->upload_image('upload/slider/', $_POST['old_img'], '2048', '2048', '2048', 'gif|jpg|png', FALSE, $thumb_path = './upload/slider/', 1349, 500);
                $_POST['image'] = $image;
            }
            unset($_POST['edit_slider_submit']);/** unset non column fields from $_POST array * */
            unset($_POST['old_img']);
            unset($_POST['slider_id']);
            if ($this->slider_mod->update_slider($_POST, $img_id) == true) {
                $data = $_POST;
                $data['updated'] = 1;
            } else {
                $data = $_POST;
                $data['updated'] = 2;
            }
        } else {
            $data['add'] = 1;
        }
        $data['page_index'] = 1;
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/slider_view', $data);
    }

    /** get all images and edit one image * */
    function edit_slider($id = '', $title = '') {
        $this->check_privacy(3);/** check privacy * */
        $this->load->model('slider_mod');
        if ($id != '') {
            $data = $this->slider_mod->get_item_slider($id);
            $data['page_index'] = 1;
        } else {

            if (isset($_REQUEST['images_del'])) {
                foreach ($_POST['sel_image'] as $img) {
                    if ($this->slider_mod->del_slider($img) == true) {
                        $data['deleted'] = 1;
                    } else {
                        $data['deleted'] = 2;
                    }
                }
            }
            $all_images = $this->slider_mod->get_all_slider();
            if ($all_images != 0) {
                $data['all_images'] = $all_images;
            }
            $data['page_index'] = 2;
        }
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/slider_view', $data);
    }

    function edit_page_banner($param) {
        $this->check_privacy(3);
        $this->load->model('slider_mod');
        if (isset($_REQUEST['save'])) {

            $image = $this->upload_model->upload_image('upload/slider/', '', '2048', '2048', '2048', 'gif|jpg|png', FALSE, $thumb_path = './upload/slider/', 1349, 500);
            foreach ($image as $key => $value) {
                $this->db->where('id', $key);
                $this->db->update('page_banner', array('img' => $value));
            }
        } else {
            $temp = $this->db->get('page_banner')->result();
            $img = array();
            foreach ($temp as $key => $value) {
                $img[$value->id] = $value->img;
            }
        }
        $data['imgs'] = $img;
        $data['page_index'] = 1;
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/page_banner', $data);
    }

    /**   add Site Pages   ************************************************************************** */
    function add_page($type = '', $cat = '') {


        $this->load->model('pages_mod');
        $this->load->model('portfolio_mod');
        if (isset($_REQUEST['add_page_submit'])) { /** add Site Page   * */
            unset($_POST['add_page_submit']);

            $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
            $this->session_mod->unset_session('sel_imgs');

            $_POST['fb_image'] = ($this->session_mod->get_session('fb_imgs') != null ? $this->session_mod->get_session('fb_imgs') : 0);
            $this->session_mod->unset_session('fb_imgs');

            if ($this->pages_mod->add_page($_POST) == true) {
                $data['added'] = 1;
            } else {
                $data['added'] = 2;
            }
            $data['add'] = 1;
        } elseif (isset($_REQUEST['edit_page_submit'])) {

            $page_id = $_POST['page_id'];
            if (!empty($_POST['page_images'])) {
                $_POST['image'] = implode(',', $_POST['page_images']);
            } else {
                $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
                $this->session_mod->unset_session('sel_imgs');
            }

            if (!empty($_POST['fb_images'])) {
                $_POST['fb_image'] = implode(',', $_POST['fb_images']);
            } else {
                $_POST['fb_image'] = $this->session_mod->get_session('fb_imgs');
                $this->session_mod->unset_session('fb_imgs');
            }

            unset($_POST['edit_page_submit']);
            unset($_POST['page_images']);
            unset($_POST['fb_images']);
            unset($_POST['page_id']);
            if ($this->pages_mod->edit_page($page_id, $_POST) == true) {
                $data = $_POST;
                $data['updated'] = 1;
            } else {
                $data['updated'] = 2;
            }
        } else {
            $data['add'] = 1;
        }

        $data['n_type'] = $type;
        $data['n_cat'] = $cat;

        $data['page_index'] = 1;
        $data['all_cats'] = $this->portfolio_mod->get_cat();
        $data['page_cats'] = $this->pages_mod->get_cat();
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/pages_view', $data);
    }

    function edit_page($id = '') {

        $this->load->model('pages_mod');
        $this->load->model('upload_model');
        $this->load->model('portfolio_mod');
        if ($id != '' && $id != 'back') {
            $data = $this->pages_mod->get_Pages($id);
            $data['page_index'] = 1;
        } else {
            if (isset($_REQUEST['pages_del'])) {
                $x = 0;
                foreach ($_POST['sel_pages'] as $page) {

                    if ($this->pages_mod->delete_page($page) != 1) {
                        $x = 1;
                    }
                }
                if ($x == 0) {
                    $data['deleted'] = 1;
                } else {
                    $data['deleted'] = 2;
                }
            }

            if ($this->input->post('search') == 1 || $_POST['page_cat'] != '' || $_POST['page_type'] != '' || $_POST['selection_form'] == 1) {
                //   $data['all_pages'] = $this->pages_mod->get_page_like($this->input->post('keyword'),$_POST['page_cat'],$_POST['page_type']);
                $data['search_word'] = $this->input->post('keyword');
                $data['search_id'] = $_POST['page_cat'];
                $data['type_id'] = $_POST['page_type'];

                $this->session_mod->unset_session('keyword');
                $this->session_mod->set_session('keyword', $this->input->post('keyword'));
                $this->session_mod->unset_session('type_id');
                $this->session_mod->set_session('type_id', $this->input->post('page_type'));
                $this->session_mod->unset_session('cat_id');
                $this->session_mod->set_session('cat_id', $this->input->post('page_cat'));

                $data['all_pages'] = $this->pages_mod->get_page_like($this->session_mod->get_session('keyword'), $this->session_mod->get_session('cat_id'), $this->session_mod->get_session('type_id'));
            } else {
                //  $data['all_pages'] = $this->pages_mod->get_Pages();
                //echo $this->session->userdata('keyword').'    '.$this->session->userdata('cat_id').'    '.$this->session->userdata('type_id'); exit();

                if ($id == 'back') {
                    $data['all_pages'] = $this->pages_mod->get_page_like($this->session_mod->get_session('keyword'), $this->session_mod->get_session('cat_id'), $this->session_mod->get_session('type_id'));
                } else {
                    $this->session_mod->unset_session('keyword');
                    $this->session_mod->unset_session('type_id');
                    $this->session_mod->unset_session('cat_id');
                    $data['all_pages'] = $this->pages_mod->get_page_like();
                }
            }

            $data['page_index'] = 2;
        }



        $data['page_cats'] = $this->pages_mod->get_cat();
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/pages_view', $data);
    }

    function add_page_cat() {
        $this->load->model('pages_mod');
        if (isset($_REQUEST['add_cat_submit'])) {
            unset($_POST['add_cat_submit']);


            if ($this->pages_mod->add_cat($_POST) == 1) {
                $data['added'] = 1;
            } else {
                $data['added'] = 2;
            }
            $data['add'] = 1;
        } elseif (isset($_REQUEST['edit_cat_submit'])) {
            $cat_id = $this->input->post('cat_id');
            unset($_POST['edit_cat_submit']);
            unset($_POST['cat_id']);
            if ($this->pages_mod->update_cat($cat_id, $_POST) == 1) {
                $data = $this->pages_mod->get_cat($cat_id);
                $data['updated'] = 1;
            } else {
                $data = $this->pages_mod->get_cat($id);
                $data['updated'] = 2;
            }
        } else {
            $data['add'] = 1;
        }

        $data['page_index'] = 3;
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/pages_view', $data);
    }

    function edit_page_cat($id = '') {
        $this->load->model('pages_mod');
        if ($id != '') {
            $data = $this->pages_mod->get_cat($id);
            $data['page_index'] = 3;
        } else {
            if (isset($_REQUEST['cat_del'])) {
                $sel_cats = $this->input->post('sel_cat');
                $x = 0;
                foreach ($sel_cats as $cat) {
                    if ($this->pages_mod->del_cat($cat) != 1) {
                        $x = 1;
                    }
                }

                if ($x == 0) {
                    $data['deleted'] = 1;
                } else {
                    $data['deleted'] = 2;
                }
            } elseif (isset($_REQUEST['search'])) {
                $data['all_cats'] = $this->pages_mod->get_cat_like($this->input->post('keyword'));
                $data['search_word'] = $this->input->post('keyword');
            }
            $data['all_cats'] = $this->pages_mod->get_cat();
            $data['page_index'] = 4;
        }
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/pages_view', $data);
    }

    function add_project($main_cat = '', $sub_cat = '') {

        $this->load->model('projects_mod');
        if (isset($_REQUEST['add_work_submit'])) {
            unset($_POST['add_work_submit']);

            $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
            $this->session_mod->unset_session('sel_imgs');

            $_POST['amenities'] = json_encode($_POST['amenities']);
            $_POST['ref'] = uniqid('manzilna-');

            if ($this->projects_mod->add_port($_POST) == 1) {
                $data['added'] = 1;
                $data['add'] = 1;
                $data['page_index'] = 5;
            } else {
                $data = $_POST;
                $data['added'] = 2;
            }
        } elseif (isset($_REQUEST['edit_work_submit'])) {
            $port_id = $_POST['port_id'];

            if (!empty($_POST['page_images'])) { /** Get Images * */
                $_POST['image'] = implode(',', $_POST['page_images']);
            } else {
                $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
                $this->session_mod->unset_session('sel_imgs');
            }
            $_POST['amenities'] = json_encode($_POST['amenities']);
            unset($_POST['page_images']);
            unset($_POST['port_id']);
            unset($_POST['edit_work_submit']);
            $data = $_POST;

            if ($this->projects_mod->update_port($port_id, $_POST) == 1) {
                $data['updated'] = 1;
            } else {
                $data['updated'] = 2;
            }
            $data['page_index'] = 5;
        } else {
            $data['add'] = 1;
            $data['page_index'] = 5;
        }

        $data['all_main_cats'] = $this->projects_mod->get_cat();

        $data['_amenities'] = $this->db->get('amenities')->result();
        $data['_finish_types'] = $this->db->get('finish_types')->result();
        $data['_property_types'] = $this->db->get('property_types')->result();

        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/projects', $data);
    }

    function edit_project($id = '', $start = 0) {
        $this->load->model('projects_mod');
        $this->load->library('pagination');
        $config['base_url'] = base_url('admincp/edit_project/0/');
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['next_link'] = '<span aria-hidden=\"true\">&laquo;</span>';
        $config['prev_link'] = '<span aria-hidden=\"true\">&raquo;</span>';


        if ($id != '' && $id != 'back' && $id != 0) {
            $data = $this->projects_mod->get_port($id);

            $data['page_index'] = 5;
            if ($data['image'] != '' && $data['image'] != 0) {
                $images = $this->upload_model->get_images($data['image']);
                $data['images'] = $images['images'];
            }

            $data['_amenities'] = $this->db->get('amenities')->result();
            $data['_finish_types'] = $this->db->get('finish_types')->result();
            $data['_property_types'] = $this->db->get('property_types')->result();

            $data['all_main_cats'] = $this->projects_mod->get_cat();
        } else {
            if (isset($_REQUEST['port_del'])) {
                $x = 0;
                foreach ($_POST['sel_port'] as $port) {
                    if ($this->projects_mod->delete_port($port) != 1) {
                        $x = 1;
                    }
                }
                if ($x == 0) {
                    $data['deleted'] = 1;
                } else {
                    $data['deleted'] = 2;
                }
                $data['all_ports'] = $this->projects_mod->get_port();
            } else {

                $data['all_ports'] = $this->projects_mod->get_port('', $config['per_page'], $start);
                $config['total_rows'] = $this->projects_mod->get_port_count();
                $this->pagination->initialize($config);
                $data['pages'] = $this->pagination->create_links();
            }

            $data['page_index'] = 6;
        }
        $data['all_main_cats'] = $this->projects_mod->get_cat();

        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/projects', $data);
    }

    function property_feature($_table, $action = null, $id = null) {

        if ($_table != '' && $action == 'new') {

            $data['add'] = 1;
            $data['page_index'] = 1;
        } elseif ($_table != '' && $id != null) {

            $data['data'] = $this->db->get_where($_table, ['id' => $id])->first_row();
            $data['page_index'] = 1;
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['add_resource'])) {

            unset($_POST['add_resource']);
            if ($this->db->insert($_table, $_POST)) {
                $data['added'] = TRUE;
            } else {
                $data['added'] = FALSE;
            }
            $data['add'] = 1;
            $data['page_index'] = 1;
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['edit_resource'])) {
            $id = $_POST['id'];
            unset($_POST['edit_resource'], $_POST['id']);
            if ($this->db->update($_table, $_POST, ['id' => $id])) {
                $data['updated'] = 1;
            } else {
                $data['updated'] = 2;
            }
        } else {

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['destroy'])) {
                if (!empty($_POST['sel_ids'])) {
                    foreach ($_POST['sel_ids'] as $key => $id) {
                        if ($this->db->delete($_table, ['id' => $id])) {
                            $data['deleted'] = 1;
                        } else {
                            $data['deleted'] = 2;
                        }
                    }
                }
            }

            $data['data'] = $this->admincp_mod->get_property_feature($_table);
            $data['page_index'] = 2;
        }
        $data['table'] = $_table;
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/property_feature', $data);
    }

    function add_project_cat() {
        $this->load->model('projects_mod');
        if (isset($_REQUEST['add_cat_submit'])) {
            unset($_POST['add_cat_submit']);

            $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
            $this->session_mod->unset_session('sel_imgs');


            if ($this->projects_mod->add_cat($_POST) == 1) {
                $data['added'] = 1;
                $data['add'] = 1;
            }
        } elseif (isset($_REQUEST['edit_cat_submit'])) {

            $cat_id = $_POST['cat_id'];
            unset($_POST['cat_id']);
            unset($_POST['edit_cat_submit']);

            if (!empty($_POST['page_images'])) { /** Get Images * */
                $_POST['image'] = implode(',', $_POST['page_images']);
                unset($_POST['page_images']);
            } else {
                $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
                $this->session_mod->unset_session('sel_imgs');
            }

            if ($this->projects_mod->update_cat($cat_id, $_POST) == 1) {
                $data = $_POST;
                $data['updated'] = 1;
            } else {
                $data = $_POST;
                $data['updated'] = 2;
            }
        } else {
            $data['add'] = 1;
        }

        $data['page_index'] = 1;
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/projects', $data);
    }

    function edit_project_cat($id = '') {
        $this->load->model('projects_mod');
        if ($id != '') {
            $data = $this->projects_mod->get_cat($id);

            if ($data['image'] != '' && $data['image'] != 0) {
                $images = $this->upload_model->get_images($data['image']);
                $data['images'] = $images['images'];
            }

            $data['page_index'] = 1;
        } else {
            if (isset($_REQUEST['cat_del'])) {
                $x = 0;
                foreach ($_POST['sel_cat'] as $cat) {
                    if ($this->projects_mod->delete_cat($cat) != 1) {
                        $x = 1;
                    }
                }
                if ($x == 0) {
                    $data['deleted'] = 1;
                } else {
                    $data['deleted'] = 2;
                }
            }
            $data['all_cats'] = $this->projects_mod->get_cat();
            $data['page_index'] = 2;
        }
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/projects', $data);
    }

    /** End projects ****************************************************************** */
    /*  Certificates * */

    function add_certificates($main_cat = '', $sub_cat = '') {
        $this->load->model('certificates_mod');
        if (isset($_REQUEST['add_work_submit'])) {
            unset($_POST['add_work_submit']);

            $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
            $this->session_mod->unset_session('sel_imgs');

            if ($this->certificates_mod->add_port($_POST) == 1) {
                $data['added'] = 1;
                $data['add'] = 1;
                $data['page_index'] = 5;
            } else {
                $data = $_POST;
                $data['added'] = 2;
            }
        } elseif (isset($_REQUEST['edit_work_submit'])) {
            $port_id = $_POST['port_id'];

            if (!empty($_POST['page_images'])) { /** Get Images * */
                $_POST['image'] = implode(',', $_POST['page_images']);
            } else {
                $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
                $this->session_mod->unset_session('sel_imgs');
            }

            unset($_POST['page_images']);
            unset($_POST['port_id']);
            unset($_POST['edit_work_submit']);
            $data = $_POST;
            if ($this->certificates_mod->update_port($port_id, $_POST) == 1) {
                $data['updated'] = 1;
            } else {
                $data['updated'] = 2;
            }
            $data['page_index'] = 5;
        } else {
            $data['add'] = 1;
            $data['page_index'] = 5;
        }

        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/certificates', $data);
    }

    function edit_certificates($id = '', $start = 0) {
        $this->load->model('certificates_mod');
        $this->load->library('pagination');
        $config['base_url'] = base_url('admincp/edit_port/0/');
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['next_link'] = '<span aria-hidden=\"true\">&laquo;</span>';
        $config['prev_link'] = '<span aria-hidden=\"true\">&raquo;</span>';


        if ($id != '' && $id != 'back' && $id != 0) {
            $data = $this->certificates_mod->get_port($id);
            $data['page_index'] = 5;
            if ($data['image'] != '' && $data['image'] != 0) {
                $images = $this->upload_model->get_images($data['image']);
                $data['images'] = $images['images'];
            }
        } else {
            if (isset($_REQUEST['port_del'])) {
                $x = 0;
                foreach ($_POST['sel_port'] as $port) {
                    if ($this->certificates_mod->delete_port($port) != 1) {
                        $x = 1;
                    }
                }
                if ($x == 0) {
                    $data['deleted'] = 1;
                } else {
                    $data['deleted'] = 2;
                }
                $data['all_ports'] = $this->certificates_mod->get_port();
            } elseif (isset($_REQUEST['search'])) {

                $data['all_ports'] = $this->certificates_mod->get_port_like($this->input->post('keyword'), $_REQUEST['port_cat'], $_REQUEST['port_subcat'], 10, $start);
                $data['search_word'] = $this->input->post('keyword');
                $data['search_sub'] = $_REQUEST['port_subcat'];
                $data['search_id'] = $_REQUEST['port_cat'];
                $data['all_sub_cats'] = $this->certificates_mod->get_sub_cats($_REQUEST['port_cat']);

                $config['total_rows'] = $this->certificates_mod->get_port_like_count($this->input->post('keyword'), $_REQUEST['port_cat'], $_REQUEST['port_subcat']);
                $this->pagination->initialize($config);
                $data['pages'] = $this->pagination->create_links();
            } elseif ($_REQUEST['port_cat'] != '' || $_REQUEST['keyword'] != '') {
                $this->session_mod->unset_session('port_keyword');
                $this->session_mod->set_session('port_keyword', $_REQUEST['keyword']);

                $this->session_mod->unset_session('port_cat');
                $this->session_mod->set_session('port_cat', $_REQUEST['port_cat']);

                $catid = $this->session_mod->get_session('port_cat');

                if ($catid == 'fet') {
                    $where = 'fet = 1 OR fet_en = 1 ';
                } else {
                    $where[] = "catid = " . $catid;
                    if ($_REQUEST['port_subcat'] != '') {
                        $where[] = "sub_catid = " . $this->session_mod->get_session('port_subcat');
                    }
                    $where = implode(' AND ', $where);
                }

                $data['all_ports'] = $this->certificates_mod->get_port_where($where, 10, $start);
                $config['total_rows'] = $this->certificates_mod->get_port_count_where($where);
                $this->pagination->initialize($config);
                $data['pages'] = $this->pagination->create_links();

                $data['search_id'] = $catid;

                $data['all_sub_cats'] = $this->certificates_mod->get_sub_cats($catid);
            } elseif ($id == 'back') {
                if ($this->session_mod->get_session('port_cat') != '') {
                    $where[] = "catid = " . $this->session_mod->get_session('port_cat');
                }
                if ($this->session_mod->get_session('port_subcat') != '') {
                    $where[] = "sub_catid = " . $this->session_mod->get_session('port_subcat');
                }
                $where = implode(' AND ', $where);
                $data['all_ports'] = $this->certificates_mod->get_port_where($where, 10, $start);
                $config['total_rows'] = $this->certificates_mod->get_port_count_where($where);
                $this->pagination->initialize($config);
                $data['pages'] = $this->pagination->create_links();
            } else {

                if ($start != 0) {

                    if ($this->session_mod->get_session('port_cat') != '') {
                        $where[] = "catid = " . $this->session_mod->get_session('port_cat');
                    }

                    if ($this->session_mod->get_session('port_subcat') != '') {
                        $where[] = "sub_catid = " . $this->session_mod->get_session('port_subcat');
                    }

                    $where = implode(' AND ', $where);

                    $data['all_ports'] = $this->certificates_mod->get_port_where($where, 10, $start);
                    $config['total_rows'] = $this->certificates_mod->get_port_count_where($where);
                } else {
                    $this->session_mod->unset_session('port_keyword');
                    $this->session_mod->unset_session('port_cat');
                    $data['all_ports'] = $this->certificates_mod->get_port('', 10, $start);
                    $config['total_rows'] = $this->certificates_mod->get_port_count();
                }
                $this->pagination->initialize($config);
                $data['pages'] = $this->pagination->create_links();
            }

            $data['page_index'] = 6;
        }
        // $data['all_main_cats'] = $this->certificates_mod->get_cat();
        if ($this->session_mod->get_session('port_cat') != '') {

        }


        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/certificates', $data);
    }

    /*     * */

    /** Contact Us ******************************************************************** */
    function contact_page() {
        $this->load->model('contact_model');
        if (isset($_REQUEST['edit_contact_submit'])) {
            unset($_POST['edit_contact_submit']);

            if (!empty($_POST['page_images'])) {
                $_POST['image'] = implode(',', $_POST['page_images']);
            } else {
                $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
                $this->session_mod->unset_session('sel_imgs');
            }

            if ($this->contact_model->edit_page($_POST) == true) {
                $data = $this->contact_model->get_contact();
                $data['updated'] = 1;
            }
        } else {
            $data = $this->contact_model->get_contact();
            $images = $this->upload_model->get_images($data['image']);
            $data['images'] = $images['images'];
        }
        $data['page_index'] = 1;
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/contact_view', $data);
    }

    function contact_inbox($id = '', $name = '') {
        $this->load->model('contact_model');
        if ($id != '') {
            $data = $this->contact_model->get_inbox($id);
            $data['page_index'] = 3;
        } else {
            if (isset($_REQUEST['del_inbox_submit'])) {
                $id = $this->input->post('msg_id');
                $this->contact_model->del_msg($id);
            } elseif (isset($_REQUEST['inbox_del'])) {
                $inbox = $this->input->post('sel_inbox');
                $x = 0;
                foreach ($inbox as $msg) {
                    $del = $this->contact_model->del_msg($msg);
                    if ($del != 1) {
                        $x = 1;
                    }
                }

                if ($x > 0) {
                    $data['deleted'] = 2;
                } else {
                    $data['deleted'] = 1;
                }
            }
            $data['inbox'] = $this->contact_model->get_inbox();
            $data['page_index'] = 2;
        }
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/contact_view', $data);
    }

    /**     * ********************************************************* Newsletter ****** */
    function mail_list($id = '', $mail = '') {
        $this->load->model('newsletter_model');
        if ($id != '') {
            $data = $this->newsletter_model->get_mailList($id);
            $data['page_index'] = 2;
        } else {
            if (isset($_REQUEST['edit_mail_submit'])) {
                $mail_id = $this->input->post('mail_id');
                unset($_POST['mail_id']);
                unset($_POST['edit_mail_submit']);
                $update = $this->newsletter_model->update_mail($mail_id, $_POST);
                $data = $this->newsletter_model->get_mailList($mail_id);
                $data['page_index'] = 2;
                if ($update == 1) {
                    $data['updated'] = 1;
                } else {
                    $data['updated'] = 2;
                }
            } elseif (isset($_REQUEST['add_mail_submit'])) {

                $add = $this->newsletter_model->subscribe($_POST);
                if ($add == 1) {
                    $data['added'] = 1;
                    $data['page_index'] = 2;
                    $data['add'] = 1;
                } else {
                    $data = array(
                        'email' => $this->input->post('email'),
                        'active' => $this->input->post('active')
                      );
                    $data['page_index'] = 2;
                    $data['add'] = 1;
                    $data['added'] = 2;
                }
            } else {
                if (isset($_REQUEST['emails_del'])) {
                    $sel_mails = $this->input->post('sel_mails');
                    $x = 0;
                    foreach ($sel_mails as $mail) {
                        if ($this->newsletter_model->del_mail($mail) != 1) {
                            $x = 1;
                        }
                    }

                    if ($x == 0) {
                        $data['deleted'] = 1;
                    } else {
                        $data['deleted'] = 2;
                    }
                }
                $data['mail_list'] = $this->newsletter_model->get_mailList();
                $data['page_index'] = 1;
            }
        }
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/newsletter_view', $data);
    }

    function add_mail() {
        $data['page_index'] = 2;
        $data['add'] = 1;
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/newsletter_view', $data);
    }

    function send_newsletter() {
        $this->load->model('newsletter_model');
        $this->load->model('mail');
        $this->load->model('admincp_mod');
        $site_mail = $this->admincp_mod->site_mail();
        if (isset($_REQUEST['send_submit'])) {
            $sent = $this->mail->send_multi($site_mail, 'Manazilna', $this->input->post('mail_list'), $this->input->post('title')
                    , $this->input->post('message'), 'Manazilna Newsletter');
            $store = $this->newsletter_model->set_newsletter_message($this->input->post('title'), $this->input->post('message'), $this->input->post('mail_list'));
            if ($sent == 1) {
                $data['sent'] = 1;
            } else {
                $data['sent'] = 2;
            }
        } elseif ('edit_submit') { /**         * ************* update meessage * */
            $purpose = $this->input->post('purpose');
            $msg_id = $this->input->post('msg_id');
            if ($purpose == 1) {
                $store = $this->newsletter_model->update_message($msg_id, $this->input->post('title'), $this->input->post('message'), $this->input->post('mail_list'));
                if ($store == 1) {
                    $data['updated'] = 1;
                } else {
                    $data['updated'] = 2;
                }
            } elseif ($purpose == 2) {
                $sent = $this->mail->send_multi($site_mail, 'Manazilna', $this->input->post('mail_list'), $this->input->post('title')
                        , $this->input->post('message'), 'Manazilna Newsletter');
                if ($sent == 1) {
                    $data['sent'] = 1;
                }
            } elseif ($purpose == 3) {
                $sent = $this->mail->send_multi($site_mail, 'Manazilna', $this->input->post('mail_list'), $this->input->post('title')
                        , $this->input->post('message'), 'Manazilna Newsletter');
                $store = $this->newsletter_model->update_message($msg_id, $this->input->post('title'), $this->input->post('message'), $this->input->post('mail_list'));
                if ($sent == 1 && $sent == 1) {
                    $data['updated'] = 3;
                } else {
                    $data['updated'] = 2;
                }
            }
        }
        $data['page_index'] = 3;
        $data['send'] = 1;
        $data['mail_list'] = $this->newsletter_model->get_mailList();
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        
        $this->load->view('admincp/newsletter_view', $data);
    }

    function newsletter($id = '', $title = '') {
        $this->load->model('newsletter_model');
        if ($id != '') {
            $data = $this->newsletter_model->get_newsletter_message($id);
            $data['mails'] = explode(',', $data['mails']);
            $data['page_index'] = 3;
            $data['mail_list'] = $this->newsletter_model->get_mailList();
        } else {
            if (isset($_REQUEST['msgs_del'])) {
                $sel_msgs = $this->input->post('sel_msgs');
                $x = 0;
                foreach ($sel_msgs as $msg) {
                    if ($this->newsletter_model->del_message($msg) != 1) {
                        $x = 1;
                    }
                }

                if ($x == 0) {
                    $data['deleted'] = 1;
                } else {
                    $data['deleted'] = 1;
                }
            }
            $data['all_messages'] = $this->newsletter_model->get_newsletter_message();
            $data['page_index'] = 4;
        }
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/newsletter_view', $data);
    }

    /** ########################################################## Clients   ############# * */
    function add_client() {
        $this->load->model('clients_model');
        if (isset($_REQUEST['add_client_submit'])) {
            unset($_POST['add_client_submit']);
            $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
            $this->session_mod->unset_session('sel_imgs');

            if ('' != @file_get_contents($_FILES["icon"]["tmp_name"])) {
                $image = $this->upload_model->upload_image('upload/');
                $_POST['icon'] = $image;
            }


            $x = 0;

            if ($this->clients_model->add_client($_POST) != 1) {
                $x = 1;
            }


            if ($x == 0) {
                $data['added'] = 1;
            } else {
                $data['added'] = 2;
            }
            $data['add'] = 1;
        } elseif (isset($_REQUEST['edit_client_submit'])) {

            if (!empty($_POST['page_images'])) {
                $_POST['image'] = implode(',', $_POST['page_images']);
            } else {
                $_POST['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
                $this->session_mod->unset_session('sel_imgs');
            }

            if ('' != @file_get_contents($_FILES["icon"]["tmp_name"])) {
                $image = $this->upload_model->upload_image('upload/');
                $_POST['icon'] = $image;
            }


            $client_id = $this->input->post('client_id');
            unset($_POST['client_id']);
            unset($_POST['page_images']);
            unset($_POST['edit_client_submit']);

            $updated = $this->clients_model->update_client($client_id, $_POST);
            $data = $this->clients_model->get_clients($client_id);
            $images = $this->upload_model->get_images($data['image']);
            $data['images'] = $images['images'];
            if ($updated == 1) {
                $data['updated'] = 1;
            } else {
                $data['updated'] = 2;
            }
        } else {
            $data['add'] = 1;
        }
        $data['page_index'] = 1;
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/clients_view', $data);
    }

    function edit_client($id = '', $title = '') {
        $this->load->model('clients_model');
        if ($id != '') {
            $data = $this->clients_model->get_clients($id);
            $images = $this->upload_model->get_images($data['image']);
            $data['images'] = $images['images'];
            $data['page_index'] = 1;
        } else {
            if (isset($_REQUEST['clients_del'])) {
                $sel_clients = $this->input->post('sel_client');
                $x = 0;
                foreach ($sel_clients as $client) {
                    if ($this->clients_model->del_client($client) != 1) {
                        $x = 1;
                    }
                }

                if ($x == 0) {
                    $data['deleted'] = 1;
                } else {
                    $data['deleted'] = 2;
                }
            }
            $clients = $this->clients_model->get_clients();
            $data['all_clients'] = $clients;
            foreach ($clients as $cli) {
                //$image = $this->upload_model->get_image($cli->image);
                $data['images'][$cli->id] = ($image->thumb != null ? $image->thumb : $image->image);
            }
            $data['page_index'] = 2;
        }
        $data['ckeditor'] = $this->ckeditor();
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/clients_view', $data);
    }

    function add_user() {
        $this->load->model('user');
        if (isset($_REQUEST['add_user_submit'])) {
            $privacy = implode(',', $this->input->post('privacy'));
            $_POST['privacy'] = $privacy;
            $_POST['user_type '] = 1;
            $_POST['password'] = md5($this->input->post('password'));

            unset($_POST['add_user_submit']);
            unset($_POST['re_password']);

            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
            if ($this->form_validation->run() == FALSE) {
                $data['added'] = 3;
            } elseif ($this->user->add_user($_POST) == 1) {
                $data['added'] = 1;
            } else {
                $data['added'] = 2;
            }
            $data['add'] = 1;
        } elseif (isset($_REQUEST['edit_user_submit'])) {
            $user_id = $this->input->post('user_id');

            $privacy = '1,2,3,4,5,6,7,8,9,999';
            $_POST['privacy'] = $privacy;
            $_POST['user_type '] = 1;
            $_POST['password'] = md5($this->input->post('password'));

            unset($_POST['edit_user_submit']);
            unset($_POST['re_password']);
            unset($_POST['user_id']);

            $data = $this->user->get_users($user_id);
            $data['privacy'] = explode(',', $data['privacy']);

            $valid = TRUE;
            if ($data['username'] != $this->input->post('username')) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
                $valid = $this->form_validation->run();
            }
            if ($valid == FALSE) {
                $data['added'] = 3;
            } elseif ($this->user->update_user($user_id, $_POST) == 1) {
                $data['updated'] = 1;
            } else {
                $data['updated'] = 2;
            }
        } else {
            $data['add'] = 1;
        }

        $data['page_index'] = 1;
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/user_view', $data);
    }

    function edit_user($id = '') {


        $this->load->model('user');
        if ($id != '') {
            $data = $this->user->get_users($id);
            $data['privacy'] = explode(',', $data['privacy']);
            $data['page_index'] = 1;
        } else {
            if (isset($_REQUEST['users_del'])) {
                $sel_users = $this->input->post('sel_user');
                $x = 0;
                foreach ($sel_users as $user) {
                    if ($this->user->del_user($user) != 1) {
                        $x = 1;
                    }
                }

                if ($x == 0) {
                    $data['deleted'] = 1;
                } else {
                    $data['deleted'] = 2;
                }
            }
            $data['all_users'] = $this->user->get_users();
            $data['page_index'] = 2;
        }
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/user_view', $data);
    }

    function add_offer() {
        $this->load->model('offers_mod');
        if (isset($_POST['add_offer_submit'])) {
            unset($_POST['add_offer_submit']);

            $alias = strtolower($this->input->post('alias'));
            $alias = str_replace(' ', '-', $alias);
            $_POST['alias'] = $alias;
            $valid = $this->offers_mod->validate_alias($alias);

            if ($valid != 0) {
                $data = $_POST;
                $data['added'] = 3;
                $data['add'] = 1;
                $data['page_index'] = 1;
            } else {
                if ($this->offers_mod->add_offer_cat($_POST) == 1) {
                    $data['added'] = 1;
                    $data['page_index'] = 1;
                    $data['add'] = 1;
                } else {
                    $data['added'] = 2;
                }
            }
        } elseif (isset($_POST['edit_offer_submit'])) {
            $offer_cat = $this->input->post('offer_cat');
            unset($_POST['offer_cat']);
            unset($_POST['edit_offer_submit']);
            if ($this->offers_mod->update_offer_cat($offer_cat, $_POST) == true) {
                $data = $_POST;
                $data['updated'] = 1;
                $data['page_index'] = 1;
                $data['add'] = 1;
            } else {
                $data = $_POST;
                $data['updated'] = 2;
                $data['page_index'] = 1;
            }
        } else {
            $data['page_index'] = 1;
            $data['add'] = 1;
        }

        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/offers', $data);
    }

    function edit_offer($id = '', $title = '') {
        $this->load->model('offers_mod');
        if (isset($_POST['cat_del'])) {
            $sel_offer_cats = $this->input->post('sel_offer_cat');
            $del = 0;
            foreach ($sel_offer_cats as $cat) {
                if ($this->offers_mod->del_offer_cat($cat) != 1) {
                    $del = 1;
                }
            }
            if ($del == 0) {
                $data['deleted'] = 1;
            } else {
                $data['deleted'] = 2;
            }
            $data['page_index'] = 2;
            $data['all_offer_cats'] = $this->offers_mod->get_offer_cat();
        } elseif (isset($_POST['search'])) {
            $keyword = $this->input->post('keyword');
            $data['all_offer_cats'] = $this->offers_mod->get_offer_like($keyword);
            $data['keyword'] = $keyword;
            $data['page_index'] = 2;
        } elseif ($id != '') {
            $data = $this->offers_mod->get_offer_cat($id);
            $data['page_index'] = 1;
        } else {
            $data['all_offer_cats'] = $this->offers_mod->get_offer_cat();
            $data['page_index'] = 2;
        }

        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/offers', $data);
    }

    function add_package() {
        $this->load->model('offers_mod');
        if (isset($_POST['add_package_submit'])) {
            unset($_POST['add_package_submit']);

            $alias = strtolower($this->input->post('alias'));
            $alias = str_replace(' ', '-', $alias);
            $_POST['alias'] = $alias;
            $valid = $this->offers_mod->validate_alias($alias, $_POST['catid']);

            if ($valid != 0) {
                $data = $_POST;
                $data['added'] = 3;
                $data['add'] = 1;
                $data['page_index'] = 3;
            } else {
                if ($this->offers_mod->add_package($_POST) == 1) {
                    $data['added'] = 1;
                    $data['page_index'] = 3;
                    $data['add'] = 1;
                } else {
                    $data['page_index'] = 3;
                    $data['added'] = 2;
                }
            }
        } elseif (isset($_POST['edit_package_submit'])) {
            $package_id = $this->input->post('package_id');
            $alias = strtolower($this->input->post('alias'));
            $alias = str_replace(' ', '-', $alias);
            $_POST['alias'] = $alias;
            $valid = $this->offers_mod->validate_alias($alias, $_POST['catid']);

            if ($valid != 0 && $alias != $this->input->post('old_alias')) {
                $data = $_POST;
                $data['added'] = 3;
                $data['page_index'] = 3;
            } else {
                unset($_POST['package_id']);
                unset($_POST['old_alias']);
                unset($_POST['edit_package_submit']);
                if ($this->offers_mod->update_package($package_id, $_POST) == true) {
                    $data = $_POST;
                    $data['updated'] = 1;
                    $data['page_index'] = 3;
                    $data['add'] = 1;
                } else {
                    $data = $_POST;
                    $data['updated'] = 2;
                    $data['page_index'] = 3;
                }
            }
        } else {
            $data['page_index'] = 3;
            $data['add'] = 1;
        }

        $data['privacy'] = $this->get_privacy();
        $data['all_cats'] = $this->offers_mod->get_offer_cat();
        $this->load->view('admincp/offers', $data);
    }

    function edit_package($id = '', $title = '') {
        $this->load->model('offers_mod');
        if (isset($_POST['package_del'])) {
            $sel_package = $this->input->post('sel_package');
            $del = 0;
            foreach ($sel_package as $package) {
                if ($this->offers_mod->del_package($package) != 1) {
                    $del = 1;
                }
            }
            if ($del == 0) {
                $data['deleted'] = 1;
            } else {
                $data['deleted'] = 2;
            }
            $data['all_packages'] = $this->offers_mod->get_package();
            $data['page_index'] = 4;
        } elseif (isset($_POST['search'])) {
            $keyword = $this->input->post('keyword');
            $data['all_packages'] = $this->offers_mod->get_package_like($keyword);
            $data['keyword'] = $keyword;
            $data['page_index'] = 4;
        } elseif ($id != '') {
            $data = $this->offers_mod->get_package($id);
            $data['page_index'] = 3;
            $data['all_cats'] = $this->offers_mod->get_offer_cat();
        } else {
            $data['all_packages'] = $this->offers_mod->get_package();
            $data['page_index'] = 4;
        }

        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/offers', $data);
    }

    function show_orders($id = '', $name = '') {
        $this->load->model('contact_model');
        $this->load->model('offers_mod');
        if ($id != '') {
            $data = $this->contact_model->get_orders($id);
            $data['page_index'] = 5;
        } else {
            if (isset($_REQUEST['del_inbox_submit'])) {
                $id = $this->input->post('msg_id');
                $this->contact_model->del_msg($id);
            } elseif (isset($_REQUEST['inbox_del'])) {
                $inbox = $this->input->post('sel_inbox');
                $x = 0;
                foreach ($inbox as $msg) {
                    $del = $this->contact_model->del_msg($msg);
                    if ($del != 1) {
                        $x = 1;
                    }
                }

                if ($x > 0) {
                    $data['deleted'] = 2;
                } else {
                    $data['deleted'] = 1;
                }
            }
            $data['inbox'] = $this->contact_model->get_order_cat($_POST['catid'], $_POST['package']);
            $data['page_index'] = 4;
            $data['all_cats'] = $this->offers_mod->get_offer_cat();
            $data['search_id'] = $_POST['catid'];
            $data['all_package'] = $this->offers_mod->get_packages_cattitle($_POST['catid']);
            $data['search_sub'] = $_POST['package'];
        }
        $data['privacy'] = $this->get_privacy();
        $this->load->view('admincp/contact_view', $data);
    }

    function add_news(){

        $data = array();

        if(isset($_POST['add_news_submit'])){
            $news = $this->input->post("news");

            if($news['title'] && $news['title_en']
            && $news['content'] && $news['content_en'] ){

                $news['image'] = ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
                $this->session_mod->unset_session('sel_imgs');

                $this->db->insert('news', $news);
                if($this->db->affected_rows()){
                    $data['added'] = 1;
                }else{
                    $data['added'] = 0;
                }
            }else{
                $data['added'] = 3;
            }

        }

        $data['page_index'] = "add";
        $this->load->view('admincp/news', $data);
    }

    function edit_news($id = 0, $error = 0){

        $data = array();
        if($id){

            $this->db->select("news.*, gallery.image as img");
            $this->db->join('gallery', 'gallery.id = news.image', 'left');
            $this->db->where("news.id", $id);
            $data["news"] = $this->db->get("news")->first_row();
            
            if($error)
                $data['added'] = $error;
            
            $data["page_index"] = "add";  
        } else{

            if(isset($_POST['edit_news_submit'])){

                $news_id = $this->input->post("news_id");

                $news = $this->input->post("news");

                if($news['title'] && $news['title_en']
                && $news['content'] && $news['content_en'] ){

                    if($this->input->post("news_image")){
                        $news['image'] = $this->input->post("news_image");
                    }else{
                        $news['image'] =  ($this->session_mod->get_session('sel_imgs') != null ? $this->session_mod->get_session('sel_imgs') : 0);
                        $this->session_mod->unset_session('sel_imgs');
                    }

                    $this->db->where("id", $news_id);
                    $this->db->update('news', $news);
                    if($this->db->affected_rows()){
                        $data['updated'] = 1;
                    }else{
                        $data['updated'] = 0;
                    }
                }else{
                    $this->edit_news($news_id, 3);

                }
            }elseif(isset($_POST['news_del'])){
                $news_ids = $this->input->post("del_news");
                
                foreach ($news_ids as  $id) {
                    $this->db->where("id", $id);
                    $this->db->delete("news");
                }
                $data["deleted"] = 1;
            }

            $this->db->select("news.*, gallery.image");
            $this->db->join('gallery', 'gallery.id = news.image', 'left');
            $data["all_news"] = $this->db->order_by("id", "ASC")->get("news")->result();
            $data["page_index"] = "list";
        }

        $this->load->view("admincp/news", $data);
    }

    /** ######################################################################################################## * */
    function check_privacy($num) {
        if (in_array($num, $GLOBALS['privacy']) == FALSE) {
            redirect(base_url());
        }
    }

    function get_privacy() {
        $this->load->model('user');
        $privacy = $this->user->get_user_privacy($this->session->userdata('user_id'));
        return $privacy;
    }

    function ckeditor() {

        $data = array();

        //Ckeditor's configuration
        $data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'class' => 'ckeditor',
            'path' => 'assets/js/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "550px", //Setting a custom width
                'height' => '100px', //Setting a custom height
            ),
            //Replacing styles from the "Styles tool"
            'styles' => array(
                //Creating a new style named "style 1"
                'style 1' => array(
                    'name' => 'Blue Title',
                    'element' => 'h2',
                    'styles' => array(
                        'color' => 'Blue',
                        'font-weight' => 'bold'
                    )
                ),
                //Creating a new style named "style 2"
                'style 2' => array(
                    'name' => 'Red Title',
                    'element' => 'h2',
                    'styles' => array(
                        'color' => 'Red',
                        'font-weight' => 'bold',
                        'text-decoration' => 'underline'
                    )
                )
            )
        );

        return $data;
    }

    function map(){
        $this->load->view('admincp/map');
    }

    function menu($menu_id = '') {
        if ($menu_id != '') {
            $this->db->where('id', 1);
            $this->db->update('menu_collapse', array('menu_id' => $menu_id));

            $menu_id = $this->db->query("SELECT menu_id FROM menu_collapse WHERE id = 1 LIMIT 1");
            echo $menu_id->first_row()->menu_id;
        } else {
            $menu_id = $this->db->query("SELECT menu_id FROM menu_collapse WHERE id = 1 LIMIT 1");
            echo $menu_id->first_row()->menu_id;
        }
    }

    function process() {
        $this->user->process();
    }

    function dd($x = '', $y = '') {
        echo'<pre>';
        print_r($x);
        die($y);
    }

}
