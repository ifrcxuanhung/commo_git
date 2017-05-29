<?php
require('_/modules/welcome/controllers/block.php');

class Category extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index($type='agriculture') {
		if($this->data->permistion_menu) {
			$block = new Block();
	
			$this->data->col1_category = $block->col1_category($type);
			//$this->data->col3_category = $block->col3_category($type);
			$this->template->write_view('content', 'category', $this->data);
		}
		else {
			$this->template->write_view('content', 'not_permistion', $this->data);
		}
		$this->template->render();
    }
    public function getContentDataNews(){
        $data = $this->db->where('id',$_REQUEST['id'])->get('data_news')->row_array();

        $this->output->set_output(json_encode($data));
    }
	
}