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
		$data_dashboard[0]['lasttime'] = (isset($data_dashboard[0]['lasttime']) && !is_null($data_dashboard[0]['lasttime'])) ? date( "H:i", strtotime( $data_dashboard[0]['lasttime'] ) ) :'';
		$data_dashboard[0]['lable_10'] = $data_dashboard[0]['type'];

		$data_dashboard[1]['lable_3'] = ($data_dashboard[1]['lable_3'] != 0 && !is_null($data_dashboard[1]['lable_3'])) ?number_format((float)$data_dashboard[1]['lable_3'], $data_dashboard[1]['dec'], '.', ','):'';
		$data_dashboard[1]['lable_7'] = number_format((float)$data_dashboard[1]['last'], $data_dashboard[1]['dec'], '.', ',');
		$data_dashboard[1]['lasttime'] = (isset($data_dashboard[1]['lasttime']) && !is_null($data_dashboard[1]['lasttime'])) ? date( "H:i", strtotime( $data_dashboard[1]['lasttime'] ) ) :'';
		$data_dashboard[1]['lable_10'] = $data_dashboard[1]['type'];

		$data_dashboard[2]['lable_3'] = ($data_dashboard[2]['lable_3'] != 0 && !is_null($data_dashboard[2]['lable_3'])) ?number_format((float)$data_dashboard[2]['lable_3'], $data_dashboard[2]['dec'], '.', ','):'';
		$data_dashboard[2]['lable_7'] = number_format((float)$data_dashboard[2]['last'], $data_dashboard[2]['dec'], '.', ',');
		$data_dashboard[2]['lasttime'] = (isset($data_dashboard[2]['lasttime']) && !is_null($data_dashboard[2]['lasttime'])) ? date( "H:i", strtotime( $data_dashboard[2]['lasttime'] ) ) :'';
		$data_dashboard[2]['lable_10'] = $data_dashboard[2]['type'];

		$data_dashboard[3]['lable_3'] = ($data_dashboard[3]['lable_3'] != 0 && !is_null($data_dashboard[3]['lable_3'])) ?number_format((float)$data_dashboard[3]['lable_3'], $data_dashboard[3]['dec'], '.', ','):'';
		$data_dashboard[3]['lable_7'] = number_format((float)$data_dashboard[3]['last'], $data_dashboard[3]['dec'], '.', ',');
		$data_dashboard[3]['lasttime'] = (isset($data_dashboard[3]['lasttime']) && !is_null($data_dashboard[3]['lasttime'])) ? date( "H:i", strtotime( $data_dashboard[3]['lasttime'] ) ) :'';
		$data_dashboard[3]['lable_10'] = $data_dashboard[3]['type'];		


		$result["data_dashboard_0"] = $data_dashboard[0];

		$result["data_dashboard_1"] = $data_dashboard[1];
		$result["data_dashboard_2"] = $data_dashboard[2];
		$result["data_dashboard_3"] = $data_dashboard[3];


		$this->output->set_output(json_encode($result));
	}

    public function auto_data_dashboard_list_table_1(){
        $sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 1 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";
        $result = $this->db->query($sql)->result_array();
        $html_table1 = '';
        $data_table1 = array();
        foreach($result as $rs){
            $rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
            if(isset($rs['lasttime']) && !is_null($rs['lasttime']) && date('Y-m-d', strtotime($rs['lasttime'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttime']));
			  
			 }else if(isset($rs['lasttime']) && !is_null($rs['lasttime']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttime']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
			if(($rs['exchange']!='SPOT')&& (!is_null($rs["bctcode"]) && $rs["bctcode"] != '')) {
				
            	$link_product = base_url() . 'product/futures/' . $rs["bctcode"];
			}
			else if (($rs['exchange']=='SPOT') && (!is_null($rs["code"]) && $rs["code"] !='')) {
				$link_product = base_url() . 'product/spot/' . $rs["code"];
			}
			else {
				$link_product = '';
			}
            $rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
            $data_table1[$rs["id"]] = $rs;
            $html_table1 .='<tr>';
			if($link_product!='')
            $html_table1 .='<td class="td_custom cus_pri" align="left" width="50%"><a href="'.$link_product.'" class="uppercase table_1_name" id="table_1_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
			else
			$html_table1 .='<td class="td_custom cus_pri" align="left" width="50%"><span class="uppercase table_1_name" id="table_1_name_'.$rs['id'].'">'.$rs['name'].'</span></td>';
            $html_table1 .='<td class="td_custom" align="right" width="10%"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table1 .='<td class="td_custom" align="right" width="15%"><span id="table_1_var_'.$rs['id'].'" class="bg_color_grey">'.$rs["last"].'</span></td>';
            $html_table1 .='<td class="td_custom" align="right" width="15%"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.number_format((float)$rs['var'], 2, '.', ',').'</span></td>';
            $html_table1 .='<td class="td_custom table_1_lasttime" align="right" width="10%" id="table_1_lasttime_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



        }
        $result["data_table_1"] = $data_table1;
        $result["table1"] = $html_table1;
        $this->output->set_output(json_encode($result));
    }

	public function auto_data_dashboard_list_table_2(){
		$sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 2 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";
		$result = $this->db->query($sql)->result_array();
		$html_table2 = '';
		$data_table2 = array();
		foreach($result as $rs){
			$rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
			if(isset($rs['lasttime']) && !is_null($rs['lasttime']) && date('Y-m-d', strtotime($rs['lasttime'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttime']));
			  
			 }else if(isset($rs['lasttime']) && !is_null($rs['lasttime']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttime']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
			 if(($rs['exchange']!='SPOT')&& (!is_null($rs["bctcode"]) && $rs["bctcode"] != '')) {
				
            	$link_product = base_url() . 'product/futures/' . $rs["bctcode"];
			}
			else if (($rs['exchange']=='SPOT') && (!is_null($rs["code"]) && $rs["code"] !='')) {
				$link_product = base_url() . 'product/spot/' . $rs["code"];
			}
			else {
				$link_product = '';
			}
			$rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
			$data_table2[$rs["id"]] = $rs;
			$html_table2 .='<tr>';
			if($link_product!='')
            $html_table2 .='<td class="td_custom cus_pri" align="left" width="40%"><a href="'.$link_product.'" class="uppercase table_2_name" id="table_2_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
			else
			$html_table2 .='<td class="td_custom cus_pri" align="left" width="40%"><span class="uppercase table_2_name" id="table_2_name_'.$rs['id'].'">'.$rs['name'].'</span></td>';
            $html_table2 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table2 .='<td class="td_custom" align="right"><span id="table_2_var_'.$rs['id'].'" class="bg_color_grey">'.$rs["last"].'</span></td>';
            $html_table2 .='<td class="td_custom" align="right"><span id="table_2_var_'.$rs['id'].'" class="table_2_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.number_format((float)$rs['var'], 2, '.', ',').'</span></td>';
            $html_table2 .='<td class="td_custom table_2_lasttime" align="right" id="table_2_lasttime_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



		}		
		$result["data_table_2"] = $data_table2;
		$result["table2"] = $html_table2;
		$this->output->set_output(json_encode($result));
	}

	public function auto_data_dashboard_list_table_3(){
		$sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 3 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";
		$result = $this->db->query($sql)->result_array();
		$html_table3 = '';
		$data_table3 = array();
		foreach($result as $rs){
			$rs['exchange'] = (($rs['exchange'] == null)?'': $rs['exchange']);
			if(isset($rs['lasttime']) && !is_null($rs['lasttime']) && date('Y-m-d', strtotime($rs['lasttime'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttime']));
			  
			 }else if(isset($rs['lasttime']) && !is_null($rs['lasttime']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttime']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
			 if(($rs['exchange']!='SPOT')&& (!is_null($rs["bctcode"]) && $rs["bctcode"] != '')) {
				
            	$link_product = base_url() . 'product/futures/' . $rs["bctcode"];
			}
			else if (($rs['exchange']=='SPOT') && (!is_null($rs["code"]) && $rs["code"] !='')) {
				$link_product = base_url() . 'product/spot/' . $rs["code"];
			}
			else {
				$link_product = '';
			}
			$rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
			$data_table3[$rs["id"]] = $rs;
			$html_table3 .='<tr>';
			if($link_product!='')
            $html_table3 .='<td class="td_custom cus_pri" align="left" width="40%"><a href="'.$link_product.'" class="uppercase table_3_name" id="table_3_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
			else 
			$html_table3 .='<td class="td_custom cus_pri" align="left" width="40%"><span class="uppercase table_3_name" id="table_3_name_'.$rs['id'].'">'.$rs['name'].'</span></td>';
            $html_table3 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table3 .='<td class="td_custom" align="right"><span id="table_3_var_'.$rs['id'].'" class="bg_color_grey">'.$rs["last"].'</span></td>';
            $html_table3 .='<td class="td_custom" align="right"><span id="table_3_var_'.$rs['id'].'" class="table_3_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.number_format((float)$rs['var'], 2, '.', ',').'</span></td>';
            $html_table3 .='<td class="td_custom table_3_lasttime" align="right" id="table_3_lasttime_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



		}		
		$result["data_table_3"] = $data_table3;
		$result["table3"] = $html_table3;
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
			if(isset($rs['lasttime']) && !is_null($rs['lasttime']) && date('Y-m-d', strtotime($rs['lasttime'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttime']));
			  
			 }else if(isset($rs['lasttime']) && !is_null($rs['lasttime']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttime']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
			 if(($rs['exchange']!='SPOT')&& (!is_null($rs["bctcode"]) && $rs["bctcode"] != '')) {
				
            	$link_product = base_url() . 'product/futures/' . $rs["bctcode"];
			}
			else if (($rs['exchange']=='SPOT') && (!is_null($rs["code"]) && $rs["code"] !='')) {
				$link_product = base_url() . 'product/spot/' . $rs["code"];
			}
			else {
				$link_product = '';
			}
			$data_table4[$rs["id"]] = $rs;
			$html_table4 .='<tr>';
			if($link_product!='')
            $html_table4 .='<td class="td_custom cus_pri" align="left" width="40%"><a href="'.$link_product.'" class="uppercase table_4_name" id="table_4_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
			else
			$html_table4 .='<td class="td_custom cus_pri" align="left" width="40%"><span class="uppercase table_4_name" id="table_4_name_'.$rs['id'].'">'.$rs['name'].'</span></td>';
            $html_table4 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table4 .='<td class="td_custom" align="right"><span id="table_4_var_'.$rs['id'].'" class="bg_color_grey">'.$rs["last"].'</span></td>';
            $html_table4 .='<td class="td_custom" align="right"><span id="table_4_var_'.$rs['id'].'" class="table_4_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.number_format((float)$rs['var'], 2, '.', ',').'</span></td>';
            $html_table4 .='<td class="td_custom table_4_lasttime" align="right" id="table_4_lasttime_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



		}		
		$result["data_table_4"] = $data_table4;
		$result["table4"] = $html_table4;
		$this->output->set_output(json_encode($result));
	}
}