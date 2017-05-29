<div class="col-md-7 blocks ">

    <div class="portlet box blocks cus_hung" style="position:relative;">
        <div class="portlet-title" style="background:#000099 !important;">
            <div class="caption">
                <i class="fa"></i><span id="type_category">MY INDICATORS</span></div>
            <div class="tools">
                <i class="fa fa-toggle-up fa-lg fullscreens"></i>
            </div>
        </div>
        <div class="portlet-body background_portlet">
            <div class="portlet-body background_portlet" style="margin-top:10px;">
                <div class="table-responsive text_scroll scroller" style="height:300px;">
                    <table class="table  table-bordered table-hover table_color table_cus table_fix_padding">
                        <thead>
                        <tr>
                            <th class="th_custom" style="text-align:left"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Name</h6>  </th>
                            <th class="th_custom" style="text-align:left"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Symbol</h6>  </th>
                            <th class="th_custom" style="text-align:left"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Exchange</h6>  </th>
                            <th class="th_custom" style="text-align:left"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Type Product</h6> </th>
                            <th class="th_custom" style="text-align:left"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Type</h6> </th>
                            <th class="th_custom" style="text-align:left"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Stype</h6> </th>

                        </tr>
                        </thead>
                        <tbody id="dashboard_list_1">
                        <?php foreach($my_data1 as $md){?>
                        <tr>
                            <td class="td_custom cus_pri futures_contracts_name" align="left"><a href="" class="uppercase" id="table_1_name_5"><?php echo $md['name']?></a></td>
                            <td class="td_custom table_1_exchange" id="table_1_exchange_5" align="left"><?php echo $md['symbol']?></td>
                            <td class="td_custom table_1_code" id="table_1_code_5" align="left"><?php echo $md['exchange']?></td>
                            <td class="td_custom" align="left"><span id="table_1_last_5" class=""><?php echo $md['typeproduct']?></span></td>

                            <td class="td_custom table_1_volume" id="table_1_volume_5" align="left"><?php echo $md['type']?></td>
                            <td class="td_custom table_1_openinterest" id="table_1_openinterest_5" align="left"><?php echo $md['stype']?></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="portlet box blocks cus_hung" style="position:relative;">
        <div class="portlet-title" style="background:#000099 !important;">
            <div class="caption">
                <i class="fa"></i><span id="type_category">MY INDICATORS</span></div>
            <div class="tools">
                <i class="fa fa-toggle-up fa-lg fullscreens"></i>
            </div>
        </div>
        <div class="portlet-body background_portlet">
            <div class="portlet-body background_portlet" style="margin-top:10px;">
                <div class="table-responsive text_scroll scroller" style="height:300px;">
                    <table class="table  table-bordered table-hover table_color table_cus table_fix_padding">
                        <thead>
                        <tr>
                            <th class="th_custom" style="text-align:left"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Name</h6>  </th>
                            <th class="th_custom" style="text-align:left"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Symbol</h6>  </th>
                            <th class="th_custom" style="text-align:left"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Exchange</h6>  </th>
                            <th class="th_custom" style="text-align:left"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Type Product</h6> </th>
                            <th class="th_custom" style="text-align:left"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Type</h6> </th>
                            <th class="th_custom" style="text-align:left"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Stype</h6> </th>

                        </tr>
                        </thead>
                        <tbody id="dashboard_list_1">
                        <?php foreach($my_data2 as $md){?>
                            <tr>
                                <td class="td_custom cus_pri futures_contracts_name" align="left"><a href="" class="uppercase" id="table_1_name_5"><?php echo $md['name']?></a></td>
                                <td class="td_custom table_1_exchange" id="table_1_exchange_5" align="left"><?php echo $md['symbol']?></td>
                                <td class="td_custom table_1_code" id="table_1_code_5" align="left"><?php echo $md['exchange']?></td>
                                <td class="td_custom" align="left"><span id="table_1_last_5" class=""><?php echo $md['typeproduct']?></span></td>

                                <td class="td_custom table_1_volume" id="table_1_volume_5" align="left"><?php echo $md['type']?></td>
                                <td class="td_custom table_1_openinterest" id="table_1_openinterest_5" align="left"><?php echo $md['stype']?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>