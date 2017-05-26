// Filename: router.js
define([
    'jquery',
    'underscore',
    'backbone', ], function($, _, Backbone) {
        var AppRouter = Backbone.Router.extend({
            routes: { 
                'welcome': 'welcomeAction',
                'welcome/*path': 'welcomeAction',  
                'dashboard': 'dashboardAction',
                'dashboard/*path': 'dashboardAction',
                'profile': 'profileAction',
                'profile/*path': 'profileAction',
                'contact': 'contactAction',
                'contact/*path': 'contactAction',
                'login': 'loginAction',
                'login/*path': 'loginAction',
                'table': 'tableAction',
				'table/*path': 'tableAction',  
				'jq_loadtable': 'jq_loadtableAction',
                'jq_loadtable/*path': 'jq_loadtableAction',
                'product': 'productAction',
                'product/*path': 'productAction',
				'category': 'categoryAction',
                'category/*path': 'categoryAction',
                'analysis': 'analysisAction',
                'analysis/*path': 'analysisAction',
                'research': 'researchAction',
                'research/*path': 'researchAction',
				'news': 'newsAction',
                'news/*path': 'newsAction',
                '*actions': 'defaultAction'
				
            },
            welcomeAction: function(){
                require(['views/welcome'], function(welcomeView){
                    welcomeView.render();
                });
            },
			jq_loadtableAction: function(){
                require(['views/jq_loadtable'], function(jq_loadtableView){
                    jq_loadtableView.render();
                });
            },
            productAction: function(){
                require(['views/product'], function(productView){
                    productView.render();
                });
            },
			categoryAction: function(){
                require(['views/category'], function(categoryView){
                    categoryView.render();
                });
            },
            analysisAction: function(){
                require(['views/analysis'], function(analysisView){
                    analysisView.render();
                });
            },
            researchAction: function(){
                require(['views/research'], function(researchView){
                    researchView.render();
                });
            },
            dashboardAction: function(){
                require(['views/dashboard'], function(dashboardView){
                    dashboardView.render();
                });
            },
			
            profileAction: function(){
                require(['views/profile'], function(profileView){
                    profileView.render();
                });
            },
            contactAction: function(){
                require(['views/contact'], function(contactView){
                    contactView.render();
                });
            },
            loginAction: function(){
                require(['views/login'], function(loginView){
                    loginView.render();
                });
            },
            tableAction: function(){
				
                require(['views/table'], function(tableView){
                    tableView.render();
                });
            },
			newsAction: function(){
                require(['views/news'], function(newsView){
                    newsView.render();
                });
            },
            defaultAction: function(actions) {
            // We have no matching route, lets display the home page
            }
        });
        var initialize = function() {
            var app_router = new AppRouter;
            if (Backbone.history&& !Backbone.History.started) {
                var startingUrl = $base_url.replace(location.protocol + '//' + location.host, "");
                    var pushStateSupported = _.isFunction(history.pushState);
                // Browsers without pushState (IE) need the root/page url in the hash
                if (!(window.history && window.history.pushState)) {
                    window.location.hash = window.location.pathname.replace(startingUrl, '');
                    startingUrl = window.location.pathname;
                }
                Backbone.history.start({ pushState: true, root: startingUrl });
                if (!pushStateSupported) {
                    var fragment = window.location.pathname.substr(Backbone.history.options.root.length);
                    Backbone.history.navigate(fragment, { trigger: true });
                }
            }
            $("div.account").on("click", "a", function(){
                var that = this;
                require(['views/account'], function(accountView){
                    accountView.accountManage(that);
                });
            });
            $("a.forgotten_password").live("click", function(){
                var html = '<form id="forgot-form" method="post">'+
                '<p class="message error no-margin"></p>'+
                '<label style="float: left; width: 90px; margin-left: 62px">E-mail</label>'+
                '<input type="text" name="identity" style="margin-bottom: 10px; width: 250px" /><br />'+
                '<label style="float: left; width: 90px; margin-left: 62px">Captcha</label>'+
                '<div class="field"><img style="margin-left:5px;" src="' + $base_url + 'captcha" />'+
                '<input type="text" style="width: 50px; float: left; height: 24px" name="security_code" class="<?php echo isset($input[\'security_code\']) ? \'error\' : NULL; ?>" />'+
                '</div>'+
                '<label style="float: left; width: 90px; margin-left: 62px">&nbsp;</label>'+
                '<div style="margin-bottom: 10px"><button type="submit" name="submit" class="ui-button">Submit</button></div>'+
                '</form>';
                $("#account-dialog").html(html);
                $("button[name='submit']").click(function(){
                    $.ajax({
                        url: $base_url + 'account/forgotten_password',
                        type: 'post',
                        data: $("#forgot-form").serialize(),
                        success: function(rs){
                            $("#account-dialog p.error").html(rs);
                        }
                    });
                    return false;
                });
            });
        };
        return {
            initialize: initialize
        };
    });