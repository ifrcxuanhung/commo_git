<?php
require('_/modules/welcome/controllers/block.php');

class Services extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
		if($this->data->permistion_menu) {
			$block = new Block();
			
			$this->data->block_contact = $block->contact();
        $this->data->article_services = $block->table_article_services();
			$this->template->write_view('content', 'services', $this->data);
		}
		else
		 	$this->template->write_view('content', 'not_permistion', $this->data);
		$this->template->render();
    }
	public function get_faq(){
		$data = $this->db->where('type','services')->where('active','1')->where('id',$_REQUEST['id'])->get('simul_settings')->row_array();

		//echo "<pre>";print_r($_REQUEST['id']);exit;
		if(isset($_SESSION['curent_language']['code']) && $_SESSION['curent_language']['code'] == 'fr' && $data['fr'] !=''){
			$data['name'] = $data['fr'];
		}else if(isset($_SESSION['curent_language']['code']) && $_SESSION['curent_language']['code'] == 'vn' && $data['vn'] !=''){
			$data['name'] = $data['vn'];
		}else if(isset($_SESSION['curent_language']['code']) && $_SESSION['curent_language']['code'] == 'en' && $data['en'] !=''){
			$data['name'] = $data['en'];	
		}
		else{
			$data['name'] = $data['name'];
		}
		
		if(isset($_SESSION['curent_language']['code']) && $_SESSION['curent_language']['code'] == 'fr' && $data['info_fr'] !=''){
			$data['info'] = $data['info_fr'];
		}else if(isset($_SESSION['curent_language']['code']) && $_SESSION['curent_language']['code'] == 'vn' && $data['info_vn'] !=''){
			$data['info'] = $data['info_vn'];
		}else if(isset($_SESSION['curent_language']['code']) && $_SESSION['curent_language']['code'] == 'en' && $data['info_en'] !=''){
			$data['info'] = $data['info_en'];	
		}
		else{
			$data['info'] = $data['info'];
		}
		$data['id'] = $_REQUEST['id']; 
		//echo "<pre>";print_r($data);exit;
		$this->output->set_output(json_encode($data));
	}
	function update_help(){
		$id = $_REQUEST['id'];
		$des = $_REQUEST['des'];
		$this->db->query("UPDATE simul_settings SET info = '$des' WHERE id = $id");	
		$this->output->set_output(json_encode($data));
	}
    
}