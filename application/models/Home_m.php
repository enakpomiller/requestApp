<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_model{

   //private $tbl_users = 'tbl_users';



  public function createuser($names,$email,$userfile,$country,$password){
        $data_arr =[
            'names'=>$names,
            'email'=>$email,
            'userfile'=>$userfile,
            'country'=>$country,
            'password'=>$password
        ];
         $this->db->insert('tbl_users',$data_arr);
   }

   public function CheckUser($email,$password){
      $query = $this->db->get_where('tbl_users',array('email'=>$email,'password'=>$password));
      return $query->row();
   } 



}