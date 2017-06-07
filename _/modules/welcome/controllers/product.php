<?php
require('_/modules/welcome/controllers/block.php');

class Product extends Welcome{
    public function __construct() {
        parent::__construct();
    }
    
    public function index($type='futures', $bctcode='ZC') {

		if($this->data->permistion_menu) {
			$this->data->type_product = $type;
			if($type=='futures') {
				$data_dashboard_list = $this->db->query("SELECT * FROM data_dashboard_list WHERE bctcode = '$bctcode'")->result_array();
				if(isset($data_dashboard_list) && count($data_dashboard_list) < 1 ) {
					$this->template->write_view('content', 'product_error', $this->data);
				}else {
					$block = new Block();
					$this->data->col1_product = $block->col1_product($bctcode);
					//$this->data->col2_product = $block->col2_product();
					$this->data->col3_product = $block->col3_product($bctcode);
					$this->data->bctcode = $bctcode;
					$this->template->write_view('content', 'product', $this->data);
				}
			}

			else {
				$data_dashboard_list = $this->db->query("SELECT * FROM data_dashboard_list WHERE code = '$bctcode'")->result_array();
				if(isset($data_dashboard_list) && count($data_dashboard_list) < 1 ) {
					$this->template->write_view('content', 'product_error', $this->data);
				}else {
					$block = new Block();
					$this->data->code = $bctcode;
					$this->data->data_dashboard = $this->db->query("SELECT dl.lasttime,dl.ptype, dl.name,dl.unit, dl.lasttime, dl.last, dl.`change`, dl.var, dl.`dec` as dec_list, dl.exchange, dl.expiry, dd.* FROM data_dashboard_list as dl  LEFT JOIN data_dashboard as dd ON dl.type=dd.type where dl.code='{$bctcode}'")->result_array();
					$this->data->chart_intraday=  $this->db->query("SELECT code, date, last as close FROM data_spot_intraday as di WHERE code= '{$bctcode}'")->result_array();
					$this->data->chart_history=  $this->db->query("SELECT  code, date, last as close FROM data_spot_history as dhc WHERE dhc.code= '$bctcode'")->result_array();
					$this->template->write_view('content', 'product_spot', $this->data);
				}
			}
		}else {
			$this->template->write_view('content', 'not_permistion', $this->data);
		}
		$this->template->render();
    }
    public function spot($bctcode='ZC') {

        if($this->data->permistion_menu) {
            $this->data->type_product = 'spot';

                $data_dashboard_list = $this->db->query("SELECT * FROM data_dashboard_list WHERE code = '$bctcode'")->result_array();
                if(isset($data_dashboard_list) && count($data_dashboard_list) < 1 ) {
                    $this->template->write_view('content', 'product_error', $this->data);
                }else {
                    $block = new Block();
                    $this->data->code = $bctcode;
                    $this->data->data_dashboard = $this->db->query("SELECT dl.lasttime,dl.ptype, dl.name,dl.unit, dl.lasttime, dl.last, dl.`change`, dl.var, dl.`dec` as dec_list, dl.exchange, dl.expiry, dd.* FROM data_dashboard_list as dl  LEFT JOIN data_dashboard as dd ON dl.type=dd.type where dl.code='{$bctcode}'")->result_array();
                    $this->data->chart_intraday=  $this->db->query("SELECT code, date, last as close FROM data_spot_intraday as di WHERE code= '{$bctcode}'")->result_array();
                    $this->data->chart_history=  $this->db->query("SELECT  code, date, last as close FROM data_spot_history as dhc WHERE dhc.code= '$bctcode'")->result_array();
                    $this->template->write_view('content', 'product_spot', $this->data);
                }

        }else {
            $this->template->write_view('content', 'not_permistion', $this->data);
        }
        $this->template->render();
    }
    public function quote($bctcode='ZC'){
        $data_dashboard_list = $this->db->query("SELECT * FROM data_dashboard_list WHERE mother = (SELECT symbol FROM data_dashboard_list WHERE bctcode = '$bctcode');")->result_array();

        $block = new Block();
        $this->data->col1_product_quote = $block->col1_product_quote($bctcode);
        $this->data->col3_product_quote = $block->col3_product_quote($bctcode);
        $this->data->bctcode = $bctcode;
        $this->template->write_view('content', 'product_quote', $this->data);
        $this->template->render();
    }




    public function auto_data_dashboard_list_table_1(){
        $sql = "SELECT * FROM data_dashboard_list where nr = 1 AND active = 1  ORDER BY top DESC, name ASC";
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
            $rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
            $rs["change"] = ($rs['change'] == null)?'-': number_format((float)$rs['change'], 2, '.', ',');
            $rs["openinterest"] = ($rs['openinterest'] == null)?'-':number_format((float)$rs['openinterest'], 0, '.', ',');
            $rs["settlement"] = ($rs['settlement'] == null)?'-':number_format((float)$rs['settlement'], $rs['dec'], '.', ',');
            $rs["var"] = ($rs['var'] == null)?'-': number_format((float)$rs['var'], 2, '.', ',');
            $rs['volume'] = (($rs['volume'] == null)?'': number_format((float)$rs['volume'], 0, '.', ','));
            $rs['code'] = (($rs['code'] == null)?'': $rs['code']);
            $data_table1[$rs["id"]] = $rs;
            $html_table1 .='<tr>';
            $html_table1 .='<td class="td_custom cus_pri futures_contracts_name" align="left"><a href="http://commo.ifrc.vn/product" class="uppercase table_1_name" id="table_1_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';

            $html_table1 .='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td>';
            $html_table1 .='<td class="td_custom table_1_expiry" align="left" id="table_1_expiry_'.$rs['id'].'">'.$rs['expiry'].'</td>';
            $html_table1 .='<td class="td_custom table_1_code" align="left" id="table_1_code_'.$rs['id'].'">'.$rs['code'].'</td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_last_'.$rs['id'].'" class="bg_color_grey table_1_last">'.$rs["last"].'</span></td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_change_'.$rs['id'].'" class="table_1_change '.(($rs['change'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["change"].'</span></td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["var"].'</span></td>';
            $html_table1 .='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'.$rs['id'].'">'.$rs['volume'].'</td>';
            $html_table1 .='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'.$rs['id'].'">'.$rs["openinterest"].'</td>';
            $html_table1 .='<td class="td_custom table_1_settlement" align="right" id="table_1_settlement_'.$rs['id'].'">'.$rs["settlement"].'</td>';
            $html_table1 .='<td class="td_custom table_1_lasttime" align="right" id="table_1_lasttime_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';
        }
        $result["data_table_1"] = $data_table1;
        $result["table1"] = $html_table1;
        $this->output->set_output(json_encode($result));
    }
    
}