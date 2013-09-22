define(['jquery'], function ( $ ) {
	
	var nav = $('#main_nav');
	var menu_icon = $('#menu-icon');
	
	//call menu visibility on load
	menu_visibility();
	
	$( window ).resize(function() {
	 	reset_height();
		menu_visibility();
	});
	
	$('#menu-icon').click(function(){
		nav.css({ "position": "absolute", "top": "3.4em" }).slideToggle( "fast" );
		return false;
	});
	
	
	function menu_visibility(){
		
		if(menu_icon.is(':visible')){
			nav.hide();	
		} 
		
	}
	
	function reset_height(){
		if(!menu_icon.is(':visible')){
			nav.show().css({ "top": "auto" });
		}
	}

	
    //Define the module value by returning a value.
    return function () {}
});
