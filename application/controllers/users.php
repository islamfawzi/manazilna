<?php

class Users extends CI_Controller{
    
    function __construct(){
    	parent::__construct();
    	$this->load->model('user');
    } 
	function index($start = 0){
           
		$user = array('username'  => 'test',
			          'password'  => md5('admin8766'),
			          'fullname'  =>'Vadecom',
			          'email'     => 'info@vadecom.net',
			          'user_type' => 1
			           );
		$this->user->set_user($user);
      
		$data['users'] = $this->user->get_user(2,$start);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'users/index/';
		$config['total_rows'] = $this->user->get_users_count();
		$config['per_page'] = 2;
		$this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();
 		$this->load->view('user',$data);  
	}

	function delete($id){
		$this->user->delete_user($id);
		redirect(base_url().'users');
	}
}
?>