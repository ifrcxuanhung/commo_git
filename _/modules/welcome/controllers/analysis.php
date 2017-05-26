<?php
require('_/modules/welcome/controllers/block.php');

class Analysis extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
		if($this->data->permistion_menu) {
			$block = new Block();
	
			$this->data->col1_analysis = $block->col1_analysis();
			//$this->data->col2_product = $block->col2_product();
			$this->data->col3_analysis = $block->col3_analysis();
			$this->template->write_view('content', 'analysis', $this->data);
		}
		else
			$this->template->write_view('content', 'not_permistion', $this->data); 
		$this->template->render();
    }
    
}