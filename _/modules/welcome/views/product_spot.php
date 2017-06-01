<div class="col-md-6">
    <div class="dashboard-stat red-thunderbird">
                <div class="visual">
                    <i class="fa fa-line-chart"></i>
                </div>
                <div class="details" id="details_p">
                    <div class="number align-left" id="number_p">
                        <span class="dash_0_lb1" ><?php echo $data_dashboard[0]['name']; ?></span>
                    </div>
                    <div class="desc desc_cus desc_font"> <span>
   <span class="dash_0_lb2"><?php echo $data_dashboard[0]['unit']; ?></span>
  </span></div>
                </div>
                <div class="details details_bottom" id="details_p" style="margin-top: 66px;">
                    <div class="ti_font number" id="number_p">
                        <span class="dash_0_lb5"><?php echo $data_dashboard[0]['lable_5']; ?></span>
                    </div>
                    <div class="desc desc_cus" style="margin-top: -6px"> <span>
  <span class="dash_0_exchange"><?php echo $data_dashboard[0]['exchange']; ?></span>, <span class="dash_0_expiry"><?php echo $data_dashboard[0]['expiry']; ?></span>
  </span></div>
                </div>

                <div class="details" style="padding-right: 11px;">
                    <!--<div class="number ti_font" style="text-align: right !important;"> <span style="font-size: 32px;" data-counter="counterup" data-value="<?php /*echo number_format((float)$data_dashboard[0]['lable_3'], $data_dashboard[0]['dec'], '.', ','); */?>" class="index_last" id="dash_0_lb3"><?php /*echo ($data_dashboard[0]['lable_3'] !=0 || $data_dashboard[0]['lable_3'] != null)?number_format((float)$data_dashboard[0]['lable_3'], $data_dashboard[0]['dec'], '.', ','):''; */?></span>
  </div>-->
                    <div class="align-right" style="margin-top: -6px"> <span>
   <span class="dash_0_lb4"><?php echo $data_dashboard[0]['lable_4']; ?></span>
  </span> </div>
                </div>
                <div class="details_bottom details" style="margin-top: 62px">
                    <div class="number"> <span class="index_last" style="font-size: 20px;">
  <span class="dash_0_lb7"><?php echo number_format((float)$data_dashboard[0]['last'], $data_dashboard[0]['dec_list'], '.', ','); ?></span>
  </span></div>
                    <div class="desc" style="text-align: right !important; margin-top: -6px"> <span>
                    <span class="dash_0_change"><?php echo $data_dashboard[0]['change']; ?></span>&nbsp;(<span class="dash_0_var"><?php echo $data_dashboard[0]['var']; ?></span>%)
  </span> </div>

                </div>
                <a class="more" id="p" style="height:32px;" href="javascript:;"></a>
                <div class="vnx_other_product"><a href="#" data-target="#order_product" data-toggle="modal" class="btn yellow-crusta" type="button">
                        <span class="dash_0_lasttimex"><?php echo (isset($data_dashboard[0]['lasttimex']) && !is_null($data_dashboard[0]['lasttimex'])) ? date( "H:i", strtotime( $data_dashboard[0]['lasttimex'] ) ) :'' ; ?></span>
                    </a> </div>
                <div class="vnx_other_product2"><a href="<?php echo base_url()?>market" class="btn yellow-crusta" type="button">
                        <span class="dash_0_lb10">other product</span>
                    </a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>

            </div>


</div>
<div class="col-md-12">
	<div class="col-md-6" >
        <div class="portlet box blocks cus_hung" style="position:relative;">
            <div class="portlet-title" style="background:#000099 !important;">
                <div class="caption ">INTRADAY</div>
                <div class="tools">
                    <!-- <a href="" class="fullscreen"> </a>-->
                    <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                    <!--<i class="fa fa-compress minscreens"></i>-->
                </div>
            </div>
            <div class="portlet-body background_portlet" style="margin-right:5px;">
                <input name="code_spot" id="code_spot" type="hidden" sttr='' value="<?php echo $code; ?>">
                <div id="chartspot_intraday" class="chart" style="height:350px;"> </div>
            </div>
        </div>
	</div>
	<div class="col-md-6" >
        <div class="portlet box blocks cus_hung" style="position:relative;">
            
            <div class="portlet-title" style="background:#000099 !important;">
                <div class="caption ">HISTORY</div>
                <div class="tools">
                    <!-- <a href="" class="fullscreen"> </a>-->
                    <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                    <!--<i class="fa fa-compress minscreens"></i>-->
                </div>
            </div>
            <div class="portlet-body background_portlet" style="margin-right:5px;">
                <input name="code_spot" id="code_spot" type="hidden" sttr='' value="<?php echo $code; ?>">
                <div id="chartspot_hitory" class="chart" style="height:350px;"> </div>
            </div>
        </div>
	</div>

</div>
<input type="hidden" id="type_product" name="type_product" value="<?php echo  $type ?>" />