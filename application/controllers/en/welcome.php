<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends Super {

    function __construct() {
        parent::__construct();
        header('Content-Type: text/html; charset=utf-8');
        parent::autoload();

		$GLOBALS['config'] = $this->admincp_mod->settings();
        $GLOBALS['socials'] = $this->admincp_mod->social();
		}

    public function index() {

        if(isset($_POST['clear_somparelist_submit'])){
          $this->session->unset_userdata('compares');
        }

        $this->load->model('slider_mod');
        $this->load->model('admincp_mod');


        $GLOBALS['meta_tags'] = htmlspecialchars_decode($GLOBALS['config']->meta_tags_en);
        $GLOBALS['sliders'] = $this->slider_mod->get_all_slider(1);


        $this->load->model('projects_mod');
        $GLOBALS['fetProjects'] = $this->projects_mod->get_fet_port(3);
    		$GLOBALS['fetProjects2'] = $this->projects_mod->get_fet_port(3, 3);


    		$GLOBALS['projects'] = $this->projects_mod->getProductAjax();
    		$GLOBALS['soled_projects'] = $this->projects_mod->getProductAjax(0 , 1);

    		/**
         * for search form
        **/
        $GLOBALS['categories'] = $this->db->get('projects_cats')->result();

        $this->db->select("news.*, gallery.image");
        $this->db->join('gallery', 'gallery.id = news.image', 'left');
        $GLOBALS['all_news'] = $this->db->where("news.active", 1)->order_by("news.created_at", "DESC")->get("news", 3)->result();

        $GLOBALS['index'] = "home";
        _view('index_view');
    }

    public function about($id = 1) {
        $this->load->model('pages_mod');
        $GLOBALS['page'] = $this->pages_mod->get_Pages($id);
        $GLOBALS['title'] = $GLOBALS['page']['browser_title_en'];
        $GLOBALS['meta_keys'] = $GLOBALS['page']['meta_tags_en'];
        $GLOBALS['meta_desc'] = $GLOBALS['page']['meta_desc_en'];

        $GLOBALS['index'] = "about";
        $this->load->view('site/pages', $GLOBALS);
    }

    function news($news_id = 0){

      $this->db->select("news.*, gallery.image as img");
      $this->db->join('gallery', 'gallery.id = news.image', 'left');
      $GLOBALS['news'] = $this->db->where("news.active", 1)->where("news.id", $news_id)->order_by("news.created_at", "DESC")->get("news", 3)->first_row('array');

      $GLOBALS['title'] = $GLOBALS['news']['title_en'];
      $GLOBALS['meta_keys'] = $GLOBALS['news']['title_en'];
      $GLOBALS['meta_desc'] = $GLOBALS['news']['content_en'];
      _view("pages");
    }

    /* Products * */
    function products($id = NULL, $start = 0) {
        $this->load->model('projects_mod');

        if ($id == "page" || !is_numeric($id)) {
            $id = NULL;
        }
        if ($id != NULL) {
            $GLOBALS['product'] = $this->projects_mod->get_port($id);
            $this->load->model('upload_model');
            $GLOBALS['product']['image'] = $this->upload_model->get_multi_images($GLOBALS['product']['image']);
            $amenities = json_decode($GLOBALS['product']['amenities']);
            $GLOBALS['product']['amenities'] = [];

            if(is_array($amenities)){
                foreach ($amenities as $id) {
                    $GLOBALS['product']['amenities'][] = $this->db->get_where('amenities', array('id' => $id))->first_row()->title;
                }
            }else{
                  $GLOBALS['product']['amenities'][] = $this->db->get_where('amenities', array('id' => $amenities))->first_row()->title;
            }

            $cat = $GLOBALS['product']['catid'];
            $GLOBALS['other_products'] = $this->db->where("catid", $cat)->order_by("id", "DESC")->get("projects")->result('array');
            foreach ($GLOBALS['other_products'] as &$product) {
              $product['images'] = $this->upload_model->get_multi_images($product['image']);
            }

            $GLOBALS['title'] = $GLOBALS['product']['title'];
            $GLOBALS['meta_title'] = $GLOBALS['product']['meta_title'];
            $GLOBALS['meta_keys'] = $GLOBALS['product']['meta_keywords'];
            $GLOBALS['meta_desc'] = $GLOBALS['product']['meta_description'];

            $GLOBALS['pageIndex'] = 1;
        } else {
            $GLOBALS['data'] = $this->projects_mod->getProductPagination($start);
            $GLOBALS['title'] = "Our Properties";
            $GLOBALS['pageIndex'] = 2;
        }
        $GLOBALS['index'] = "products";
        _view('products');
    }

    function getProjectsAjax($start = 0) {
        $this->load->model('projects_mod');
        $data = $this->projects_mod->getProductAjax($start);
        return $view = $this->load->view('site/projects_small', $data);
    }
    /* End products * */

    function advancedSearch(){

      $GLOBALS['_amenities'] = $this->db->get('amenities')->result();
      $GLOBALS['_finish_types'] = $this->db->get('finish_types')->result();
      $GLOBALS['_property_types'] = $this->db->get('property_types')->result();

      $GLOBALS['index'] = "advancedSearch";
      _view('advanced_search');
    }

    function search(){
      $search = !empty($_REQUEST['search'])? $_REQUEST['search'] : $_REQUEST;

      $search = $this->admincp_mod->search_query_filter($search);

      $query = http_build_query($search);
      $GLOBALS['search_query'] = urldecode($query);

      $user = auth();
      if($user){
        $this->db->where("search_query", $GLOBALS['search_query']);
        $this->db->where("user_id", $user->id);
        $result = $this->db->get("search_results");
        if ($result->num_rows() > 0) {
          $GLOBALS['saved_before'] = 1;
        }

      }
      if ($search['submit'] == 1) {
        $GLOBALS['search_results'] = $this->admincp_mod->do_search($search);
      //  ddd($this->db->last_query());
      //  dd($GLOBALS['projects']);
      }
      $GLOBALS['_amenities'] = $this->db->get('amenities')->result();
      $GLOBALS['_finish_types'] = $this->db->get('finish_types')->result();
      $GLOBALS['_property_types'] = $this->db->get('property_types')->result();

      $GLOBALS['index'] = "advancedSearch";
      _view('advanced_search');
    }

    function save_search_query(){
      $data['search_query'] = $_POST['search_query'];
      $user = auth();
      $data['user_id'] = $user->id;
      $data['created_date'] = date('Y-m-d h:i:sa');
      $data['count'] = $_POST['result_count'];

      $this->db->insert('search_results', $data);
      if ($this->db->affected_rows() > 0){
          echo true;
      } else {
          echo false;
      }

      return false;
    }

    function saved_search(){

      $user = auth();

      if(!empty($user)){

        if(isset($_POST['del_saved_search'])){
          $id = $_POST['del_saved_search'];
          $this->db->where('id', $id);
          $this->db->delete('search_results');
          $GLOBALS['deleted'] = ($this->db->affected_rows() > 0);
        }

        $user_id = $user->id;
        $this->db->where("user_id", $user_id);
        $this->db->order_by('created_date', 'ASC');
        $result = $this->db->get("search_results");
        $GLOBALS['saved_search'] = $result->result();

      }
      _view('saved_search');

    }

    function mapSearch(){
      $GLOBALS['index'] = "mapSearch";
      $GLOBALS['title'] = "Map Search";
      $properties = $this->db->select('id, title, longitude, latitude')->where("active", 1)->get("projects")->result();
      $GLOBALS['properties_json'] = json_encode($properties);
      _view('map_search');
    }

    function contact($done = '') {
        $this->load->model('contact_model');
        $this->load->model('mail');
        $GLOBALS['title'] = "Contact us";
        $GLOBALS['sent'] = 0;
        if (isset($_REQUEST['contact_submit'])) {
            extract($_POST);
            include_once("phpmailer/class.phpmailer.php");
            $mail = new PHPMailer();
            $mail->Mailer = "smtp";
            $mail->CharSet = "utf-8";

            if (strlen($email) > 5) {

                $site_mail = $GLOBALS['config']->site_email;

                $mail_body = "<table cellspacing='3' cellpadding='0' width='900' border='1' style='width:450.0pt;border:solid #cccccc 1.0pt' dir='rtl'>";
                $mail_body .= "<tr><td width='225' style='font-weight: bold; width:112.5pt;border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'>الإسم:</td> <td style='border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'>$name</td> </tr>";
                $mail_body .= "<tr><td width='225' style='font-weight: bold; width:112.5pt;border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'>الهاتف :</td> <td style='border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'> $phone </td> </tr>";
                $mail_body .= "<tr><td width='225' style='font-weight: bold; width:112.5pt;border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'>الإيميل :</td> <td style='border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'> $email </td> </tr>";
                $mail_body .= "<tr><td width='225' style='font-weight: bold; width:112.5pt;border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'>الرسالة :</td> <td style='border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'> $message </td> </tr>";
                $mail_body .= "<tr><td width='225' style='font-weight: bold; width:112.5pt;border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'>بتاريخ :</td> <td style='border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'> " . date('Y-m-d H:i:s') . "</td> </tr>";
                $mail_body .= "<tr><td width='225' style='font-weight: bold; width:112.5pt;border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'>IP :</td> <td style='border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'> " . $_SERVER["REMOTE_ADDR"] . "</td> </tr>";
                $mail_body .= "<tr><td width='225' style='font-weight: bold; width:112.5pt;border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'>من صفحة :</td> <td style='border:solid #cccccc 1.0pt;padding:.75pt .75pt .75pt .75pt'> " . $_SERVER["HTTP_REFERER"] . "</td> </tr>";
                $mail_body .= "</table>";

                $inbox = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'message' => $message);
                $this->contact_model->set_contact($inbox);

                $mail->From = $email;
                $mail->FromName = $name;
                $mail->addAddress($site_mail);     // Add a recipient
                $mail->AddReplyTo($email);
                $mail->Subject = $subject;
                $mail->MsgHTML($mail_body);
                if (!$mail->Send()) {
                    $GLOBALS['sent'] = 2;
                } else {
                    $GLOBALS['sent'] = 1;
                }
            }
        }
        $GLOBALS['index'] = "contact";
        _view('contact');
    }

    function addToCompare($id){

      $compares = $this->session->userdata('compares');
      $compares[] = $id;
      $this->session->set_userdata('compares', $compares);

      $this->db->where_in('id', $compares);
      $result = $this->db->get("projects");
      $GLOBALS['products'] = $result->result('array');

      foreach ($GLOBALS['products'] as &$product) {
          $amenities = json_decode($product['amenities']);
          $product['amenities'] = [];

          if(is_array($amenities)){
            foreach ($amenities as $id) {
                $product['amenities'][] = $this->db->where('id',$id)->get('amenities')->first_row()->title;
            }
          }else{
            $product['amenities'][] = $this->db->where('id',$amenities)->get('amenities')->first_row()->title;
          }
      }

      _view('compares');
    }

    function addToWishList($id){
      $wishlist = $this->session->userdata('wishlist');
      $wishlist[] = $id;
      $this->session->set_userdata('wishlist', $wishlist);
    }

    function error_404() {
        $this->load->view('site/error_404', $GLOBALS);
    }
}
