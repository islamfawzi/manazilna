<?php

class Login extends CI_Controller{
  
  function __construct(){
    parent::__construct();
    $this->load->model('user');
    $this->load->model('mac');
  }
  function index(){
      $data = array('username' => '','password'=> '','title'=>'ÊÓÌíá ÇáÏÎæá');
      $this->load->view('admincp/login_view',$data);  
   }
   
   function login_cp(){
    extract($_POST);
    $userid = $this->user->get_user($username,$password);
    if($userid > 0){
         $this->user->set_lastvisit($userid);
         $privacy  = $this->user->get_user_privacy($userid);
         $data = array('username' => $username,'password'=> $password, 'logged'=>1,'title'=>'Êã ÊÓÌíá ÇáÏÎæá','privacy'=>$privacy);
         $fullname = $this->user->get_user_fullname($userid);
     #    $this->session->set_userdata('fullname',$fullname);
         $this->session->set_userdata(array('user_id'=>$userid,
                                            'fullname'=>$fullname));
        if(isset($remember_me)){
            $this->user->set_remmber($userid,$this->mac->get_mac());
            $data['rem'] = 1;
        }
    }else{
        $data = array('username' => $username,'password'=> '' , 'logged'=>2,'title'=>'ÎØÃ');
    }
    $this->load->view('admincp/login_view',$data);
   }
   
   function logout(){
    $userid = $this->session->userdata('user_id');
    $this->session->unset_userdata('fullname');
    $this->session->unset_userdata('user_id');
    
    $this->user->logout($userid);
    redirect(base_url().'login');
   }  
    
}