<div class="col-md-4">

    <div class="portlet box blocks cus_hung" style="position:relative;">
        <div class="portlet-title" style="background:#000099 !important;">
            <div class="caption">
                <i class="fa"></i>specifications</div>
            <div class="tools">
                <!-- <a href="" class="fullscreen"> </a>-->
                <i class="fa fa-toggle-up fa-lg fullscreens"></i>
                <i class="fa fa-compress minscreens" style="display: none;"></i>
            </div>

        </div>
        <div class="portlet-body background_portlet">
            <div class="table-responsive">
                <table class="table  table-bordered table-hover table_color table_cus">
                    <thead>

                    </thead>


                    <tbody>
                    <?php foreach($specifications as $rs){
                        if($rs['value'] !=null){
                        ?>
                        <tr>
                            <td class="td_custom cus_pri futures_contracts_name" width="40%" align="left"><a href="http://commo.ifrc.vn/product" class="save_session_dsymbol uppercase"><?php echo $rs['name']?></a></td>
                            <td class="td_custom futures_contracts_utype" align="left"><?php echo $rs['value']?></td>

                        </tr>
                    <?php }}?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>