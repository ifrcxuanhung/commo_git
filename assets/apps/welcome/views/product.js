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
							url: $simulation_url + 'ajax/product_auto_data_dashboard',
							dataType: 'POST',
							 data:{bctcode:bctcode},
							success: function(data) {
								
								clearconsole();	
								if($('.dash_0_lb1').text()!==data.data_dashboard_0.name){
									$('.dash_0_lb1').fadeOut('slow', function() {
										$('.dash_0_lb1').html(data.data_dashboard_0.name);
										$('.dash_0_lb1').fadeIn('slow');
									});
								}
								if($('.dash_0_lb2').text()!==data.data_dashboard_0.unit){
									$('.dash_0_lb2').fadeOut('slow', function() {						
										$('.dash_0_lb2').html(data.data_dashboard_0.unit);
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
								if($('.dash_0_ptype').text()!==data.data_dashboard_0.ptype){
									$('.dash_0_ptype').fadeOut('slow', function() {						
										$('.dash_0_ptype').html(data.data_dashboard_0.ptype);
										$('.dash_0_ptype').fadeIn('slow');
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
								if($('.dash_0_lasttime').text()!==data.data_dashboard_0.lasttime){
									$('.dash_0_lasttime').fadeOut('slow', function() {
										$('.dash_0_lasttime').html(data.data_dashboard_0.lasttime);
										$('.dash_0_lasttime').fadeIn('slow');
									});
								}																
							
							}
						});
					}, 2000);

					
				// chart
				
                   var chartcode = $("#get_chartcode").attr("value");
                   var last_new;
                   var time_new;
				   var type_product = $("#type_product").val();
				   if($("#chart_intraday_disable").val()=='false') {
					   if(type_product=='spot') {
						   function getvalueCHART(){
							   //console.log(code_chart);
							   return $.ajax({
								   url: $base_url + "ajax/getSpectIntraday_product_spot_1",
								   type: "POST",
								   data: {chartcode:chartcode},
								   beforeSend: function(){
									   $(".loader_spot_1").show();

								   },

								   async: false
							   });
						   }
					   }
					   else {

						   function getvalueCHART(){
							   //console.log(code_chart);
							   return $.ajax({
								   url: $base_url + "ajax/getSpectIntraday_product1",
								   type: "POST",
								   data: {chartcode:chartcode},
								   beforeSend: function(){
									   $(".loader1").show();
		
								   },
								   
								   async: false
							   });
						   }
					   }
					   var chartData = generateChartData();
	
					   var chart = AmCharts.makeChart("chartdiv5", {
						   "type": "serial",
						   "theme": "none",
						   "marginRight": 20,
						   "marginLeft": 40,
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
							   "oppositeAxis":true,// show zoom tren hay duoi (true o tren)
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
				   }
				   if($("#chart_history_disable").val()=='false') {
					   // chart 2
						if(type_product=='spot') {
							 function getvalueCHART_2(){
							   //console.log(code_chart);
							   return $.ajax({
								   url: $base_url + "ajax/getSpectIntraday_product_spot_2",
								   type: "POST",
								   data: {chartcode:chartcode},
								   beforeSend: function(){
									   if($("#chart_intraday_disable").val()=='false') {
									   $(".loader_spot_2").show();
									   }
									   else {
										   $(".loader_spot_1").show();
									   }
		
								   },
								  
								   async: false
							   });
						   }
						}
						else {
						   function getvalueCHART_2(){
							   //console.log(code_chart);
							   return $.ajax({
								   url: $base_url + "ajax/getSpectIntraday_product2",
								   type: "POST",
								   data: {chartcode:chartcode},
								   beforeSend: function(){
									   if($("#chart_intraday_disable").val()=='false') {
									   $(".loader2").show();
									   }
									   else {
										    $(".loader1").show();
									   }
		
								   },
								  
								   async: false
							   });
						   }
						}
					   var data2 = jQuery.parseJSON(getvalueCHART_2().responseText);
					   // console.log(data1);
	
					   var res = [];
					   for (var i = 1; i < data2.length; ++i){
	
						   var date = data2[i].date;
						   res.push({'time':date,'value': parseFloat(data2[i].close).toFixed(2)});
						   var code = data2[i].code;
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
							   "marginRight": 20,
							   "marginLeft": 50,
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
				   }
				   if(type_product=='spot') {
					   $(".loader_spot_1").hide();
					   $(".loader_spot_2").hide();
				   }
				   else {
					   $(".loader1").hide();
					   $(".loader2").hide();
				   }
                   //end chart 2
		

               });
			   
            }, // ham tuong ung trong controller php (ham index)
			spot: function(){
                $(document).ready(function(){
                    var bctcode = $("#bctcode").attr('code');
                    setInterval(function(){
                        var data='';
                        $.ajax({
                            url: $simulation_url + 'ajax/product_auto_data_dashboard',
                            dataType: 'POST',
                            data:{bctcode:bctcode},
                            success: function(data) {

                                clearconsole();
                                if($('.dash_0_lb1').text()!==data.data_dashboard_0.name){
                                    $('.dash_0_lb1').fadeOut('slow', function() {
                                        $('.dash_0_lb1').html(data.data_dashboard_0.name);
                                        $('.dash_0_lb1').fadeIn('slow');
                                    });
                                }
                                if($('.dash_0_lb2').text()!==data.data_dashboard_0.unit){
                                    $('.dash_0_lb2').fadeOut('slow', function() {
                                        $('.dash_0_lb2').html(data.data_dashboard_0.unit);
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
                                if($('.dash_0_ptype').text()!==data.data_dashboard_0.ptype){
                                    $('.dash_0_ptype').fadeOut('slow', function() {
                                        $('.dash_0_ptype').html(data.data_dashboard_0.ptype);
                                        $('.dash_0_ptype').fadeIn('slow');
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
                                if($('.dash_0_lasttime').text()!==data.data_dashboard_0.lasttime){
                                    $('.dash_0_lasttime').fadeOut('slow', function() {
                                        $('.dash_0_lasttime').html(data.data_dashboard_0.lasttime);
                                        $('.dash_0_lasttime').fadeIn('slow');
                                    });
                                }

                            }
                        });
                    }, 2000);


                    // chart

                    var chartcode = $("#get_chartcode").attr("value");
                    var last_new;
                    var time_new;
                    var type_product = $("#type_product").val();
                    if($("#chart_intraday_disable").val()=='false') {
                        if(type_product=='spot') {
                            function getvalueCHART(){
                                //console.log(code_chart);
                                return $.ajax({
                                    url: $base_url + "ajax/getSpectIntraday_product_spot_1",
                                    type: "POST",
                                    data: {chartcode:chartcode},
                                    beforeSend: function(){
                                        $(".loader_spot_1").show();

                                    },

                                    async: false
                                });
                            }
                        }
                        else {

                            function getvalueCHART(){
                                //console.log(code_chart);
                                return $.ajax({
                                    url: $base_url + "ajax/getSpectIntraday_product1",
                                    type: "POST",
                                    data: {chartcode:chartcode},
                                    beforeSend: function(){
                                        $(".loader1").show();

                                    },

                                    async: false
                                });
                            }
                        }
                        var chartData = generateChartData();

                        var chart = AmCharts.makeChart("chartdiv5", {
                            "type": "serial",
                            "theme": "none",
                            "marginRight": 20,
                            "marginLeft": 40,
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
                                "oppositeAxis":true,// show zoom tren hay duoi (true o tren)
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
                    }
                    if($("#chart_history_disable").val()=='false') {
                        // chart 2
                        if(type_product=='spot') {
                            function getvalueCHART_2(){
                                //console.log(code_chart);
                                return $.ajax({
                                    url: $base_url + "ajax/getSpectIntraday_product_spot_2",
                                    type: "POST",
                                    data: {chartcode:chartcode},
                                    beforeSend: function(){
                                        if($("#chart_intraday_disable").val()=='false') {
                                            $(".loader_spot_2").show();
                                        }
                                        else {
                                            $(".loader_spot_1").show();
                                        }

                                    },

                                    async: false
                                });
                            }
                        }
                        else {
                            function getvalueCHART_2(){
                                //console.log(code_chart);
                                return $.ajax({
                                    url: $base_url + "ajax/getSpectIntraday_product2",
                                    type: "POST",
                                    data: {chartcode:chartcode},
                                    beforeSend: function(){
                                        if($("#chart_intraday_disable").val()=='false') {
                                            $(".loader2").show();
                                        }
                                        else {
                                            $(".loader1").show();
                                        }

                                    },

                                    async: false
                                });
                            }
                        }
                        var data2 = jQuery.parseJSON(getvalueCHART_2().responseText);
                        // console.log(data1);

                        var res = [];
                        for (var i = 1; i < data2.length; ++i){

                            var date = data2[i].date;
                            res.push({'time':date,'value': parseFloat(data2[i].close).toFixed(2)});
                            var code = data2[i].code;
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
                                "marginRight": 20,
                                "marginLeft": 50,
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
                    }
                    if(type_product=='spot') {
                        $(".loader_spot_1").hide();
                        $(".loader_spot_2").hide();
                    }
                    else {
                        $(".loader1").hide();
                        $(".loader2").hide();
                    }
                    //end chart 2


                });
			},
            quote: function(){

                $(document).ready(function(){
                    var bctcode = $("#bctcode").attr('code');
                    setInterval(function(){
                        var data='';
                        $.ajax({
                            url: $simulation_url + 'ajax/product_auto_data_dashboard',
                            dataType: 'POST',
                            data:{bctcode:bctcode},
                            success: function(data) {

                                clearconsole();
                                if($('.dash_0_lb1').text()!==data.data_dashboard_0.name){
                                    $('.dash_0_lb1').fadeOut('slow', function() {
                                        $('.dash_0_lb1').html(data.data_dashboard_0.name);
                                        $('.dash_0_lb1').fadeIn('slow');
                                    });
                                }
                                if($('.dash_0_lb2').text()!==data.data_dashboard_0.unit){
                                    $('.dash_0_lb2').fadeOut('slow', function() {
                                        $('.dash_0_lb2').html(data.data_dashboard_0.unit);
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
                                if($('.dash_0_ptype').text()!==data.data_dashboard_0.ptype){
                                    $('.dash_0_ptype').fadeOut('slow', function() {
                                        $('.dash_0_ptype').html(data.data_dashboard_0.ptype);
                                        $('.dash_0_ptype').fadeIn('slow');
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
                                if($('.dash_0_lasttime').text()!==data.data_dashboard_0.lasttime){
                                    $('.dash_0_lasttime').fadeOut('slow', function() {
                                        $('.dash_0_lasttime').html(data.data_dashboard_0.lasttime);
                                        $('.dash_0_lasttime').fadeIn('slow');
                                    });
                                }

                            }
                        });
                    }, 2000);


                    // chart

                    var chartcode = $("#get_chartcode").attr("value");
                    var last_new;
                    var time_new;
                    var type_product = $("#type_product").val();
                    if($("#chart_intraday_disable").val()=='false') {


						function getvalueCHART(){
							//console.log(code_chart);
							return $.ajax({
								url: $base_url + "ajax/getSpectIntraday_product1",
								type: "POST",
								data: {chartcode:chartcode},
								beforeSend: function(){
									$(".loader1").show();

								},

								async: false
							});
						}

                        var chartData = generateChartData();

                        var chart = AmCharts.makeChart("chartdiv5", {
                            "type": "serial",
                            "theme": "none",
                            "marginRight": 20,
                            "marginLeft": 40,
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
                                "oppositeAxis":true,// show zoom tren hay duoi (true o tren)
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
                    }
                    if($("#chart_history_disable").val()=='false') {
                        // chart 2
                        if(type_product=='spot') {
                            function getvalueCHART_2(){
                                //console.log(code_chart);
                                return $.ajax({
                                    url: $base_url + "ajax/getSpectIntraday_product_spot_2",
                                    type: "POST",
                                    data: {chartcode:chartcode},
                                    beforeSend: function(){
                                        if($("#chart_intraday_disable").val()=='false') {
                                            $(".loader_spot_2").show();
                                        }
                                        else {
                                            $(".loader_spot_1").show();
                                        }

                                    },

                                    async: false
                                });
                            }
                        }
                        else {
                            function getvalueCHART_2(){
                                //console.log(code_chart);
                                return $.ajax({
                                    url: $base_url + "ajax/getSpectIntraday_product2",
                                    type: "POST",
                                    data: {chartcode:chartcode},
                                    beforeSend: function(){
                                        if($("#chart_intraday_disable").val()=='false') {
                                            $(".loader2").show();
                                        }
                                        else {
                                            $(".loader1").show();
                                        }

                                    },

                                    async: false
                                });
                            }
                        }
                        var data2 = jQuery.parseJSON(getvalueCHART_2().responseText);
                        // console.log(data1);

                        var res = [];
                        for (var i = 1; i < data2.length; ++i){

                            var date = data2[i].date;
                            res.push({'time':date,'value': parseFloat(data2[i].close).toFixed(2)});
                            var code = data2[i].code;
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
                                "marginRight": 20,
                                "marginLeft": 50,
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
                    }
                    if(type_product=='spot') {
                        $(".loader_spot_1").hide();
                        $(".loader_spot_2").hide();
                    }
                    else {
                        $(".loader1").hide();
                        $(".loader2").hide();
                    }
                    //end chart 2


                });

            }, // ham tuong ung trong controller php (ham quote)
            render: function(){
                if(typeof this[$app.action] != 'undefined'){
                    new this[$app.action];
                }
            }
        });
    return new productView;
});