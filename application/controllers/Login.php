<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form','text'));
        $this->load->library('form_validation');
    
    }

    public function index (){
        $this->data['title'] = " Student Login ";
        $this->data['page_name'] = "login";
        $this->load->view('layout/index2',$this->data);
    }



}