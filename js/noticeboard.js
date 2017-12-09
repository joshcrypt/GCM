// JavaScript Document
function showaddnewNotice(){
	//document.get
	//
	/*var addnewContent=$('#addnewNotice').contents();
	alert(addnewContent);
	$('#dynamicCont').html(addnewContent);*/
	
}
function fetchNotice(cat){
	var category=cat;
	$.post('php/fetch_notices.php',{category:category},function(data){ $('#dynamicCont').html(data);});
}

function editNotice(notice){
	var nid=$(notice).attr('id');
	$.post('php/noticeModal.php',{
		id:nid
		
		},function(data){
			$('#myModal').html(data);
			$('#newExpirydate').datepicker();
			$('#myModal').modal({
				keyboard: false,
				backdrop:'static'
			});
		});	
	
}
function saveNoticeChanges(noticeId){
	var id=$(noticeId).attr('id');
	var category=$(noticeId).attr('name');
	var publish=$('#newPublish').val();
	var newExpiry=$('#txtNewexpirydate').val();
	var notice=$('#txtewNotice').val();
	
	if(notice==''){
		$('#addAlertSpanModal').removeClass().html('Notice Cannot be blank').addClass('alert alert-error pull-left').show().fadeOut(10000,0,function(){});
		$('#txtewNotice').focus();
		//alert('Notice Cannot be blank');
		return false;
	}
	else{
		$.post('php/editNotice.php',
		{
			id:id,
			publish:publish,
			newExpiry:newExpiry,
			notice:notice
			
		},
		function(data){
			//alert(data);
			
			if(data==1){
				$('#addAlertSpanModal').removeClass().html('Successful Update').addClass('alert alert-success pull-left').show().fadeOut(10000,0,function(){
					$('#myModal').modal('hide');	
				});
				fetchNotice(category);				
			}
			else if(data==2){
				$('#addAlertSpanModal').removeClass().html('No Changes Were Made').addClass('alert alert-error pull-left').show().fadeOut(10000,0,function(){
					$('#myModal').modal('hide');
				});				
				
			}
			else{
				$('#addAlertSpanModal').removeClass().html('Error Occured: '+data).addClass('alert alert-error pull-left').show().fadeOut(10000,0,function(){
					$('#myModal').modal('hide');
				});
				//alert('Error Occured: '+data);
			}
		});
	}
	
	
		
}

$(document).ready(function(e) {
	
    $('#expirydate').datepicker();
	//$.post('php/fetch_entertainment_Notice.php',{},function(data){});
	$.post('php/getCategorySelect.php',{},function(data){$('#selectTD').html(data);});
	$('#btnSave').click(function(e) {
		
		var category=$('#category').val();
		var publish=$('#publish').val();
		var duration=$('#txtexpirydate').val();
		var notice=$('#txtnotice').val();
		
		if (category=='0')
		{	
			$('#addAlertSpan').removeClass().html('Please Select A Category').addClass('alert alert-error pull-right').show().fadeOut(10000,0,function(){});
			$('#category').focus();
			return false;
		}
		else if (publish=='0')
		{	
			$('#addAlertSpan').removeClass().html('Select Publish Option').addClass('alert alert-error pull-right').show().fadeOut(10000,0,function(){});
			$('#publish').focus();
			return false;
		}
		else if (duration=='')
		{	
			$('#addAlertSpan').removeClass().html('Please Select The Expiry Date').addClass('alert alert-error pull-right').show().fadeOut(10000,0,function(){});
			$('#txtexpirydate').focus();
			return false;
		}
		else if (notice =='')
		{	
			$('#addAlertSpan').removeClass().html('Notice Can Not Be Blank').addClass('alert alert-error pull-right').show().fadeOut(10000,0,function(){});
			$('#txtnotice').focus();
			return false;
		}
		else{
			$('#addAlertSpan').removeClass().html('Adding Notice....').addClass('alert alert-info').show();
			$.post('php/add_new_notice.php',{
				category:category,
				publish:publish,
				duration:duration,
				notice:notice
				
				},function(data){
					
					if(data==1){
						$('#addAlertSpan').removeClass().html('Notice Added Successfully').addClass('alert alert-success pull-right').show().fadeOut(10000,0,function(){
							$('#btnReset').click();
						});
						
						
					}
					else if(data==2){
						$('#addAlertSpan').removeClass().html('Failed To Add New Notice').addClass('alert alert-error pull-right').show().fadeOut(10000,0,function(){
						});
					}
					else{					
						$('#addAlertSpan').removeClass().html('An Error Occurred: '+data).addClass('alert alert-error pull-right').show().fadeOut(10000,0,function(){
						});
					}
				
				});
		}
		
    });
	
	
});