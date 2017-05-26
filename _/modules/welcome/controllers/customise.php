<?php
require('_/modules/welcome/controllers/block.php');

class Customise extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
		if($this->data->permistion_menu) {
			$block = new Block();
			//$this->data->dashboard_stat = $block->dashboard_stat();
			$this->template->write_view('content', 'customise', $this->data);
		}
		else 
		$this->template->write_view('content', 'not_permistion', $this->data);
		$this->template->render();
    }
    
}