<?php
require('_/modules/welcome/controllers/block.php');

class News extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
		if($this->data->permistion_menu) {
			$block = new Block();
			
			$this->data->dashboard = $block->dashboard();
			$this->data->news_left = $block->news_left();
			$this->data->news_right = $block->news_right();
	
			$this->template->write_view('content', 'news', $this->data);
		}
		else
		 	$this->template->write_view('content', 'not_permistion', $this->data);
		$this->template->render();
    }
    public function getContentDataNews(){
        $data = $this->db->where('id',$_REQUEST['id'])->get('data_news')->row_array();


        $this->output->set_output(json_encode($data));
    }

    
}