define([
    'jquery',
    'underscore',
    'backbone'
    ], function($, _, Backbone){
        var marketView = Backbone.View.extend({
            el: $(".main-container"),
            initialize: function() {

            },
            index: function(){
               
               $(document).ready(function(){
				   
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
                    beforeSend: function(){
                        $(".loader1").show();

                    },
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
                        beforeSend: function(){
                            $(".loader2").show();

                        },
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
                   $(".loader1").hide();
                   $(".loader2").hide();

					
               });
            },
            render: function(){
                if(typeof this[$app.action] != 'undefined'){
                    new this[$app.action];
                }
            }
        });
    return new marketView;
});