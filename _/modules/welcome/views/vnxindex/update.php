         
<style>
.sub-apso{ position:absolute; top:140px; right:25px; position:fixed; z-index:1000;}
.sub-apso2{  position:absolute; top:180px; right:25px; position:fixed; z-index:1000;}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover{
background-color:#337ab7; color:#FFF;	
}
.nav-tabs > li > a, .nav-pills > li > a{ color:#333333; background-color:#ddd;}
.form-horizontal .control-label{ font-weight:bold;}
</style>                   
                    
                    
                    

<div class="portlet box blue ">
 <div class="alert-success update-success"></div>
    <div class="portlet-title" style="height:60px; background:#44b6ae;">
        <div class="caption" style="line-height:40px;">
            <?php translate('update_ifrc_articles');?>
        </div>
        <div class="tools">
          <!--  <a class="collapse" href="" data-original-title="" title="">
            </a>
        
            <a class="remove" href="" data-original-title="" title="">
            </a>-->
        </div>
    </div><!--portlet-title-->
<div class="portlet-body form">
            
            <!-- BEGIN PAGE HEADER-->

<!-- END PAGE HEADER-->
<?php //echo "<pre>";print_r($input);exit;?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="full-height-content full-height-content-scrollable">
			<div class="full-height-content-body form">
            <!-- BEGIN FORM-->
				<form action="<?php base_url()?>vnxindex/update_modal_vnxindex" id="form_article" class="form-horizontal" method="post" enctype="multipart/form-data" >
                
                <input type="hidden" name="get_filter" value="<?php echo $get_filter; ?>"/>
                	
                	<div class="form-body" style="padding:30px;">
                    <div class="row">
					<input type="hidden" name="id" id="id" value="<?php echo $hiden ?>" />
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button>
							Your form validation is successful!
						</div>
                        <div class="col-md-4">
                            
                            
                                      <!-- <div class="form-group">
                                        <label class="control-label col-md-3">Category_id 
                                        </label>
                                        <div class="col-md-8">
                                      
                                            <input type="text" name="category_id" data-required="1" class="form-control" value="<?php echo $input['a']['category_id'];?>" />
                                        </div>
                                    </div>-->
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-4"><?php translate('status_ifrc_articles');?>
                                        </label>
                                        <div class="col-md-8">
                                           
                                            <div class="radio-list" data-error-container="#form_2_membership_error">
                                                <label>
                                                <input type="radio" name="status" value="1" <?php if(isset($input['a']) && ($input['a']['status'] == 1)) echo "checked=checked";?> style=" margin-left:-10px;" />
                                                Show 
                                                  <input type="radio" name="status" value="0" <?php if(isset($input['a']) &&$input['a']['status'] == 0) echo "checked=checked";?> style=" margin-left:-10px;"/>
                                                Hide
                                                </label>
                                               
                                            </div>
                                            <div id="form_2_membership_error">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-4"><?php translate('clean_order_ifrc_articles');?> 
                                        </label>
                                        <div class="col-md-6">
                                      
                                            <input type="text" name="sort_order" data-required="1" class="form-control" value="<?php if(isset($input['a'])) echo $input['a']['clean_order'];?>" style="width:200px;" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                            <label class="control-label col-md-4"><?php translate('images_ifrc_articles');?></label>
                                            <div class="col-md-8">
                                                <div class="fileinput" data-provides="fileinput" data-name="myimage">
                                                  
                                                        <div id="file" class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                            <img id="img" src="<?php
                                                echo PATH_IFRC_ARTICLE;
                                                echo (isset($input['a']['images']) && $input['a']['images'] != '') ? str_replace(base_url(), "", $input['a']['images']) : 'assets/images/no-image.jpg';
                                            ?>" alt=""/>
        									</div>
                  
                                                    <div>
                                                        <span class="btn default blue btn-file ">
                                                        <i class="fa fa-edit"></i>
                                                       <!-- <span class="fileinput-new">
                                                        Select image </span>
                                                        <span class="fileinput-exists">
                                                        Change </span>-->
                                                        <input class="file_upload btn-icon-only tooltips" data-original-title="Select image change" type="file" name="image" id ="image" value="<?php echo isset($input['a']['images']) ? $input['a']['images'] : base_url().'assets/images/no-image.jpg'; ?>"/>
                                                      
                                                        </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists tooltips" data-dismiss="fileinput" data-original-title="Delete"><i class="fa fa-remove"></i>
                                                       </a>
                                                    </div>
                                                </div>
                                             
                                            </div>
                                    </div>
                                    
                                    
                                   
                                    
                                    
                                
                                    
                                  
                            
                                
                            
                         </div><!--col-md-4-->
                         <div class="col-md-8">
                         
                           
                                   <!-- <div class="form-group">
                                        <label class="control-label col-md-2">Date added</label>
                                        <div class="col-md-8">
                                            <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                <input type="text" class="form-control" readonly name="date_added" value="<?php //echo $input['a']['date_added'];?>">
                                                <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                          
                                            <span class="help-block">
                                            select a date </span>
                                        </div>
                                    </div>-->
                                    
                                    
                         
                         <div class="form-group" style="height:25px;">
                                      
                                </div>
                         
                        
                                      <!--  <div class="form-group">
                                        <label class="control-label col-md-2">URL Second</label>
                                        <div class="col-md-8">
                                            <input name="url_second" type="text" class="form-control" value="<?php echo $input['a']['url_second'];?>"/>
                                        </div>
                                    </div>
                                    
                                      <div class="form-group">
                                        <label class="control-label col-md-2">URL Third</label>
                                        <div class="col-md-8">
                                            <input name="url_third" type="text" class="form-control" value="<?php echo $input['a']['url_third'];?>"/>
                                        </div>
                                    </div>-->
                                    
                                    
                                     <div class="form-group">
                                        <label class="control-label col-md-2"><?php translate('website_ifrc_articles');?> 
                                        </label>
                                        <div class="col-md-4">
                                           
                                            <select class="form-control select2me" name="website" id="website">
                                                <option value=""></option>
                                                 <?php 
													
													foreach ($list_website as $key => $val)
													{
														$sel = $input['a']['website'] == $val['website'] ? ' selected="selected"' : '';
                        				echo '<option value="'.$val['website'].'"'.$sel.'>'.(string) $val['website']."</option>\n";    
													}
													?>
                                                
                                            </select>
                                         
                                        </div>
                                        
                                        <!--<div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" name="website_add_new" id="website_add_new" class="form-control">
                                                <div class="input-group-btn">
                                                    <button value_id="owner" type="button" class="btn green add-new-item tooltips" data-original-title="Add new item"><i class="fa fa-plus"></i></button>
                                                </div>
                                              
                                            </div>
                                          
                                        </div>-->
                                          <div class="col-md-4">
                                        	<a class="btn green" data-toggle="modal" href="#basic">
												Update websites </a>
                                        </div>
                                       	 <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header" style="background:#3598dc;">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title" style="color:#fff;">Update websites</h4>
										</div>
										<div class="modal-body">
											 <ul class="list-unstyled" id="unstyled">
                                             
                                             
                                              <li>
                                                    
                                                    <div class="portlet light" style="margin-bottom:5px; padding:12px 20px 1px; background:#3598dc; color:#fff;">
                                                    <div class="portlet-title" style="min-height:32px;">
                                                    <label>
  													<input type="checkbox" name="" value="checkall" id="checkall">Check all</label>
                                                    <div class="tools" style="padding:0px;">
                                                  
                                                	</div>
                                                    </div>
                                                    </div>
                                                </li>
                                             <?php 
											$array = explode(",",$input['a']['website']);
											$array_web = array();
											foreach($array as $val_web){
												$array_web[] = trim($val_web);	
											}
											 foreach($int_article_websites as $website){?>
                                                <li>
                                              <div class="portlet light" style="margin-bottom:5px; padding:12px 20px 1px;">
                                                    <div class="portlet-title" style="min-height:32px;">
                                                   <label>
  <input type="checkbox" name="category_web" value="<?php echo $website['name'];?>" <?php if(in_array($website['name'],$array_web)){ echo "checked='checked'"; }?> >
  													<?php echo $website['name'];?>
                                                    </label>
                                                    <div class="tools" style="padding:0px;">
                                                    <a title="Delete" data-original-title="Delete" id="<?php echo $website['id'];?>" class="remove remove_website" href="">
                                                    </a>
                                                	</div>
                                                    </div>
                                                    </div>
                                                   
                                                </li>
                                              <?php }?>
                                                
                                            </ul>
                                            
                                           <div class="form-group"> 
                                           <div class="col-md-12">
                                          <input class="form-control addweb" placeholder="Add website" type="text" data-tabindex="1">
                                          </div>
                                          </div>
                                         <button type="button" class="btn blue updaterows">Add new</button> 
                                           
										</div>
										<div class="modal-footer">
                                        <input type="hidden" id="web_check" name="web_check" value="<?php echo str_replace(" ","",$input['a']['website']) ?>" />
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="button" value_id="owner" class="btn green update-new-web">Save changes</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
                                    </div>
                                    
                                    
                                  <!--   <div class="form-group">
                                        <label class="control-label col-md-2">Par_cat_id </label>
                                        <div class="col-md-8">
                                            <input name="par_cat_id" type="text" class="form-control" value="<?php echo $input['a']['par_cat_id'];?>"/>
                                        </div>
                                    </div>-->
                                    
                                      <div class="form-group">
                                        <label class="control-label col-md-2"><?php translate('clean_cate_ifrc_articles');?> 
                                        </label>
                                        <div class="col-md-4">
                                           
                                            <select class="form-control select2me" name="clean_cat" id="clean_cat">
                                               <option value=""></option>
                                                 <?php 
												if(isset($input['a'])){
													foreach ($list_cat as $key => $val)
													{
														$sel = $input['a']['clean_cat'] == $val['clean_cat'] ? ' selected="selected"' : '';
                        				echo '<option value="'.$val['clean_cat'].'"'.$sel.'>'.(string) $val['clean_cat']."</option>\n";    
													}}
													?>
                                                
                                            </select>
                                         
                                        </div>
                                        
                                          <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" name="cat_add_new" id="cat_add_new" class="form-control">
                                                <div class="input-group-btn">
                                                    <button value_id="owner" type="button" class="btn green add-new-cat tooltips" data-original-title="Add new item"><!--Add new item--><i class="fa fa-plus"></i></button>
                                                </div>
                                                <!-- /btn-group -->
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                    </div>
                                    
                                       <!--<div class="form-group">
                                        <label class="control-label col-md-2"><?php translate('clean_cate_ifrc_articles');?> </label>
                                        <div class="col-md-8">
                                            <input name="clean_cat" type="text" class="form-control" value="<?php echo $input['a']['clean_cat'];?>"/>
                                        </div>
                                    </div>-->
                                    
                                    
                                     <div class="form-group">
                                        <label class="control-label col-md-2"><?php translate('clean_scate_ifrc_articles');?> 
                                        </label>
                                        <div class="col-md-4">
                                           
                                            <select class="form-control select2me" name="clean_scat" id="clean_scat">
                                               <option value=""></option>
                                                 <?php 
												if(isset($input['a'])){
													foreach ($list_scat as $key => $val)
													{
														$sel = $input['a']['clean_scat'] == $val['clean_scat'] ? ' selected="selected"' : '';
                        				echo '<option value="'.$val['clean_scat'].'"'.$sel.'>'.(string) $val['clean_scat']."</option>\n";    
													}}
													?>
                                                
                                            </select>
                                         
                                        </div>
                                        
                                          <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" name="cat_add_new" id="scat_add_new" class="form-control">
                                                <div class="input-group-btn">
                                                    <button value_id="owner" type="button" class="btn green add-new-scat tooltips" data-original-title="Add new item"><!--Add new item--><i class="fa fa-plus"></i></button>
                                                </div>
                                                <!-- /btn-group -->
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- <div class="form-group">
                                        <label class="control-label col-md-2"><?php translate('clean_scate_ifrc_articles');?></label>
                                        <div class="col-md-8">
                                            <input name="clean_scat" type="text" class="form-control" value="<?php echo $input['a']['clean_scat'];?>"/>
                                        </div>
                                    </div>
                                    -->
                                 
                        
                         </div><!--col-md-8-->
                         
                         
                         <div class="col-md-12">
                         
                         
                              <div class="form-group">
                                <label class="control-label col-md-2" style="margin-left:33px;"><?php translate('url_ifrc_articles');?></label>
                                <div class="col-md-9">
                                    <input name="url" type="text" class="form-control" value="<?php if(isset($input['a'])) echo $input['a']['url'];?>"/>
                                </div>
                            </div>
                            
                               <div class="form-group">
                                <label class="control-label col-md-2" style="margin-left:33px;"><?php translate('date_update_ifrc_articles');?></label>
                                <div class="col-md-9">
                                    <div class="input-icon"><i class="fa fa-calendar"></i>
                                    <input type="text" data-date-viewmode="years" id="date_update" name="date_update" readonly="readonly"  data-date-format="yyyy-mm-dd" data-date="<?php if(isset($input['a'])) echo $input['a']['date_update'];?>" value="<?php if(isset($input['a'])) echo $input['a']['date_update'];?>" size="16" class="form-control "></div>
                                </div>
                            </div>
                            
                              <div class="form-group">
                                <label class="control-label col-md-2" style="margin-left:33px;"><?php translate('date_add_ifrc_articles');?></label>
                                <div class="col-md-9">
                                    <div class="input-icon"><i class="fa fa-calendar"></i>
                                    <input type="text" data-date-viewmode="years" id="date_add" name="date_add"  data-date-format="yyyy-mm-dd" data-date="<?php if(isset($input['a'])) echo $input['a']['date_creation'];?>" value="<?php if(isset($input['a'])) echo $input['a']['date_creation'];?>" size="16" class="form-control date-picker"></div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group ">
                                            <label class="control-label col-md-2" style="margin-left:33px;"> <?php translate('file_ifrc_articles');?></label>
                                            <div class="col-md-9">
                                            
                                            	 <img style="height:1px; width:1px;" id="fil" src="<?php
                                                echo PATH_IFRC_ARTICLE;
                                                echo (isset($input['a']['file']) && $input['a']['file'] != '') ? str_replace(base_url(), "", $input['a']['file']) : 'assets/images/no-image.jpg';
                                            ?>" alt=""/>
                                            
                                                <div class="fileinput" data-provides="fileinput" data-name="myimage">
                                                
                                                <div id="file" class="fileinput-preview thumbnail" data-trigger="fileinput"  style="height:30px; width:200px;">
                                            <img id="img" src="" alt="" />
        									</div>
                                                
                                                    <div>
                                                        <span class="btn default blue btn-file ">
                                                        <i class="fa fa-edit"></i>
                                                       <!-- <span class="fileinput-new">
                                                        Select image </span>
                                                        <span class="fileinput-exists">
                                                        Change </span>-->
                                                        <input class="file_upload btn-icon-only tooltips" data-original-title="Select file change" type="file" name="files" id ="files" value="<?php echo isset($input['a']['file']) ? $input['a']['file'] : base_url().'assets/images/no-image.jpg'; ?>"/>
                                                      
                                                        </span>
                                                        <a href="javascript:;" class="btn red delete_file tooltips" data-dismiss="fileinput" data-original-title="Delete"><i class="fa fa-remove"></i>
                                                       </a>
                                                       <label class="name_file"><?php if(isset($input['a']['file'])) echo substr($input['a']['file'],21);?></label>
                                                    </div>
                                                </div>
                                             
                                            </div>
                                    </div>
                            
                            
                            
                            
                       </div><!--col-md-12-->
                  </div>      
             	</div><!--form-body-->
                  <div class="form-body"> 
                  
                     <div class="portlet-tabs">
                            <ul class="nav nav-tabs">
                            <?php 
							$i=1;
							//echo "<pre>";print_r($input);exit;
							if( isset($input) && is_array($input)){
							foreach($input as $val_ti){
								
								?>
                                <li <?php if($i == 1){?>class="active blue"<?php }?>>
                                    <a data-toggle="tab" href="#portlet_tab<?php echo $i;?>" aria-expanded="false">
									<?php if($val_ti['lang_code']=='en') echo "English";
									elseif($val_ti['lang_code']=='vn') echo "Việt Nam";
									else echo "France";
									  ?></a>
                                </li>
                              <?php $i++;}}?> 
                            </ul>
                            <div class="tab-content">
                             <?php 
							
							$i=1;
							if(isset($input) && is_array($input)){
							foreach($input as $val2){?>
                                <div id="portlet_tab<?php echo $i;?>" class="tab-pane <?php if($i == 1){?>active<?php }?>">
                                
								<div class="form-body" >
									<input type="hidden" id="info_ar" value="<?php //echo $info;?>"/>
									<div class="form-group">
										<label class="col-md-2 control-label"><?php translate('title_ifrc_articles');?></label>
										<div class="col-md-10">
											<input type="text" name="title_<?php echo $val2['lang_code'] ?>" id="title_<?php echo $val2['lang_code'] ?>" placeholder="Title" class="form-control" value="<?php echo $val2['title']; ?>">
										</div>
									</div>
								
								<div class="form-group">
										<label class="col-md-2 control-label" ><?php translate('description_ifrc_articles');?></label>
                                        	<!--<div class="col-md-10">
											<div name="summernote" id="summernote_1">
											</div>
										</div>-->
                                        <div class="col-md-10">
										<textarea rows="3" name="description_<?php echo $val2['lang_code'] ?>" id="description_<?php echo $val2['lang_code'] ?>" class=" ckeditor autosizeme"><?php echo $val2['description']; ?></textarea>
                                        </div>
									</div>
                                    
                                <div class="form-group">
										<label class="col-md-2 control-label" ><?php translate('long_description_ifrc_articles');?></label>
                                        <div class="col-md-10">
										<textarea rows="12" name="long_description_<?php echo $val2['lang_code'] ?>" id="long_description_<?php echo $val2['lang_code'] ?>" class="form-control ckeditor autosizeme"><?php echo $val2['long_description']; ?></textarea>
                                        </div>
									</div>
								
								
                                
                                
                           <!--     <div class="form-group">
										<label class="col-md-2 control-label">Meta keyword:</label>
										<div class="col-md-10">
											<input type="text" name="meta_keyword_<?php echo $val2['lang_code'] ?>" id="meta_keyword_<?php echo $val2['lang_code'] ?>" placeholder="Meta keyword" class="form-control" value="<?php echo $val2['meta_keyword']; ?>">
										</div>
									</div>
                                    
                                        <div class="form-group">
										<label class="col-md-2 control-label">Meta description:</label>
										<div class="col-md-10">
											<input type="text" name="meta_description_<?php echo $val2['lang_code'] ?>" id="meta_description_<?php echo $val2['lang_code'] ?>" placeholder="Meta description" class="form-control" value="<?php echo $val2['meta_description']; ?>">
										</div>
									</div>
                                    -->
                                    
                                   
								</div>
							
                                </div><!--portlet_tab1-->
                                 <?php $i++;}}?> 
                            </div>
                        </div>  <!--portlet-tabs-->  
                  
                        </div><!--.form-body-->    
                        <div class="form-actions right">
									<button class="btn blue submit_article sub-apso" type="submit" value="ok" id="save_article" name="ok">Save changes</button>
									<button class="btn blue submit_article" type="submit" value="ok" id="save_article" name="ok">Save changes</button>
                                     <a class="btn red sub-apso2" href="<?php echo base_url();?>vnxindex/ifrc_articles/?<?php echo $get_filter;?>">Close</a>
                                   <a class="btn red" href="<?php echo base_url();?>vnxindex/ifrc_articles/?<?php echo $get_filter;?>">Close</a>
								</div> 
               
            </form>
				<!-- END FORM--> 
               
			</div>
			<!-- END VALIDATION STATES-->
		</div>
	</div>
</div>


                                        
                                        
                                        
                                        
                                         
        </div><!--portlet-body form-->
</div><!--portlet box blue-->
