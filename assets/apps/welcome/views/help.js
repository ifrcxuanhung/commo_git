define([
    'jquery',
    'underscore',
    'backbone'
    ], function($, _, Backbone){
        var helpView = Backbone.View.extend({
            el: $(".main-container"),
            initialize: function() {

            },
            events: {
                "click a.show-modal": "actionShowModal",
                "click .save-modal": "actionSaveModal",
				"click .handel_help": "actionHandelhelp",
				
            },
			
			actionHandelhelp: function(event){
				var $this = $(event.currentTarget);
				var id = $this.attr('id');
				 $.ajax({
					url: $base_url + 'help/get_faq',
					type: 'POST',
					data: {id:id},
					cache: false,
					success: function(response) {
						rs = JSON.parse(response);
						console.log(rs);
						$('.title_help').html(rs.name);
						$('.description_help').html(rs.info);
					}
				});
					
			},
            actionSaveModal: function(event){
				event.preventDefault();
				$("#check_modal").submit(function(e) {                       
						for ( instance in CKEDITOR.instances )
						{
							CKEDITOR.instances[instance].updateElement();
						}
						var formData = new FormData(this);
                        $.ajax({
                            url: $base_url + 'ajax/update_modal',
                            type: 'POST',
                            mimeType: "multipart/form-data",
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(response) {
								rs = JSON.parse(response);
                                if(rs.status == true) {
									$("div.alert-success").text('Updated!');
									$("div.alert-success").fadeIn();
									var table = $('#table').DataTable();
									table.draw( false );
									$('#modal').modal('hide');
									var category_pa = $("[aria-expanded='true']").attr("href");
									var category_child = $("#id").val();
									//console.log(category_child);
									//window.location.reload($base_url+"help/"+category_pa+category_child);
									
									window.location.replace($base_url+"help/"+category_pa+category_child);
									window.location.reload();
									window.location.replace($base_url+"help/"+category_pa+category_child);
									
									
									
								} else {
									$("div.alert-success").text("Update fail");
									$("div.alert-danger").fadeIn();
								}
								$("div.alert").delay(1500).fadeOut();
                            }
                        });
                        e.preventDefault();
                    });
                    $("#check_modal").submit();
			},
            actionShowModal: function(event) {
                var $this = $(event.currentTarget);
                var type = $this.attr("type-modal");
				var validate = $this.attr("keys_value");
                $.ajax({
                    url: $base_url + "ajax/show_modal",
                    type: "POST",
                    data: {table_name: $this.attr("table_name"), keys_value: $this.attr("keys_value")},
                    async: false,
                    success: function(response) {
                        $("#modal .modal-content").html(response);	
                        if (jQuery().datepicker) {
                                $('.date-picker').datepicker({
                                    orientation: "left",
                                    autoclose: true
                                });
                                $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
                        } 
                       
                          
                    }
                });
                $('.ckeditor').each(function(index, value){
                	CKEDITOR.replace( $(this).attr('name'), {
                		height : 150,
                		colorButton_foreStyle : {
                			element: 'font',
                			attributes: { 'color': '#(color)' }
                		},
                		colorButton_backStyle : {
                			element: 'font',
                			styles: { 'background-color': '#(color)' }
                		}
                       
                	});
                });
            },
            index: function(){
               
               $(document).ready(function(){
				   setInterval(function(){
						var data='';
						 $.ajax({
							url: $simulation_url + 'dashboard/auto_data_dashboard',
							dataType: 'json',
							success: function(data) {
								clearconsole();	
								if($('.dash_0_lb1').text()!==data.data_dashboard_0.lable_1){
									$('.dash_0_lb1').fadeOut('slow', function() {						
										$('.dash_0_lb1').html(data.data_dashboard_0.lable_1);
										$('.dash_0_lb1').fadeIn('slow');
									});
								}
								if($('.dash_0_lb2').text()!==data.data_dashboard_0.lable_2){
									$('.dash_0_lb2').fadeOut('slow', function() {						
										$('.dash_0_lb2').html(data.data_dashboard_0.lable_2);
										$('.dash_0_lb2').fadeIn('slow');
									});
								}
								if($('#dash_0_lb3').text()!==data.data_dashboard_0.lable_3){
									$('#dash_0_lb3').fadeOut('slow', function() {
										$('#dash_0_lb3').html(data.data_dashboard_0.lable_3);
										$('#dash_0_lb3').fadeIn('slow');
									});
								}
								if($('.dash_0_lb4').text()!==data.data_dashboard_0.lable_4){
									$('.dash_0_lb4').fadeOut('slow', function() {						
										$('.dash_0_lb4').html(data.data_dashboard_0.lable_4);
										$('.dash_0_lb4').fadeIn('slow');
									});
								}
								if($('.dash_0_lb5').text()!==data.data_dashboard_0.lable_5){
									$('.dash_0_lb5').fadeOut('slow', function() {						
										$('.dash_0_lb5').html(data.data_dashboard_0.lable_5);
										$('.dash_0_lb5').fadeIn('slow');
									});
								}
								if($('.dash_0_lb6').text()!==data.data_dashboard_0.lable_6){
									$('.dash_0_lb6').fadeOut('slow', function() {						
										$('.dash_0_lb6').html(data.data_dashboard_0.lable_6);
										$('.dash_0_lb6').fadeIn('slow');
									});
								}
								
								if($('.dash_0_lb7').text()!==data.data_dashboard_0.lable_7){
									$('.dash_0_lb7').fadeOut('slow', function() {						
										$('.dash_0_lb7').html(data.data_dashboard_0.lable_7);
										$('.dash_0_lb7').fadeIn('slow');
									});
								}
								if($('.dash_0_lb8').text()!==data.data_dashboard_0.lable_8){
									$('.dash_0_lb8').fadeOut('slow', function() {						
										$('.dash_0_lb8').html(data.data_dashboard_0.lable_8);
										$('.dash_0_lb8').fadeIn('slow');
									});
								}
								if($('.dash_0_lb9').text()!==data.data_dashboard_0.lable_9){
									$('.dash_0_lb9').fadeOut('slow', function() {						
										$('.dash_0_lb9').html(data.data_dashboard_0.lable_9);
										$('.dash_0_lb9').fadeIn('slow');
									});
								}
								if($('.dash_0_lb10').text()!==data.data_dashboard_0.lable_10){
									$('.dash_0_lb10').fadeOut('slow', function() {						
										$('.dash_0_lb10').html(data.data_dashboard_0.lable_10);
										$('.dash_0_lb10').fadeIn('slow');
									});
								}
								/* box 2 */
								if($('.dash_1_lb1').text()!==data.data_dashboard_1.lable_1){
									$('.dash_1_lb1').fadeOut('slow', function() {						
										$('.dash_1_lb1').html(data.data_dashboard_1.lable_1);
										$('.dash_1_lb1').fadeIn('slow');
									});
								}
								if($('.dash_1_lb2').text()!==data.data_dashboard_1.lable_2){
									$('.dash_1_lb2').fadeOut('slow', function() {						
										$('.dash_1_lb2').html(data.data_dashboard_1.lable_2);
										$('.dash_1_lb2').fadeIn('slow');
									});
								}
								if($('#dash_1_lb3').text()!==data.data_dashboard_1.lable_3){
									$('#dash_1_lb3').fadeOut('slow', function() {						
										$('#dash_1_lb3').html(data.data_dashboard_1.lable_3);
										$('#dash_1_lb3').fadeIn('slow');
									});
								}
								if($('.dash_1_lb4').text()!==data.data_dashboard_1.lable_4){
									$('.dash_1_lb4').fadeOut('slow', function() {						
										$('.dash_1_lb4').html(data.data_dashboard_1.lable_4);
										$('.dash_1_lb4').fadeIn('slow');
									});
								}
								if($('.dash_1_lb5').text()!==data.data_dashboard_1.lable_5){
									$('.dash_1_lb5').fadeOut('slow', function() {						
										$('.dash_1_lb5').html(data.data_dashboard_1.lable_5);
										$('.dash_1_lb5').fadeIn('slow');
									});
								}
								if($('.dash_1_lb6').text()!==data.data_dashboard_1.lable_6){
									$('.dash_1_lb6').fadeOut('slow', function() {						
										$('.dash_1_lb6').html(data.data_dashboard_1.lable_6);
										$('.dash_1_lb6').fadeIn('slow');
									});
								}
								if($('.dash_1_lb7').text()!==data.data_dashboard_1.lable_7){
									$('.dash_1_lb7').fadeOut('slow', function() {						
										$('.dash_1_lb7').html(data.data_dashboard_1.lable_7);
										$('.dash_1_lb7').fadeIn('slow');
									});
								}
								if($('.dash_1_lb8').text()!==data.data_dashboard_1.lable_8){
									$('.dash_1_lb8').fadeOut('slow', function() {						
										$('.dash_1_lb8').html(data.data_dashboard_1.lable_8);
										$('.dash_1_lb8').fadeIn('slow');
									});
								}
								if($('.dash_1_lb9').text()!==data.data_dashboard_1.lable_9){
									$('.dash_1_lb9').fadeOut('slow', function() {						
										$('.dash_1_lb9').html(data.data_dashboard_1.lable_9);
										$('.dash_1_lb9').fadeIn('slow');
									});
								}
								if($('.dash_1_lb10').text()!==data.data_dashboard_1.lable_10){
									$('.dash_1_lb10').fadeOut('slow', function() {						
										$('.dash_1_lb10').html(data.data_dashboard_1.lable_10);
										$('.dash_1_lb10').fadeIn('slow');
									});
								}
								/* box 3 */
								
								if($('.dash_2_lb1').text()!==data.data_dashboard_2.lable_1){
									$('.dash_2_lb1').fadeOut('slow', function() {						
										$('.dash_2_lb1').html(data.data_dashboard_2.lable_1);
										$('.dash_2_lb1').fadeIn('slow');
									});
								}
								if($('.dash_2_lb2').text()!==data.data_dashboard_2.lable_2){
									$('.dash_2_lb2').fadeOut('slow', function() {						
										$('.dash_2_lb2').html(data.data_dashboard_2.lable_2);
										$('.dash_2_lb2').fadeIn('slow');
									});
								}
								if($('#dash_2_lb3').text()!==data.data_dashboard_2.lable_3){
									$('#dash_2_lb3').fadeOut('slow', function() {						
										$('#dash_2_lb3').html(data.data_dashboard_2.lable_3);
										$('#dash_2_lb3').fadeIn('slow');
									});
								}
								if($('.dash_2_lb4').text()!==data.data_dashboard_2.lable_4){
									$('.dash_2_lb4').fadeOut('slow', function() {						
										$('.dash_2_lb4').html(data.data_dashboard_2.lable_4);
										$('.dash_2_lb4').fadeIn('slow');
									});
								}
								if($('.dash_2_lb5').text()!==data.data_dashboard_2.lable_5){
									$('.dash_2_lb5').fadeOut('slow', function() {						
										$('.dash_2_lb5').html(data.data_dashboard_2.lable_5);
										$('.dash_2_lb5').fadeIn('slow');
									});
								}
								if($('.dash_2_lb6').text()!==data.data_dashboard_2.lable_6){
									$('.dash_2_lb6').fadeOut('slow', function() {						
										$('.dash_2_lb6').html(data.data_dashboard_2.lable_6);
										$('.dash_2_lb6').fadeIn('slow');
									});
								}
								if($('.dash_2_lb7').text()!==data.data_dashboard_2.lable_7){
									$('.dash_2_lb7').fadeOut('slow', function() {						
										$('.dash_2_lb7').html(data.data_dashboard_2.lable_7);
										$('.dash_2_lb7').fadeIn('slow');
									});
								}
								if($('.dash_2_lb8').text()!==data.data_dashboard_2.lable_8){
									$('.dash_2_lb8').fadeOut('slow', function() {						
										$('.dash_2_lb8').html(data.data_dashboard_2.lable_8);
										$('.dash_2_lb8').fadeIn('slow');
									});
								}
								if($('.dash_2_lb9').text()!==data.data_dashboard_2.lable_9){
									$('.dash_2_lb9').fadeOut('slow', function() {						
										$('.dash_2_lb9').html(data.data_dashboard_2.lable_9);
										$('.dash_2_lb9').fadeIn('slow');
									});
								}
								if($('.dash_2_lb10').text()!==data.data_dashboard_2.lable_10){
									$('.dash_2_lb10').fadeOut('slow', function() {						
										$('.dash_2_lb10').html(data.data_dashboard_2.lable_10);
										$('.dash_2_lb10').fadeIn('slow');
									});
								}
								/* box 4 */
								if($('.dash_3_lb1').text()!==data.data_dashboard_3.lable_1){
									$('.dash_3_lb1').fadeOut('slow', function() {						
										$('.dash_3_lb1').html(data.data_dashboard_3.lable_1);
										$('.dash_3_lb1').fadeIn('slow');
									});
								}
								if($('.dash_3_lb2').text()!==data.data_dashboard_3.lable_2){
									$('.dash_3_lb2').fadeOut('slow', function() {						
										$('.dash_3_lb2').html(data.data_dashboard_3.lable_2);
										$('.dash_3_lb2').fadeIn('slow');
									});
								}
								if($('#dash_3_lb3').text()!==data.data_dashboard_3.lable_3){
									$('#dash_3_lb3').fadeOut('slow', function() {						
										$('#dash_3_lb3').html(data.data_dashboard_3.lable_3);
										$('#dash_3_lb3').fadeIn('slow');
									});
								}
								if($('.dash_3_lb4').text()!==data.data_dashboard_3.lable_4){
									$('.dash_3_lb4').fadeOut('slow', function() {						
										$('.dash_3_lb4').html(data.data_dashboard_3.lable_4);
										$('.dash_3_lb4').fadeIn('slow');
									});
								}
								if($('.dash_3_lb5').text()!==data.data_dashboard_3.lable_5){
									$('.dash_3_lb5').fadeOut('slow', function() {						
										$('.dash_3_lb5').html(data.data_dashboard_3.lable_5);
										$('.dash_3_lb5').fadeIn('slow');
									});
								}
								if($('.dash_3_lb6').text()!==data.data_dashboard_3.lable_6){
									$('.dash_3_lb6').fadeOut('slow', function() {						
										$('.dash_3_lb6').html(data.data_dashboard_3.lable_6);
										$('.dash_3_lb6').fadeIn('slow');
									});
								}
								if($('.dash_3_lb7').text()!==data.data_dashboard_3.lable_7){
									$('.dash_3_lb7').fadeOut('slow', function() {						
										$('.dash_3_lb7').html(data.data_dashboard_3.lable_7);
										$('.dash_3_lb7').fadeIn('slow');
									});
								}
								if($('.dash_3_lb8').text()!==data.data_dashboard_3.lable_8){
									$('.dash_3_lb8').fadeOut('slow', function() {						
										$('.dash_3_lb8').html(data.data_dashboard_3.lable_8);
										$('.dash_3_lb8').fadeIn('slow');
									});
								}
								if($('.dash_3_lb9').text()!==data.data_dashboard_3.lable_9){
									$('.dash_3_lb9').fadeOut('slow', function() {						
										$('.dash_3_lb9').html(data.data_dashboard_3.lable_9);
										$('.dash_3_lb9').fadeIn('slow');
									});
								}
								if($('.dash_3_lb10').text()!==data.data_dashboard_3.lable_10){
									$('.dash_3_lb10').fadeOut('slow', function() {						
										$('.dash_3_lb10').html(data.data_dashboard_3.lable_10);
										$('.dash_3_lb10').fadeIn('slow');
									});
								}
																
							}
						});
					}, 2000);
               });
            },
            render: function(){
                if(typeof this[$app.action] != 'undefined'){
                    new this[$app.action];
                }
            }
        });
    return new helpView;
});