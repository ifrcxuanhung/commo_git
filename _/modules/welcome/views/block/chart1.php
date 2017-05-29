<div class="portlet box blocks cus_hung" style="position:relative;">
    <div class="portlet-title" style="background:#000099 !important;">
        <div class="caption">
            <i class="fa"></i><?php echo $data_dashboard[0]['lable_1']; ?> (<span class="dash_0_expiry" id="dash_0_expiry_2"><?php echo $data_dashboard[0]['expiry']; ?></span>)</div>
        <div class="tools">
            <!-- <a href="" class="fullscreen"> </a>-->
            <i class="fa fa-toggle-up fa-lg fa-lg fullscreens"></i>
            <!--<i class="fa fa-compress minscreens"></i>-->
        </div>
    </div>
    <div class="portlet-body background_portlet hide_in_mobile" style="margin-right:5px;">
        <input name="code_chart" id="code_chart" type="hidden" sttr='' value="<">
        <div id="chartdiv" class="chart" style="height:258px; width: 110%; margin:-4%;"> </div>
    </div>
</div>