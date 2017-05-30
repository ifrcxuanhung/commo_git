define([
    'jquery',
    'underscore',
    'backbone'
    ], function($, _, Backbone){
        var researchView = Backbone.View.extend({
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
					}, 4000);
				   // chart

					 var last_new;
					 var time_new;
					function getvalueCHART(){
						return $.ajax({
							url: $base_url + "ajax/getSpectIntraday_research",
							type: "POST",
                            beforeSend: function(){
                                $(".loader1").show();

                            },
                            complete: function(){
                                $(".loader1").hide();

                            },
							async: false
						});
					}
					if ($('#chartdiv9').size() != 0) {

						$('#site_statistics_loading').hide();
						$('#site_statistics_content').show();
						
						
						
							var chartData = generateChartData();
						
							var chart = AmCharts.makeChart("chartdiv9", {
								"type": "serial",
								"theme": "none",
								"legend": {
									"useGraphSettings": true
								},
								"dataProvider": chartData,
								"synchronizeGrid":true,
						
								"valueAxes": [{
									"id":"v1",
									"axisColor": "#0f84c0",
									"axisThickness": 2,
									"axisAlpha": 1,
									"position": "left",
								}, {
									"id":"v2",
									"axisColor": "#FF0000",
									"axisThickness": 2,
									/*"unit":"Mn",*/
									"axisAlpha": 1,
									"position": "right"
								}, {
									"id":"v3",
									"axisColor": "#B0DE09",
									"axisThickness": 2,
									/*"unit":"Mn",*/
									"gridAlpha": 0,
									"offset": 50,
									"axisAlpha": 1,
									"position": "left"
								}/*, {
										"id":"v4",
										"axisColor": "#FFFFFF",
										"axisThickness": 2,
										 "unit":"Mn",
										"gridAlpha": 0,
										"offset": 50,
										"axisAlpha": 1,
										"position": "right"
									}*/],
								"graphs": [{
									"valueAxis": "v1",
									"lineColor": "#0f84c0",
									/*"bullet": "round",*/
									"bulletBorderThickness": 1,
									"hideBulletsCount": 30,
									"title": "Oil",
									"valueField": "oil",
									"fillAlphas": 0,
									"lineThickness": 4,
									"lineAlpha":0.9
								}, {
									"valueAxis": "v2",
									"lineColor": "#FF0000",
									/*"bullet": "square",*/
									"bulletBorderThickness": 1,
									"hideBulletsCount": 30,
									"title": "Stock Price",
									"valueField": "sp",
									"fillAlphas": 0,
									"lineThickness": 1,
									"lineAlpha":0.9
								}, {
									"valueAxis": "v3",
									"lineColor": "#B0DE09",
									"bulletBorderThickness": 1,
									"hideBulletsCount": 30,
									"title": "Exchange Rates",
									"valueField": "er",
									"fillAlphas": 0,
									"lineThickness": 1,
									"lineAlpha":0.9
								}],
								"listeners": [{
									"event": "init",
									"method": function(e) {
										e.chart.zoomToIndexes(2000, e.chart.endIndex);/*fix defaut zoom chart*/
									}
								}],
								"chartScrollbar": {},
								"chartCursor": {
									"cursorPosition": "mouse"
								},
								"categoryField": "date",
								"categoryAxis": {
									"parseDates": true,
									"axisColor": "#DADADA",
									"minorGridEnabled": true
								},
								"export": {
									"enabled": true,
									"position": "bottom-right"
								}
							});
						
							chart.addListener("dataUpdated", zoomChart);
							zoomChart();
						
						
						// generate some random data, quite different range
							function generateChartData() {
								var chartData = [];
							   /* var firstDate = new Date();
								firstDate.setDate(firstDate.getDate() - 100);
						
								for (var i = 0; i < 100; i++) {
									// we create date objects here. In your data, you can have date strings
									// and then set format of your dates using chart.dataDateFormat property,
									// however when possible, use date objects, as this will speed up chart rendering.
									var newDate = new Date(firstDate);
									newDate.setDate(newDate.getDate() + i);
						
									var visits = Math.round(Math.sin(i * 5) * i);
									var hits = Math.round(Math.random() * 80) + 500 + i * 3;
									var views = Math.round(Math.random() * 6000) + i * 4;
						
									chartData.push({
										date: newDate,
										visits: visits,
										hits: hits,
										views: views,
									});
								}*/
								var data = jQuery.parseJSON(getvalueCHART().responseText);
								var res = [];
								for (var i = 1; i < data.length; ++i){
						
									var date = data[i].date;
									chartData.push({'date':date,'oil': parseFloat(data[i].oil).toFixed(2),'sp':parseFloat(data[i].sp).toFixed(2),'er':parseFloat(data[i].er).toFixed(2)/*,'q_long':parseFloat(data[i].q_long/1000000).toFixed(2)*/})
									//if (i==(data.length-1)) { last_new  = data[i].close;  time_new = data[i].date}
								}
								return chartData;
							}
						
							function zoomChart(){
								chart.zoomToIndexes(chart.dataProvider.length - 20, chart.dataProvider.length - 1);
							}
						}

				   
               });
            },
            render: function(){
                if(typeof this[$app.action] != 'undefined'){
                    new this[$app.action];
                }
            }
        });
    return new researchView;
});