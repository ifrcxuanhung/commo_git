<?php
require('_/modules/welcome/controllers/block.php');

class Cronjob extends MY_Controller{
    public function __construct() {
        parent::__construct();
		$this->db3 = $this->load->database('database3', TRUE);
		$this->db5 = $this->load->database('database5', TRUE);
    }
    
    public function index() {
       $sql = "CREATE TABLE ifrc_article_".date("Gi", time())." AS SELECT * FROM ifrc_articles";
	   $data = $this->db->query($sql);
    }
	public function update_feed_vndmi(){
		$sql_truncate = "truncate data_feed_temp;";
		$this->db->query($sql_truncate);
		
		$data_feeed = $this->db3->select("code,last,name,pclose,change,var,time,date")->get("data_feed_commo")->result_array();
		
		$this->db->insert_batch('data_feed_temp', $data_feeed);
		
		$sql_update ="update data_feed_commo as a INNER JOIN data_feed_temp as b ON a.`code`=b.`code` 
		set a.last=b.`last`,a.pclose=b.pclose, a.change=b.change, a.`var`=b.`var`,a.`time`=b.`time`, a.date=b.date; ";
		$this->db->query($sql_update);
		$sql_insert ="
		INSERT INTO data_feed_commo(`code`,`last`,`name`,`pclose`,`change`,`var`,`time`,`date`)
		SELECT 
			b.`code`,b.`last`,b.`name`,b.`pclose`,b.`change`,b.`var`,b.`time`,b.`date`
		FROM
			data_feed_temp AS b
		LEFT OUTER JOIN data_feed_commo as r ON  r.`code` = b.`code`
		where r.`code` IS NULL GROUP BY b.`id`;";
		$this->db->query($sql_insert);
		//update dashboard_list
		$sql_update ="update data_dashboard_list as a INNER JOIN data_feed_commo as b ON a.`code`=b.`codeefrc` 
		set a.last=b.`last`, a.change=b.change, a.`var`=b.`var`,a.`lasttime`=b.`time`, a.date=b.date; ";
		$this->db->query($sql_update);
		
		
	}
	public function update_feed_imsrt(){
		

		$command = "select * from data_feed_commo where table_imsrt!=''";

		$rows = $this->db->query($command)->result_array();

		//echo "<pre>";print_r($rows);exit;

		if (!empty($rows)) {

			foreach ($rows as $item) {

			//    $data[]= $item;

					if($item['table_imsrt']=='idx_specs_rt'){

						$row = $this->db5->query("select * from {$item['table_imsrt']}  where codeint='{$item['codeint']}'")->row_array();

						if($row && isset($row['idx_last']) && !is_null($row['idx_last']) && $row['idx_last'] != 0 && ($row['date'] !='0000-00-00' || $row['time'] !='00:00:00')  ){

							$this->db->query("update data_feed_commo set `last`= {$row['idx_last']}, `time` = '".($row['date'].' '.$row['time'])."' where codeint= '{$item['codeint']}'; ");

							$this->db->query("UPDATE data_feed_commo set `var` = 100*((last-pclose)/pclose) Where codeint='{$item['codeint']}';"); 

							$this->db->query("UPDATE data_feed_commo set `change` = (last-pclose) Where codeint='{$item['codeint']}';"); 

						}

					}

					else if($item['table_imsrt']=='stk_prices_rt'){

						$row = $this->db5->query("select * from {$item['table_imsrt']}  where codeint='{$item['codeint']}'")->row_array();

						if($row && isset($row['stk_last']) && !is_null($row['stk_last']) && $row['stk_last'] != 0 && ($row['date'] !='0000-00-00' || $row['time'] !='00:00:00')){

							$this->db->query("update data_feed_commo set `last`= {$row['stk_last']} , `time` = '".($row['date'].' '.$row['time'])."' where codeint= '{$item['codeint']}'; ");

							$this->db->query("UPDATE data_feed_commo set `var` = 100*((last-pclose)/pclose) Where codeint='{$item['codeint']}';"); 

							$this->db->query("UPDATE data_feed_commo set `change` = (last-pclose) Where codeint='{$item['codeint']}';");

						}

					}

					else if($item['table_imsrt']=='ind_feed_rt'){

						$row = $this->db5->query("select * from {$item['table_imsrt']}  where code='{$item['codeint']}'")->row_array();
						//echo "<pre>";print_r($row);exit; 

						if($row && isset($row['last']) && !is_null($row['last']) && $row['last'] !=0 && ($row['date'] !='0000-00-00' || $row['time'] !='00:00:00')){

							$this->db->query("update data_feed_commo set `last`= {$row['last']} , `time` = '".($row['date'].' '.$row['time'])."' where codeint= '{$item['codeint']}'; ");

							$this->db->query("UPDATE data_feed_commo set `var` = 100*((last-pclose)/pclose) Where codeint='{$item['codeint']}';"); 

							$this->db->query("UPDATE data_feed_commo set `change` = (last-pclose) Where codeint='{$item['codeint']}';");
						}

					}

					else if(($item['table_imsrt']=='cmd_feed_rt') || ($item['table_imsrt']=='bnd_feed_rt')){

						$row = $this->db5->query("select * from {$item['table_imsrt']}  where code='{$item['codeint']}'")->row_array();

						if($row  && isset($row['last']) && !is_null($row['last']) && $row['last'] !=0 && ($row['date'] !='0000-00-00' || $row['time'] !='00:00:00')){

							$this->db->query("update data_feed_commo set `last`= {$row['last']} , `pclose`= {$row['pclose']}, `time` = '".($row['date'].' '.$row['time'])."' where codeint= '{$item['codeint']}'; ");

							$this->db->query("UPDATE data_feed_commo set `var` = 100*((last-pclose)/pclose) Where codeint='{$item['codeint']}';"); 

							$this->db->query("UPDATE data_feed_commo set `change` = (last-pclose) Where codeint='{$item['codeint']}';");

						}

					}

					else if($item['table_imsrt']=='cur_feed_rt'){

						$row = $this->db5->query("select * from {$item['table_imsrt']}  where code='{$item['codeint']}'")->row_array();

						if($row && isset($row['last']) && !is_null($row['last'])  && $row['last'] !=0 && ($row['date'] !='0000-00-00' || $row['time'] !='00:00:00') ){

							$this->db->query("update data_feed_commo set `last`= {$row['last']} , `time` = '".($row['date'].' '.$row['time'])."' where codeint= '{$item['codeint']}'; ");

							$this->db->query("UPDATE data_feed_commo set `var` = 100*((last-pclose)/pclose) Where codeint='{$item['codeint']}';"); 

							$this->db->query("UPDATE data_feed_commo set `change` = (last-pclose) Where codeint='{$item['codeint']}';");
						}

					}

			}

		}

    

	
	}
	 function runQuery(){
        
        $idArr = implode(',',$_POST['dataArr']);
		
        $sql = "Select * FROM int_query WHERE id in ({$idArr})";
		
        $data = $this->db->query($sql)->result_array();
        $query = '';
        foreach($data as $value){
            $query .= $value['tquery'];
        }
		$query = explode(";", $query);
    
        //run commands
        $total = $success = 0;
		$result = array();
        foreach($query as $command){
			$command = trim($command);
            if($command!=''){
				if($this->db->simple_query($command)==false){
					$result["message"] = $command;
				}
				else {
					 $success ++;
				}
                
                $total += 1;
            }
        }
		$result["total"] = $total;
		$result["success"] = $success;
        $this->output->set_output(json_encode($result));
        //print_R($query);
    }
	private function  number_of_working_days($from, $to) {
		$workingDays = array(1, 2, 3, 4, 5); # date format = N (1 = Monday, ...)
		$holidayDays = array(); # variable and fixed holidays
	
		$from = new DateTime($from);
		$to = new DateTime($to);
		$to->modify('+1 day');
		$interval = new DateInterval('P1D');
		$periods = new DatePeriod($from, $interval, $to);
	
		$days = 0;
		foreach ($periods as $period) {
			if (!in_array($period->format('N'), $workingDays)) continue;
			if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
			if (in_array($period->format('*-m-d'), $holidayDays)) continue;
			$days++;
		}
		return $days;
	}
}
