<?php
require('_/modules/welcome/controllers/block.php');

class Research extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
		if($this->data->permistion_menu) {
			$block = new Block();
	
			$this->data->col1_research = $block->col1_research();
			$this->data->col3_research = $block->col3_research();
			$this->template->write_view('content', 'research', $this->data);
		}
		else
			$this->template->write_view('content', 'not_permistion', $this->data); 
		$this->template->render();
    }
    
}