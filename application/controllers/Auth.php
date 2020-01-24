<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        //check session is set or not
        if($this->session->userdata("id") && $this->session->userdata("display_name")){
            redirect(base_url("welcome"));
        }
    }
    public function index(){
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('user_name', 'Username', 'required|min_length[5]|max_length[12]|alpha_numeric');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[5]|max_length[12]|alpha_numeric');
        if($this->form_validation->run()){
            $data = [
                "user_name" => $_POST["user_name"],
                "user_password" => $_POST["user_password"],
                "user_status" => 1
            ];
            $this->load->model("work");            
            $val = $this->work->login("user", $data);
            if($val->num_rows() > 0){
                $info = $val->result();
                foreach($info as $value){
                    $this->session->set_userdata("id", $value->user_name);
                    $this->session->set_userdata("display_name", $value->display_name);
                    redirect(base_url("welcome"));
                }
                
            }else{
                $this->session->set_flashdata("success", "<div class='alert alert-danger rounded-0 border'> <strong>Opps</strong> User Name and Password is wrong</div>");
                redirect(base_url('auth/'));
            }
        }else{
            $this->load->view("header/header.php");
            $this->load->view("login/admin/admin-login");
        }
        
    }
}
?>