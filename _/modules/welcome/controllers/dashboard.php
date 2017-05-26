<?php
require('_/modules/welcome/controllers/block.php');

class Dashboard extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
		if($this->data->permistion_menu) {
			$block = new Block();
			
			$this->data->dashboard = $block->dashboard();
			$this->data->chart1 = $block->chart1('300px');
			$this->data->chart2 = $block->chart2('300px');
			$this->data->chart3 = $block->chart3('300px');
			$this->data->chart4 = $block->chart4('300px');
	
			$this->data->data_table1 = $block->data_table1();
			$this->data->data_table2 = $block->data_table2();
			$this->data->data_table3 = $block->data_table3();
			$this->data->data_table4 = $block->data_table4();
	
			$this->template->write_view('content', 'dashboard', $this->data);
		}
		else 
		 	$this->template->write_view('content', 'not_permistion', $this->data);
		$this->template->render();
    }
    public function auto_data_dashboard(){
		$data_dashboard = $this->db->query("SELECT * FROM data_dashboard_list as dl  RIGHT JOIN data_dashboard as dd ON dl.type=dd.type where dd.active = 1 and dl.top=5 Order by dd.nr")->result_array();

		$data_dashboard[0]['lable_3'] = ($data_dashboard[0]['lable_3'] != 0 && !is_null($data_dashboard[0]['lable_3'])) ?number_format((float)$data_dashboard[0]['lable_3'], $data_dashboard[0]['dec'], '.', ','):'';
		$data_dashboard[0]['lable_7'] = number_format((float)$data_dashboard[0]['last'], $data_dashboard[0]['dec'], '.', ',');
		$data_dashboard[0]['lasttimex'] = (isset($data_dashboard[0]['lasttimex']) && !is_null($data_dashboard[0]['lasttimex'])) ? date( "H:i", strtotime( $data_dashboard[0]['lasttimex'] ) ) :'';

		$data_dashboard[1]['lable_3'] = ($data_dashboard[1]['lable_3'] != 0 && !is_null($data_dashboard[1]['lable_3'])) ?number_format((float)$data_dashboard[1]['lable_3'], $data_dashboard[1]['dec'], '.', ','):'';
		$data_dashboard[1]['lable_7'] = number_format((float)$data_dashboard[1]['last'], $data_dashboard[1]['dec'], '.', ',');
		$data_dashboard[1]['lasttimex'] = (isset($data_dashboard[1]['lasttimex']) && !is_null($data_dashboard[1]['lasttimex'])) ? date( "H:i", strtotime( $data_dashboard[1]['lasttimex'] ) ) :'';

		$data_dashboard[2]['lable_3'] = ($data_dashboard[2]['lable_3'] != 0 && !is_null($data_dashboard[2]['lable_3'])) ?number_format((float)$data_dashboard[2]['lable_3'], $data_dashboard[2]['dec'], '.', ','):'';
		$data_dashboard[2]['lable_7'] = number_format((float)$data_dashboard[2]['last'], $data_dashboard[2]['dec'], '.', ',');
		$data_dashboard[2]['lasttimex'] = (isset($data_dashboard[2]['lasttimex']) && !is_null($data_dashboard[2]['lasttimex'])) ? date( "H:i", strtotime( $data_dashboard[2]['lasttimex'] ) ) :'';

		$data_dashboard[3]['lable_3'] = ($data_dashboard[3]['lable_3'] != 0 && !is_null($data_dashboard[3]['lable_3'])) ?number_format((float)$data_dashboard[3]['lable_3'], $data_dashboard[3]['dec'], '.', ','):'';
		$data_dashboard[3]['lable_7'] = number_format((float)$data_dashboard[3]['last'], $data_dashboard[3]['dec'], '.', ',');
		$data_dashboard[3]['lasttimex'] = (isset($data_dashboard[3]['lasttimex']) && !is_null($data_dashboard[3]['lasttimex'])) ? date( "H:i", strtotime( $data_dashboard[3]['lasttimex'] ) ) :'';


		$result["data_dashboard_0"] = $data_dashboard[0];

		$result["data_dashboard_1"] = $data_dashboard[1];
		$result["data_dashboard_2"] = $data_dashboard[2];
		$result["data_dashboard_3"] = $data_dashboard[3];

        $bctcode = $_REQUEST['bctcode'];
        $list_request = $this->db->query("SELECT dl.lasttime,dl.name,dl.unit, dl.lasttimex, dl.last, dl.`change`, dl.var, dl.`dec` as dec_list, dl.exchange, dl.expiry, dd.* FROM data_dashboard_list as dl  LEFT JOIN data_dashboard as dd ON dl.type=dd.type where dl.bctcode='{$bctcode}'")->row_array();

        $result["data_dashboard_name"] = $list_request['name'];
        $result["data_dashboard_unit"] = $list_request['unit'];

		$this->output->set_output(json_encode($result));
	}
	public function auto_data_dashboard_list_table_1_backup(){
		$sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 1 AND dl.active = 1 AND dd.active =1  ORDER BY dl.top DESC, dl.name ASC";
		$result = $this->db->query($sql)->result_array();
		$html_table1 = '';
		$data_table1 = array();
		foreach($result as $rs){
			$rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
			$rs["lasttimex"] = (($rs['lasttimex'] == null)?'-': $rs['lasttimex']);
			$rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
			$data_table1[$rs["id"]] = $rs;
			$html_table1 .='<tr>';
            $html_table1 .='<td class="td_custom cus_pri" align="left"><a href="http://commo.ifrc.vn/product" class="uppercase table_1_name" id="table_1_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["last"].'</span></td>';
            $html_table1 .='<td class="td_custom table_1_lasttimex" align="right" id="table_1_lasttimex_'.$rs['id'].'">'.$rs["lasttimex"].'</td>';
            $html_table1 .='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td></tr>';


		}		
		$result["data_table_1"] = $data_table1;
		$result["table1"] = $html_table1;
		$this->output->set_output(json_encode($result));
	}
    public function auto_data_dashboard_list_table_1(){
        $sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 1 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";
        $result = $this->db->query($sql)->result_array();
        $html_table1 = '';
        $data_table1 = array();
        foreach($result as $rs){
            $rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
            if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));
			  
			 }else if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
			$link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"]!='') ? (base_url().'product/'.$rs["bctcode"]) : '#';
            $rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
            $data_table1[$rs["id"]] = $rs;
            $html_table1 .='<tr>';
            $html_table1 .='<td class="td_custom cus_pri" align="left" width="40%"><a href="'.$link_product.'" class="uppercase table_1_name" id="table_1_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="bg_color_grey">'.$rs["last"].'</span></td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.number_format((float)$rs['var'], 2, '.', ',').'</span></td>';
            $html_table1 .='<td class="td_custom table_1_lasttimex" align="right" id="table_1_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



        }
        $result["data_table_1"] = $data_table1;
        $result["table1"] = $html_table1;
        $this->output->set_output(json_encode($result));
    }
    public function auto_data_dashboard_list_table_2_backup(){
        $sql = "SELECT * FROM data_dashboard_list where nr = 2 AND active = 1  ORDER BY top DESC, name ASC";
        $result = $this->db->query($sql)->result_array();
        $html_table2 = '';
        $data_table2 = array();
        foreach($result as $rs){
            $rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
            if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));
			  
			 }else if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
            $rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
            $data_table2[$rs["id"]] = $rs;
            $html_table2 .='<tr>';
            $html_table2 .='<td class="td_custom cus_pri" align="left"><a href="http://commo.ifrc.vn/product" class="uppercase table_2_name" id="table_2_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
            $html_table2 .='<td class="td_custom" align="right"><span id="table_2_var_'.$rs['id'].'" class="table_2_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["last"].'</span></td>';
            $html_table2 .='<td class="td_custom table_2_lasttimex" align="right" id="table_2_lasttimex_'.$rs['id'].'">'.$rs["lasttimex"].'</td>';
            $html_table2 .='<td class="td_custom table_2_exchange" align="left" id="table_2_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td></tr>';


        }
        $result["data_table_2"] = $data_table2;
        $result["table2"] = $html_table2;
        $this->output->set_output(json_encode($result));
    }
	public function auto_data_dashboard_list_table_2(){
		$sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 2 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";
		$result = $this->db->query($sql)->result_array();
		$html_table2 = '';
		$data_table2 = array();
		foreach($result as $rs){
			$rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
			if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));
			  
			 }else if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
			 $link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"]!='') ? (base_url().'product/'.$rs["bctcode"]) : '#';
			$rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
			$data_table2[$rs["id"]] = $rs;
			$html_table2 .='<tr>';
            $html_table2 .='<td class="td_custom cus_pri" align="left" width="40%"><a href="'.$link_product.'" class="uppercase table_2_name" id="table_2_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
            $html_table2 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table2 .='<td class="td_custom" align="right"><span id="table_2_var_'.$rs['id'].'" class="bg_color_grey">'.$rs["last"].'</span></td>';
            $html_table2 .='<td class="td_custom" align="right"><span id="table_2_var_'.$rs['id'].'" class="table_2_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.number_format((float)$rs['var'], 2, '.', ',').'</span></td>';
            $html_table2 .='<td class="td_custom table_2_lasttimex" align="right" id="table_2_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



		}		
		$result["data_table_2"] = $data_table2;
		$result["table2"] = $html_table2;
		$this->output->set_output(json_encode($result));
	}
    public function auto_data_dashboard_list_table_3_backup(){
        $sql = "SELECT * FROM data_dashboard_list where nr = 3 AND active = 1  ORDER BY top DESC, name ASC";
        $result = $this->db->query($sql)->result_array();
        $html_table3 = '';
        $data_table3 = array();
        foreach($result as $rs){
            $rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
            if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));
			  
			 }else if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
            $rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
            $data_table3[$rs["id"]] = $rs;
            $html_table3 .='<tr>';
            $html_table3 .='<td class="td_custom cus_pri" align="left"><a href="http://commo.ifrc.vn/product" class="uppercase table_3_name" id="table_3_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
            $html_table3 .='<td class="td_custom" align="right"><span id="table_3_var_'.$rs['id'].'" class="table_3_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["last"].'</span></td>';
            $html_table3 .='<td class="td_custom table_3_lasttimex" align="right" id="table_3_lasttimex_'.$rs['id'].'">'.$rs["lasttimex"].'</td>';
            $html_table3 .='<td class="td_custom table_3_exchange" align="left" id="table_3_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td></tr>';


        }
        $result["data_table_3"] = $data_table3;
        $result["table3"] = $html_table3;
        $this->output->set_output(json_encode($result));
    }
	public function auto_data_dashboard_list_table_3(){
		$sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 3 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";
		$result = $this->db->query($sql)->result_array();
		$html_table3 = '';
		$data_table3 = array();
		foreach($result as $rs){
			$rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
			if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));
			  
			 }else if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
			 $link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"]!='') ? (base_url().'product/'.$rs["bctcode"]) : '#';
			$rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
			$data_table3[$rs["id"]] = $rs;
			$html_table3 .='<tr>';
            $html_table3 .='<td class="td_custom cus_pri" align="left" width="40%"><a href="'.$link_product.'" class="uppercase table_3_name" id="table_3_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
            $html_table3 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table3 .='<td class="td_custom" align="right"><span id="table_3_var_'.$rs['id'].'" class="bg_color_grey">'.$rs["last"].'</span></td>';
            $html_table3 .='<td class="td_custom" align="right"><span id="table_3_var_'.$rs['id'].'" class="table_3_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.number_format((float)$rs['var'], 2, '.', ',').'</span></td>';
            $html_table3 .='<td class="td_custom table_3_lasttimex" align="right" id="table_3_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



		}		
		$result["data_table_3"] = $data_table3;
		$result["table3"] = $html_table3;
		$this->output->set_output(json_encode($result));
	}
    public function auto_data_dashboard_list_table_4_backup(){
        $sql = "SELECT * FROM data_dashboard_list where nr = 0 AND active = 1  ORDER BY top DESC, name ASC";
        $result = $this->db->query($sql)->result_array();
        $html_table4 = '';
        $data_table4 = array();
        foreach($result as $rs){
            $rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
            $rs["lasttimex"] = (($rs['lasttimex'] == null)?'-': $rs['lasttimex']);
            $rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
            $data_table4[$rs["id"]] = $rs;
            $html_table4 .='<tr>';
            $html_table4 .='<td class="td_custom cus_pri" align="left"><a href="http://commo.ifrc.vn/product" class="uppercase table_4_name" id="table_4_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
            $html_table4 .='<td class="td_custom" align="right"><span id="table_4_var_'.$rs['id'].'" class="table_4_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["last"].'</span></td>';
            $html_table4 .='<td class="td_custom table_4_lasttimex" align="right" id="table_4_lasttimex_'.$rs['id'].'">'.$rs["lasttimex"].'</td>';
            $html_table4 .='<td class="td_custom table_4_exchange" align="left" id="table_4_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td></tr>';


        }
        $result["data_table_4"] = $data_table4;
        $result["table4"] = $html_table4;
        $this->output->set_output(json_encode($result));
    }
	public function auto_data_dashboard_list_table_4(){

		$sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 4 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";
		$result = $this->db->query($sql)->result_array();
		$html_table4 = '';
		$data_table4 = array();
		foreach($result as $rs){
			$rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
			$rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
			if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));
			  
			 }else if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
			 $link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"]!='') ? (base_url().'product/'.$rs["bctcode"]) : '#';
			$data_table4[$rs["id"]] = $rs;
			$html_table4 .='<tr>';
            $html_table4 .='<td class="td_custom cus_pri" align="left" width="40%"><a href="'.$link_product.'" class="uppercase table_4_name" id="table_4_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
            $html_table4 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table4 .='<td class="td_custom" align="right"><span id="table_4_var_'.$rs['id'].'" class="bg_color_grey">'.$rs["last"].'</span></td>';
            $html_table4 .='<td class="td_custom" align="right"><span id="table_4_var_'.$rs['id'].'" class="table_4_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.number_format((float)$rs['var'], 2, '.', ',').'</span></td>';
            $html_table4 .='<td class="td_custom table_4_lasttimex" align="right" id="table_4_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



		}		
		$result["data_table_4"] = $data_table4;
		$result["table4"] = $html_table4;
		$this->output->set_output(json_encode($result));
	}
}