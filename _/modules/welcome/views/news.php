<?php /*
if(!isset($_SESSION['commo']['user_id'])){
			redirect(base_url().'dashboard');
}*/?>

<?php echo $dashboard; ?>



<div class="row">

    <div class="col-md-6 blocks use_fullscreen">

        <?php echo $news_left; ?>


    </div>
    <div class="col-md-6 blocks use_fullscreen">
        <?php echo $news_right; ?>

    </div>

    <!-- BEGIN CONTENT -->

    <!-- END CONTENT -->
</div>
</div><!--container-fluid main-container margin-bottom-40-->