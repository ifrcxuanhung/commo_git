define([
    'jquery',
    'underscore',
    'backbone'
    ], function($, _, Backbone){
        var productView = Backbone.View.extend({
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
					url: $base_url + 'product/getContentDataNews',
					type: 'POST',
					data: {id:id},
					cache: false,
					success: function(response) {
						rs = JSON.parse(response);
						console.log(rs);
						$('.description_help').html(rs.content);
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
					var bctcode = $("#bctcode").attr('code');
				   setInterval(function(){
						var data='';
						 $.ajax({
							url: $simulation_url + 'dashboard/auto_data_dashboard',
							dataType: 'POST',
							 data:{bctcode:bctcode},
							success: function(data) {
								
								clearconsole();	
								if($('.dash_0_lb1').text()!==data.data_dashboard_name){
									$('.dash_0_lb1').fadeOut('slow', function() {
										$('.dash_0_lb1').html(data.data_dashboard_name);
										$('.dash_0_lb1').fadeIn('slow');
									});
								}
								if($('.dash_0_lb2').text()!==data.data_dashboard_unit){
									$('.dash_0_lb2').fadeOut('slow', function() {						
										$('.dash_0_lb2').html(data.data_dashboard_unit);
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
								/*if($('.dash_0_lb10').text()!==data.data_dashboard_0.lable_10){
									$('.dash_0_lb10').fadeOut('slow', function() {
										$('.dash_0_lb10').html(data.data_dashboard_0.lable_10);
										$('.dash_0_lb10').fadeIn('slow');
									});
								}*/
								if($('.dash_0_exchang').text()!==data.data_dashboard_0.exchange){
									$('.dash_0_exchang').fadeOut('slow', function() {						
										$('.dash_0_exchang').html(data.data_dashboard_0.exchange);
										$('.dash_0_exchang').fadeIn('slow');
									});
								}
								if($('.dash_0_expiry').text()!==data.data_dashboard_0.expiry){
									$('.dash_0_expiry').fadeOut('slow', function() {						
										$('.dash_0_expiry').html(data.data_dashboard_0.expiry);
										$('.dash_0_expiry').fadeIn('slow');
									});
								}
								if($('.dash_0_change').text()!==data.data_dashboard_0.change){
									$('.dash_0_change').fadeOut('slow', function() {						
										$('.dash_0_change').html(data.data_dashboard_0.change);
										$('.dash_0_change').fadeIn('slow');
									});
								}
								if($('.dash_0_var').text()!==data.data_dashboard_0.var){
									$('.dash_0_var').fadeOut('slow', function() {						
										$('.dash_0_var').html(data.data_dashboard_0.var);
										$('.dash_0_var').fadeIn('slow');
									});
								}
								if($('.dash_0_lasttimex').text()!==data.data_dashboard_0.lasttimex){
									$('.dash_0_lasttimex').fadeOut('slow', function() {						
										$('.dash_0_lasttimex').html(data.data_dashboard_0.lasttimex);
										$('.dash_0_lasttimex').fadeIn('slow');
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
								if($('.dash_1_exchang').text()!==data.data_dashboard_1.exchange){
									$('.dash_1_exchang').fadeOut('slow', function() {						
										$('.dash_1_exchang').html(data.data_dashboard_1.exchange);
										$('.dash_1_exchang').fadeIn('slow');
									});
								}
								if($('.dash_1_expiry').text()!==data.data_dashboard_1.expiry){
									$('.dash_1_expiry').fadeOut('slow', function() {						
										$('.dash_1_expiry').html(data.data_dashboard_1.expiry);
										$('.dash_1_expiry').fadeIn('slow');
									});
								}
								if($('.dash_1_change').text()!==data.data_dashboard_1.change){
									$('.dash_1_change').fadeOut('slow', function() {						
										$('.dash_1_change').html(data.data_dashboard_1.change);
										$('.dash_1_change').fadeIn('slow');
									});
								}
								if($('.dash_1_var').text()!==data.data_dashboard_1.var){
									$('.dash_1_var').fadeOut('slow', function() {						
										$('.dash_1_var').html(data.data_dashboard_1.var);
										$('.dash_1_var').fadeIn('slow');
									});
								}
								if($('.dash_1_lasttimex').text()!==data.data_dashboard_1.lasttimex){
									$('.dash_1_lasttimex').fadeOut('slow', function() {						
										$('.dash_1_lasttimex').html(data.data_dashboard_1.lasttimex);
										$('.dash_1_lasttimex').fadeIn('slow');
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
								if($('.dash_2_exchang').text()!==data.data_dashboard_2.exchange){
									$('.dash_2_exchang').fadeOut('slow', function() {						
										$('.dash_2_exchang').html(data.data_dashboard_2.exchange);
										$('.dash_2_exchang').fadeIn('slow');
									});
								}
								if($('.dash_2_expiry').text()!==data.data_dashboard_2.expiry){
									$('.dash_2_expiry').fadeOut('slow', function() {						
										$('.dash_2_expiry').html(data.data_dashboard_2.expiry);
										$('.dash_2_expiry').fadeIn('slow');
									});
								}
								if($('.dash_2_change').text()!==data.data_dashboard_2.change){
									$('.dash_2_change').fadeOut('slow', function() {						
										$('.dash_2_change').html(data.data_dashboard_2.change);
										$('.dash_2_change').fadeIn('slow');
									});
								}
								if($('.dash_2_var').text()!==data.data_dashboard_2.var){
									$('.dash_2_var').fadeOut('slow', function() {						
										$('.dash_2_var').html(data.data_dashboard_2.var);
										$('.dash_2_var').fadeIn('slow');
									});
								}
								if($('.dash_2_lasttimex').text()!==data.data_dashboard_2.lasttimex){
									$('.dash_2_lasttimex').fadeOut('slow', function() {						
										$('.dash_2_lasttimex').html(data.data_dashboard_2.lasttimex);
										$('.dash_2_lasttimex').fadeIn('slow');
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
								if($('.dash_3_exchang').text()!==data.data_dashboard_3.exchange){
									$('.dash_3_exchang').fadeOut('slow', function() {						
										$('.dash_3_exchang').html(data.data_dashboard_3.exchange);
										$('.dash_3_exchang').fadeIn('slow');
									});
								}
								if($('.dash_3_expiry').text()!==data.data_dashboard_3.expiry){
									$('.dash_3_expiry').fadeOut('slow', function() {						
										$('.dash_3_expiry').html(data.data_dashboard_3.expiry);
										$('.dash_3_expiry').fadeIn('slow');
									});
								}
								if($('.dash_3_change').text()!==data.data_dashboard_3.change){
									$('.dash_3_change').fadeOut('slow', function() {						
										$('.dash_3_change').html(data.data_dashboard_3.change);
										$('.dash_3_change').fadeIn('slow');
									});
								}
								if($('.dash_3_var').text()!==data.data_dashboard_3.var){
									$('.dash_3_var').fadeOut('slow', function() {						
										$('.dash_3_var').html(data.data_dashboard_3.var);
										$('.dash_3_var').fadeIn('slow');
									});
								}
								if($('.dash_3_lasttimex').text()!==data.data_dashboard_3.lasttimex){
									$('.dash_3_lasttimex').fadeOut('slow', function() {						
										$('.dash_3_lasttimex').html(data.data_dashboard_3.lasttimex);
										$('.dash_3_lasttimex').fadeIn('slow');
									});
								}
																
							
							}
						});
					}, 2000);


                   //dashboard list 1
                   /*setInterval(function(){
                       var data='';
                       $.ajax({
                           url: $simulation_url + 'product/auto_data_dashboard_list_table_1',
                           dataType: 'json',
                           success: function(data) {
                               clearconsole();
                               $.each($('.table_1_name'), function() {
                                   var key = this.id.split("table_1_name_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].name){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].name);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });
                               $.each($('.table_1_exchange'), function() {
                                   //console.log( this.id );
                                   var key = this.id.split("table_1_exchange_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].exchange){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].exchange);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });
                               $.each($('.table_1_expiry'), function() {
                                   //console.log( this.id );
                                   var key = this.id.split("table_1_expiry_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].expiry){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].expiry);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });
                               $.each($('.table_1_code'), function() {
                                   //console.log( this.id );
                                   var key = this.id.split("table_1_code_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].code){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].code);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });

                               $.each($('.table_1_last'), function() {
                                   //console.log( this.id );
                                   var key = this.id.split("table_1_last_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].last){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].last);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });
                               $.each($('.table_1_volume'), function() {
                                   //console.log( this.id );
                                   var key = this.id.split("table_1_volume_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].volume){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].volume);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });
                               $.each($('.table_1_openinterest'), function() {
                                   //console.log( this.id );
                                   var key = this.id.split("table_1_openinterest_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].openinterest){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].openinterest);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });
                               $.each($('.table_1_settlement'), function() {
                                   //console.log( this.id );
                                   var key = this.id.split("table_1_settlement_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].settlement){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].settlement);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });
                               $.each($('.table_1_lasttimex'), function() {
                                   //console.log( this.id );
                                   var key = this.id.split("table_1_lasttimex_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].lasttimex){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].lasttimex);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });

                               $.each($('.table_1_lastvar'), function() {
                                   //console.log( this.id );
                                   var key = this.id.split("table_1_lastvar_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].lastvar){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).removeClass('bg_color_red');
                                           if(data.data_table_1[key].lastvar< 0) $('#'+this.id).addClass('bg_color_red');
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].lastvar);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });
                               $.each($('.table_1_lastchange'), function() {
                                   //console.log( this.id );
                                   var key = this.id.split("table_1_lastchange_")[1];
                                   if($('#'+this.id).text()!==data.data_table_1[key].lastchange){
                                       $('#'+this.id).fadeOut('slow', function() {
                                           $('#'+this.id).removeClass('bg_color_red');
                                           if(data.data_table_1[key].lastchange< 0) $('#'+this.id).addClass('bg_color_red');
                                           $('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
                                           $('#'+this.id).html(data.data_table_1[key].lastchange);
                                           $('#'+this.id).fadeIn('slow');
                                       });

                                   }
                               });

                               $('#d2_box_category1').html(data.table1);
                           }
                       });
                   }, 4000);*/
					
					//dashboard list 1
					setInterval(function(){
						var data='';
						 $.ajax({
							url: $simulation_url + 'product/auto_data_dashboard_list_table_1',
							dataType: 'json',
							success: function(data) {
								clearconsole();								
								$.each($('.table_1_name'), function() {
									var key = this.id.split("table_1_name_")[1]; 
									if($('#'+this.id).text()!==data.data_table_1[key].name){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].name);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});

								$.each($('.table_1_date'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_date_")[1]; 
									if($('#'+this.id).text()!==data.data_table_1[key].date){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].date);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								}); 
								
								$.each($('.table_1_code'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_code_")[1]; 
									if($('#'+this.id).text()!==data.data_table_1[key].code){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].code);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$.each($('.table_1_last'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_last_")[1]; 
									if($('#'+this.id).text()!==data.data_table_1[key].last){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].last);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.table_1_volume'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_volume_")[1]; 
									if($('#'+this.id).text()!==data.data_table_1[key].volume){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].volume);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.table_1_openinterest'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_openinterest_")[1]; 
									if($('#'+this.id).text()!==data.data_table_1[key].openinterest){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].openinterest);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.table_1_pclose'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_pclose_")[1];
									if($('#'+this.id).text()!==data.data_table_1[key].pclose){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].pclose);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.table_1_mon'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_mon_")[1]; 
									if($('#'+this.id).text()!==data.data_table_1[key].mon){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].mon);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$.each($('.table_1_var'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_var_")[1]; 
									if($('#'+this.id).text()!==data.data_table_1[key].var){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).removeClass('bg_color_red');
											if(data.data_table_1[key].var< 0) $('#'+this.id).addClass('bg_color_red');
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].var);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.table_1_change'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_change_")[1]; 
									if($('#'+this.id).text()!==data.data_table_1[key].change){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).removeClass('bg_color_red');
											if(data.data_table_1[key].change< 0) $('#'+this.id).addClass('bg_color_red');
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].change);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$('#d2_box_category1').html(data.table1);							
							}
						});
					}, 4000);
					//chart

                   var chartcode = $("#get_chartcode").attr("value");

                   var last_new;
                   var time_new;
                   function getvalueCHART(){
                       //console.log(code_chart);
                       return $.ajax({
                           url: $base_url + "ajax/getSpectIntraday_product1",
                           type: "POST",
                           data: {chartcode:chartcode},
                           async: false
                       });
                   }

                   var chartData = generateChartData();

                   var chart = AmCharts.makeChart("chartdiv5", {
                       "type": "serial",
                       "theme": "none",
                       "marginRight": 40,
                       "marginLeft": 60,
                       "autoMarginOffset": 20,
                       "dataProvider": chartData,
                       "valueAxes": [ {
                           "id": "v1",
                           "axisAlpha": 0,
                           "position": "left",
                           "ignoreAxisWidth": true
                       } ],
                       "balloon": {
                           "borderThickness": 1,
                           "shadowAlpha": 0
                       },
                       "graphs": [ {
                           "id": "g1",
                           "balloon": {
                               "drop": true,
                               "adjustBorderColor": false,
                               "color": "#ffffff",
                               "type": "smoothedLine"
                           },
                           "fillAlphas": 0.2,
                           "bullet": "round",
                           "bulletBorderAlpha": 1,
                           "bulletColor": "#FFFFFF",
                           "bulletSize": 5,
                           "hideBulletsCount": 50,
                           "lineThickness": 2,
                           "title": "red line",
                           "useLineColorForBulletBorder": true,
                           "valueField": "close",
                           "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
                       } ],
                       "chartScrollbar": {
                           "graph": "g1",
                           "oppositeAxis":false,
                           "offset":30,
                           "scrollbarHeight": 30,
                           "backgroundAlpha": 0,
                           "selectedBackgroundAlpha": 0.1,
                           "selectedBackgroundColor": "#888888",
                           "graphFillAlpha": 0,
                           "graphLineAlpha": 0.5,
                           "selectedGraphFillAlpha": 0,
                           "selectedGraphLineAlpha": 1,
                           "autoGridCount":true,
                           "color":"#AAAAAA"
                       },
                       "chartCursor": {
                           "valueLineEnabled": true,
                           "valueLineBalloonEnabled": true,
                           "cursorAlpha": 0,
                           "zoomable": false,
                           "valueZoomable": true,
                           "valueLineAlpha": 0.5,
                           "categoryBalloonDateFormat": "JJ:NN:SS, DD MMMM",
                           "cursorPosition": "mouse"
                       },
                       "valueScrollbar": {
                           "autoGridCount": true,
                           "color": "#000000",
                           "scrollbarHeight": 50
                       },
                       "categoryField": "date",
                       "categoryAxis": {
                           "minPeriod": "mm",
                           "parseDates": true,
                           "dashLength": 1,
                           "minorGridEnabled": true
                       }
                   });

                   chart.addListener("dataUpdated", zoomChart);
                   zoomChart();
                   function zoomChart() {
                     //  chart.zoomToIndexes(chartData.length - 250, chartData.length - 100);
                   }
                   function generateChartData() {
                       var chartData = [];

                       var data = jQuery.parseJSON(getvalueCHART().responseText);
                       var res = [];
                       for (var i = 1; i < data.length; ++i){

                           var date = data[i].date;
                           chartData.push({'date':date,'close': parseFloat(data[i].close).toFixed(2)})

                       }
                       return chartData;
                   }

                   //end chart

				   // chart 2

                   function getvalueCHART_2(){
                       //console.log(code_chart);
                       return $.ajax({
                           url: $base_url + "ajax/getSpectIntraday_product2",
                           type: "POST",
                           data: {chartcode:chartcode},
                           async: false
                       });
                   }

                   var data2 = jQuery.parseJSON(getvalueCHART_2().responseText);
                   // console.log(data1);

                   var res = [];
                   for (var i = 1; i < data2.length; ++i){

                       var date = data2[i].date;
                       res.push({'time':date,'value': parseFloat(data2[i].close).toFixed(2)});
                       var code = data2[i].code;
                       var chartcode = data2[i].chartcode;
                       if (i==(data2.length-1)) { last_new  = data2[i].close;  time_new = data2[i].date}
                   }


                   function showChartTooltip(x, y, xValue, yValue) {
                       $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                           position: 'absolute',
                           display: 'none',
                           top: y - 40,
                           left: x - 40,
                           border: '0px solid #ccc',
                           padding: '2px 6px',
                           'background-color': '#fff'
                       }).appendTo("body").fadeIn(200);
                   }
                   if ($('#chartdiv8').size() != 0) {


                       $('#site_statistics_loading').hide();
                       $('#site_statistics_content').show();

                       var chart = AmCharts.makeChart( "chartdiv8", {
                           "type": "serial",
                           "theme": "none",
                           "marginRight": 40,
                           "marginLeft": 70,
                           "autoMarginOffset": 20,
                           "dataDateFormat": "YYYY-MM-DD",
                           "valueAxes": [ {
                               "id": "v1",
                               "axisAlpha": 0,
                               "position": "left",
                               "ignoreAxisWidth": true
                           } ],
                           "balloon": {
                               "borderThickness": 1,
                               "shadowAlpha": 0,
                           },
                           "graphs": [ {
                               "id": "g1",
                               "balloon": {
                                   "drop": true,
                                   "adjustBorderColor": false,
                                   "color": "#ffffff",
                                   "type": "smoothedLine"
                               },
                               "fillAlphas": 0.2,
                               "bullet": "round",
                               "bulletBorderAlpha": 1,
                               "bulletColor": "#FFFFFF",
                               "bulletSize": 5,
                               "hideBulletsCount": 50,
                               "lineThickness": 2,
                               "title": "red line",
                               "useLineColorForBulletBorder": true,
                               "valueField": "value",
                               "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
                           } ],
                           "chartScrollbar": {
                               "graph": "g1",
                               "oppositeAxis":true,
                               "offset":30,
                               "scrollbarHeight": 30,
                               "backgroundAlpha": 0,
                               "selectedBackgroundAlpha": 0.1,
                               "selectedBackgroundColor": "#888888",
                               "graphFillAlpha": 0,
                               "graphLineAlpha": 0.5,
                               "selectedGraphFillAlpha": 0,
                               "selectedGraphLineAlpha": 1,
                               "autoGridCount":true,
                               "color":"#AAAAAA"
                           },
                           "chartCursor": {
                               "valueLineEnabled": true,
                               "valueLineBalloonEnabled": true,
                               "cursorAlpha": 0,
                               "zoomable": false,
                               "valueZoomable": true,
                               "valueLineAlpha": 0.5
                           },
                           "valueScrollbar": {
                               "autoGridCount": true,
                               "color": "#000000",
                               "scrollbarHeight": 50
                           },
                           "categoryField": "time",
                           "categoryAxis": {
                               "parseDates": true,
                               "dashLength": 1,
                               "minorGridEnabled": true,
                               "labelColorField": "color",
							   /*"labelFunction": function(valueText, serialDataItem, categoryAxis) {
								var p_type = valueText.substring(valueText.length - 10, 0);
								var p_date = valueText.substring(valueText.length - 10);
								valueText = p_type + "\n" + p_date;
								return valueText;
								}*/
                           },
                           "export": {
                               "enabled": true
                           },
                           "dataProvider": res
                       } );

                       chart.addListener("rendered", zoomChart2);

                       zoomChart2();



                       $('#chartdiv8').closest('.portlet').find('.fullscreen').click(function() {
                           chart.invalidateSize();
                       });


                   };
                   function zoomChart2() {

                   }

                   //end chart 2

               });
            },
            render: function(){
                if(typeof this[$app.action] != 'undefined'){
                    new this[$app.action];
                }
            }
        });
    return new productView;
});