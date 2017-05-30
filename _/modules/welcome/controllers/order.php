<?php
require('_/modules/welcome/controllers/block.php');

class Order extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
		if($this->data->permistion_menu) {
	
			$this->template->write_view('content', 'comingsoon', $this->data);
		}
		else
		 	$this->template->write_view('content', 'not_permistion', $this->data);
		$this->template->render();
    }
    
}