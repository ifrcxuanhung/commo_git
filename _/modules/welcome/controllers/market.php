<?php
require('_/modules/welcome/controllers/block.php');

class Market extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index($type='agriculture') {
		if($this->data->permistion_menu) {

            $block = new Block();
            $this->data->col1_market = $block->col1_market($type);
           // $this->data->col3_market = $block->col3_market($type);
            $char = $this->db->query("select ds.code from data_dashboard_list as dl LEFT JOIN data_series_last as ds  ON dl.bctcode=ds.symbol  
WHERE dl.type='{$type}' and dl.active = 1 and dl.top=5 and ds.expyyyymm!=0 ORDER BY ds.expyyyymm ASC LImit 1 ")->row_array();
            $this->data->chartcode = $char["code"];
            $this->template->write_view('content', 'market', $this->data);
		}
		else
		 	$this->template->write_view('content', 'not_permistion', $this->data);
		$this->template->render();
    }
    
}