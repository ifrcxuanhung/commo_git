<?php
require('_/modules/welcome/controllers/class.phpmailer.php');
require('_/modules/welcome/controllers/class.smtp.php');
require('_/modules/welcome/controllers/class.pop3.php');
class Block extends MY_Controller {

    protected $data;

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->db3 = $this->load->database('database3', TRUE);
		 $this->data = new stdClass();
    }
    public function flotchart($h='')
    {
        
        @$this->data->height = $h;
        return $this->load->view('block/flotchart', $this->data, true);
    }

	public function sendmail($mailto, $nameto, $namefrom, $subject, $noidung, $namereplay, $emailreplay)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // set mailer to use SMTP
        $mail->Host = "mail.ifrc.vn"; // specify main and backup server
        $mail->Port = 465; // set the port to use
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPSecure = "ssl";
        $mail->Username = "news@upmd.fr"; // your SMTP username or your gmail username// Email gui thu
        $mail->Password = "DmPuswen"; // your SMTP password or your gmail password
        //$from = $mailfrom; // Reply to this email// Email khi reply
        $mail->CharSet = "utf-8";
        $from = $emailreplay; // Reply to this email// Email khi reply
        $to = $mailto; // Recipients email ID // Email nguoi nhan
        $name = $nameto; // Recipient's name // Ten cua nguoi nhan
        $mail->From = $from;
        $mail->FromName = $namefrom; // Name to indicate where the email came from when the recepient received// Ten nguoi gui
        $mail->AddAddress($to, $name);
        $mail->AddReplyTo($from, $namereplay); // Ten trong tieu de khi tra loi
        $mail->WordWrap = 50; // set word wrap
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = $subject;
        $mail->Body = $noidung; //HTML Body
        $mail->AltBody = ""; //Text Body

        if (!$mail->Send())
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }
    public function contact()
    {
		
		//captcha
		$this->load->helper('captcha');
		$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
		  // setting up captcha config
		  $vals = array(
				 'word' => $random_number,
				 'img_path' => './capcha/',
				 'img_url' => base_url().'capcha/',
				 'img_width' => 200,
				 'img_height' => 46,
				 'expiration' => 7200
				);
		  $this->data->captcha = create_captcha($vals);
		  //echo "<pre>";print_r($this->session->all_userdata());exit;
		  $this->session->set_userdata('captchaWord',$this->data->captcha['word']);
		  $this->data->captcha_image = $this->session->userdata('captchaWord');	
		  
		  //send mail
		   if ($this->input->post())
            {
				//echo "<pre>";print_r($this->input->post());exit;
                $this->data->input = $this->input->post();
                
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $message = $this->input->post('message');

				$to = 'xuanhung1606@gmail.com';
				$subject = "Email contact of {$name} ({$email})";
				$message = $message;
				$send = $this->sendmail($to, $to, $name, $subject, $message, $to, $to);
				/*echo $send == 1 ? '<script>alert("Send message successfull"); window.location.href="' . base_url().'futures_help' . '"</script>' : '';*/
				
               
            }
		  
		  
        return $this->load->view('block/contact', $this->data, true);
    }
    public function table_stat()
    {
        return $this->load->view('block/table_stat', $this->data, true);
    }
    
	
	

    public function sidebar_menu()
    {
        $this->load->model('menu_model');
        $sql = "select * from language where status = 1 order by sort_order";
        @$this->data->list_lang = $this->db->query($sql)->result_array();
        //@$this->data->menu = $this->menu_model->getMainMenu();
        @$this->data->menu = $this->menu_model->getMenu();
        @$this->data->id_menu_actived = $this->session->userdata('id_menu');
        return $this->load->view('block/sidebar_menu', $this->data, true);
    }
	public function echart()
    {
        return $this->load->view('block/echart', $this->data, true);
    }	
    public function dashboard()
    {
		$this->data->data_dashboard = $this->db->query("SELECT * FROM data_dashboard_list as dl  RIGHT JOIN data_dashboard as dd ON dl.type=dd.type where dd.active = 1 and dl.top=5 Order by dd.nr")->result_array();
        return $this->load->view('block/dashboard_index', $this->data, true);
    }
    public function product()
    {

        return $this->load->view('block/product', $this->data, true);
    }
    public function chart1($h)
    {
        @$this->data->height = $h;
        return $this->load->view('block/chart1', $this->data, true);
    }
    public function chart2($h)
    {
        @$this->data->height = $h;
        return $this->load->view('block/chart2', $this->data, true);
    }
    public function chart3($h)
    {
        @$this->data->height = $h;
        return $this->load->view('block/chart3', $this->data, true);
    }
    public function chart4($h)
    {
        @$this->data->height = $h;
        return $this->load->view('block/chart4', $this->data, true);
    }


    public function data_table1(){
        $sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 1 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";

                $result = $this->db->query($sql)->result_array();
                $html_table1 = '';
                foreach($result as $rs){
					if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')){
						$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));
                      
                     }else if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) ){
                        $rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
                     }
					 else {
						 $rs["time_format"] ='-';
					 }
					 $link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"]!='') ? (base_url().'product/'.$rs["bctcode"]) : '#';
                    $html_table1 .='<tr>';
                    $html_table1 .='<td class="td_custom cus_pri" align="left" ><a href="'.$link_product.'" class="uppercase table_1_name" id="table_1_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
                    $html_table1 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';

                    $html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="bg_color_grey">'.(($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',')).'</span></td>';

                    $html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.(($rs['var'] == null)?'-': number_format((float)$rs['var'], 2, '.', ',')).'</span></td>';
                    $html_table1 .='<td class="td_custom table_1_lasttimex" align="right" id="table_1_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



		}		
        $this->data->table1 = $html_table1;
        return $this->load->view('block/data_table1', $this->data, true);
    }


    public function data_table2(){
        $sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 2 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";
        $result = $this->db->query($sql)->result_array();
        $html_table2 = '';
        foreach($result as $rs){
			if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));
			  
			 }else if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
			 $link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"]!='') ? (base_url().'product/'.$rs["bctcode"]) : '#';
            $html_table2 .='<tr>';
            $html_table2 .='<td class="td_custom cus_pri" align="left" width="40%"><a href="'.$link_product.'" class="uppercase table_2_name" id="table_2_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
            $html_table2 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table2 .='<td class="td_custom" align="right"><span id="table_2_var_'.$rs['id'].'" class="bg_color_grey">'.(($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',')).'</span></td>';
            $html_table2 .='<td class="td_custom" align="right"><span id="table_2_var_'.$rs['id'].'" class="table_2_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.(($rs['var'] == null)?'-': number_format((float)$rs['var'], 2, '.', ',')).'</span></td>';
            $html_table2 .='<td class="td_custom table_2_lasttimex" align="right" id="table_2_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



        }
        $this->data->table2 = $html_table2;
        return $this->load->view('block/data_table2', $this->data, true);
    }

     public function data_table3()
    {
        $sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 3 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";
		$result = $this->db->query($sql)->result_array();
		$html_table3 = '';
		foreach($result as $rs){
			if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')){
				$rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));
			  
			 }else if(isset($rs['lasttimex']) && !is_null($rs['lasttimex']) ){
				$rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
			 }
			 else {
				 $rs["time_format"] ='-';
			 }
			 $link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"]!='') ? (base_url().'product/'.$rs["bctcode"]) : '#';
			$html_table3 .='<tr>';
            $html_table3 .='<td class="td_custom cus_pri" align="left" width="40%"><a href="'.$link_product.'" class="uppercase table_3_name" id="table_3_name_'.$rs['id'].'">'.($rs['name']).'</a></td>';
            $html_table3 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table3 .='<td class="td_custom" align="right"><span id="table_3_var_'.$rs['id'].'" class="bg_color_grey">'.(($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',')).'</span></td>';
            $html_table3 .='<td class="td_custom" align="right"><span id="table_3_var_'.$rs['id'].'" class="table_3_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.(($rs['var'] == null)?'-': number_format((float)$rs['var'], 2, '.', ',')).'</span></td>';
            $html_table3 .='<td class="td_custom table_3_lasttimex" align="right" id="table_3_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



		}		
        $this->data->table3 = $html_table3;
        return $this->load->view('block/data_table3', $this->data, true);
    }

     public function data_table4()
    {
        $sql = "SELECT dl.* FROM data_dashboard as dd LEFT JOIN data_dashboard_list as dl ON dd.type=dl.type where dd.nr = 4 AND dl.active = 1 AND dd.active =1 AND dl.expmy is not null  ORDER BY dl.top DESC, dl.name ASC";
		$result = $this->db->query($sql)->result_array();
		$html_table4 = '';
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
			$html_table4 .='<tr>';
            $html_table4 .='<td class="td_custom cus_pri" align="left" width="40%"><a href="'.$link_product.'" class="uppercase table_4_name" id="table_4_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
            $html_table4 .='<td class="td_custom" align="right"><span id="table_1_expmy_'.$rs['id'].'" class="">'.$rs['expmy'].'</span></td>';
            $html_table4 .='<td class="td_custom" align="right"><span id="table_4_var_'.$rs['id'].'" class="bg_color_grey">'.$rs["last"].'</span></td>';
            $html_table4 .='<td class="td_custom" align="right"><span id="table_4_var_'.$rs['id'].'" class="table_4_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.number_format((float)$rs['var'], 2, '.', ',').'</span></td>';
            $html_table4 .='<td class="td_custom table_4_lasttimex" align="right" id="table_4_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';



		}		
        $this->data->table4 = $html_table4;
        return $this->load->view('block/data_table4', $this->data, true);
    }



    public function col1_product($bctcode)
    {
		$sql = "SELECT dsl.*,ddl.dec FROM data_series_last as dsl  RIGHT JOIN data_dashboard_list as ddl ON dsl.symbol=ddl.bctcode where dsl.symbol = '{$bctcode}' and mon<>'Cash' and ddl.active = 1";
		$result = $this->db->query($sql)->result_array();

        $date_current = date('Y-m-d');
		$html_table1 = '';
		foreach($result as $rs){
            if($date_current == date("Y-m-d",strtotime($rs['date']))){
                $date_data = date("H:i:s",strtotime($rs['date']));
            }else{
                $date_data = date("Y-m-d",strtotime($rs['date']));
            }
            $rs['code'] = (($rs['code'] == null)?'': $rs['code']);
			$rs["date"] = (($rs['date'] == null)?'-': $rs['date']);
			$rs["change"] = ($rs['change'] == null)?'-': number_format((float)$rs['change'], 2, '.', ',');
            $rs["var"] = ($rs['var'] == null)?'-': number_format((float)$rs['var'], 2, '.', ',');
            $rs['volume'] = (($rs['volume'] == null)?'': number_format((float)$rs['volume'], 0, '.', ','));
			$rs["openinterest"] = ($rs['openinterest'] == null)?'-':number_format((float)$rs['openinterest'], 0, '.', ',');
			$rs["pclose"] = ($rs['pclose'] == null)?'-':number_format((float)$rs['pclose'], 2, '.', ',');
             $rs["mon"] = (($rs['mon'] == null)?'': $rs['mon']);
			
			$html_table1 .='<tr>';
            $html_table1 .='<td class="td_custom table_1_code" align="left" id="table_1_code_'.$rs['id'].'">'.$rs['code'].'</td>';
            $html_table1 .='<td class="td_custom table_1_date" align="left" id="table_1_date_'.$rs['id'].'">'.$date_data.'</td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_last_'.$rs['id'].'" class="bg_color_grey table_1_last">'.number_format((float)$rs['last'], $rs['dec'], '.', ',').'</span></td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_change_'.$rs['id'].'" class="table_1_change '.(($rs['change'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["change"].'</span></td>';
			$html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["var"].'</span></td>';
			$html_table1 .='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'.$rs['id'].'">'.$rs['volume'].'</td>';
			$html_table1 .='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'.$rs['id'].'">'.$rs["openinterest"].'</td>';
			$html_table1 .='<td class="td_custom table_1_pclose" align="right" id="table_1_pclose_'.$rs['id'].'">'.$rs["pclose"].'</td>';
            $html_table1 .='<td class="td_custom table_1_mon" align="right" id="table_1_mon_'.$rs['id'].'">'.$rs["mon"].'</td></tr>';
		}		
        $this->data->d2_box_category1 = $html_table1;

		$this->data->data_dashboard = $this->db->query("SELECT dl.lasttime,dl.name,dl.unit, dl.lasttimex, dl.last, dl.`change`, dl.var, dl.`dec` as dec_list, dl.exchange, dl.expiry, dd.* FROM data_dashboard_list as dl  LEFT JOIN data_dashboard as dd ON dl.type=dd.type where dl.bctcode='{$bctcode}'")->result_array();


        return $this->load->view('block/col1_product', $this->data, true);
    }

    public function col1_category($type)
    {
		
		$sql = "SELECT * FROM data_dashboard_list where type = '$type' AND active = 1  ORDER BY top DESC, name ASC";
		$result = $this->db->query($sql)->result_array();
		$html_table1 = '';
		foreach($result as $rs) {
            $rs['exchange'] = (($rs['exchange'] == null) ? '' : $rs['exchange']);
            if (isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')) {
                $rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));

            } else if (isset($rs['lasttimex']) && !is_null($rs['lasttimex'])) {
                $rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
            } else {
                $rs["time_format"] = '-';
            }
            $link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"] != '') ? (base_url() . 'product/' . $rs["bctcode"]) : 'javascript:void(0)';

            $rs["last"] = ($rs['last'] == null) ? '-' : number_format((float)$rs['last'], $rs['dec'], '.', ',');
            /*$rs["change"] = ($rs['change'] == null)?'-': number_format((float)$rs['change'], 2, '.', ',');*/
            $rs["openinterest"] = ($rs['openinterest'] == null) ? '-' : number_format((float)$rs['openinterest'], 0, '.', ',');
            $rs["settlement"] = ($rs['settlement'] == null) ? '-' : number_format((float)$rs['settlement'], $rs['dec'], '.', ',');
            $rs["var"] = ($rs['var'] == null) ? '-' : number_format((float)$rs['var'], 2, '.', ',');
            $rs['volume'] = (($rs['volume'] == null) ? '' : number_format((float)$rs['volume'], 0, '.', ','));
            $rs['code'] = (($rs['code'] == null) ? '' : $rs['code']);
            $data_table1[$rs["id"]] = $rs;
            $html_table1 .= '<tr>';
            if (!is_null($rs["bctcode"]) && $rs["bctcode"] != '') {
                $html_table1 .= '<td class="td_custom cus_pri futures_contracts_name" align="left" width="25%"><a href="' . $link_product . '" class="uppercase table_1_name" id="table_1_name_' . $rs['id'] . '">' . $rs['name'] . '</a></td>';
            }else{
                $html_table1 .= '<td class="td_custom cus_pri futures_contracts_name" align="left" width="25%">' . $rs['name'] . '</td>';
            }
			
            $html_table1 .='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td>';
			/*$html_table1 .='<td class="td_custom table_1_expiry" align="left" id="table_1_expiry_'.$rs['id'].'">'.$rs['expiry'].'</td>';*/
            $html_table1 .='<td class="td_custom table_1_code" align="left" id="table_1_code_'.$rs['id'].'">'.$rs['code'].'</td>';

			$html_table1 .='<td class="td_custom" align="right"><span id="table_1_last_'.$rs['id'].'" class="bg_color_grey table_1_last">'.$rs["last"].'</span></td>';
			/*$html_table1 .='<td class="td_custom" align="right"><span id="table_1_change_'.$rs['id'].'" class="table_1_change '.(($rs['change'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["change"].'</span></td>';*/
			$html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["var"].'</span></td>';
			$html_table1 .='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'.$rs['id'].'">'.$rs['volume'].'</td>';
			$html_table1 .='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'.$rs['id'].'">'.$rs["openinterest"].'</td>';
			/*$html_table1 .='<td class="td_custom table_1_settlement" align="right" id="table_1_settlement_'.$rs['id'].'">'.$rs["settlement"].'</td>';*/
            $html_table1 .='<td class="td_custom table_1_lasttimex" align="right" id="table_1_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';

		}		
        $this->data->d2_box_category1 = $html_table1;
		
        $this->data->data_dashboard = $this->db->query("SELECT * FROM data_dashboard WHERE type = '$type'")->result_array();
        $this->data->type = $type;
        return $this->load->view('block/col1_category', $this->data, true);
    }



    public function col3_category($type)
    {
        $this->data->data_dashboard = $this->db->query("SELECT * FROM data_dashboard WHERE type = '$type'")->result_array();
        $sql = "SELECT * FROM data_news";
        $this->data->news = $this->db->query($sql)->result_array();


        return $this->load->view('block/col3_category', $this->data, true);
    }

    public function col1_market($type)
    {

        $sql = "SELECT * FROM data_dashboard_list where active = 1  ORDER BY name ASC";
        $result = $this->db->query($sql)->result_array();
        $html_table1 = '';
        foreach($result as $rs) {
            $rs['exchange'] = (($rs['exchange'] == null) ? '' : $rs['exchange']);
            if (isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')) {
                $rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));

            } else if (isset($rs['lasttimex']) && !is_null($rs['lasttimex'])) {
                $rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
            } else {
                $rs["time_format"] = '-';
            }
            $link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"] != '') ? (base_url() . 'product/' . $rs["bctcode"]) : 'javascript:void(0)';

            $rs["last"] = ($rs['last'] == null) ? '-' : number_format((float)$rs['last'], $rs['dec'], '.', ',');
            /*$rs["change"] = ($rs['change'] == null)?'-': number_format((float)$rs['change'], 2, '.', ',');*/
            $rs["openinterest"] = ($rs['openinterest'] == null) ? '-' : number_format((float)$rs['openinterest'], 0, '.', ',');
            $rs["settlement"] = ($rs['settlement'] == null) ? '-' : number_format((float)$rs['settlement'], $rs['dec'], '.', ',');
            $rs["var"] = ($rs['var'] == null) ? '-' : number_format((float)$rs['var'], 2, '.', ',');
            $rs['volume'] = (($rs['volume'] == null) ? '' : number_format((float)$rs['volume'], 0, '.', ','));
            $rs['code'] = (($rs['code'] == null) ? '' : $rs['code']);
            $data_table1[$rs["id"]] = $rs;
            $html_table1 .= '<tr>';
            $html_table1 .='<td class="td_custom table_1_exchange" align="left" id="table_1_type_'.$rs['id'].'">'.$rs['type'].'</td>';
            if (!is_null($rs["bctcode"]) && $rs["bctcode"] != '') {
                $html_table1 .= '<td class="td_custom cus_pri futures_contracts_name" align="left" width="25%"><a href="' . $link_product . '" class="uppercase table_1_name" id="table_1_name_' . $rs['id'] . '">' . $rs['name'] . '</a></td>';
            }else{
                $html_table1 .= '<td class="td_custom cus_pri futures_contracts_name" align="left" width="25%">' . $rs['name'] . '</td>';
            }

            $html_table1 .='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td>';
            /*$html_table1 .='<td class="td_custom table_1_expiry" align="left" id="table_1_expiry_'.$rs['id'].'">'.$rs['expiry'].'</td>';*/
            $html_table1 .='<td class="td_custom table_1_code" align="left" id="table_1_code_'.$rs['id'].'">'.$rs['code'].'</td>';

            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_last_'.$rs['id'].'" class="bg_color_grey table_1_last">'.$rs["last"].'</span></td>';
            /*$html_table1 .='<td class="td_custom" align="right"><span id="table_1_change_'.$rs['id'].'" class="table_1_change '.(($rs['change'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["change"].'</span></td>';*/
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["var"].'</span></td>';
            $html_table1 .='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'.$rs['id'].'">'.$rs['volume'].'</td>';
            $html_table1 .='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'.$rs['id'].'">'.$rs["openinterest"].'</td>';
            /*$html_table1 .='<td class="td_custom table_1_settlement" align="right" id="table_1_settlement_'.$rs['id'].'">'.$rs["settlement"].'</td>';*/
            $html_table1 .='<td class="td_custom table_1_lasttimex" align="right" id="table_1_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';

        }
        $this->data->d2_box_category1 = $html_table1;

        $this->data->data_dashboard = $this->db->query("SELECT * FROM data_dashboard WHERE type = '$type'")->result_array();
        $this->data->type = $type;
        return $this->load->view('block/col1_market', $this->data, true);
    }

    public function col3_market($type)
    {
        $this->data->data_dashboard = $this->db->query("SELECT * FROM data_dashboard WHERE type = '$type'")->result_array();
        $sql = "SELECT * FROM data_news";
        $this->data->news = $this->db->query($sql)->result_array();


        return $this->load->view('block/col3_market', $this->data, true);
    }

    public function col1_customise()
    {
        $sql = "SELECT ddl.* FROM my_data md RIGHT JOIN data_dashboard_list ddl ON (md.symbol = ddl.bctcode) WHERE md.mychoice = 1 AND md.active = 1 AND md.dright = 1 AND ddl.code is not null order by ddl.name ASC ";
        $detail1 = $this->db->query($sql)->result_array();


        $html_table1 = '';
        foreach($detail1 as $rs) {
            $rs['exchange'] = (($rs['exchange'] == null) ? '' : $rs['exchange']);
            if (isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')) {
                $rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));

            } else if (isset($rs['lasttimex']) && !is_null($rs['lasttimex'])) {
                $rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
            } else {
                $rs["time_format"] = '-';
            }
            $link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"] != '') ? (base_url() . 'product/' . $rs["bctcode"]) : 'javascript:void(0)';

            $rs["last"] = ($rs['last'] == null) ? '-' : number_format((float)$rs['last'], $rs['dec'], '.', ',');
            /*$rs["change"] = ($rs['change'] == null)?'-': number_format((float)$rs['change'], 2, '.', ',');*/
            $rs["openinterest"] = ($rs['openinterest'] == null) ? '-' : number_format((float)$rs['openinterest'], 0, '.', ',');
            $rs["settlement"] = ($rs['settlement'] == null) ? '-' : number_format((float)$rs['settlement'], $rs['dec'], '.', ',');
            $rs["var"] = ($rs['var'] == null) ? '-' : number_format((float)$rs['var'], 2, '.', ',');
            $rs['volume'] = (($rs['volume'] == null) ? '' : number_format((float)$rs['volume'], 0, '.', ','));
            $rs['code'] = (($rs['code'] == null) ? '' : $rs['code']);
            $data_table1[$rs["id"]] = $rs;
            $html_table1 .= '<tr>';
            if (!is_null($rs["bctcode"]) && $rs["bctcode"] != '') {
                $html_table1 .= '<td class="td_custom cus_pri futures_contracts_name" align="left" width="25%"><a href="' . $link_product . '" class="uppercase table_1_name" id="table_1_name_' . $rs['id'] . '">' . $rs['name'] . '</a></td>';
            }else{
                $html_table1 .= '<td class="td_custom cus_pri futures_contracts_name" align="left" width="25%">' . $rs['name'] . '</td>';
            }

            $html_table1 .='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td>';
            /*$html_table1 .='<td class="td_custom table_1_expiry" align="left" id="table_1_expiry_'.$rs['id'].'">'.$rs['expiry'].'</td>';*/
            $html_table1 .='<td class="td_custom table_1_code" align="left" id="table_1_code_'.$rs['id'].'">'.$rs['code'].'</td>';

            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_last_'.$rs['id'].'" class="bg_color_grey table_1_last">'.$rs["last"].'</span></td>';
            /*$html_table1 .='<td class="td_custom" align="right"><span id="table_1_change_'.$rs['id'].'" class="table_1_change '.(($rs['change'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["change"].'</span></td>';*/
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["var"].'</span></td>';
            $html_table1 .='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'.$rs['id'].'">'.$rs['volume'].'</td>';
            $html_table1 .='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'.$rs['id'].'">'.$rs["openinterest"].'</td>';
            /*$html_table1 .='<td class="td_custom table_1_settlement" align="right" id="table_1_settlement_'.$rs['id'].'">'.$rs["settlement"].'</td>';*/
            $html_table1 .='<td class="td_custom table_1_lasttimex" align="right" id="table_1_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';

        }
        $this->data->d2_box_customise1 = $html_table1;









        $sql2 = "SELECT ddl.* FROM my_data md RIGHT JOIN data_dashboard_list ddl ON (md.symbol = ddl.bctcode) WHERE md.mychoice = 9 AND md.active = 1 AND md.dright = 1 AND ddl.code is not null  order by ddl.name ASC";
        $detail2 = $this->db->query($sql2)->result_array();

        /* $arr = "(";
         foreach($result2 as $re2){
             $arr .= "'".$re2['type']."',";

         }
         $arr = substr($arr,0,-1);
         $arr .= ")";
         $detail2 = $this->db->query("SELECT * FROM data_dashboard_list where type IN $arr AND active = 1  ORDER BY top DESC, name ASC")->result_array();*/


        $html_table2 = '';
        foreach($detail2 as $rs) {
            $rs['exchange'] = (($rs['exchange'] == null) ? '' : $rs['exchange']);
            if (isset($rs['lasttimex']) && !is_null($rs['lasttimex']) && date('Y-m-d', strtotime($rs['lasttimex'])) < date('Y-m-d')) {
                $rs["time_format"] = date('Y-m-d', strtotime($rs['lasttimex']));

            } else if (isset($rs['lasttimex']) && !is_null($rs['lasttimex'])) {
                $rs["time_format"] = date('H:i', strtotime($rs['lasttimex']));
            } else {
                $rs["time_format"] = '-';
            }
            $link_product = (!is_null($rs["bctcode"]) && $rs["bctcode"] != '') ? (base_url() . 'product/' . $rs["bctcode"]) : 'javascript:void(0)';

            $rs["last"] = ($rs['last'] == null) ? '-' : number_format((float)$rs['last'], $rs['dec'], '.', ',');
            /*$rs["change"] = ($rs['change'] == null)?'-': number_format((float)$rs['change'], 2, '.', ',');*/
            $rs["openinterest"] = ($rs['openinterest'] == null) ? '-' : number_format((float)$rs['openinterest'], 0, '.', ',');
            $rs["settlement"] = ($rs['settlement'] == null) ? '-' : number_format((float)$rs['settlement'], $rs['dec'], '.', ',');
            $rs["var"] = ($rs['var'] == null) ? '-' : number_format((float)$rs['var'], 2, '.', ',');
            $rs['volume'] = (($rs['volume'] == null) ? '' : number_format((float)$rs['volume'], 0, '.', ','));
            $rs['code'] = (($rs['code'] == null) ? '' : $rs['code']);
            $data_table1[$rs["id"]] = $rs;
            $html_table2 .= '<tr>';
            if (!is_null($rs["bctcode"]) && $rs["bctcode"] != '') {
                $html_table2 .= '<td class="td_custom cus_pri futures_contracts_name" align="left" width="25%"><a href="' . $link_product . '" class="uppercase table_1_name" id="table_1_name_' . $rs['id'] . '">' . $rs['name'] . '</a></td>';
            }else{
                $html_table2 .= '<td class="td_custom cus_pri futures_contracts_name" align="left" width="25%">' . $rs['name'] . '</td>';
            }

            $html_table2 .='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td>';
            /*$html_table2 .='<td class="td_custom table_1_expiry" align="left" id="table_1_expiry_'.$rs['id'].'">'.$rs['expiry'].'</td>';*/
            $html_table2 .='<td class="td_custom table_1_code" align="left" id="table_1_code_'.$rs['id'].'">'.$rs['code'].'</td>';

            $html_table2 .='<td class="td_custom" align="right"><span id="table_1_last_'.$rs['id'].'" class="bg_color_grey table_1_last">'.$rs["last"].'</span></td>';
            /*$html_table2 .='<td class="td_custom" align="right"><span id="table_1_change_'.$rs['id'].'" class="table_1_change '.(($rs['change'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["change"].'</span></td>';*/
            $html_table2 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["var"].'</span></td>';
            $html_table2 .='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'.$rs['id'].'">'.$rs['volume'].'</td>';
            $html_table2 .='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'.$rs['id'].'">'.$rs["openinterest"].'</td>';
            /*$html_table2 .='<td class="td_custom table_1_settlement" align="right" id="table_1_settlement_'.$rs['id'].'">'.$rs["settlement"].'</td>';*/
            $html_table2 .='<td class="td_custom table_1_lasttimex" align="right" id="table_1_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';

        }
        $this->data->d2_box_customise2 = $html_table2;


        return $this->load->view('block/col1_customise', $this->data, true);
    }
    public function col3_customise()
    {

        return $this->load->view('block/col3_customise', $this->data, true);
    }



    public function col2_product()
    {
        $sql = "SELECT * FROM specifications";
        $this->data->specifications = $this->db->query($sql)->result_array();
        return $this->load->view('block/col2_product', $this->data, true);
    }
    public function col3_product($bctcode)
    {
        $sql = "SELECT * FROM data_news";
        $this->data->news = $this->db->query($sql)->result_array();
		$this->data->bctcode = $bctcode;
        $this->data->data_dashboard = $this->db->query("SELECT dl.lasttime,dl.name,dl.unit, dl.lasttimex, dl.last, dl.`change`, dl.var, dl.`dec` as dec_list, dl.exchange, dl.expiry, dd.* FROM data_dashboard_list as dl  LEFT JOIN data_dashboard as dd ON dl.type=dd.type where dl.bctcode='{$bctcode}'")->result_array();


        $sql = "SELECT dsl.*,ddl.dec FROM data_series_last as dsl  RIGHT JOIN data_dashboard_list as ddl ON dsl.symbol=ddl.bctcode where dsl.symbol = '{$bctcode}' and mon<>'Cash' ORDER BY dsl.expyyyymm ASC limit 1";

        $data = $this->db->query($sql)->row_array();
        $this->data->code_first = $data;
        /*$this->data->code_first = '';
        foreach($data as $da){
            if($da['openinterest'] != 0){
                $this->data->code_first = $da;
                break;
            }
        }*/

        return $this->load->view('block/col3_product', $this->data, true);
    }

    public function news_left()
    {
        $sql = "SELECT * FROM data_news";
        $this->data->news = $this->db->query($sql)->result_array();
        return $this->load->view('block/news_left', $this->data, true);
    }
    public function news_right()
    {
        $sql = "SELECT * FROM data_news_calendar";
        $this->data->news = $this->db->query($sql)->result_array();
        return $this->load->view('block/news_right', $this->data, true);
    }

    public function col1_analysis()
    {
        $sql = "SELECT * FROM data_dashboard_list where nr = 1 AND active = 1  ORDER BY top DESC, name ASC";
		$result = $this->db->query($sql)->result_array();
		$html_table1 = '';
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
			$rs["lasttimex"] = (($rs['lasttimex'] == null)?'-': $rs['lasttimex']);
			$rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
			$rs["change"] = ($rs['change'] == null)?'-': number_format((float)$rs['change'], 2, '.', ',');
			$rs["openinterest"] = ($rs['openinterest'] == null)?'-':number_format((float)$rs['openinterest'], 0, '.', ',');
			$rs["settlement"] = ($rs['settlement'] == null)?'-':number_format((float)$rs['settlement'], $rs['dec'], '.', ',');
			$rs["var"] = ($rs['var'] == null)?'-': number_format((float)$rs['var'], 2, '.', ',');
			$rs['volume'] = (($rs['volume'] == null)?'': number_format((float)$rs['volume'], 0, '.', ','));
			$rs['code'] = (($rs['code'] == null)?'': $rs['code']);
			$data_table1[$rs["id"]] = $rs;
			$html_table1 .='<tr>';
            $html_table1 .='<td class="td_custom cus_pri futures_contracts_name" align="left"><a href="'.$link_product.'" class="uppercase table_1_name" id="table_1_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';
			
            $html_table1 .='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td>';
			/*$html_table1 .='<td class="td_custom table_1_expiry" align="left" id="table_1_expiry_'.$rs['id'].'">'.$rs['expiry'].'</td>';*/
			$html_table1 .='<td class="td_custom table_1_code" align="left" id="table_1_code_'.$rs['id'].'">'.$rs['code'].'</td>';
			$html_table1 .='<td class="td_custom" align="right"><span id="table_1_last_'.$rs['id'].'" class="bg_color_grey table_1_last">'.$rs["last"].'</span></td>';
			$html_table1 .='<td class="td_custom" align="right"><span id="table_1_change_'.$rs['id'].'" class="table_1_change '.(($rs['change'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["change"].'</span></td>';
			$html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["var"].'</span></td>';
			$html_table1 .='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'.$rs['id'].'">'.$rs['volume'].'</td>';
			$html_table1 .='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'.$rs['id'].'">'.$rs["openinterest"].'</td>';
			$html_table1 .='<td class="td_custom table_1_settlement" align="right" id="table_1_settlement_'.$rs['id'].'">'.$rs["settlement"].'</td>';
            $html_table1 .='<td class="td_custom table_1_lasttimex" align="right" id="table_1_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';
		}		
        $this->data->d2_box_category1 = $html_table1;
		$this->data->data_dashboard = $this->db->query("SELECT * FROM data_dashboard_list as dl  RIGHT JOIN data_dashboard as dd ON dl.type=dd.type where dd.active = 1 and dl.top=5 Order by dd.nr")->result_array();
        return $this->load->view('block/col1_analysis', $this->data, true);
    }



    public function col3_analysis()
    {
        $sql = "SELECT * FROM data_news";
        $this->data->news = $this->db->query($sql)->result_array();
        return $this->load->view('block/col3_analysis', $this->data, true);
    }


    public function col1_research()
    {
        $sql = "SELECT * FROM data_dashboard_list where active = 1 AND type = 'ENERGY'  ORDER BY top DESC, name ASC";
        $result = $this->db->query($sql)->result_array();
        $html_table1 = '';
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
            $rs["lasttimex"] = (($rs['lasttimex'] == null)?'-': $rs['lasttimex']);
            $rs["last"] = ($rs['last'] == null)?'-': number_format((float)$rs['last'], $rs['dec'], '.', ',');
            $rs["change"] = ($rs['change'] == null)?'-': number_format((float)$rs['change'], 2, '.', ',');
            $rs["openinterest"] = ($rs['openinterest'] == null)?'-':number_format((float)$rs['openinterest'], 0, '.', ',');
            $rs["settlement"] = ($rs['settlement'] == null)?'-':number_format((float)$rs['settlement'], $rs['dec'], '.', ',');
            $rs["var"] = ($rs['var'] == null)?'-': number_format((float)$rs['var'], 2, '.', ',');
            $rs['volume'] = (($rs['volume'] == null)?'': number_format((float)$rs['volume'], 0, '.', ','));
            $rs['code'] = (($rs['code'] == null)?'': $rs['code']);
            $data_table1[$rs["id"]] = $rs;
            $html_table1 .='<tr>';
            $html_table1 .='<td class="td_custom cus_pri futures_contracts_name" align="left"><a href="'.$link_product.'" class="uppercase table_1_name" id="table_1_name_'.$rs['id'].'">'.$rs['name'].'</a></td>';

            $html_table1 .='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'.$rs['id'].'">'.$rs['exchange'].'</td>';
            /*$html_table1 .='<td class="td_custom table_1_expiry" align="left" id="table_1_expiry_'.$rs['id'].'">'.$rs['expiry'].'</td>';*/
            $html_table1 .='<td class="td_custom table_1_code" align="left" id="table_1_code_'.$rs['id'].'">'.$rs['code'].'</td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_last_'.$rs['id'].'" class="bg_color_grey table_1_last">'.$rs["last"].'</span></td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_change_'.$rs['id'].'" class="table_1_change '.(($rs['change'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["change"].'</span></td>';
            $html_table1 .='<td class="td_custom" align="right"><span id="table_1_var_'.$rs['id'].'" class="table_1_var '.(($rs['var'] < 0)?'bg_color_red':'bg_color_green').'">'.$rs["var"].'</span></td>';
            $html_table1 .='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'.$rs['id'].'">'.$rs['volume'].'</td>';
            $html_table1 .='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'.$rs['id'].'">'.$rs["openinterest"].'</td>';
            $html_table1 .='<td class="td_custom table_1_settlement" align="right" id="table_1_settlement_'.$rs['id'].'">'.$rs["settlement"].'</td>';
            $html_table1 .='<td class="td_custom table_1_lasttimex" align="right" id="table_1_lasttimex_'.$rs['id'].'">'.$rs["time_format"].'</td></tr>';
        }
        $this->data->d2_box_category1 = $html_table1;
        $this->data->data_dashboard = $this->db->query("SELECT * FROM data_dashboard_list as dl  RIGHT JOIN data_dashboard as dd ON dl.type=dd.type where dd.active = 1 AND dl.type = 'ENERGY' and dl.top=5 Order by dd.nr")->result_array();
        return $this->load->view('block/col1_research', $this->data, true);
    }

    public function col3_research()
    {
        $sql = "SELECT * FROM data_news";
        $this->data->news = $this->db->query($sql)->result_array();


        $sql = "SELECT * FROM data_dashboard_list where active = 1 AND type = 'ENERGY'  ORDER BY top DESC, name ASC limit 1";

        $data = $this->db->query($sql)->row_array();
        $this->data->code_first = $data;

        return $this->load->view('block/col3_research', $this->data, true);
    }
	
	
    
}