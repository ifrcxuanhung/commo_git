<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    protected $data;

    function __construct() {
        parent::__construct();
        $this->data = new stdClass();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->library('user_agent');
        $this->load->library('ion_auth');
        $this->load->library('session');
		$this->load->model('User_model', 'user_detail');
		$this->db3 = $this->load->database('database3', TRUE);
		/*if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['commo']['username'])) :
			$this->ion_auth->logout();
		endif;
		*/
		
		if(isset($_SESSION['commo']['user_id'])){
			$this->session->set_userdata('user_id', $_SESSION['commo']['user_id']);
			$this->data->avatar = $_SESSION['commo']['gravatar'];
			$this->data->name = $_SESSION['commo']['username'];
		}


		
        $this->data->config = $this->db->get('config')->row_array();
        $this->load->model('language_model', 'language');
        $where = array('status' => 1);
        $langList = $this->language->find(NULL, $where);
        if (is_array($langList) == TRUE && count($langList) > 0) {
            foreach ($langList as $value) {
                $this->data->list_language[$value['code']] = $value;
            }
            $this->data->default_language = $langList[0];
        }
        unset($langList);
		//echo "<pre>";print_r($_SESSION);exit;
        $this->session->set_userdata('default_language', $this->data->default_language);
		
        if (!isset($_SESSION['curent_language'])) {
            $this->session->set_userdata('curent_language', $this->data->default_language);
			$file = file_get_contents(base_url().'assets/translate/translate.json');
			$this->data->curent_language = array('code'=>'en');
			$_SESSION['curent_language'] = array('code'=>'en');
        }else{
        	$this->data->curent_language = $_SESSION['curent_language'];
		}
    
		//user info
		
		
		//user info
		if($this->session->userdata('user_id')) {
            $this->session->set_userdata('login',1);
			if (!$this->session->userdata('user_level')) {
				 $this->load->model('User_model', 'user_detail');
				 $detail = $this->user_detail->get_detail_user($this->session->userdata('user_id'));
				 $this->session->set_userdata('user_level', $detail['user_level']);
				
			}
		}
		else {
		      $this->session->set_userdata('login',0);
			 $this->session->set_userdata('user_level', 0);
		}
	
        $this->data->loginAuth = $this->session->userdata('login');
		//menu
        /*if (!$this->session->userdata('id_menu')) {
            $this->session->set_userdata('id_menu', '1');
        }*/
        $this->data->template_url = template_url();
        $this->data->setting = $this->registry->setting;
        $this->template->set_template('default');
        
        // load data sidebar
        $this->load->model('Menu_model', 'menu');
        $this->data->menu = $this->menu->getMenu();
		
		// menu active
        $this->data->simulation_url = base_url();
        $this->data->logo_txt = $this->db->query("SELECT * FROM simul_settings ss WHERE ss.type='logo'")->result_array();
		
		$get_url = explode("table",$_SERVER['REQUEST_URI']);

       /*$id_menu = $this->menu->getMenuByLink(current_url_domain());
		$this->data->id_menu_actived = (isset($id_menu["parent_id"]) && $id_menu["parent_id"]!=0) ? $id_menu["parent_id"] :((isset($id_menu["id"])&& $id_menu["id"]!=134) ? $id_menu["id"] : 0);
		$this->session->set_userdata('id_menu', $this->data->id_menu_actived);*/
        
        $this->data->setting_ = $this->getSettings();

        $this->data->list_lang = $this->db->where('status', 1)
            ->order_by('sort_order', 'asc')
            ->get('language')->result_array();
			
		$info = $this->db->where('user_id', $this->session->userdata('user_id'))
                    ->limit(1)
                    ->get('login_users')->row_array();
		//echo "<pre>";print_r($info);exit;
		if(isset($info['avatar'])){
			$info['thumb'] = str_replace('assets/upload/avatar','assets/upload/avatar/thumb',$info['avatar']);
		}		
		$this->data->user = $info;
	

        $this->data->user_job = $this->db->where_in('userid', array($this->session->userdata('user_id'),0))->where('active', 1)
                                ->get('int_shortcuts')->result_array();
        // load media
		$this->data->simulation_url = base_url();
		$this->data->logo_txt = $this->db->query("SELECT * FROM simul_settings ss WHERE ss.type='logo'")->result_array();
		//echo "<pre>";print_r($this->data->logo_txt);exit;
		


		$simul_settings = $this->db->order_by('order')->get('simul_settings')->result_array();

		$menu_main = array();
        $check_exists_cat = array();
		foreach($simul_settings as $simul){
			$arr_simul[$simul['type']][$simul['stype']][] = $simul;
			if(($simul['type']=='menu') && ($simul['stype']=='main' ) && ( $simul['active'] <=  $this->session->userdata('user_level')))
			$menu_main[] = $simul;
            $check_exists_cat[] = $simul['url'];
		}
		$this->data->simul_settings = $arr_simul;
        $this->data->check_exists_cat = $check_exists_cat;
        $this->data->simul_menu = $menu_main;
		$sql ="select active  From simul_settings Where `type` ='menu' and (`url` like '%".$this->router->fetch_class()."%' ) limit 1";
	    $menu_active = $this->db->query($sql)->row_array();
		if(isset($menu_active["active"]) && $menu_active["active"] <=  $this->session->userdata('user_level')) {
			$this->data->permistion_menu = TRUE;
		}
		else 
		$this->data->permistion_menu = FALSE;
		
		$this->data->multilanguage = $this->db->where('key','multilanguage')->get('setting')->row_array();
		$this->data->box_info_auto_close_seconds = $this->db->where('key','box_info_auto_close_seconds')->get('setting')->row_array();
		$this->data->color_box_information = $this->db->where('key','color_box_information')->get('setting')->row_array();
		$this->data->color_box_confirmation = $this->db->where('key','color_box_confirmation')->get('setting')->row_array();
		$this->data->color_web_header = $this->db->where('key','color_web_header')->get('setting')->row_array();
		$this->data->color_web_footer = $this->db->where('key','color_web_footer')->get('setting')->row_array();
		$this->data->color_web_body = $this->db->where('key','color_web_body')->get('setting')->row_array();
       // echo "<pre>";print_r($this->data->data_dashboard);exit;
		
        $this->load->model('Media_model', 'media');
        
        $this->template->write_view('header', 'header', $this->data);
        
        $this->template->write_view('footer', 'footer', $this->data);
    }

    public function index() {
        //redirect(base_url() . 'home');
		$this->data->blockstart = $this->db->query("SELECT * FROM simul_settings ss WHERE ss.type='menu' AND ss.stype = 'main' AND ss.active = 1 ORDER BY ss.`order`")->result_array();
		
        $template_url_ = template_url();
        $this->data->template_url = $template_url_;
        $this->data->simulation_url = base_url().DIR_SIMULATION;
		
		
    }

    public function active($langCode = '') {
        $ls = $this->language_model->find();
        foreach ($ls as $key => $value) {
            $this->data->list_language[$value['code']] = $value;
        }
        if (isset($this->data->list_language[$langCode]) == TRUE) {
            $this->session->set_userdata('curent_language', $this->data->list_language[$langCode]);
            $this->output->set_output(json_encode(array('result' => 1)));
        }
    }

    public function getSettings(){
        // load setting
        $array = array();
        $data = $this->db->where('active', 1)
        ->get('setting')->result_array();
        foreach($data as $value){
            $array[$value['key']] = $value['value'];
        }
        return $array;  
    }
    public function timer() {
        $this->output->set_output(date('H:i:s'));
    }
	private function objectToArray( $object )
    {
        if( !is_object( $object ) && !is_array( $object ) )
        {
            return $object;
        }
        if( is_object( $object ) )
        {
            $object = get_object_vars( $object );
        }
        return array_map( 'objectToArray', $object );
    }
    
    public function _thumb(&$image = NULL) {
        $thumb = 'assets/upload/images/no-image.jpg';
        if ($image == NULL) {
            $image = $thumb;
            return $thumb;
        }
        if (isset($image) == TRUE && $image != '') {
            image_thumb($image, 200, 150);
        }
        return $image;
    }
    
    public function userOnline(){
        $query = $this->db->where('user_id',$this->session->userdata('user_id'))->get('user_log');
        if ($query->num_rows() > 0){
            $this->db->where('user_id',$this->session->userdata('user_id'))->delete('user_log');
        }
        $data_user = array(
            'user_id' => $this->session->userdata('user_id'),
            'lastactive' => $this->session->userdata('lastActivity'),
            'status' => $this->session->userdata('login')
        );
        $this->db->insert('user_log', $data_user);
    }
    public function getListUserOnline(){
        $this->db->where('status', 1);
        $this->db->from('user_log');
        $this->db->join('user', 'user_log.user_id = user.id');
        $this->db->join('user_info', 'user_info.id_user = user.id');
        $this->db->where('user_log.user_id !=', $this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    } 
}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */