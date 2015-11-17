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
					$this->res(1,"登录成功！");
				} else {
					$this->res(2,"登录失败！");
				}
			}
		}
		protected function res($code,$info) {
    	    header('Content-Type:application/json; charset=utf-8');
    	    $rs = array("code"=>$code,"info"=>$info);
    	    exit(json_encode($rs));
        }
    }