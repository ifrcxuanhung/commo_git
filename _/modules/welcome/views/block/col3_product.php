<div id="show_more" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="portlet box">
                <div class="portlet-title" style="background:#00a800; font-weight:bold;">
                    <div class="caption">
                        <i class="fa"></i><?php translate('Content'); ?></div>
                    <button data-style="slide-right" class="btn red mt-ladda-btn ladda-button" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="portlet-body background_portlet">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table_modal">
                            <thead>

                            </thead>
                            <tbody>
                            <p class="description_help"></p>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<div class="col-md-5"  style="margin-bottom: 30px;">
<?php if (isset($chart_intraday) && count($chart_intraday) > 0) { ?>
    <div class="portlet box blocks cus_hung" style="position:relative;">
        <div class="portlet-title" style="background:#000099 !important;">
            <div class="caption "><?php echo (isset($code_first['code']))?$code_first['code']:''; ?> (INTRADAY)</div>
            <div class="tools">
                <!-- <a href="" class="fullscreen"> </a>-->
                <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                <!--<i class="fa fa-compress minscreens"></i>-->
            </div>
        </div>
        <div class="portlet-body background_portlet" style="margin-right:5px;">
            <input name="code_chart" id="code_chart" type="hidden" sttr='' value="<?php echo $bctcode; ?>">
            <div id="chartdiv5" class="chart" style="height:297px;"> </div>
        </div>
    </div>
    <input type="hidden" id="chart_intraday_disable" value="false" />
<?php } else {?>
<input type="hidden" id="chart_intraday_disable" value="true" />
<?php } ?>
<?php if (isset($chart_history) && count($chart_history) > 0) { ?>

    <div class="portlet box blocks cus_hung" style="position:relative;">

        <div class="portlet-title" style="background:#000099 !important;">
            <div class="caption "><?php echo (isset($code_first['code']))?$code_first['code']:''; ?> (HISTORY)</div>
            <div class="tools">
                <!-- <a href="" class="fullscreen"> </a>-->
                <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                <!--<i class="fa fa-compress minscreens"></i>-->
            </div>
        </div>
        <div class="portlet-body background_portlet" style="margin-right:5px;">
            <input name="code_chart" id="code_chart" type="hidden" sttr='' value="<?php echo $bctcode; ?>">
            <div id="chartdiv8" class="chart" style="height:297px;"> </div>
        </div>
    </div>
    <input type="hidden" id="chart_history_disable" value="false" />
    <?php } else {?>
<input type="hidden" id="chart_history_disable" value="true" />
<?php } ?>
</div>
<input type="hidden" id="type_product" name="type_product" value="futures" />
<input type="hidden" id="get_chartcode" value = "<?php echo (isset($code_first['code']))?$code_first['code']:''; ?>" />