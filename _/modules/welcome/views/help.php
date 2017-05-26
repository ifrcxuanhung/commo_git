<?php  
if(!isset($_SESSION['commo']['user_id'])){
			redirect(base_url().'dashboard');
}?>
  <div class="row">
        <?php echo $dashboard_stat; ?>
    </div><!--row-->
    <!-- BEGIN CONTENT -->    
    <div class="row">
        <div class="col-md-4 blocks use_fullscreen">
           <?php echo $education_news; ?>
        </div>
        <div class="col-md-8 blocks use_fullscreen">
            <?php echo $block_contact; ?>
            <?php echo $answer_questions; ?>
        </div>
        
    </div>
    <!-- END CONTENT -->   