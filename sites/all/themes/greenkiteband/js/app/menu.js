define(['jquery','enquire','polyfil'], function ( $ , enquire, polyfil ) {

	var menu = {
	
		init: function(){

			//get navigation item and menu icon	
			var nav = $('#main_nav');
			var menu_icon = $('#menu-icon');
			var main = "#main";

			//move nav in the DOM
			nav.insertBefore(main);

			enquire.register("screen and (min-width: 40em)",{
		
				match : function(){
					nav.show();	
				},
		
				unmatch : function(){
					nav.hide();
				}
		
			});
	
			menu_icon.click(function(){
				nav.slideToggle( "fast" );
				return false;
			});
		}
	}
    
	menu.init();
	
	//Define the module value by returning a value.
    return function () {
	}

});
