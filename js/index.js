// JavaScript Document
$(document).ready(function(e) {	
	
	//<td colspan="2"><button type="button" id="btnLogin" class="btn btn-primary input-medium">Sign In</button>
	$('#btnLogin').click(function(e) {
        
		var username=$('#txtUsername').val();
		var password=$('#txtPassword').val();
		
		if(username=='' || password==''){
			alert('Please enter all details');
			return false;
		}
		else{
			
			$.post('php/login.php',
			{
				username:username,
				password:password
			},
			function(data){
				
				if(data==1){
					location.replace('home.php');
				}
				else if(data==2){
					alert('Invalid Login Details');
				}
				else{
					alert('An Error Occurred : '+data);
				}
			});
		}		
    });    
});