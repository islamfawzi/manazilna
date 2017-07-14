<?php

/**
 *
 * CREATED BY Noureldin
 * noureldin.fawzy@outlook.com
 *
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function auth() {
    $CI = &get_instance();
    if ($CI->session->userdata('loggedIn')) {
        return $CI->session->userdata('user');
    } else {
        return false;
    }
}

function _view($page, $title = null, $output = false) {
    $GLOBALS['page'] = 'site/' . $page;
    $GLOBALS['title'] = $GLOBALS['title'] != null ? $GLOBALS['title'] : $title;
    $CI = &get_instance();
    return $CI->load->view('site/_main_layout', $GLOBALS, $output);
}

function _view_ar($page, $title = null, $output = false) {
    $GLOBALS['page'] = 'site_ar/' . $page;
    $GLOBALS['title'] = $GLOBALS['title'] != null ? $GLOBALS['title'] : $title;
    $CI = &get_instance();
    return $CI->load->view('site_ar/_main_layout', $GLOBALS, $output);
}

function adminShow($page = NULL, $title = NULL) {
    $GLOBALS['page'] = 'admincp/' . $page;
    $GLOBALS['title'] = $title;
    $CI = &get_instance();
    $CI->load->view('admincp/_main', $GLOBALS);
}

function ddd($x) {
    echo'<pre>';
    print_r($x);
}

function dd($x = 'SSS', $y = '') {
    echo'<pre>';
    print_r($x);
    die($y);
}

function assets($path = null) {
    return base_url('assets/' . $path);
}
