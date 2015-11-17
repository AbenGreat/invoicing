<?php
    class User_model extends MY_Model {
		public function hasUser($name) {
			return $this->query_count_by("name = '{$name}'");
		}
		public function checkUser($name,$password) {
			return $this->query_by("*","name = '{$name}' and password = '{$password}'");
		}
	}