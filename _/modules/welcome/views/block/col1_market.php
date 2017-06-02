<div class="col-md-12">

    <div class="portlet box blocks cus_hung" style="position:relative;">
        <div class="portlet-title" style="background:#000099 !important;">
            <div class="caption">
                <i class="fa"></i><span id="type_category">FULL LIST (<?php echo $num_rows;?>)</span></div>

            <div class="tools">
                <i class="fa fa-toggle-up fa-lg fullscreens"></i>
            </div>
        </div>
        <div class="portlet-body background_portlet">
            <div class="portlet-body background_portlet" style="margin-top:10px;">
                <div class="table-responsive text_scroll scroll-3d" style="height:680px;">
                    <table class="table  table-bordered table-hover table_color table_cus table_fix_padding">
                        <thead>
                        <tr>
                            <th class="th_custom" style="text-align:left" width="8%"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Category</h6>  </th>
                            <th class="th_custom" style="text-align:left"  width="8%"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">SUBTYPE</h6>  </th>
                            <th class="th_custom" style="text-align:left"  width="14%"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Name</h6>  </th>
                            <th class="th_custom" style="text-align:left" width="8%" ><h6 class="color_h6 cus_type"  style="padding: 5px !important;">MARKET</h6>  </th>
                            <th class="th_custom" style="text-align:left" width="8%" ><h6 class="color_h6 cus_type"  style="padding: 5px !important;">SYM.</h6>  </th>
                            <th class="th_custom" style="text-align:left" width="6%"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Code</h6>  </th>
                            <th class="th_custom" style="text-align:left" width="5%" ><h6 class="color_h6 cus_type"  style="padding: 5px !important;">CUR</h6>  </th>
                            <th class="th_custom" style="text-align:right" width="7%"><h6 class="color_h6 cus_type"  style="padding: 5px !important;">Last</h6>  </th>
                            <th class="th_custom" style="text-align:right" width="7%"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Change</h6> </th>
                            <th class="th_custom" style="text-align:right" width="7%"> <h6 class="color_h6 cus_type" style="padding:5px !important;">%</h6> </th>
                            <th class="th_custom" style="text-align:right" width="7%"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Volume</h6> </th>
                            <th class="th_custom" style="text-align:right" width="7%"> <h6 class="color_h6 cus_type" style="padding:5px !important;">O.I.</h6> </th>
                            <th class="th_custom" style="text-align:right" width="8%"> <h6 class="color_h6 cus_type" style="padding:5px !important;">Time</h6> </th>


                        </tr>
                        <tr>
                            <th class="th_custom">
                                <div class="format-input-2 ">
                                    <select class="form-control input-sm select_category" placeholder="" type="text">
                                            <option value="all">Select</option>
                                    </select>
                                </div>
                            </th>
                            <th class="th_custom ">
                                <div class="format-input-2 ">
                                    <select class="form-control input-sm select_stype " placeholder="" type="text">
                                        <option value="all">Select</option>
                                    </select>
                                </div>
                            </th>
                           <!-- <th class="th_custom">
                                <div class="format-input-2">
                                    <select class="form-control input-sm select_name" placeholder="" type="text">
                                        <option value="all">Select</option>
                                    </select>
                                </div>
                            </th>-->
                            <th class="th_custom">
                                <div class="format-input-2">
                                    <input class="form-control input-sm input_name" placeholder="" type="text">
                                </div>
                            </th>
                            <th class="th_custom" >
                                <div class="format-input-2">
                                    <select class="form-control input-sm select_exchange" placeholder="" type="text">
                                        <option value="all">Select</option>
                                    </select>
                                </div>
                            </th>
                            <th class="th_custom" >
                                <div class="format-input-2">
                                    <input class="form-control input-sm input_symbol" placeholder="" type="text">
                                </div>
                            </th>
                            <th class="th_custom" > <button class="btn btn-sm bg_color_grey reset_filter"> Reset filter </button></th>
                            <th class="th_custom" ></th>
                            <th class="th_custom" ></th>
                            <th class="th_custom" ></th>
                            <th class="th_custom" ></th>
                            <th class="th_custom" ></th>
                            <th class="th_custom" ></th>
                            <th class="th_custom" ></th>

                        </tr>

                        </thead>
                         <tbody id="dashboard_list_1"><?php echo $d2_box_category1 ?></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>