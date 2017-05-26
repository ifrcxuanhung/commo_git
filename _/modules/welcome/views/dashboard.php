<?php /*
if(!isset($_SESSION['commo']['user_id'])){
			redirect(base_url().'dashboard');
}*/?>

<?php echo $dashboard; ?>




<div class="row">
    <div class="col-md-3 blocks use_fullscreen">

        <?php echo $chart1; ?>

        <?php echo $data_table1; ?>



    </div>
    <div class="col-md-3 blocks use_fullscreen">

        <?php echo $chart2; ?>
        <?php echo $data_table2; ?>

    </div>
    <div class="col-md-3 blocks use_fullscreen">
        <?php echo $chart3; ?>

        <?php echo $data_table3; ?>

    </div>
    <div class="col-md-3 blocks use_fullscreen">

        <?php echo $chart4; ?>
        <?php echo $data_table4; ?>
    </div>
</div>
    <!-- BEGIN CONTENT -->

    <!-- END CONTENT -->
</div><!--container-fluid main-container margin-bottom-40-->