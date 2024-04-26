<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Central Authentication System
//BACKEND RESPONSE

class Log extends CI_Controller {
  function login(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');


    //1. Check_All_Request
    if(strlen($username) > 0 && strlen($password) > 0){
      //2. Check_user
      $check = $this->logsys->user_check($username);
      if($check->num_rows() > 0){
        $user_data  = $check->row();
        if(password_verify($password, $user_data->password)){
                 $nama       = $user_data->nm_guru;
                 $email      = $user_data->email_guru;              
                 $id         = $user_data->id_guru;
                 $level      = ($user_data->is_admin == "Y") ? "0" : "1";
                 
                 $sess_data  = array(
                    "id"   => $id,
                    "nama" => $nama,
                    "email" => $email,
                    "level" => $level,
                    "status"=> "online"
                  );
              $this->session->set_userdata($sess_data);
              $response = array("status" => "1", "message" => "LOGIN DITERIMA, KLIK OK UNTUK MELANJUTKAN");
        } else {
          $response = array("status" => "0", "message" => "Password yang dimasukan Salah!");
        }
      }
      else $response = array("status" => "0", "message" => "Username tidak dapat ditemukan!");
    } else {
      $response = array("status" => "0", "message" => "Error, data yang dikirmkan tidak sesuai");
    }

      echo json_encode($response);
  }

  function logout(){
    $this->session->sess_destroy();
    redirect(base_url());
  }

  

}
