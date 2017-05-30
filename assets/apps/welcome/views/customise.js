define([
    'jquery',
    'underscore',
    'backbone'
    ], function($, _, Backbone){
        var customiseView = Backbone.View.extend({
            el: $(".main-container"),
            initialize: function() {

            },
            index: function(){
               
               $(document).ready(function(){

					//box chart

			//alert(code_chart);

			 var last_new;
			 var time_new;
                   function getvalueCHART_1(){
                       //console.log(code_chart);
                       return $.ajax({
                           url: $base_url + "ajax/getSpectIntraday_customise1",
                           type: "POST",

                           async: false
                       });
                   }
                   var chartData1 = generateChartData1();

                   var chart = AmCharts.makeChart("chartdiv_customise1", {
                       "type": "serial",
                       "theme": "none",
                       "marginRight": 50,
                       "marginLeft": 70,
                       "autoMarginOffset": 20,
                       "dataProvider": chartData1,
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

                   chart.addListener("dataUpdated", zoomChart1);
                   zoomChart1();
                   function zoomChart1() {
                       //chart.zoomToIndexes(chartData.length - 250, chartData.length - 100);
                   }
                   function generateChartData1() {
                       var chartData1 = [];

                       var data1 = jQuery.parseJSON(getvalueCHART_1().responseText);
                       var code1 = data1[0].code;
                       var res = [];
                       $(".get_title_category2").append(code1 + ' (INTRADAY)');
                       for (var i = 1; i < data1.length; ++i){

                           var date = data1[i].date;
                           chartData1.push({'date':date,'close': parseFloat(data1[i].close).toFixed(2)});


                       }
                       return chartData1;
                   }
                   //end chart 1
				//char 2
				
				function getvalueCHART_2(){
					//console.log(code_chart);
					return $.ajax({
						url: $base_url + "ajax/getSpectIntraday_customise2",
						type: "POST",

						async: false
					});
				}
                   var chartData2 = generateChartData2();

                   var chart = AmCharts.makeChart("chartdiv_customise2", {
                       "type": "serial",
                       "theme": "none",
                       "marginRight": 50,
                       "marginLeft": 70,
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
                   function generateChartData2() {
                       var chartData2 = [];

                       var data2 = jQuery.parseJSON(getvalueCHART_2().responseText);
                       var code2 = data2[0].code;
                       var res = [];
                       $(".get_title_category").append(code2 + ' (INTRADAY)');
                       for (var i = 1; i < data2.length; ++i){

                           var date = data2[i].date;
                           chartData2.push({'date':date,'close': parseFloat(data2[i].close).toFixed(2)});


                       }
                       return chartData2;
                   }
				
                    // end chart 2
					
               });
            },
            render: function(){
                if(typeof this[$app.action] != 'undefined'){
                    new this[$app.action];
                }
            }
        });
    return new customiseView;
});