<?php

class Start extends Welcome{
    public function __construct() {
        parent::__construct();
        redirect(base_url().'dashboard');

    }
    
    public function index() {
		$this->template->write_view('content', 'start', $this->data);
		$this->template->render();
    }
    
}