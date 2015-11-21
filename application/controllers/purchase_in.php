<?php
class Purchase_in extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("purchase_in_model","model");
	}
	public function add() {
		$purchase_in = $this->input->post("purchase_in");
		$purchase_in_details = $this->input->post("purchase_in_details");
		$result = $this->model->add($purchase_in,$purchase_in_details);
		$this->handleResult($result,"添加");
	}
	public function remove() {
		$purchase_in_id = $this->input->post("purchase_in_id");
		$result = $this->model->remove($purchase_in_id);
		$this->handleResult($result,"移除");
	}
	public function details() {
		$purchase_in_id = $this->input->post("purchase_in_id");
		$data = $this->model->details($purchase_in_id);
		$this->load->view("purchase_in_details",$data);
	}
	public function check() {
		$purchase_in_id = $this->input->post("purchase_in_id");
		$result = $this->model->check($purchase_in_id);
		$this->handleResult($result,"审核");
	}
	public function finish() {
		$purchase_in_id = $this->input->post("purchase_in_id");
		$result = $this->model->finish($purchase_in_id);
		$this->handleResult($result,"标记完成");
	}
}