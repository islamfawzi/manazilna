<?php
class Super extends CI_Controller {

public function __construct() {
        parent::__construct();
    }

    function autoload(){

      $this->load->model('admincp_mod');
      $GLOBALS['config'] = $this->admincp_mod->settings();
      $GLOBALS['social'] = $this->admincp_mod->social();

      $GLOBALS['title'] = $GLOBALS['config']->site_name_en;
      
      $GLOBALS['meta_keys'] = $GLOBALS['config']->metakey_en;
      $GLOBALS['meta_desc'] = $GLOBALS['config']->metadesc_en;
      $GLOBALS['meta_tags'] = '';

      if ($GLOBALS['config']->site_status == 0) {
          $GLOBALS['page_info']->id = 12;
          $this->load->view('site/error_404', $GLOBALS);
      }

      if (!auth()){
        $this->load->model('clients_model');
        $this->clients_model->getRememberedUser();
      }

    }
}
