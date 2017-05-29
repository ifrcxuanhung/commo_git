define([
    'jquery',
    'underscore',
    'backbone'
    ], function($, _, Backbone){
        var categoryView = Backbone.View.extend({
            el: $(".main-container"),
            initialize: function() {

            },
            index: function(){
               
               $(document).ready(function(){
				   /*
				   var type_category = $('#type_category').text();
				   setInterval(function(){
						var data='';
						 $.ajax({
							type : "POST",
							url: $simulation_url + 'ajax/cate_auto_data_dashboard',
							dataType: 'json',							
							data : {type:type_category},
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
							}
						});
					}, 2000);
					
					//dashboard list 1
					setInterval(function(){
						var data='';
						 $.ajax({
							type : "POST",
							url: $simulation_url + 'ajax/category_auto_data_dashboard_list_table_1',
							dataType: 'json',							
							data : {type:type_category},
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
					}, 4000);
					*/
					//box chart
			var type = $("#type_category").text();
			var chartcode =  $("#chartcode").val();

			//alert(code_chart);

			 var last_new;
			 var time_new;
			 function getvalueCHART(){
				//console.log(code_chart);
				return $.ajax({
					url: $base_url + "ajax/getSpectIntraday_category1",
					type: "POST",
					data: {chartcode:chartcode},
					async: false
				});
			}
							
			var data1 = jQuery.parseJSON(getvalueCHART().responseText);
		   // console.log(data1);

			var res = [];
			for (var i = 1; i < data1.length; ++i){
				
				var date = data1[i].date;
				res.push({'time':date,'value': parseFloat(data1[i].close).toFixed(2)});
                var code = data1[i].code;
                //var chartcode = data1[i].chartcode;
				if (i==(data1.length-1)) { last_new  = data1[i].close;  time_new = data1[i].date}
			}
			   /*setInterval(function () {
				   $.ajax({
					   url: $base_url + "ajax/getSpectIntraday_category1",
					   data: {codeint:11},
					   type: 'POST',
					   async: false,
					   success: function(data) {

						   data = jQuery.parseJSON(data);
                           //alert(data);
						   if(data.time!=time_new) {
							   last_new = data.close;
							   time_new = data.date;
							   console.log(time_new);
							   chart.dataProvider.shift();

							   // add new one at the end

							   chart.dataProvider.push({'time': time_new.substring(0, 5),'value': parseFloat(last_new).toFixed(2)});
							   chart.validateData();
							   zoomChart();
						   }
					   }
				   });

			   }, 1000);*/
			
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
			if ($('#chartdiv').size() != 0) {
				

                    $('#site_statistics_loading').hide();
                    $('#site_statistics_content').show();

                    var chart = AmCharts.makeChart( "chartdiv", {
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
                        
                        chart.addListener("rendered", zoomChart1);
                        
                        zoomChart1();
                        
                        
                
                        $('#chartdiv').closest('.portlet').find('.fullscreen').click(function() {
                            chart.invalidateSize();
                        });
                        
                    
			};
				function zoomChart1() {
				
				}
				//char 2
				
				function getvalueCHART_2(){
					//console.log(code_chart);
					return $.ajax({
						url: $base_url + "ajax/getSpectIntraday_category2",
						type: "POST",
						data: {chartcode:chartcode},
						async: false
					});
				}
                   var chartData = generateChartData();

                   var chart = AmCharts.makeChart("chartdiv2", {
                       "type": "serial",
                       "theme": "none",
                       "marginRight": 40,
                       "marginLeft": 70,
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

                   chart.addListener("dataUpdated", zoomChart2);
                   zoomChart2();
                   function zoomChart2() {
                       //chart.zoomToIndexes(chartData.length - 250, chartData.length - 100);
                   }
                   function generateChartData() {
                       var chartData = [];

                       var data2 = jQuery.parseJSON(getvalueCHART_2().responseText);
                       var res = [];
                       for (var i = 1; i < data2.length; ++i){

                           var date = data2[i].date;
                           chartData.push({'date':date,'close': parseFloat(data2[i].close).toFixed(2)})

                       }
                       return chartData;
                   }
				
				// chart 3
				/*
				function getvalueCHART_3(){
					//console.log(code_chart);
					return $.ajax({
						url: $base_url + "ajax/getSpectIntraday3",
						type: "POST",
						data: {codeint:code_chart},
						async: false
					});
				}
				var data3 = jQuery.parseJSON(getvalueCHART_3().responseText);
				// console.log(data1);
				var res = [];
				for (var i = 1; i < data3.length; ++i){
				
					var date = data3[i].date;
					res.push({'time':date,'value': parseFloat(data3[i].close).toFixed(2)})
					if (i==(data3.length-1)) { last_new  = data3[i].close;  time_new = data3[i].date}
				}
				if ($('#chartdiv3').size() != 0) {

					$('#site_statistics_loading').hide();
					$('#site_statistics_content').show();
				
					var chart = AmCharts.makeChart( "chartdiv3", {
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
							"valueField": "value",
							"balloonText": "<span style='font-size:18px;'>[[value]]</span>"
						} ],
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
							"minorGridEnabled": true
						},
						"export": {
							"enabled": true
						},
						"dataProvider": res
					} );
				
					chart.addListener("rendered", zoomChart);
				
					zoomChart();
				
					$('#chartdiv3').closest('.portlet').find('.fullscreen').click(function() {
						chart.invalidateSize();
					});
				
				};
				function getvalueCHART_4(){
					//console.log(code_chart);
					return $.ajax({
						url: $base_url + "ajax/getSpectIntraday4",
						type: "POST",
						data: {codeint:code_chart},
						async: false
					});
				}
				var data4 = jQuery.parseJSON(getvalueCHART_4().responseText);
				// console.log(data1);
				var res = [];
				for (var i = 1; i < data4.length; ++i){
				
					var date = data4[i].date;
					res.push({'time':date,'value': parseFloat(data4[i].close).toFixed(2)})
					if (i==(data4.length-1)) { last_new  = data4[i].close;  time_new = data4[i].date}
				}
				if ($('#chartdiv4').size() != 0) {

					$('#site_statistics_loading').hide();
					$('#site_statistics_content').show();
				
					var chart = AmCharts.makeChart( "chartdiv4", {
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
							"valueField": "value",
							"balloonText": "<span style='font-size:18px;'>[[value]]</span>"
						} ],
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
							"minorGridEnabled": true
						},
						"export": {
							"enabled": true
						},
						"dataProvider": res
					} );
				
					chart.addListener("rendered", zoomChart);
				
					zoomChart();
				
				
				
					$('#chartdiv4').closest('.portlet').find('.fullscreen').click(function() {
						chart.invalidateSize();
					});
				
				};
					*/
					
               });
            },
            render: function(){
                if(typeof this[$app.action] != 'undefined'){
                    new this[$app.action];
                }
            }
        });
    return new categoryView;
});