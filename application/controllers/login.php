<?php
    class Login extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model("user_model","model");
		}
		public function index() {
			if($_SERVER["REQUEST_METHOD"] == "GET")
			    $this->load->view("login/login");
			else if($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = $this->input->post("name");
				$password = $this->input->post("password");
				$user = $this->model->checkUser($name,$password);
				if(!empty($user)) {
					$this->session->__set("user",$user);
					$this->output->set_output(json_encode(array("code"=>1,"info"=>"login success")));
					} else {
					$this->output->set_output(json_encode(array("code"=>0,"info"=>"login faile")));
				}
			}
		}
	}