// JavaScript Document
function MaxLength(input, limit, info)
{
	//alert('fgbfg');
    var length = input.value.length;
    if(length > limit)
    {
        $('#' + info).html('You cannot write more then '+limit+'characters!');
        input.value = input.value.substr(0,limit);
    }
    else $('#' + info).html('You have '+ (limit - length) +' characters left.');
}

$(document).ready(function(e) {
    $('#classtt').click(function(e) {
		
		$.post('php/class_TimeTable.php',{},function(data){
			$('#dynamicCont').html(data);	
			//document.getElementById('drpcourse');	
			
			$('#txtUnit').typeahead({
				source:function(typeahead,query){
					$.ajax({
						url:'php/getUnits.php',
						type:'POST',
						data:'query='+query,
						dataType:"JSON",
						async:'false',
						success: function(data){
							typeahead.process(data);
						}
					});
				}
			});
			getVenue();
				
		});
		
		
		
    });
});
var pager = new Pager('results', 4, 'pager', 'pageNavPosition');
    pager.init();
    pager.showPage(1);