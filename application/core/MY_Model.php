<?php
    class MY_Model extends CI_Model {
		protected $table;
		public function __construct() {
			parent::__construct();
			$this->load->database();
			$this->table = substr(strtolower(get_class($this)),0,-6);
		}
		public function query($sql) {
			$query = $this->db->query($sql);
			return $query->result();
		}
		public function query_by($attrs = "*",$where = "1=1") {
			if(empty($where))
				$where = "1=1";
			$query = $this->db->select($attrs)->where($where)->get($this->table);
			return $query->result();
		}
		public function query_count_by($where = "1=1") {
			if(empty($where))
				$where = "1=1";
			$query = $this->db->where($where)->get($this->table);
			return $query->num_rows();
		}
		public function query_by_limit($offset = 0,$limit = 10,$attrs = "*",$where = "1=1") {
			if(empty($where))
				$where = "1=1";
			$query = $this->db->select($attrs)->where($where)->limit($limit,$offset)->get($this->table);
			return $query->result();
		}
		public function insert($data) {
			return $this->db->insert($this->table,$data);
		}
		public function insert_batch($datas) {
			return $this->db->insert_batch($this->table,$datas);
		}
		public function update($data,$where) {
			return $this->db->update($this->table,$data,$where);
		}
		public function update_batch($datas,$where) {
			return $this->db->update_batch($this->table,$datas,$where);
		}
		public function remove($where) {
			return $this->db->delete($this->table,$where);
		}
		public function list_fields() {
			return $this->db->list_fields($this->table);
		}
	}