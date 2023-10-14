<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form','text'));
        $this->load->library('form_validation');
    
    }

    public function index (){
        $this->data['title'] = " pages as default ";
        $this->data['page_title'] = "home";
        $this->load->view('layout/index',$this->data);
    }



}