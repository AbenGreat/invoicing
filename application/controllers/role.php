<?php
    class Role extends MY_Controller {
		
		public function index() {			
			$result = $this->role_model->query_by();
			foreach($result as $data) {
				echo serialize($data)."<br>";
			}
		}
	}