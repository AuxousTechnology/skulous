<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
		parent::__construct();
		//check session is set or not
		if(!$this->session->userdata("id") && !$this->session->userdata("display_name")){
            redirect(base_url("auth"));
        }
        $this->load->view("header/header.php");
        $this->load->view("sidebar/sidebar.php");
        $this->load->view("header/topmenu.php");
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->load->view("home/home.php");
		$this->load->view("footer/footer.php");
	}

	public function logout(){
		$this->session->unset_userdata("id");
		$this->session->unset_userdata("display_name");
		redirect(base_url("welcome"));
	}
	public function session($action = null){
		if($action == "select"){
			$this->load->view("session/select-session.php");
			$this->load->view("footer/footer.php");
		}elseif($action == "add"){
			$this->form_validation->set_error_delimiters("<span class='text-danger text-small'>", "</span>");
			$this->form_validation->set_rules("session_name", "Session Name",  "required");$this->form_validation->set_rules("start_session", "Session Start Date",  "required|is_unique[session.start_session]");
			$this->form_validation->set_rules("end_session", "Session End Date",  "required|is_unique[session.end_session]");

			if($this->form_validation->run()){
				if($this->input->post('start_session') == $this->input->post('end_session')){
					$this->session->set_flashdata("success", "<div class='alert alert-danger rounded-0 border'>Please Enter Valid Date</div>");
					redirect(base_url("welcome/session/add"));	
				}else{
					$data = [
						"session_name" => $this->input->post("session_name"),
						"start_session" => $this->input->post("start_session"),
						"end_session" => $this->input->post("end_session")
					];
					if($this->work->insert_data("session", $data)){
						$this->session->set_flashdata("success", "<div class='alert alert-info rounded-0 border'>Session successfully created</div>");
						redirect(base_url("welcome/session/select"));
					}else{
						$this->session->set_flashdata("success", "<div class='alert alert-danger rounded-0 border'><strong>Oops</strong> Session does not created</div>");
						redirect(base_url("welcome/session/add"));
					}
				}
				
			}else{
				$this->load->view("session/add-session");
				$this->load->view("footer/footer");
			}
		}
	}
}
