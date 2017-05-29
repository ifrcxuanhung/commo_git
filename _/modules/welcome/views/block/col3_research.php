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


<div class="col-md-5" style="margin-bottom: 30px;">



    <div class="portlet box blocks cus_hung" style="position:relative;">
        <div class="portlet-title" style="background:#4c87b9 !important;">
            <div class="caption">
                <i class="fa"></i><?php echo $data_dashboard[0]['lable_1']; ?></div>
            <div class="tools">
                <!-- <a href="" class="fullscreen"> </a>-->
                <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                <!--<i class="fa fa-compress minscreens"></i>-->
            </div>
        </div>
        <div class="portlet-body background_portlet" style="margin-right:5px;">
            <input name="code_chart" id="code_chart" type="hidden" sttr='' value="<">
            <div id="chartdiv9" class="chart" style="height:535px;"> </div>
        </div>
    </div>

    <div class="portlet box red blocks" style="margin-bottom:5px;">
        <div class="portlet-title header-table" style="position:relative;">
            <div class="caption">Settings</div>
            <div class="tools">
                <!-- <a href="" class="fullscreen"> </a>-->
            </div>
        </div>
        <div class="portlet-body background_portlet format-input">
            <div class="table-responsive setting_cus">
                <div style="margin-bottom:55px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label text_color_cus">StartDate:</label>
                            <div class="col-md-6">
                                <input class="form-control input-sm" placeholder="" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label text_color_cus">EndDate:</label>
                            <div class="col-md-6">
                                <input class="form-control input-sm" placeholder="" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label text_color_cus">Line 1:</label>
                        <div class="col-md-8">
                            <select class="form-control input-small text_color_cus">
                                <option>Close</option>
                                <option>Open Intenest(OI)</option>
                                <option>Short OI</option>
                                <option>Long OI</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label text_color_cus">Line 2:</label>
                        <div class="col-md-8">
                            <select class="form-control input-small text_color_cus">
                                <option>Close</option>
                                <option>Open Intenest(OI)</option>
                                <option>Short OI</option>
                                <option>Long OI</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-4">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Line 3:</label>
                        <div class="col-md-8">
                            <select class="form-control input-small">
                                <option>Close</option>
                                <option>Open Intenest(OI)</option>
                                <option>Short OI</option>
                                <option>Long OI</option>
                            </select>
                        </div>
                    </div>
                </div>-->

                <!--<table class="table  table-bordered table-hover table_color table_scroll table_cus">
                    <thead>

                    </thead>
                    <tbody>
                    <tr>
                        <td class="td_custom cus_pri" width="33%"></td>
                        <td class="td_custom" width="33%">
                            <div class="form-group">
                                <label class="col-md-3 control-label">StartDate:</label>
                                <div class="col-md-4">
                                    <input class="form-control input-sm" placeholder="Enter text" type="text">
                                </div>
                            </div>
                        </td>
                        <td class="td_custom" width="33%">
                            <div class="form-group">
                                <label class="col-md-3 control-label">EndDate:</label>
                                <div class="col-md-4">
                                    <input class="form-control input-sm" placeholder="Enter text" type="text">
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td class=" ">
                            <div class="form-group">
                                <label>Line 1</label>
                                <select class="form-control input-small">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>

                        </td>
                        <td class="">
                            <div class="form-group">
                                <label>Line 2</label>
                                <select class="form-control input-small">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>

                        </td>
                        <td class="">
                            <div class="form-group">
                                <label>Line 3</label>
                                <select class="form-control input-small">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>

                        </td>
                    </tr>

                    </tbody>
                </table>-->
            </div>
        </div>
    </div>







</div>