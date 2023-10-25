<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form','text'));
        $this->load->library('form_validation');
        $this->load->model(array('home_m'));
        $this->load->library('session');
        $this->load->database();
    

        if(!$this->session->logged_in){
          $this->session->set_flashdata('msg_error',' Please login to access your dashboard');
           return redirect(base_url('login'));
         }

    
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
                'date'=>$this->input->post('date'),
                'timer'=>date('i:sa')
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
        $user_id = $this->session->userdata('id');
        $this->data['reqfeed'] = $this->db->get_where('tbl_replyreq',array('user_id'=>$user_id))->result();
      
        $this->data['page_name'] = "requestfeed";
        $this->load->view('layout/index',$this->data);
     }
  
     public function admin_viewreq(){
        $this->data['title'] = " View Request  ";
        $this->data['request'] = $this->home_m->allrequest();
        $this->data['page_name'] = "admin_viewreq";
        $this->load->view('layout/index',$this->data);
     }

     public function getreply($id){
        $user_id = $this->session->userdata('id');
        if($_POST){
        
        }else{
        $this->data['title'] = " View Reply  ";
           //$this->data['reqfeed'] = $this->db->get_where('tbl_replyreq',array('user_id'=>$user_id))->result();
        $this->data['reqfeed'] = $this->db->get_where('tbl_replyreq',array('id'=>$id))->row();
            //$this->data['replyfeed'] = $this->db->get_where('tbl_replyreq',array('user_id'=>$user_id))->result();
            //echo "<pre>"; print_r($this->data['reqfeed']);die;
        $this->data['page_name'] = "getreply";
        $this->load->view('layout/index',$this->data);
        }
    
      }

     public function viewreq(){
        if($_POST){
               $data = [
                 'user_id'=>$this->input->post('user_id'),
                 'replyreq'=>$this->input->post('replyreq'),
                 'date'=>date('Y-M-D'),
                 'timer'=>$this->input->post('timer')
               ];
                $this->session->set_flashdata('msg_reply',' Reply Send Successfully');
                $this->db->insert('tbl_replyreq',$data);
               return redirect(base_url('home/viewreq/'.$user_id));
          }else{
            $id = $this->uri->segment(3);
            $this->data['title'] = " Reply Request  ";
                //$this->data['request'] = $this->db->get_where('tbl_replyreq',array('user_id'=>$userid))->result();
            $this->data['request'] = $this->db->get_where('tbl_request',array('user_id'=>$id))->result();
            // var_dump($this->data['request']);die;
            $this->data['page_name'] = "viewreq";
            $this->load->view('layout/index',$this->data);
           }
     
     }
    
     public function deletereq($user_id){

        $this->db->where('id',$user_id);
         $del = $this->db->delete('tbl_users');
         if($del){
            $this->db->where('user_id',$user_id);
            $this->db->delete('tbl_request');

            $this->db->where('user_id',$user_id);
            $this->db->delete('tbl_replyreq');

            $this->session->set_flashdata('msg_del',' Delete action was successful');
            return redirect(base_url('home/admin_viewreq'));
        }else{
          echo " cannot delete ";
        }
        


      

        

    }
    
 
}