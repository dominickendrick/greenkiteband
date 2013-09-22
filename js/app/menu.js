define(['jquery'], function ( $ ) {
	

	
	var nav = $('#main_nav');
	var menu_icon = $('#menu-icon');
	
	nav.insertBefore("#main");

	//call menu visibility on load
	menu_visibility();
	
	$( window ).resize(function() {
		menu_visibility();
	});
	
	$('#menu-icon').click(function(){
		nav.slideToggle( "fast" );
		return false;
	});
	
	
	function menu_visibility(){
		
		if(menu_icon.is(':visible')){
			nav.hide();	
		} else {
			nav.show();
		}
		
	}	
    //Define the module value by returning a value.
    return function () {}
});
