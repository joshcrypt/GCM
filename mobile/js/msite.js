// JavaScript Document
$(document).ready(function(e) {
    $.post('loadnotice.php',{cat:'admin'},function(data){	
		$('#admin').append(data).trigger("create");	
	});
	$.post('loadnotice.php',{cat:'religious'},function(data){
		$('#religious').append(data).trigger("create");		
	});
	$.post('loadnotice.php',{cat:'enter'},function(data){
		$('#enter').html(data).trigger("create");		
	});
	$.post('loadnotice.php',{cat:'lostnfound'},function(data){
		$('#lostnfound').append(data).trigger("create");		
	});
	$.post('loadnotice.php',{cat:'events'},function(data){
		$('#events').append(data).trigger("create");		
	});
	$.post('loadnotice.php',{cat:'others'},function(data){
		$('#others').append(data).trigger("create");		
	});
	
});