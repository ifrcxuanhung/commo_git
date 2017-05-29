<?php /*
if(!isset($_SESSION['commo']['user_id'])){
			redirect(base_url().'dashboard');
}*/?>

<!-- block box -->
<div style="margin-bottom: 40px;">
<?php echo $col1_category;?>
<div class="col-md-5">
    <div class="col-md-12">
        <div class="col-md-12 blocks use_fullscreen">

            <div class="portlet box blocks cus_hung" style="position:relative;">
                <div class="portlet-title" style="background:#4c87b9 !important;">
                    <div class="caption get_title_category2"></div>
                    <div class="tools">
                        <!-- <a href="" class="fullscreen"> </a>-->
                        <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                    </div>
                </div>
                <div class="portlet-body background_portlet" style="margin-right:5px;">
                    <div id="chartdiv2" class="chart" style="height: 340px; width: 110%; margin:-4%;"> </div>
                </div>
            </div>

        </div>

        <!--<div class="col-md-12 blocks use_fullscreen">
            <div class="portlet box blocks cus_hung" style="position:relative;">
                <div class="portlet-title" style="background:#4c87b9 !important;">
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
                <div class="portlet-title" style="background:#4c87b9 !important;">
                    <div class="caption get_title_category"></div>
                    <div class="tools">
                        <!-- <a href="" class="fullscreen"> </a>-->
                        <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                        <!--<i class="fa fa-compress minscreens"></i>-->
                    </div>
                </div>
                <div class="portlet-body background_portlet" style="margin-right:5px;">
                    <input name="code_chart" id="code_chart" type="hidden" sttr='' value="<">
                    <div id="chartdiv" class="chart" style="height:340px; width: 110%; margin:-4%;"> </div>
                </div>
            </div>
    
        </div>
        <!--<div class="col-md-12 blocks use_fullscreen">
            <div class="portlet box blocks cus_hung" style="position:relative;">
                <div class="portlet-title" style="background:#4c87b9 !important;">
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
    <div class="clear" style="clear: both;"></div>
</div>
