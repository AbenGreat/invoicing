<?php
    class Role_model extends MY_Model {
		public function __construct() {
			parent::__construct();
			$this->table = "role";
		}
	}