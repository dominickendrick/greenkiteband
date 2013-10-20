
$(document).ready(function () {
	
if ($("div.file_downloads a.download_video").attr("href") != null){
	
	highlight_tab("div.file_downloads a.download_video","href",/get\/(.+?)\d\d\d\./,lang);
	
}	
	
if ($("img.preview_photo").attr("src") != null){

	highlight_tab("div.audio_content h2","html",/[\w\b]*/);
	
}

if (audio_file != null){
//	highlight_audio_tab(audio_file,lang);
}

function highlight_audio_tab(audio_file,lang) {

	var thumb = $('td.views-field-title').text();
	var selected_pane = $(thumb).parents("tr");
	
	$("td.views-field-title",selected_pane).css('background-image',
		$("td.views-field-title",selected_pane).css('background-image').replace('noplay','play')
	);

}

function highlight_tab(item,attribute,regex,lang) {
	
	/*
	*******************
	*
	* the m variable is the common attribute between the main media item and its thumbnail in the tabs below 
	* for example for an image node type the src of the main image and the src of the thumbnail can be matched
	* so you pass the main item your matching (ie large iamge at the top), the attribute you want to match (src,href etc)	
	* and the regular expression you will use to match.
	*
	*******************
	*/
	
	var m = $(item).attr(attribute).match(regex);
	
		//add style to the image in the tab area
		//note: this will ONLY work with the quicktabs module
		//it will have to be adapted to work with other tab modules

		//remove link from currently selected tab
	
	var thumb = $('div.quicktabs_main img[src*='+m[1]+']');
	var selected_pane = $(thumb).parents("div.quicktabs_tabpage");
	
	
	//$(thumb).css("border","3px #000000 solid");
	
		//add overlay image "now playing"

	var overlay = $(thumb).next();
	if ($(overlay).attr('src') != null){
		if ($(overlay).attr('class').match('video')){
			$(overlay).attr('src',
				$(overlay).attr('src').replace('video-overlay.png','video-playing-'+lang+'.png')
			);
		}else {
			$(overlay).attr('src',
				$(overlay).attr('src').replace('photo-overlay.png','photo-playing.png')
			);
		}
	}
		//get its tab position from the id
		
    var id = $(selected_pane).attr("id").match(/_(\d)$/);

	//add class of active to the tab, this triggers the quicktabs javascript and changes tabs.
	$('ul.quicktabs_tabs li[class*=qtab-]').removeClass('active');	
	$('ul.quicktabs_tabs li[class*=qtab-'+id[1]+']').addClass('active');
	
	$('div.quicktabs_tabpage').addClass('nojs-hide').css('display','none');
	$(selected_pane).removeClass('nojs-hide').css('display','block');

	
	
	var content = 	$('div.quicktabs_main img[src*='+m[1]+']').parent();
	$(content).before($(content).html());
	$(content).remove();

	
}

});