<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome_ar extends CI_Controller {

    function __construct() {
        parent::__construct();
        header('Content-Type: text/html; charset=utf-8');

        $this->load->model('admincp_mod');
        $this->load->model('menu_model');
        $this->load->model('pages_mod');
        $this->load->model('upload_model');
        $this->load->model('user');
        $this->load->model('clients_model');
        $this->load->model('slider_mod');

        //$GLOBALS['main_menu'] = $this->menu_model->get_up_menu('en');
        $GLOBALS['config'] = $this->admincp_mod->settings();
        $GLOBALS['social'] = $this->admincp_mod->social();
        $GLOBALS['title'] = $GLOBALS['config']->site_name;
        $GLOBALS['meta_keys'] = $GLOBALS['config']->metakey;
        $GLOBALS['meta_desc'] = $GLOBALS['config']->metadesc;
        $GLOBALS['meta_tags'] = '';

        if ($GLOBALS['config']->site_status == 0) {
            $GLOBALS['page_info']->id = 12;
            $this->load->view('site_ar/error_404', $GLOBALS);
        }
    }

    public function index() {

        $GLOBALS['meta_tags'] = htmlspecialchars_decode($GLOBALS['config']->meta_tags);
        $GLOBALS['sliders'] = $this->slider_mod->get_all_slider(1);

        $this->load->model('projects_mod');
        $GLOBALS['fetProjects'] = $this->projects_mod->get_fet_port('');                
        $GLOBALS['site_word'] = $this->admincp_mod->site_word(1);

        $this->db->order_by('id','ASC');
        $GLOBALS['product_cats'] = $this->db->get_where('projects_cats','active = 1')->result();
         
        $GLOBALS['index'] = "home";
        $this->load->view('site_ar/index_view', $GLOBALS);
    }

    public function about($id = 1) {
        $GLOBALS['page'] = $this->pages_mod->get_Pages($id);
        $GLOBALS['title'] = $GLOBALS['page']['browser_title'];
        $GLOBALS['meta_keys'] = $GLOBALS['page']['meta_tags'];
        $GLOBALS['meta_desc'] = $GLOBALS['page']['meta_desc'];
        
        $GLOBALS['index'] = "about";
        $this->load->view('site_ar/pages', $GLOBALS);
    }
    /* Products * */

    function products($cat = '' ,$id = '') {
        $this->load->model('projects_mod');
                
        $this->db->order_by('id','ASC');
        $GLOBALS['product_cats'] = $this->db->get_where('projects_cats','active = 1')->result();                                
        if ($id == "page" || !is_numeric($id)) {
            $id = '';
        }
        
        if ($id != '') {
            $GLOBALS['product'] = $this->projects_mod->get_port($id);
                       
            $GLOBALS['title'] = $GLOBALS['product']['title_ar'];
            $GLOBALS['pageIndex'] = 1;
        } else {            
            $cat = ($cat == '') ? $GLOBALS['product_cats'][0]->id : $cat ;  

            $this->load->library('pagination');
            $config['base_url'] = base_url("ar/products/$cat/page/");            
            $config['total_rows'] = $this->db->get_where('projects',array('catid' => $cat,'active' => 1))->num_rows();            
            $config['per_page'] = 12;
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);

            $this->db->select('projects.*');
            $this->db->select('gallery.image as img');
            $this->db->join('gallery', 'gallery.id = projects.image', 'left');
            $this->db->where('projects.catid', $cat);
            $this->db->where('projects.active', 1);
            $this->db->order_by('projects.id', 'ASC');
            $GLOBALS['products'] = $this->db->get('projects', $config['per_page'], $this->uri->segment(5))->result();
            
            $this->db->select('title_ar');
            $GLOBALS['cat_title'] = $this->db->get_where('projects_cats',"id = $cat")->first_row()->title;            

            $GLOBALS['links'] = $this->pagination->create_links();
            $GLOBALS['title'] = "منتجاتنا";
            $GLOBALS['pageIndex'] = 2;
        }                
        
        $GLOBALS['index'] = "products";
        $this->load->view('site_ar/products', $GLOBALS);
    }

    /* End products * */
    
    /* Services* */
    function services($id = '') {
        if ($id == "page") {
            $id = '';
        }
        if ($id != '' && is_numeric($id)) {
            $GLOBALS['service'] = $this->clients_model->get_clients($id);                     
            $GLOBALS['title'] = $GLOBALS['service']['cli_title'];            
            $GLOBALS['page_index'] = "services";            
            $GLOBALS['pageIndex'] = 1;
        } else {
            $this->load->library('pagination');
            $config['base_url'] = base_url('ar/services/page/');
            $config['total_rows'] = $this->db->get_where('clients','active = 1')->num_rows();
            $config['per_page'] = 6;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);

            $this->db->select('clients.*');
            $this->db->select('gallery.image as img');
            $this->db->join('gallery', 'gallery.id = clients.image', 'left');
            $this->db->where('clients.active', 1);
            $this->db->order_by('clients.id', 'ASC');
            $GLOBALS['services'] = $this->db->get('clients', $config['per_page'], $this->uri->segment(4))->result();             
            $GLOBALS['links'] = $this->pagination->create_links();
            $GLOBALS['title'] = "خدماتنا";
            $GLOBALS['pageIndex'] = 2;
        }

        $GLOBALS['index'] = "services";
        $this->load->view('site_ar/services', $GLOBALS);
    }

    /* End Clients* */

     function contact($done = '') {
        $this->load->model('contact_model');
        $this->load->model('mail');
        
        $GLOBALS['title'] = "اتصـل بنا";        
        $GLOBALS['sent'] = 0;
        if (isset($_REQUEST['contact_submit'])) {

            include_once("phpmailer/class.phpmailer.php");
            $mail = new PHPMailer();
            $mail->Mailer = "smtp";
            $mail->CharSet = "utf-8";

            $email = $this->input->post('mail');
            if (strlen($email) > 5) {
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $message = $this->input->post('message');

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
        $GLOBALS['contact'] = $contact = $this->contact_model->get_contact();
        $GLOBALS['index'] = "contact";        
        $this->load->view("site_ar/contact",$GLOBALS);
    }

    function error_404() {
        $this->load->view('site_ar/error_404', $GLOBALS);
    }

    function dd($x = '', $y = '') {
        echo'<pre>';
        print_r($x);
        die($y);
    }

}
