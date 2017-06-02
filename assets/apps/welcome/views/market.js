define([
    'jquery',
    'underscore',
    'backbone'
    ], function($, _, Backbone){
        var marketView = Backbone.View.extend({
            el: $(".main-container"),
            initialize: function() {
                $(document).bind('.input_name', this.on_keypress);

            },
            events: {
                "change .select_category": "categoryChange",
                "change .select_stype": "stypeChange",
                "change .select_exchange": "exchangeChange",
                "click .reset_filter": "resetfilterClick",
                "keypress .input_name": "nameEnter",
                "keypress .input_symbol": "symbolEnter",
            },
            nameEnter: function(event){
                if(event.keyCode == 13){
                    this.inputfilter(event);
                }
            },
            symbolEnter: function(event){
                if(event.keyCode == 13){
                    this.inputfilter(event);
                }
            },
            resetfilterClick: function(event){
                var $this = $(event.currentTarget);
                $.ajax({
                    url: $base_url + "ajax/reloadTable",
                    type: 'POST',
                    async: false,
                    success: function(response) {
                        var rs = JSON.parse(response);
                        var html = '';
                        $.each(rs,function(index, value){
                            if(value.var < 0){
                                var color = 'bg_color_red';
                            }else{
                                var color = 'bg_color_green';
                            }
                            if(value.stype != null && value.stype != 0){ var stype = value.stype;}
                            else{ var stype = '-'; }
                            if(value.volume != null && value.volume != 0){ var valuevolume = value.volume;}
                            else{ var valuevolume= '-'; }
                            if(value.openinterest != null && value.openinterest != 0){ var valueopeninterest = value.openinterest;}
                            else{ var valueopeninterest = '-'; }
                            if(value.symbol != null && value.symbol != 0){ var valuesymbol = value.symbol;}
                            else{ var valuesymbol = '-'; }
                            if(value.cur != null && value.cur != 0){ var valuecur = value.cur;}
                            else{ var valuecur = '-'; }

                            if((value.exchange!='SPOT')&& (value.bctcode != null && value.bctcode != '')) {

                                $link_product = $base_url + 'product/futures/' + value.bctcode;
                            }
                            else if ((value.exchange=='SPOT') && (value.code != null && value.code !='')) {
                                $link_product = $base_url + 'product/spot/' + value.code;
                            }
                            else {
                                $link_product = '';
                            }

                            html += '<tr>';
                            html += '<td class="td_custom table_1_exchange"  align="left" id="table_1_type_'+value.id+'">' +
                                '<a href="' + $base_url + 'category/' + value.type + '" class="uppercase table_1_type" >' +value.type+ '</a></td>';
                            html +='<td class="td_custom table_1_stype" align="left" id="table_1_stype_'+ value.id +'">'+ stype +'</td>';
                            html += '<td class="td_custom cus_pri futures_contracts_name"  align="left" >' +
                                '<a href="' + $link_product + '" class="uppercase table_1_name" >' +value.name+ '</a></td>';
                            html +='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'+ value.id +'">'+ value.exchange +'</td>';
                            html +='<td class="td_custom table_1_symbol" align="left" id="table_1_symbol_'+value.id+'">'+valuesymbol+'</td>';
                            html +='<td class="td_custom table_1_code" align="left" id="table_1_code_'+value.id+'">'+value.code+'</td>';
                            html +='<td class="td_custom table_1_cur" align="left" id="table_1_cur_'+value.id+'">'+valuecur+'</td>';
                            html +='<td class="td_custom table_1_size" align="left" id="table_1_size_'+value.id+'">'+value.size+'</td>';
                            html +='<td class="td_custom" align="right"><span id="table_1_last_'+value.id+'" class="bg_color_grey table_1_last">'+value.last+'</span></td>';
                            html +='<td class="td_custom" align="right"><span id="table_1_change_'+value.id+'" class="'+color+'" >'+value.change+'</td>';
                            html +='<td class="td_custom" align="right"><span id="table_1_var_'+value.id+'" class="'+color+'" >'+value.var+'</td>';
                            html +='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'+value.id+'">'+$.number(valuevolume, 0, '.', ',')+'</td>';
                            html +='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'+value.id+'">'+$.number(valueopeninterest, 0, '.', ',')+'</td>';
                            html +='<td class="td_custom table_1_lasttime"  align="right" id="table_1_lasttime_'+value.id+'">'+value.lasttime+'</td>';
                            html += '</tr>';

                        });
                        $("#dashboard_list_1").html(html);


                    }
                });
                $('.select_category').get(0).selectedIndex = 0;
                $('.select_exchange').get(0).selectedIndex = 0;
                $('.select_stype').get(0).selectedIndex = 0;
                $('.input_name').val('');
                $('.input_symbol').val('');
            },
            selectfilter:function(event){
                var $this = $(event.currentTarget);
                $.ajax({
                    url: $base_url + "ajax/reloadTable",
                    type: 'POST',
                    data:{symbol:$('.input_symbol').val(),category:$(".select_category").val(),name:$('.input_name').val(),exchange:$(".select_exchange").val(),stype:$(".select_stype").val()},
                    async: false,
                    success: function(response) {
                        var rs = JSON.parse(response);
                        var html = '';
                        $.each(rs,function(index, value){
                            if(value.var < 0){
                                var color = 'bg_color_red';
                            }else{
                                var color = 'bg_color_green';
                            }
                            if(value.stype != null && value.stype != 0){ var stype = value.stype;}
                            else{ var stype = '-'; }
                            if(value.volume != null && value.volume != 0){ var valuevolume = value.volume;}
                            else{ var valuevolume= '-'; }
                            if(value.openinterest != null && value.openinterest != 0){ var valueopeninterest = value.openinterest;}
                            else{ var valueopeninterest = '-'; }
                            if(value.symbol != null && value.symbol != 0){ var valuesymbol = value.symbol;}
                            else{ var valuesymbol = '-'; }
                            if(value.cur != null && value.cur != 0){ var valuecur = value.cur;}
                            else{ var valuecur = '-'; }

                            if((value.exchange!='SPOT')&& (value.bctcode != null && value.bctcode != '')) {

                                $link_product = $base_url + 'product/futures/' + value.bctcode;
                            }
                            else if ((value.exchange=='SPOT') && (value.code != null && value.code !='')) {
                                $link_product = $base_url + 'product/spot/' + value.code;
                            }
                            else {
                                $link_product = '';
                            }

                            html += '<tr>';
                            html += '<td class="td_custom table_1_exchange"  align="left" id="table_1_type_'+value.id+'">' +
                                '<a href="' + $base_url + 'category/' + value.type + '" class="uppercase table_1_type" >' +value.type+ '</a></td>';
                            html +='<td class="td_custom table_1_stype" align="left" id="table_1_stype_'+ value.id +'">'+ stype +'</td>';
                            html += '<td class="td_custom cus_pri futures_contracts_name"  align="left" >' +
                                '<a href="' + $link_product + '" class="uppercase table_1_name" >' +value.name+ '</a></td>';
                            html +='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'+ value.id +'">'+ value.exchange +'</td>';
                            html +='<td class="td_custom table_1_symbol" align="left" id="table_1_symbol_'+value.id+'">'+valuesymbol+'</td>';
                            html +='<td class="td_custom table_1_code" align="left" id="table_1_code_'+value.id+'">'+value.code+'</td>';
                            html +='<td class="td_custom table_1_cur" align="left" id="table_1_cur_'+value.id+'">'+valuecur+'</td>';
                            html +='<td class="td_custom table_1_size" align="left" id="table_1_size_'+value.id+'">'+value.size+'</td>';
                            html +='<td class="td_custom" align="right"><span id="table_1_last_'+value.id+'" class="bg_color_grey table_1_last">'+value.last+'</span></td>';
                            html +='<td class="td_custom" align="right"><span id="table_1_change_'+value.id+'" class="'+color+'" >'+value.change+'</td>';
                            html +='<td class="td_custom" align="right"><span id="table_1_var_'+value.id+'" class="'+color+'" >'+value.var+'</td>';
                            html +='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'+value.id+'">'+$.number(valuevolume, 0, '.', ',')+'</td>';
                            html +='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'+value.id+'">'+$.number(valueopeninterest, 0, '.', ',')+'</td>';
                            html +='<td class="td_custom table_1_lasttime"  align="right" id="table_1_lasttime_'+value.id+'">'+value.lasttime+'</td>';
                            html += '</tr>';

                        });
                        $("#dashboard_list_1").html(html);


                    }
                });
            },
            inputfilter:function(event){
                var $this = $(event.currentTarget);
                $.ajax({
                    url: $base_url + "ajax/reloadTable",
                    type: 'POST',
                    data:{symbol:$(".input_symbol").val(),category:$(".select_category").val(),name:$(".input_name").val(),exchange:$(".select_exchange").val(),stype:$(".select_stype").val()},
                    async: false,
                    success: function(response) {
                        var rs = JSON.parse(response);
                        var html = '';
                        $.each(rs,function(index, value){
                            if(value.var < 0){
                                var color = 'bg_color_red';
                            }else{
                                var color = 'bg_color_green';
                            }
                            if(value.stype != null && value.stype != 0){ var stype = value.stype;}
                            else{ var stype = '-'; }
                            if(value.volume != null && value.volume != 0){ var valuevolume = value.volume;}
                            else{ var valuevolume= '-'; }
                            if(value.openinterest != null && value.openinterest != 0){ var valueopeninterest = value.openinterest;}
                            else{ var valueopeninterest = '-'; }
                            if(value.symbol != null && value.symbol != 0){ var valuesymbol = value.symbol;}
                            else{ var valuesymbol = '-'; }
                            if(value.cur != null && value.cur != 0){ var valuecur = value.cur;}
                            else{ var valuecur = '-'; }

                            if((value.exchange!='SPOT')&& (value.bctcode != null && value.bctcode != '')) {

                                $link_product = $base_url + 'product/futures/' + value.bctcode;
                            }
                            else if ((value.exchange=='SPOT') && (value.code != null && value.code !='')) {
                                $link_product = $base_url + 'product/spot/' + value.code;
                            }
                            else {
                                $link_product = '';
                            }

                            html += '<tr>';
                            html += '<td class="td_custom table_1_exchange"  align="left" id="table_1_type_'+value.id+'">' +
                                '<a href="' + $base_url + 'category/' + value.type + '" class="uppercase table_1_type" >' +value.type+ '</a></td>';
                            html +='<td class="td_custom table_1_stype" align="left" id="table_1_stype_'+ value.id +'">'+ stype +'</td>';
                            html += '<td class="td_custom cus_pri futures_contracts_name"  align="left" >' +
                                '<a href="' + $link_product + '" class="uppercase table_1_name" >' +value.name+ '</a></td>';
                            html +='<td class="td_custom table_1_exchange" align="left" id="table_1_exchange_'+ value.id +'">'+ value.exchange +'</td>';
                            html +='<td class="td_custom table_1_symbol" align="left" id="table_1_symbol_'+value.id+'">'+valuesymbol+'</td>';
                            html +='<td class="td_custom table_1_code" align="left" id="table_1_code_'+value.id+'">'+value.code+'</td>';
                            html +='<td class="td_custom table_1_cur" align="left" id="table_1_cur_'+value.id+'">'+valuecur+'</td>';
                            html +='<td class="td_custom table_1_size" align="left" id="table_1_size_'+value.id+'">'+value.size+'</td>';
                            html +='<td class="td_custom" align="right"><span id="table_1_last_'+value.id+'" class="bg_color_grey table_1_last">'+value.last+'</span></td>';
                            html +='<td class="td_custom" align="right"><span id="table_1_change_'+value.id+'" class="'+color+'" >'+value.change+'</td>';
                            html +='<td class="td_custom" align="right"><span id="table_1_var_'+value.id+'" class="'+color+'" >'+value.var+'</td>';
                            html +='<td class="td_custom table_1_volume" align="right" id="table_1_volume_'+value.id+'">'+$.number(valuevolume, 0, '.', ',')+'</td>';
                            html +='<td class="td_custom table_1_openinterest" align="right" id="table_1_openinterest_'+value.id+'">'+$.number(valueopeninterest, 0, '.', ',')+'</td>';
                            html +='<td class="td_custom table_1_lasttime"  align="right" id="table_1_lasttime_'+value.id+'">'+value.lasttime+'</td>';
                            html += '</tr>';

                        });
                        $("#dashboard_list_1").html(html);


                    }
                });
            },
            categoryChange: function(event) {
                this.selectfilter(event);
            },
            stypeChange: function(event) {
                this.selectfilter(event);
            },
            exchangeChange: function(event) {
                this.selectfilter(event);
            },
            index: function(){
               $(document).ready(function(){
                   $.ajax({
                       url: $base_url + "ajax/getMarketFilter",
                       type: 'POST',
                       async: false,
                       success: function(response) {
                           var rs = JSON.parse(response);
                           $.each(rs['category'],function(index, value){
                                   $(".select_category").append("<option>" + value.type + "</option>");
                           });
                           $.each(rs['name'],function(index, value){
                               $(".select_name").append("<option>"+value.name+"</option>");
                           });
                           $.each(rs['type'],function(index, value){
                               $(".select_exchange").append("<option>"+value.exchange+"</option>");
                           });
                           $.each(rs['stype'],function(index, value){
                               $(".select_stype").append("<option>"+value.stype+"</option>");
                           });


                       }
                   });

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