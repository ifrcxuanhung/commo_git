<div class="portlet box blocks cus_hung" style="position:relative;">
    <div class="portlet-title" style="background:#000099 !important;">
        <div class="caption">
            <i class="fa"></i>
            METALS (<?php echo $num_rows;?>)</div>
        <div class="link_category">
        <a href="<?php echo base_url();?>category/METALS" class="btn btn-sm red-thunderbird"> Category </a>
        </div>

        <div class="tools">
            <i class="fa fa-toggle-up fa-lg fullscreens"></i>
        </div>
    </div>
    <div class="portlet-body background_portlet">

        <div class="table-responsive  scroller" style="height:225px;">
            <table class="table  table-bordered table-hover table_color table_cus">
                <thead>
                <tr>
                    <th class="th_custom" style="text-align:left" width="50%;"><h6 class="color_h6 cus_type">Name</h6>  </th>
                    <th class="th_custom" style="text-align:left" width="10%;"><h6 class="color_h6 cus_type">M.Y</h6>  </th>
                    <th class="th_custom" style="text-align:right" width="15%;"> <h6 class="color_h6 cus_type">Last</h6> </th>
                    <th class="th_custom" style="text-align:left" width="15%;"><h6 class="color_h6 cus_type">%</h6>  </th>
                    <th class="th_custom" style="text-align:right" width="10%;"> <h6 class="color_h6 cus_type">Time</h6> </th>





                </tr>
                </thead>
                <tbody id="dashboard_list_2"><?php echo $table2 ?></tbody>
            </table>
        </div>





    </div>
</div>