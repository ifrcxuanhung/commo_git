<?php   
$template_url = template_url();

//$template_url = str_replace('simulation','welcome',$template_url_); 
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
    <meta charset="utf-8"/>
    <title><?php echo $logo_txt[0]['name'].' '.$logo_txt[1]['name'] ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="<?php echo $template_url; ?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>

        <link href="<?php echo $template_url; ?>layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>css/style.css">
        <link href="<?php echo $template_url; ?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $template_url; ?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="<?php echo $template_url; ?>global/plugins/morris/morris.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo $template_url; ?>global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>

        <link href="<?php echo $template_url; ?>global/plugins/icheck/skins/all.css" rel="stylesheet"/>


        <link href="<?php echo $template_url; ?>global/css/plugins-md.css" rel="stylesheet" type="text/css"/>

        <?php if($this->router->fetch_class() == 'profile'){?>
            <!--ELFINDER CSS-->
            <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
            <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $template_url; ?>global/plugins/elfinder/css/elfinder.min.css">
            <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $template_url; ?>global/plugins/elfinder/css/theme.css">
            <!--END ELFINDER CSS-->
        <?php }?>
    <!--end css JQGRID-->
 	<!--scroll-->

    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="<?php echo $template_url; ?>img/favicon.ico"/>
    </head>

    <?php if( $this->router->fetch_class() == 'management'){?>
    <body class="page-md page-header-fixed page-quick-sidebar-over-content" style="background:url(<?php echo $template_url.$setting["bg_management_page"]; ?>) center center no-repeat fixed #2f373e !important" >
    <?php } else if ($this->router->fetch_class() == 'start' || $this->router->fetch_class() == 'simulation') { ?>
    <body class="page-md page-header-fixed page-quick-sidebar-over-content" style="background:url(<?php echo $template_url.$setting["bg_start_page"]; ?>) center center no-repeat fixed #2f373e !important" >
   
    <?php } else { ?>
     <body class="page-md page-header-fixed page-quick-sidebar-over-content" > 
    <?php } ?>
    <!-- BEGIN MAIN LAYOUT -->
	 <div class="page-container main-container" style="margin:0px;">
         <?php echo $header; ?>
	    <div class="container-fluid main-container margin-bottom-40" >
        
        	<!-- <div class="loader"></div>-->
             <div class="loader" style="display:none;"></div>
        	<div class="modal bs-modal-md fade" id="modals" role="dialog" aria-hidden="true" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-body">
							<img src="<?php echo template_url(); ?>global/img/loading-spinner-grey.gif" alt="" class="loading"/>
							<span>
							&nbsp;&nbsp;Loading... </span>
						</div>
					</div>
				</div>
			</div>
            <div class="modal bs-modal-md fade" id="login_modals" role="dialog" aria-hidden="true" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-body">
							<img src="<?php echo template_url(); ?>global/img/loading-spinner-grey.gif" alt="" class="loading"/>
							<span>
							&nbsp;&nbsp;Loading... </span>
						</div>
					</div>
				</div>
			</div>
            
            <?php echo $content; ?>
              
        </div> 
    </div>
    <p class="copyright">
    	<?php translate('dev_by'); ?> <a href="http://ifrc.fr/" target="_blank" style="color: #1c89b3 ;">IFRC</a>
    </p>
    <!-- END MAIN LAYOUT -->
    <a href="javascript:;" class="go2top"><i class="icon-arrow-up"></i></a>
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="<?php echo $template_url; ?>global/plugins/respond.min.js"></script>
    <script src="<?php echo $template_url; ?>global/plugins/excanvas.min.js"></script> 
    <![endif]-->
    
    <script type="text/javascript">
        var $template_url = '<?php echo $template_url; ?>';
        var $base_url = '<?php echo base_url(); ?>';
		var $simulation_url = '<?php echo $simulation_url; ?>';
        var $app = {'module': '<?php echo $this->router->fetch_module(); ?>',
            'controller': '<?php echo $this->router->fetch_class(); ?>',
            'action': '<?php echo $this->router->fetch_method(); ?>'};
    </script>

 
    <script src="<?php echo $template_url; ?>global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
     
    <script src="<?php echo $template_url; ?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <!-- <script src="<?php /*echo $template_url; */?>global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>-->
    <script src="<?php echo $template_url; ?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    
    <!--<script src="<?php /*echo $template_url; */?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>-->
    <!--<script src="<?php /*echo $template_url; */?>global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>-->
    <script src="<?php echo $template_url; ?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
     <!--<script src="<?php /*echo $template_url; */?>pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>-->
    <!-- END CORE PLUGINS -->
    
   <!-- <script type="text/javascript" src="<?php /*echo $template_url; */?>global/plugins/ckeditor/ckeditor.js"></script>-->
   <script src="<?php echo $template_url;?>global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/scripts/app.min.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>

    <!--<script src="<?php /*echo $template_url; */?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>-->
  	<script src="<?php echo $template_url; ?>global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
	<script src="<?php echo $template_url; ?>global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>

    <!--edit form-->
    <script src="<?php echo $template_url; ?>global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/jquery.mockjax.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $template_url; ?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
    <script src="<?php echo $template_url; ?>pages/scripts/ui-modals.min.js" type="text/javascript"></script>

    <script data-main="<?php echo base_url(); ?>assets/apps/welcome/main" src="<?php echo base_url(); ?>assets/bundles/require.js"></script>
    <!--BEGIN AMCHART-->
    <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>

    <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/themes/none.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
    <script src="<?php echo $template_url; ?>global/scripts/amchart.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/scripts/amchart2.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/scripts/amchart3.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/scripts/amchart4.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/scripts/amchart5.js" type="text/javascript"></script>
        <script src="<?php echo $template_url; ?>global/scripts/amchart6.js" type="text/javascript"></script>
    <!--END AMCHART-->
    
    <!--scroll-->


    <!-- END ECHARTS PLUGINS -->
    <!-- END CUSTOME JAVASCRIPTS -->
   
    
<!--<script language=JavaScript>
  var message="!!YOU CANNOT COPY ANY TEXT OR IMAGE FROM THIS SITE!";
  function clickIE4()
  {
    if (event.button==2)
    {
      alert(message);
      return false;
    }
  }
  function clickNS4(e)
  {
    if (document.layers||document.getElementById&&!document.all)
    {
      if (e.which==2||e.which==3)
      {
        alert(message);
        return false;
      }
    }
  }

  if (document.layers)
  {
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS4;
  }
  else if (document.all&&!document.getElementById)
  {
    document.onmousedown=clickIE4;
  }
  document.oncontextmenu=new Function("alert(message);return false")
</script>
-->

<script type="text/JavaScript">

	function killCopy(e){
		return false
	}
	function reEnable(){
		return true
	}
//	document.onselectstart=new Function ("return false")
//		if (window.sidebar){
//			document.onmousedown=killCopy
//			document.onclick=reEnable
//		}
</script>

<script>
$("input").keyup(function(event)
{
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13')
    {   
        $('#LoginProcess').click();
    }
});
</script>
    
</body>
<!-- END BODY -->
</html>