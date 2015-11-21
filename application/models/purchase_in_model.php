<?php
class Purchase_in_model extends MY_Model {
	public function __construct() {
		parent::__construct();
		$this->table = "purchase_in";
	}
	public function add($purchase_in,$purchase_in_details) {
		$this->db->insert("purchase_in",$purchase_in);
		$id = $this->db->insert_id();
		$purchase_in_details["purchase_in_id"] = $id;
		return $this->insert("purchase_in_details",$purchase_in_details);
	}
	public function remove($purchase_in_id) {
		$this->db->delete("purchase_in_details",array("purchase_in_id"=>$purchase_in_id));
		return $this->db->delete("purchase_in",array("id"=>$purchase_in_id));
	}
	public function details($purchase_in_id) {
		return $this->db->query("select * from purchase_in_details where purchase_in_id = {$purchase_in_id}")->result()[0];
	}
	public function check($purchase_in_id) {
		return $this->db->update("purchase_in",array("status"=>"wait_finish"),array("id"=>$purchase_in_id));
	}
	public function finish($purchase_in_id) {
		return $this->db->update("purchase_in",array("status"=>"finish"),array("id"=>$purchase_in_id));
	}
}