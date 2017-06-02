<div class="container-fluid main-container margin-bottom-40">

    <!-- <div class="loader"></div>-->
    <div class="loader" style="display:none;"></div>
    <div class="modal bs-modal-md fade" id="modals" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="ifrc/global/img/loading-spinner-grey.gif" alt="" class="loading">
                    <span>
							&nbsp;&nbsp;Loading... </span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal bs-modal-md fade" id="login_modals" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="ifrc/global/img/loading-spinner-grey.gif" alt="" class="loading">
                    <span>
							&nbsp;&nbsp;Loading... </span>
                </div>
            </div>
        </div>
    </div>
    <!-- block box -->

    <!-- block content -->


    <!-- block box -->
    <div class="row">
        <?php if($data_dashboard[0]['active'] == 1){?>
        <div class="col-md-3">
            <div class="dashboard-stat <?php echo $data_dashboard[0]['colorbgd'];?>">
                <div class="visual">

                    <i class="fa fa-line-chart"></i>
                </div>
                <div class="details" id="details_p">
                    <div class="number align-left" id="number_p">
                        <span class="dash_0_lb1"><?php echo $data_dashboard[0]['lable_1']; ?></span>
                    </div>
                    <div class="desc desc_cus desc_font"> <span>
   <span class="dash_0_lb2"><?php echo $data_dashboard[0]['lable_2']; ?></span>
  </span></div>
                </div>
                <div class="details details_bottom" id="details_p" style="margin-top: 66px;">
                    <div class="ti_font number" id="number_p">
                        <span class="dash_0_lb5"><?php echo $data_dashboard[0]['lable_5']; ?></span>
                    </div>
                    <div class="desc desc_cus" style="margin-top: -6px"> <span>
  <span class="dash_0_exchange" id="dash_0_exchange_1"><?php echo $data_dashboard[0]['exchange']; ?></span>, <span class="dash_0_expiry" id="dash_0_expiry_1"><?php echo $data_dashboard[0]['expiry']; ?></span>
  </span></div>
                </div>

                <div class="details" style="padding-right: 11px;">
                <?php if($data_dashboard[0]['lable_3'] !=0 || $data_dashboard[0]['lable_3'] != null) { ?>
                
                    <div class="number ti_font" style="text-align: right !important;"> <span style="font-size: 32px;" data-counter="counterup" data-value="<?php echo ($data_dashboard[0]['lable_3'] !=0 || $data_dashboard[0]['lable_3'] != null)?number_format((float)$data_dashboard[0]['lable_3'], $data_dashboard[0]['dec'], '.', ','):''; ?>" class="index_last" id="dash_0_lb3"><?php echo ($data_dashboard[0]['lable_3'] !=0 || $data_dashboard[0]['lable_3'] != null)?number_format((float)$data_dashboard[0]['lable_3'], $data_dashboard[0]['dec'], '.', ','):''; ?></span> <!--
  USD
  --></div>
  <?php } ?>
                    <div class="align-right" style="margin-top: -6px"> <span>
   <span class="dash_0_lb4"><?php echo $data_dashboard[0]['lable_4']; ?></span>
  </span> </div>
                </div>
                <div class="details_bottom details" style="margin-top: 62px">
                    <div class="number"> <span class="index_last" style="font-size: 20px;">
  <span class="dash_0_lb7"><?php echo number_format((float)$data_dashboard[0]['last'], $data_dashboard[0]['dec'], '.', ','); ?></span>
  </span></div>
                    <div class="desc" style="text-align: right !important; margin-top: -6px"> <span>
                    <span class="dash_0_change"><?php echo $data_dashboard[0]['change']; ?></span>&nbsp;(<span class="dash_0_var"><?php echo $data_dashboard[0]['var']; ?></span>%)
  </span> </div>

                </div>
                <a class="more" id="p" style="height:32px;" href="javascript:;"></a>
                <div class="vnx_other_product"><a href="#" data-target="#order_product" data-toggle="modal" class="btn yellow-crusta" type="button">
                        <span class="dash_0_lasttime"><?php echo (isset($data_dashboard[0]['lasttime']) && !is_null($data_dashboard[0]['lasttime'])) ? date( "H:i", strtotime( $data_dashboard[0]['lasttime'] ) ) :''; ?></span>
                    </a> </div>
                <div class="vnx_other_product2"><a href="category/<?php echo $data_dashboard[0]['type']; ?>" class="btn yellow-crusta" type="button">
                        <span class="dash_0_lb10"><?php echo $data_dashboard[0]['type']; ?></span>
                    </a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>

            </div>
        </div>
        <?php }?>
        <?php if($data_dashboard[1]['active'] == 1){?>
        <div class="col-md-3">
            <div class="dashboard-stat <?php echo $data_dashboard[1]['colorbgd'];?>">
                <div class="visual">

                    <i class="fa fa-line-chart"></i>
                </div>
                <div class="details" id="details_p">
                    <div class="number align-left" id="number_p">
                        <span class="dash_1_lb1"><?php echo $data_dashboard[1]['lable_1']; ?></span>
                    </div>
                    <div class="desc desc_cus desc_font"> <span>
   <span class="dash_1_lb2"><?php echo $data_dashboard[1]['lable_2']; ?></span>
  </span></div>
                </div>
                <div class="details details_bottom" id="details_p" style="margin-top: 66px;">
                    <div class="ti_font number" id="number_p">
                        <span class="dash_1_lb5"><?php echo $data_dashboard[1]['lable_5']; ?></span>
                    </div>
                    <div class="desc desc_cus" style="margin-top: -6px"> <span>
  <span class="dash_1_exchange" id="dash_1_exchange_1"><?php echo $data_dashboard[1]['exchange']; ?></span>, <span class="dash_1_expiry" id="dash_1_expiry_1"><?php echo $data_dashboard[1]['expiry']; ?></span>
  </span></div>
                </div>

                <div class="details" style="padding-right: 11px;">
                 <?php if($data_dashboard[1]['lable_3'] !=0 || $data_dashboard[1]['lable_3'] != null) { ?>
                    <div class="number ti_font" style="text-align: right !important;"> <span style="font-size: 32px;" data-counter="counterup" data-value="
 <?php echo ($data_dashboard[1]['lable_3'] !=0 || $data_dashboard[1]['lable_3'] != null)?number_format((float)$data_dashboard[1]['lable_3'], $data_dashboard[1]['dec'], '.', ','):''; ?>
  " class="index_last" id="dash_1_lb3"><?php echo ($data_dashboard[1]['lable_3'] !=0 || $data_dashboard[1]['lable_3'] != null)?number_format((float)$data_dashboard[1]['lable_3'], $data_dashboard[1]['dec'], '.', ','):''; ?></span> <!--
  USD
  --></div>
  <?php } ?>
                    <div class="align-right" style="margin-top: -6px"> <span>
   <span class="dash_1_lb4"><?php echo $data_dashboard[1]['lable_4']; ?></span>
  </span> </div>
                </div>
                <div class="details_bottom details" style="margin-top: 62px">
                    <div class="number"> <span class="index_last" style="font-size: 20px;">
  <span class="dash_1_lb7"><?php echo number_format((float)$data_dashboard[1]['last'], $data_dashboard[1]['dec'], '.', ','); ?></span>
  </span></div>
                    <div class="desc" style="text-align: right !important; margin-top: -6px"> <span>
                     <span class="dash_1_change"><?php echo $data_dashboard[1]['change']; ?></span>&nbsp;(<span class="dash_1_var"><?php echo $data_dashboard[1]['var']; ?></span>%)

  </span> </div>

                </div>
                <a class="more" id="p" style="height:32px;" href="javascript:;"></a>
                <div class="vnx_other_product"><a href="#" data-target="#order_product" data-toggle="modal" class="btn yellow-crusta" type="button">
                        <span class="dash_1_lasttime"><?php echo (isset($data_dashboard[1]['lasttime']) && !is_null($data_dashboard[1]['lasttime'])) ? date( "H:i", strtotime( $data_dashboard[1]['lasttime'] ) ) :''; ?></span>
                    </a> </div>
                <div class="vnx_other_product2"><a href="category/<?php echo $data_dashboard[1]['type']; ?>" class="btn yellow-crusta" type="button">
                        <span class="dash_1_lb10"><?php echo $data_dashboard[1]['type']; ?></span>
                    </a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>

            </div>
        </div>
        <?php }?>
        <?php if($data_dashboard[2]['active'] == 1){?>
        <div class="col-md-3">
            <div class="dashboard-stat <?php echo $data_dashboard[2]['colorbgd'];?>">
                <div class="visual">

                    <i class="fa fa-line-chart"></i>
                </div>
                <div class="details" id="details_p">
                    <div class="number align-left" id="number_p">
                        <span class="dash_2_lb1"><?php echo $data_dashboard[2]['lable_1']; ?></span>
                    </div>
                    <div class="desc desc_cus desc_font"> <span>
   <span class="dash_2_lb2"><?php echo $data_dashboard[2]['lable_2']; ?></span>
  </span></div>
                </div>
                <div class="details details_bottom" id="details_p" style="margin-top: 66px;">
                    <div class="ti_font number" id="number_p">
                        <span class="dash_2_lb5"><?php echo $data_dashboard[2]['lable_5']; ?></span>
                    </div>
                    <div class="desc desc_cus" style="margin-top: -6px"> <span>
  <span class="dash_2_exchange"><?php echo $data_dashboard[2]['exchange']; ?></span>, <span class="dash_2_expiry"><?php echo $data_dashboard[2]['expiry']; ?></span>
  </span></div>
                </div>

                <div class="details" style="padding-right: 11px;">
                <?php if($data_dashboard[2]['lable_3'] !=0 || $data_dashboard[2]['lable_3'] != null) { ?>
                    <div class="number ti_font" style="text-align: right !important;"> <span style="font-size: 32px;" data-counter="counterup" data-value="
<?php echo ($data_dashboard[2]['lable_3'] !=0 || $data_dashboard[2]['lable_3'] != null)?number_format((float)$data_dashboard[2]['lable_3'], $data_dashboard[2]['dec'], '.', ','):''; ?>
  " class="index_last" id="dash_2_lb3"><?php echo ($data_dashboard[2]['lable_3'] !=0 || $data_dashboard[2]['lable_3'] != null)?number_format((float)$data_dashboard[2]['lable_3'], $data_dashboard[2]['dec'], '.', ','):''; ?></span> <!--
  USD
  --></div>
  <?php } ?>
                    <div class="align-right" style="margin-top: -6px"> <span>
   <span class="dash_2_lb4"><?php echo $data_dashboard[2]['lable_4']; ?></span>
  </span> </div>
                </div>
                <div class="details_bottom details" style="margin-top: 62px">
                    <div class="number"> <span class="index_last" style="font-size: 20px;">
  <span class="dash_2_lb7"><?php echo number_format((float)$data_dashboard[2]['last'], $data_dashboard[2]['dec'], '.', ','); ?></span>
  </span></div>
                    <div class="desc" style="text-align: right !important; margin-top: -6px"> <span>
                    <span class="dash_2_change"><?php echo $data_dashboard[2]['change']; ?></span>&nbsp;(<span class="dash_2_var"><?php echo $data_dashboard[2]['var']; ?></span>%)

  </span> </div>

                </div>
                <a class="more" id="p" style="height:32px;" href="javascript:;"></a>
                <div class="vnx_other_product"><a href="#" data-target="#order_product" data-toggle="modal" class="btn yellow-crusta" type="button">
                        <span class="dash_2_lasttime"><?php echo (isset($data_dashboard[2]['lasttime']) && !is_null($data_dashboard[2]['lasttime'])) ? date( "H:i", strtotime( $data_dashboard[2]['lasttime'] ) ) :''; ?></span>
                    </a> </div>
                <div class="vnx_other_product2"><a href="category/<?php echo $data_dashboard[2]['type']; ?>" class="btn yellow-crusta" type="button">
                        <span class="dash_2_lb10"><?php echo $data_dashboard[2]['type']; ?></span>
                    </a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>

            </div>
        </div>
        <?php }?>
        <?php if($data_dashboard[3]['active'] == 1){?>
        <div class="col-md-3">

            <div class="dashboard-stat <?php echo $data_dashboard[3]['colorbgd'];?>">
                <div class="visual">

                    <i class="fa fa-line-chart"></i>
                </div>
                <div class="details" id="details_p">
                    <div class="number align-left" id="number_p">
                        <span class="dash_3_lb1"><?php echo $data_dashboard[3]['lable_1']; ?></span>
                    </div>
                    <div class="desc desc_cus desc_font"> <span>
   <span class="dash_3_lb2"><?php echo $data_dashboard[3]['lable_2']; ?></span>
  </span></div>
                </div>
                <div class="details details_bottom" id="details_p" style="margin-top: 66px;">
                    <div class="ti_font number" id="number_p">
                        <span class="dash_3_lb5"><?php echo $data_dashboard[3]['lable_5']; ?></span>
                    </div>
                    <div class="desc desc_cus" style="margin-top: -6px"> <span>
  <span class="dash_3_exchange" id="dash_3_exchange_1"><?php echo $data_dashboard[3]['exchange']; ?></span>, <span class="dash_3_expiry" id="dash_3_expiry_1"><?php echo $data_dashboard[3]['expiry']; ?></span>
  </span></div>
                </div>

                <div class="details" style="padding-right: 11px;">
                <?php if($data_dashboard[3]['lable_3'] !=0 || $data_dashboard[3]['lable_3'] != null) { ?>
                    <div class="number ti_font" style="text-align: right !important;"> <span style="font-size: 32px;" data-counter="counterup" data-value="<?php echo ($data_dashboard[3]['lable_3'] !=0 || $data_dashboard[3]['lable_3'] != null)?number_format((float)$data_dashboard[3]['lable_3'], $data_dashboard[3]['dec'], '.', ','):''; ?>" class="index_last" id="dash_3_lb3"><?php echo ($data_dashboard[3]['lable_3'] !=0 || $data_dashboard[3]['lable_3'] != null)?number_format((float)$data_dashboard[3]['lable_3'], $data_dashboard[3]['dec'], '.', ','):''; ?></span> <!--
  USD
  --></div>
  <?php } ?>
                    <div class="align-right" style="margin-top: -6px"> <span>
   <span class="dash_3_lb4"><?php echo $data_dashboard[3]['lable_4']; ?></span>
  </span> </div>
                </div>
                <div class="details_bottom details" style="margin-top: 62px">
                    <div class="number"> <span class="index_last" style="font-size: 20px;">
  <span class="dash_3_lb7"><?php echo number_format((float)$data_dashboard[3]['last'], $data_dashboard[3]['dec'], '.', ','); ?></span>
  </span></div>
                    <div class="desc" style="text-align: right !important; margin-top: -6px"> <span>
                    <span class="dash_3_change"><?php echo $data_dashboard[3]['change']; ?></span>&nbsp;(<span class="dash_3_var"><?php echo $data_dashboard[3]['var']; ?></span>%)

  </span> </div>

                </div>
                <a class="more" id="p" style="height:32px;" href="javascript:;"></a>
                <div class="vnx_other_product"><a href="#" data-target="#order_product" data-toggle="modal" class="btn yellow-crusta" type="button">
                        <span class="dash_3_lasttime"><?php echo (isset($data_dashboard[3]['lasttime']) && !is_null($data_dashboard[3]['lasttime'])) ? date( "H:i", strtotime( $data_dashboard[3]['lasttime'] ) ) :''; ?></span>
                    </a> </div>
                <div class="vnx_other_product2"><a href="category/<?php echo $data_dashboard[3]['type']; ?>" class="btn yellow-crusta" type="button">
                        <span class="dash_3_lb10"><?php echo $data_dashboard[3]['type']; ?></span>
                    </a>  <i class="m-icon-swapright m-icon-white cus_h"></i></div>

            </div>
        </div>
        <?php }?>
    </div>

    <!-- block content -->

