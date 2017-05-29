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


<div class="col-md-6">
    <div class="portlet box blocks cus_hung" style="position:relative;">
        <div class="portlet-title" style="background:#000099 !important;"">
            <div class="caption">
                <i class="fa"></i>news (TOP 5)</div>
            <div class="tools">
                <i class="fa fa-toggle-up fa-lg fullscreens"></i>
            </div>
        </div>
        <div class="portlet-body background_portlet">
            <div class="table-responsive scroller" style="height:225px;">
                <table class="table  table-bordered table-hover table_color table_scroll table_cus">
                    <thead>
                    <tr>
                        <!--<th class="th_custom" id="cld_id" style="text-align:left"><h6 class="color_h6 cus_type">id</h6></th>-->
                        <th class="th_custom" id="cld_datetime" style="text-align:left;"><h6 class="color_h6 cus_type">datetime</h6></th>
                        <th class="th_custom" id="cld_title" style="text-align:left"><h6 class="color_h6 cus_type">title</h6> </th>
                        <th class="th_custom" id="cld_loca" style="text-align:left"><h6 class="color_h6 cus_type">source</h6> </th>
                        <th class="th_custom" id="cld_more" style="text-align:left"><h6 class="color_h6 cus_type">more</h6> </th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($news as $new){?>
                    <tr>
                        <!--<td class="td_custom" align="left"> <h6 class="color_h6 cus_type" id="cus_p">5</h6> </td>-->
                        <td class="td_custom" align="left" style="width: 20%;"> <?php echo $new['datetime'];?> </td>
                        <td class="td_custom cus_pri" align="left"><?php echo $new['title'];?></td>
                        <td class="td_custom" align="center"><?php echo $new['source']; ?></td>
                        <?php if($new['content'] !=null){?>
                        <td class="td_custom" align="center"><a href="javascript:;" data-target="#show_more" data-toggle="modal" class=" handel_help" id="<?php echo $new['id'] ?>">
                                <img src="<?php echo template_url() ?>/images/more.png">
                            </a></td>
                        <?php }else{ ?>
                            <td class="td_custom" align="center"></td>
                       <?php }?>
                    </tr>
                    <?php }?>


                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <div class="portlet box blocks cus_hung" style="position:relative;">
        <div class="portlet-title" style="background:#000099 !important;"">
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
            <div id="chartdiv7" class="chart" style="height:410px;"> </div>
        </div>
    </div>



</div>