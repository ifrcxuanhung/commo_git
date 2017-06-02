define([
    'jquery',
    'underscore',
    'backbone'
    ], function($, _, Backbone){
        var dashboardView = Backbone.View.extend({
            el: $(".main-container"),
            initialize: function() {

            },
            events: {
                
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
								$.each($('.dash_0_exchange'), function() {
									//console.log( this.id );
									var key = this.id.split("dash_0_exchange_")[1];
									if($('#'+this.id).text()!=data.data_dashboard_0.exchange){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_dashboard_1.exchange);
												$('#'+this.id).fadeIn('slow');
										});

									}
								});
								$.each($('.dash_0_expiry'), function() {
									//console.log( this.id );
									var key = this.id.split("dash_0_expiry_")[1];
									if($('#'+this.id).text()!=data.data_dashboard_0.expiry){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_dashboard_1.expiry);
												$('#'+this.id).fadeIn('slow');
										});

									}
								});

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
								if($('.dash_0_lasttime').text()!==data.data_dashboard_0.lasttime){
									$('.dash_0_lasttime').fadeOut('slow', function() {
										$('.dash_0_lasttime').html(data.data_dashboard_0.lasttime);
										$('.dash_0_lasttime').fadeIn('slow');
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
								$.each($('.dash_1_exchange'), function() {
									//console.log( this.id );
									var key = this.id.split("dash_1_exchange_")[1]; 
									if($('#'+this.id).text()!=data.data_dashboard_1.exchange){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_dashboard_1.exchange);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.dash_1_expiry'), function() {
									//console.log( this.id );
									var key = this.id.split("dash_1_expiry_")[1]; 
									if($('#'+this.id).text()!=data.data_dashboard_1.expiry){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_dashboard_1.expiry);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
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
								if($('.dash_1_lasttime').text()!==data.data_dashboard_1.lasttime){
									$('.dash_1_lasttime').fadeOut('slow', function() {
										$('.dash_1_lasttime').html(data.data_dashboard_1.lasttime);
										$('.dash_1_lasttime').fadeIn('slow');
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
								$.each($('.dash_2_exchange'), function() {
									//console.log( this.id );
									var key = this.id.split("dash_2_exchange_")[1]; 
									if($('#'+this.id).text()!=data.data_dashboard_2.exchange){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_dashboard_2.exchange);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.dash_2_expiry'), function() {
									//console.log( this.id );
									var key = this.id.split("dash_2_expiry_")[1]; 
									if($('#'+this.id).text()!=data.data_dashboard_2.expiry){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_dashboard_2.expiry);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
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
								if($('.dash_2_lasttime').text()!==data.data_dashboard_2.lasttime){
									$('.dash_2_lasttime').fadeOut('slow', function() {
										$('.dash_2_lasttime').html(data.data_dashboard_2.lasttime);
										$('.dash_2_lasttime').fadeIn('slow');
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
								$.each($('.dash_3_exchange'), function() {
									//console.log( this.id );
									var key = this.id.split("dash_3_exchange_")[1]; 
									if($('#'+this.id).text()!=data.data_dashboard_3.exchange){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_dashboard_3.exchange);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.dash_3_expiry'), function() {
									//console.log( this.id );
									var key = this.id.split("dash_3_expiry_")[1]; 
									if($('#'+this.id).text()!=data.data_dashboard_3.expiry){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_dashboard_3.expiry);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
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
								if($('.dash_3_lasttime').text()!==data.data_dashboard_3.lasttime){
									$('.dash_3_lasttime').fadeOut('slow', function() {
										$('.dash_3_lasttime').html(data.data_dashboard_3.lasttime);
										$('.dash_3_lasttime').fadeIn('slow');
									});
								}
																
							}
						});
					}, 2000);
					
					//dashboard list 1
					setInterval(function(){
						var data='';
						 $.ajax({
							url: $simulation_url + 'dashboard/auto_data_dashboard_list_table_1',
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
								
								$.each($('.table_1_lasttime'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_lasttime_")[1];
									if($('#'+this.id).text()!==data.data_table_1[key].time_format){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].time_format);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$.each($('.table_1_lastvar'), function() {
									//console.log( this.id );
									var key = this.id.split("table_1_lastvar_")[1]; 
									if($('#'+this.id).text()!==data.data_table_1[key].last){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).removeClass('bg_color_red');
											if(data.data_table_1[key].lastvar< 0) $('#'+this.id).addClass('bg_color_red');
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_1[key].last);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$('#dashboard_list_1').html(data.table1);							
							}
						});
					}, 4000);
					//dashboard list 2
					setInterval(function(){
						var data='';
						 $.ajax({
							url: $simulation_url + 'dashboard/auto_data_dashboard_list_table_2',
							dataType: 'json',
							success: function(data) {
								clearconsole();								
								$.each($('.table_2_name'), function() {
									var key = this.id.split("table_2_name_")[1]; 
									if($('#'+this.id).text()!==data.data_table_2[key].name){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_2[key].name);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.table_2_exchange'), function() {
									//console.log( this.id );
									var key = this.id.split("table_2_exchange_")[1]; 
									if($('#'+this.id).text()!==data.data_table_2[key].exchange){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_2[key].exchange);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$.each($('.table_2_lasttime'), function() {
									//console.log( this.id );
									var key = this.id.split("table_2_lasttime_")[1];
									if($('#'+this.id).text()!==data.data_table_2[key].time_format){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_2[key].time_format);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$.each($('.table_2_lastvar'), function() {
									//console.log( this.id );
									var key = this.id.split("table_2_lastvar_")[1]; 
									if($('#'+this.id).text()!==data.data_table_2[key].last){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).removeClass('bg_color_red');
											if(data.data_table_2[key].lastvar< 0) $('#'+this.id).addClass('bg_color_red');
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_2[key].last);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$('#dashboard_list_2').html(data.table2);							
							}
						});
					}, 5700);
					//dashboard list 3
					setInterval(function(){
						var data='';
						 $.ajax({
							url: $simulation_url + 'dashboard/auto_data_dashboard_list_table_3',
							dataType: 'json',
							success: function(data) {
								clearconsole();								
								$.each($('.table_3_name'), function() {
									//console.log( this.id );
									var key = this.id.split("table_3_name_")[1]; 
									if($('#'+this.id).text()!==data.data_table_3[key].name){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_3[key].name);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.table_3_exchange'), function() {
									//console.log( this.id );
									var key = this.id.split("table_3_exchange_")[1]; 
									if($('#'+this.id).text()!==data.data_table_3[key].exchange){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_3[key].exchange);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$.each($('.table_3_lasttime'), function() {
									//console.log( this.id );
									var key = this.id.split("table_3_lasttime_")[1];
									if($('#'+this.id).text()!==data.data_table_3[key].time_format){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_3[key].time_format);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$.each($('.table_3_lastvar'), function() {
									//console.log( this.id );
									var key = this.id.split("table_3_lastvar_")[1]; 
									if($('#'+this.id).text()!==data.data_table_3[key].last){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).removeClass('bg_color_red');
											if(data.data_table_3[key].lastvar< 0) $('#'+this.id).addClass('bg_color_red');
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 300);
											$('#'+this.id).html(data.data_table_3[key].last);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$('#dashboard_list_3').html(data.table3);							
							}
						});
					}, 7700);
					
					//dashboard list 4
					setInterval(function(){
						var data='';
						 $.ajax({
							url: $simulation_url + 'dashboard/auto_data_dashboard_list_table_4',
							dataType: 'json',
							success: function(data) {
								clearconsole();								
								$.each($('.table_4_name'), function() {
									//console.log( this.id );
									var key = this.id.split("table_4_name_")[1]; 
									if($('#'+this.id).text()!==data.data_table_4[key].name){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 400);
											$('#'+this.id).html(data.data_table_4[key].name);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								$.each($('.table_4_exchange'), function() {
									//console.log( this.id );
									var key = this.id.split("table_4_exchange_")[1]; 
									if($('#'+this.id).text()!==data.data_table_4[key].exchange){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 400);
											$('#'+this.id).html(data.data_table_4[key].exchange);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$.each($('.table_4_lasttime'), function() {
									//console.log( this.id );
									var key = this.id.split("table_4_lasttime_")[1];
									if($('#'+this.id).text()!==data.data_table_4[key].time_format){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 400);
											$('#'+this.id).html(data.data_table_4[key].time_format);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$.each($('.table_4_lastvar'), function() {
									//console.log( this.id );
									var key = this.id.split("table_4_lastvar_")[1]; 
									if($('#'+this.id).text()!==data.data_table_4[key].last){
										$('#'+this.id).fadeOut('slow', function() {
											$('#'+this.id).removeClass('bg_color_red');
											if(data.data_table_4[key].lastvar< 0) $('#'+this.id).addClass('bg_color_red');
											$('#'+this.id).effect("highlight", {color: '#4c87b9'}, 400);
											$('#'+this.id).html(data.data_table_4[key].last);
												$('#'+this.id).fadeIn('slow');
										});
										
									}
								});
								
								$('#dashboard_list_4').html(data.table4);							
							}
						});
					}, 9700);
					
					//chart 1

                    if(typeof $("#code_chart").val() != 'undefined'){
                        var code_chart = $("#code_chart").val();
                    }else{
                        var code_chart = '';
                    }
                    var last_new;
                    var time_new;
                    function getvalueCHART(){
                        //console.log(code_chart);
                        return $.ajax({
                            url: $base_url + "ajax/getSpectIntraday1",
                            type: "POST",
                            data: {codeint:code_chart},
                            beforeSend: function(){
                                $(".loader_dashboard_1").show();

                            },
                           
                            async: false
                        });
                    }

                    var chartData = generateChartData();

                    var chart = AmCharts.makeChart("chartdiv", {
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
                        /*"chartScrollbar": {
                            "graph": "g1",
                            "scrollbarHeight": 80,
                            "backgroundAlpha": 0,
                            "selectedBackgroundAlpha": 0.1,
                            "selectedBackgroundColor": "#888888",
                            "graphFillAlpha": 0,
                            "graphLineAlpha": 0.5,
                            "selectedGraphFillAlpha": 0,
                            "selectedGraphLineAlpha": 1,
                            "autoGridCount": true,
                            "color": "#AAAAAA"
                        },*/
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
                        chart.zoomToIndexes(chartData.length - 250, chartData.length - 100);
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



				//char 2
				
				function getvalueCHART_2(){
					//console.log(code_chart);
					return $.ajax({
						url: $base_url + "ajax/getSpectIntraday2",
						type: "POST",
						data: {codeint:code_chart},
                        beforeSend: function(){
                            $(".loader_dashboard_2").show();

                        },
                        
						async: false
					});
				}
                    var chartData2 = generateChartData2();

                    var chart = AmCharts.makeChart("chartdiv2", {
                        "type": "serial",
                        "theme": "none",
                        "marginRight": 40,
                        "marginLeft": 60,
                        "autoMarginOffset": 20,
                        "dataProvider": chartData2,
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
						/*"chartScrollbar": {
						 "graph": "g1",
						 "scrollbarHeight": 80,
						 "backgroundAlpha": 0,
						 "selectedBackgroundAlpha": 0.1,
						 "selectedBackgroundColor": "#888888",
						 "graphFillAlpha": 0,
						 "graphLineAlpha": 0.5,
						 "selectedGraphFillAlpha": 0,
						 "selectedGraphLineAlpha": 1,
						 "autoGridCount": true,
						 "color": "#AAAAAA"
						 },*/
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



                    function generateChartData2() {
                        var chartData2 = [];

                        var data2 = jQuery.parseJSON(getvalueCHART_2().responseText);
                        var res = [];
                        for (var i = 1; i < data2.length; ++i){

                            var date = data2[i].date;
                            chartData2.push({'date':date,'close': parseFloat(data2[i].close).toFixed(2)})

                        }
                        return chartData2;
                    }
				
				// chart 3

                    function getvalueCHART_3(){
                        //console.log(code_chart);
                        return $.ajax({
                            url: $base_url + "ajax/getSpectIntraday3",
                            type: "POST",
                            data: {codeint:code_chart},
                            beforeSend: function(){
                                $(".loader_dashboard_3").show();

                            },
                           
                            async: false
                        });
                    }
                    var chartData3 = generateChartData3();

                    var chart = AmCharts.makeChart("chartdiv3", {
                        "type": "serial",
                        "theme": "none",
                        "marginRight": 40,
                        "marginLeft": 35,
                        "autoMarginOffset": 20,
                        "dataProvider": chartData3,
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
						/*"chartScrollbar": {
						 "graph": "g1",
						 "scrollbarHeight": 80,
						 "backgroundAlpha": 0,
						 "selectedBackgroundAlpha": 0.1,
						 "selectedBackgroundColor": "#888888",
						 "graphFillAlpha": 0,
						 "graphLineAlpha": 0.5,
						 "selectedGraphFillAlpha": 0,
						 "selectedGraphLineAlpha": 1,
						 "autoGridCount": true,
						 "color": "#AAAAAA"
						 },*/
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



                    function generateChartData3() {
                        var chartData3 = [];

                        var data3 = jQuery.parseJSON(getvalueCHART_3().responseText);
                        var res = [];
                        for (var i = 1; i < data3.length; ++i){

                            var date = data3[i].date;
                            chartData3.push({'date':date,'close': parseFloat(data3[i].close).toFixed(2)})

                        }
                        return chartData3;
                    }

				// chart 4
                    function getvalueCHART_4(){
                        //console.log(code_chart);
                        return $.ajax({
                            url: $base_url + "ajax/getSpectIntraday4",
                            type: "POST",
                            data: {codeint:code_chart},
                            beforeSend: function(){
                                $(".loader_dashboard_4").show();

                            },

                            async: false
                        });
                    }
                    var chartData4 = generateChartData4();

                    var chart = AmCharts.makeChart("chartdiv4", {
                        "type": "serial",
                        "theme": "none",
                        "marginRight": 40,
                        "marginLeft": 50,
                        "autoMarginOffset": 20,
                        "dataProvider": chartData4,
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
						/*"chartScrollbar": {
						 "graph": "g1",
						 "scrollbarHeight": 80,
						 "backgroundAlpha": 0,
						 "selectedBackgroundAlpha": 0.1,
						 "selectedBackgroundColor": "#888888",
						 "graphFillAlpha": 0,
						 "graphLineAlpha": 0.5,
						 "selectedGraphFillAlpha": 0,
						 "selectedGraphLineAlpha": 1,
						 "autoGridCount": true,
						 "color": "#AAAAAA"
						 },*/
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



                    function generateChartData4() {
                        var chartData4 = [];

                        var data4 = jQuery.parseJSON(getvalueCHART_4().responseText);
                        var res = [];
                        for (var i = 1; i < data4.length; ++i){

                            var date = data4[i].date;
                            chartData4.push({'date':date,'close': parseFloat(data4[i].close).toFixed(2)})

                        }
                        return chartData4;
                    }
                    $(".loader_dashboard_1").hide();
                    $(".loader_dashboard_2").hide();
                    $(".loader_dashboard_3").hide();
                    $(".loader_dashboard_4").hide();
				
				
			});
            },
            render: function(){
                if(typeof this[$app.action] != 'undefined'){
                    new this[$app.action];
                }
            }
        });
    return new dashboardView;
});