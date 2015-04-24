$(function(){
	var url = window.location.href;
	var page = url.substr(url.lastIndexOf('/')+1);
	$('#topnav a[href*="'+page+'"]').addClass('active');
});