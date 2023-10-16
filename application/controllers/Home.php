<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form','text'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
    
    }

    public function index (){
        $this->data['title'] = " pages as default ";
        $this->data['page_name'] = "home";
        $this->load->view('layout/index',$this->data);
    }
  
    public function create_request(){
        if($_POST){
            $data =[
                'user_id'=>$this->session->id,
                'requesttitle'=>$this->input->post('requesttitle'),
                'reasons'=>$this->input->post('reasons'),
                'date'=>$this->input->post('date')
            ];
            $insert = $this->db->insert('tbl_request',$data);
            if($insert){
               $this->session->set_flashdata('msg_create',' Your Request Has Been Sent ');
               return redirect(base_url('home/create_request'));
            }else{
                $this->session->set_flashdata('msg_error',' Sorry Request Cannot be sent ');
                return redirect(base_url('home/create_request'));
            }
        }else{
            $this->data['title'] = " Create Request";
            $this->data['page_name'] = "create_request";
            $this->load->view('layout/index',$this->data);
        }
       
     }

     public function requestfeed(){
        $this->data['title'] = " Request FeedBack ";
        $this->data['page_name'] = "requestfeed";
        $this->load->view('layout/index',$this->data);
     }


}