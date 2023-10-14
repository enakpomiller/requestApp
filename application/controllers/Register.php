<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form','text'));
        $this->load->library('form_validation');
    
    }

    public function index (){
        $this->data['title'] = " Register ";
        $this->data['page_name'] = "register";
        $this->load->view('layout/index2',$this->data);
    }



}