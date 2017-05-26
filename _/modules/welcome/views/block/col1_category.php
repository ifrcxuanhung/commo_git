<div class="col-md-7">
   <!-- <div class="dashboard-stat red-thunderbird">
                <div class="visual">

                    <i class="fa fa-line-chart"></i>
                </div>
                <div class="details" id="details_p">
                    <div class="number align-left" id="number_p">
                        <span class="dash_0_lb1"><?php /*echo $data_dashboard[0]['lable_1']; */?></span>
                    </div>
                    <div class="desc desc_cus desc_font"> <span>
   <span class="dash_0_lb2"><?php /*echo $data_dashboard[0]['lable_2']; */?></span>
  </span></div>
                </div>
                <div class="details details_bottom" id="details_p" style="margin-top: 66px;">
                    <div class="ti_font number" id="number_p">
                        <span class="dash_0_lb5"><?php /*echo $data_dashboard[0]['lable_5']; */?></span>
                    </div>
                    <div class="desc desc_cus" style="margin-top: -6px"> <span>
  <span class="dash_0_lb6"><?php /*echo $data_dashboard[0]['lable_6']; */?></span>
  </span></div>
                </div>

                <div class="details" style="padding-right: 11px;">
                    <div class="number ti_font" style="text-align: right !important;"> <span style="font-size: 32px;" data-counter="counterup" data-value="<?php /*echo number_format((float)$data_dashboard[0]['lable_3'], $data_dashboard[0]['dec'], '.', ','); */?>" class="index_last" id="dash_0_lb3"><?php /*echo number_format((float)$data_dashboard[0]['lable_3'], $data_dashboard[0]['dec'], '.', ','); */?></span></div>
                    <div class="align-right" style="margin-top: -6px"> <span>
   <span class="dash_0_lb4"><?php /*echo $data_dashboard[0]['lable_4']; */?></span>
  </span> </div>
                </div>
                <div class="details_bottom details" style="margin-top: 62px">
                    <div class="number"> <span class="index_last" style="font-size: 20px;">
  <span class="dash_0_lb7"><?php /*echo number_format((float)$data_dashboard[0]['lable_7'], $data_dashboard[0]['dec'], '.', ','); */?></span>
  </span></div>
                    <div class="desc" style="text-align: right !important; margin-top: -6px"> <span>
<span class="dash_0_lb8"><?php /*echo $data_dashboard[0]['lable_8']; */?></span>
  </span> </div>

                </div>
                <a class="more" id="p" style="height:32px;" href="javascript:;"></a>
                <div class="vnx_other_product"><a href="#" data-target="#order_product" data-toggle="modal" class="btn yellow-crusta" type="button">
                        <span class="dash_0_lb9"><?php /*echo $data_dashboard[0]['lable_9']; */?></span>
                    </a> </div>
                <div class="vnx_other_product2"><a href="#" data-target="#order_product" data-toggle="modal" class="btn yellow-crusta" type="button">
                        <span class="dash_0_lb10"><?php /*echo $data_dashboard[0]['lable_10']; */?></span>
                    </a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>

            </div>
-->
    <div class="portlet box blocks cus_hung" style="position:relative;">
        <div class="portlet-title" style="background:#4c87b9 !important;">
            <div class="caption">
                <i class="fa"></i><span id="type_category"><?php echo $type;?></span></div>
            <div class="tools">
                <i class="fa fa-toggle-up fa-lg fullscreens"></i>
            </div>
        </div>
        <div class="portlet-body background_portlet">
            <div class="portlet-body background_portlet" style="margin-top:10px;">
                <div class="table-responsive text_scroll scroller" style="height:556px;">
                    <table class="table  table-bordered table-hover table_color table_cus table_fix_padding">
                        <thead>
                        <tr>
                            <th class="th_custom" style="text-align:left"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Name</h6>  </th>
                            <th class="th_custom" style="text-align:left"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Type</h6>  </th>
                           <!-- <th class="th_custom" style="text-align:left"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Expiry</h6>  </th>-->
                            <th class="th_custom" style="text-align:left"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Code</h6>  </th>

                            <th class="th_custom" style="text-align:right"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Last</h6> </th>
                            <!--<th class="th_custom" style="text-align:right"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Change</h6> </th>-->
                            <th class="th_custom" style="text-align:right"> <h6 class="color_h6 cus_type" style="padding:5px !important;">%</h6> </th>
                            <th class="th_custom" style="text-align:right"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Volume</h6> </th>
                            <th class="th_custom" style="text-align:right"> <h6 class="color_h6 cus_type" style="padding:5px !important;">O.I.</h6> </th>
                           <!-- <th class="th_custom" style="text-align:right"> <h6 class="color_h6 cus_type" style="padding:5px !important;">SETMT.</h6> </th>-->
                            <th class="th_custom" style="text-align:right"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Time</h6> </th>

                        </tr>
                        </thead>
                         <tbody id="dashboard_list_1"><?php echo $d2_box_category1 ?></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>