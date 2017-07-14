<?php
header('Content-Type: text/html; charset=utf-8');
 require('admincp.php');
class Gallery extends CI_Controller{
     
    function __construct(){
        parent::__construct();
        $this->load->model('upload_model');
        $this->load->model('session_mod');
        
    }
    
    function images($action = '',$nd = ''){
      
        if(isset($_REQUEST['get_images'])){
        $imgs_ids = implode(',',$_POST['img_sel']);
        if($nd == ''){
            $this->session_mod->set_session('sel_imgs',$imgs_ids);
        }elseif($nd == '3rd'){
            $this->session_mod->app_session('sel_imgs',$imgs_ids);
        }else{
            $this->session_mod->set_session('fb_imgs',$imgs_ids);
        }
        
        echo "<script type='text/javascript'> window.close(); </script>";
        }
        if($action != ''){
         $data['action'] = $action;    
        }else{
         $data['action'] = '';
        }
        if($nd != ''){
         $data['nd'] = $nd;    
        }else{
         $data['nd'] = '';
        }
        
        if('' != @file_get_contents($_FILES["gal"]["tmp_name"][0])){   /** upload new images **/
          $width = 0;
          $thumb_width = 0;
          $alphabet = array('Ã','Ç','Å','Â','È','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ý','Þ','ß','á','ã','ä','å','É','æ','ì','í','áÇ','áÂ');
          
          if(isset($_POST['thumb'])){ $thumb = TRUE; }else{ $thumb = FALSE; }
          if(isset($_POST['ratio'])){ $ratio = TRUE; }else{ $ratio = FALSE; }
          if(!isset($_POST['ratio'])){ 
            $height       = $_POST['height'];
            $thumb_height = $_POST['thumb_height'];
          }else{
            $height        = 500;
            $thumb_height  = 50;
          }
           
          $width        = $_POST['width'];
          $thumb_width  = $_POST['thumb_width'];
          
          $path       = 'upload/';
          $file_name  = '';
          if($_POST['catid'] != ''){
            $cat_title = $this->upload_model->get_cat($_POST['catid']);
            $cat_name  = $cat_title['title'];
            $chars  = str_split($cat_name);
            foreach($chars as $char){
                if(in_array($char,$alphabet)){
                    $cat_name = substr(md5($cat_name),10);
                }
            }
            
        #    echo $path.$cat_title['title']; exit(); 
            if(!file_exists($path.$cat_name)){
                mkdir(utf8_encode($path.$cat_name)); 
            } 
            $path = $path.$cat_name.'/';  
            $file_name .=  $cat_name.'-';
          }
          
          if($_POST['sub_catid'] != ''){
            $subcat_title = $this->upload_model->get_cat($_POST['sub_catid']);
            $subcat_name = $subcat_title['title'];
            $chars  = str_split($subcat_name);
            foreach($chars as $char){
                if(in_array($char,$alphabet)){
                     $subcat_name = substr(md5($subcat_name),10);
                }
            }
    
            if(!file_exists($path.$subcat_name)){
               mkdir($path.$subcat_name);
            }
            $path = $path.$subcat_name.'/';
            $file_name .= $subcat_name.'-';
          }
          
          if($thumb == TRUE){
             if(!file_exists($path.'thumb/')){
                mkdir($path.'thumb/');
             }
             $thumb_path = $path.'thumb/';
          }else{
            $thumb_path = '';
          }
          
          
          $file_name .= rand(0,999999999);
          
          $image = $this->upload_model->upload_gallery($path,$width,$height,$thumb,$thumb_path,$thumb_width,$thumb_height,'thumb',$ratio,$file_name);
          $data['sel_cat']    = $image['catid']     = $_POST['catid'];
          $data['sel_subcat'] = $image['sub_catid'] = $_POST['sub_catid'];

          $this->upload_model->insert_gallery($image);
          
          $data['gallery'] = $this->upload_model->get_gallery($_POST['catid'],$_POST['sub_catid']);     /** get all image **/
           
        }elseif(isset($_REQUEST['delete_all'])){               /** delete images **/
     
           foreach($_POST['gal_del'] as $img){
            $this->upload_model->delete_image($img);
           } 
           $data['sel_cat']    = $_POST['sel_cat'];
           $data['sel_subcat'] = $_POST['sel_subcat'];
           
           $data['gallery'] = $this->upload_model->get_gallery($_POST['sel_cat'],$data['sel_subcat']);      /** get all image **/
           
        }elseif(isset($_REQUEST['sel_catid']) || isset($_REQUEST['sel_subcatid'])){ 
            
           $data['gallery'] = $this->upload_model->get_gallery($_POST['sel_catid'],$_POST['sel_subcatid']);
           $data['sel_cat'] = $_POST['sel_catid'];
           $data['sel_subcat'] = $_POST['sel_subcatid'];
            
        }elseif(isset($_REQUEST['sel_catid'])){ 
            
        }else{
            $data['gallery'] = $this->upload_model->get_last_gallery();      /** get all image **/ 
        }
        $data['gallery_cats']    = $this->upload_model->get_main_cats();         /** get all image categories **/
        $data['gallery_subcats'] = $this->upload_model->get_sub_cats($this->input->post('sel_catid'));
        $data['page_index'] = 1;
        
        $ci = new Admincp();
        $data['privacy'] = $ci->get_privacy();
        $this->load->view('admincp/gallery',$data);
    }

    function add_cat(){
        if(isset($_REQUEST['add_cat_submit'])){
            $data['title']  = $_POST['title'];
            $data['active'] = $_POST['active'];
            $data['catid']  = $_POST['catid'];
            if($this->upload_model->add_cat($data) == true){
                $data['added'] = 1;
            }else{
                $data['added'] = 2;
            }
            $data['add'] = 1;
            $data['title'] = '';
            $data['page_index'] = 2;
        }elseif(isset($_REQUEST['edit_cat_submit'])){
            $data['title'] = $_POST['title'];
            $data['active'] = $_POST['active'];
            $data['catid']  = $_POST['catid'];
            $id = $_POST['cat_id'];
            if($this->upload_model->update_cat($id,$data) == true){
               $data['updated'] = 1;
            }else{
               $data['updated'] = 2;
            }
            $data['add'] = 0; 
            $data['id'] = $id;
            $data['added'] = 0;
            $data['page_index'] = 2;
        }else{
          $data = array('add'       => 1,
                        'updated'   => 0,
                        'added'     => 0,
                        'title'     => '',
                        'page_index'=> 2,
                        );  
        }
        $data['action'] = '';
        $data['gallery'] = 1;
        
        $ci = new Admincp();
        $data['privacy'] = $ci->get_privacy();
        $data['main_cats'] = $this->upload_model->get_main_cats();
        $this->load->view('admincp/gallery',$data);
    }
    
    function edit_cat($id = '',$title = ''){
      if($id != ''){
        $data = $this->upload_model->get_cat($id);
        $data['page_index'] = 2;
        $data['add'] = 0;
        $data['updated'] = 0;
        $data['added'] = 0;
      }else{
        
        if(isset($_REQUEST['cat_del'])){
          foreach($_POST['sel_cat'] as $cat_id){
            if($this->upload_model->delete_cat($cat_id) == true){
                $data['deleted'] = 1;
            }else{ 
                $data['deleted'] = 2;
            }
          }
         
        }else{
           $data['deleted'] = 0;      
        }
      $data['search_word'] = $keyword = $this->input->post('keyword');        
      $data['search_id'] = $catid = $this->input->post('main_cats');
      $data['gal_cats'] = $this->upload_model->get_cats($catid,$keyword);
      
      $data['page_index'] = 3;
      }  
      $data['action'] = '';
      $data['gallery'] = 1;
      
      $ci = new Admincp();
      $data['privacy'] = $ci->get_privacy();
      $data['main_cats'] = $this->upload_model->get_main_cats();
      $this->load->view('admincp/gallery',$data);  
    }
    
   
}