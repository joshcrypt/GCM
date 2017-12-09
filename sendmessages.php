<?php session_start();
	
	if(!(isset($_SESSION['adminusername']))){
		
		?>
        	<script type="text/javascript">
				alert('Please Login First');
				location.replace('index.php');
			</script>
        <?php
	}
	//session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Noticeboard - Home</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/sendgcm.css"/>

<!--<link rel="stylesheet" type="text/css" href="css/style.css"/>-->

<style type="text/css">
#gcmiframe{
	width:100%;
	border:none;
	height:500px;
}
</style>
</head>

<body>
<div id="main_container" class="">
	<!-------------------------------------start banner-------------------->
	<div id="banner">
    <img id="headerimg" src="images/android_header_bg.png">
    <h2 id="h2title">SMART ONLINE MOBILE NOTICEBOARD</h2>
    </div>
    <div id="divLeft">
        	<!-------------------start menubarholder------------------------------>
            <div id="menuDiv">
                <ul>
                    <li class="thin-right-border"><a  href="home.php">Home</a></li>
                    <li class="thin-right-border"><a href="timetable.php">Timetable</a></li>
                    <li class="thin-right-border"><a href="noticeboard.php">NoticeBoard</a></li>
                    <li><a href="sendmessages.php">GCM Services</a></li> 
        			
                    <div class="clearBoth"></div>        
                
                </ul>
            </div>
     </div>
    <!--------------------------------------end banner-------------------->
	<!---------------------start container-------------------------------->
    <div id="container">
    <!-------------------start divLeft------------------------------>
    <iframe id="gcmiframe" src="http://127.0.0.1:9999/GCMServices/" />
    
    
    <div class="clearBoth"></div>
    </div>
    <!---------------------end container---------------------------------->
	<!----------------------start footer---------------------------------->
    <div align="center" class="footer">
    	<p>
            <a href="#">Home | </a>
            <a href="#">Contact Us | </a>
            <a href="#">About Us | </a>
            <a href="#">Services </a>
    	</p>
        </div>
        <div align="center" style="margin:0 auto; width:100%;"><p >&copy;2012 developed by dizo</p></div>
    </div>
	<!----------------------end footer----------------------------------->
<!---------------------end main_container----------------------->



</body>
</html>