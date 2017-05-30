
<!-- block box -->
<?php echo $col1_market;?>

<div class="col-md-4">
    <div class="col-md-12">
        <div class="col-md-12 blocks use_fullscreen">

            <div class="portlet box blocks cus_hung" style="position:relative;">
                <div class="portlet-title" style="background:#000099 !important;">
                    <div class="caption"><?php echo $chartcode ?> (INTRADAY)</div>
                    <div class="tools">
                        <!-- <a href="" class="fullscreen"> </a>-->
                        <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                    </div>
                </div>
                <div class="portlet-body background_portlet" style="margin-right:5px;">
                    <div id="chartdiv2" class="chart" style="height: 350px; width: 110%; margin:-4%;"> </div>
                </div>
            </div>

        </div>

        <!--<div class="col-md-12 blocks use_fullscreen">
            <div class="portlet box blocks cus_hung" style="position:relative;">
                <div class="portlet-title" style="background:#000099 !important;">
                    <div class="caption">
                        <i class="fa"></i>TOP 4</div>
                    <div class="tools">
                        <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                    </div>
                </div>
                <div class="portlet-body background_portlet" style="margin-right:5px;">


                    <div id="chartdiv4" class="chart" style="height: 270px; width: 110%; margin:-4%;"> </div>
                </div>
            </div>
        </div>-->
    </div>
    <div class="col-md-12">
        <div class="col-md-12 blocks use_fullscreen">

            <div class="portlet box blocks cus_hung" style="position:relative;">
                <div class="portlet-title" style="background:#000099 !important;">
                    <div class="caption"><?php echo $chartcode ?> (HISTORY)</div>
                    <div class="tools">
                        <!-- <a href="" class="fullscreen"> </a>-->
                        <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                        <!--<i class="fa fa-compress minscreens"></i>-->
                    </div>
                </div>
                <div class="portlet-body background_portlet" style="margin-right:5px;">
                    <input name="code_chart" id="code_chart" type="hidden" sttr='' value="<">
                    <div id="chartdiv" class="chart" style="height:350px; width: 110%; margin:-4%;"> </div>
                </div>
            </div>

        </div>
        <!--<div class="col-md-12 blocks use_fullscreen">
            <div class="portlet box blocks cus_hung" style="position:relative;">
                <div class="portlet-title" style="background:#000099 !important;">
                    <div class="caption">
                        <i class="fa"></i>TOP 3</div>
                    <div class="tools">
                        <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                    </div>
                </div>
                <div class="portlet-body background_portlet" style="margin-right:5px;">


                    <div id="chartdiv3" class="chart" style="height: 270px; width: 110%; margin:-4%;"> </div>
                </div>
            </div>
         </div>-->
    </div>

</div>
<input type="hidden" id="chartcode" value="<?php echo $chartcode ?>"  />
