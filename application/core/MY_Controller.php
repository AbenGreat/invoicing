<?php
class MY_Controller extends CI_Controller
{
    protected $name;
    public function __construct()
    {
        parent::__construct();
		$this->_authentication();
		try {
		$this->name = strtolower(get_class($this));
        $this->load->model("{$this->name}_model", "model");
		} catch(Exception $e) {
		}
    }
    public function edit()
    {
		$id = $this->input->post("id");
		if(!empty($id)) {
			$data = $this->model->query_by("*","id = {$id}")[0];
			$this->load->view("{$this->name}/edit",$data);
		} else {
			$this->load->view("{$this->name}/edit");
		}
    }
	public function remove()
	{
		$id = $this->input->post("id");
		if(!empty($id)) {
			$row = $this->model->remove("id = {$id}");
			if($row > 0)
				$this->index();
		} 
	}
	public function add() {
		$data = $this->input->post();
		$rs = $this->model->insert($data);
	}
	public function update() {
		$id = $this->input->post("id");
		$data = $this->input->post();
		$rs = $this->model->update($data,"id = {$id}");
	}
	public function _authentication() {
		if($this->session->__get("user") ==  null) {
			redirect(base_url("login"));
		}
	}
    public function index()
    {
        $result = $this->model->query_by_limit(0, 2, "*");
        $count  = $this->model->query_count_by();
        $data   = array(
            "datas" => $result,
			"pages"=>$this->getPage($count, 2)
        );
        $this->load->view("{$this->name}/list", $data);
    }
    public function page($index = 0)
    {
        $conditions = $this->input->post("conditions");
		if(!empty($conditions))
		    $this->filter($conditions);
		else
			$conditions = null;
        $result     = $this->model->query_by_limit($index, 2, "*", $conditions);
        $count      = $this->model->query_count_by($conditions);
		$data   = array(
            "datas" => $result,
			"pages"=>$this->getPage($count, 2, $conditions)
        );
		$this->load->view("{$this->name}/result", $data);
    }
    public function getPage($rows, $limit = 10, $conditions = "")
    {
        $this->load->library('pagination');
        $config['base_url']        = "#";
        $config['total_rows']      = $rows;
        $config['per_page']        = $limit;
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        $config['cur_tag_open']    = '<li><a>';
        $config['cur_tag_close']   = '</a></li>';
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        $config['prev_link']       = FALSE;
        $config['next_link']       = FALSE;
        $config['first_link']      = "首页";
        $config['last_link']       = "尾页";
        $config['attributes']      = array(
            'class' => 'page_nums'
        );
		$config['attributes']['rel'] = FALSE;
        $this->pagination->initialize($config);
        $pages = $this->pagination->create_links();
		$_conditions = json_encode($conditions);
        $result = '<div class="page pull-left"><span class="base_url page_info" data-url="/' . $this->name . '/page/"></span><nav><ul class="pagination pagination-lg">' . $pages . '</ul></nav></div>';
		$result .= '<script>var conditions = JSON.parse(\''.$_conditions.'\');$(".page_nums").unbind().on("click",function() {var nums = $(this).attr("href").substring(2,3); var url = $(".page_info").data("url") + nums;create_ajax(url,{conditions:conditions});});</script>';
		return $result;
    }
	
	private function filter(&$conditions) {
		foreach($conditions as $key=>$val) {
			if(empty($val))
				unset($conditions[$key]);
		}
	}
	
}