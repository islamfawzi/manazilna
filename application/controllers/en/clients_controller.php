<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clients_controller extends Super {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
    }

    public function signup() {
        if (auth())
            redirect(base_url());
        if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['signup']) {

            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'name',
                    'label' => 'Name',
                    'rules' => 'trim|required|min_length[3]|xss_clean'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required|matches[passwordconf]|md5'
                ),
                array(
                    'field' => 'passwordconf',
                    'label' => 'Password confirmation',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|valid_email|is_unique[clients.email]'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() != FALSE) {
                $this->load->model('clients_model');
                unset($_POST['passwordconf'], $_POST['signup']);
                $_POST['join_date'] = time();
                $result = $this->clients_model->add_client($_POST);
                redirect(base_url('signin'));
            }
        }
        _view('signup');
    }

    function signin() {
        if (auth())
            redirect(base_url());
        if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['signin']) {
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|valid_email'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required|md5'
                )
            );

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() != FALSE) {
                $this->load->model('clients_model');

                if ($this->clients_model->clientSignIn($_POST)) {
                    redirect(base_url());
                }
            }
        }
        _view('signin');
    }

    function signout() {

        $this->session->sess_destroy();
        $this->session->set_userdata(['loggedIn' => false]);
        if (isset($_COOKIE['remember_me_token'])) {
          setcookie('remember_me_token', NULL, time()-604800);
        }
        redirect(base_url());
    }

    function changePassword() {
        if (loggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['changePassword']) {
                $this->load->library('form_validation');
                $config = array(
                    array(
                        'field' => 'old_password',
                        'label' => 'lang:password',
                        'rules' => 'trim|required|md5'
                    ),
                    array(
                        'field' => 'new_password',
                        'label' => 'lang:password',
                        'rules' => 'trim|required|matches[new_password_cofirm]|md5'
                    ),
                    array(
                        'field' => 'new_password_cofirm',
                        'label' => 'lang:password',
                        'rules' => 'trim|required||matches[new_password]|md5'
                    )
                );

                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == FALSE) {
                    $GLOBALS['form_errors'] = validation_errors();
                } else {
                    $this->load->model('clients_model');
                    if ($this->clients_model->change_password($_POST)) {

                        $GLOBALS['updated'] = true;
                    } else {
                        $GLOBALS['updated'] = false;
                    }
                }
            }
            $GLOBALS['page'] = "site/client_chang_password";
            view_loader($GLOBALS);
        } else {
            redirect(base_url('signin'));
        }
    }

    function editClientInfo() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['update']) {
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'title',
                    'label' => 'lang:title',
                    'rules' => 'trim|required|min_length[5]|xss_clean'
                ),
                array(
                    'field' => 'email',
                    'label' => 'lang:email',
                    'rules' => 'trim|required|valid_email'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $GLOBALS['form_errors'] = validation_errors();
            } else {
                unset($_POST['update']);
                $this->load->model('clients_model');
                $result = $this->clients_model->updateClientInfo($_POST);
            }
        }

        $user_id = $this->session->userdata('client_id');

        $this->load->model('clients_model');
        $GLOBALS['client'] = $this->clients_model->get_client($user_id);

        $this->load->model('country_mod');
        $GLOBALS['countries'] = $this->country_mod->getAllActiveCountry();

        $GLOBALS['page'] = "site/edite_user_info";
        view_loader($GLOBALS);
    }

    function newsletter() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->load->model('newsletter_model');
            echo $this->newsletter_model->subscribe($_POST);
        }
    }

}
