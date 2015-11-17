<?php
    class Purchase_return_model extends MY_Model {
			public function __construct() {
			parent::__construct();
			$this->table = "purchase_return";
		}
	}