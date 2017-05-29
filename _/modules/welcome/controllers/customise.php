<?php
require('_/modules/welcome/controllers/block.php');

class Customise extends Welcome{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if($this->data->permistion_menu) {
            $block = new Block();
            $this->data->col1_customise = $block->col1_customise();
            $this->data->col3_customise = $block->col3_customise();
            $this->template->write_view('content', 'customise', $this->data);
        }
        else {
            $this->template->write_view('content', 'not_permistion', $this->data);
        }
        $this->template->render();
    }


}