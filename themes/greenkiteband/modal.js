$(document).ready(function () {

if($.cookie("disclaimer") == "true"){
	var slash = base_path;
	
	if ($('a.terms_conditions').attr('href').match('http')){	
			var slash = ""
		}
		var r = new RegExp(base_path+''+lang+'/terms_conditions\/(.+?)'+base_path, 'g');
		$('a.terms_conditions').attr('href', 
			$('a.terms_conditions').attr('href').replace(r,''+slash+'')
		).attr("target","_blank");
		
} else {

	$('a.terms_conditions').click(function (e) {
		e.preventDefault();
		var content = $(this).clone();
		var slash = base_path;
	if ($(this).attr('href').match('http')){	
			var slash = ""
		}
		var r = new RegExp(base_path+''+lang+'/terms_conditions\/(.+?)'+base_path, 'g');
		$(content).attr('href', 
			$(content).attr('href').replace(r,''+slash+'')
		);
 		
 		//$('div.view-id-terms_and_conditions div.content').modal(); 
 		
 		var terms = $('div.view-id-terms_and_conditions div.view-content');

		$(terms).modal();

		$(terms).append('<form class="accept_modal" action="'+$(content).attr('href')+'" target="_blank"><input class="accept" type="submit" value="Accept" /></form>');
		$(terms).append('<form name="cancel" class="cancel_modal" action="#"><input class="cancel" type="submit" value="Cancel" /></form>');
		 $('form.accept_modal input').click(function(){
		 	$.cookie("disclaimer", "true", {path: "/",expires:7});
		});
		$('form.cancel_modal input').click(function(){
			$.modal.close();
		});
		
	});
}
});