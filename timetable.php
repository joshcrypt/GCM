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
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/timetable.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/bootbox.min.js"></script>
<script type="text/javascript" src="js/bootstrap-typeahead.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/timetable.js"></script>
</head>

<body onload="fetchdefault()">
<div id="main_container" class="">
	<!-------------------------------------start banner-------------------->
	<div id="banner">
    <img id="headerimg" src="images/android_header_bg.png">
    <h2 id="h2title">SMART ONLINE NOTICEBOARD</h2>
    </div>
    <!--------------------------------------end banner-------------------->
	<!---------------------start container-------------------------------->
    <div id="container">
    <!-------------------start divLeft------------------------------>
    
    	<div id="divLeft">
        	<!-------------------start menubarholder------------------------------>
            <div id="menuDiv" class="boxshadow">
                <ul>
                    <li class="thin-right-border"><a href="home.php">Home</a></li>
                    <li class="thin-right-border"><a href="timetable.php">Timetable</a></li>
                    <li class="thin-right-border"><a href="noticeboard.php">NoticeBoard</a></li>
                    <li><a href="sendmessages.php">GCM Services</a></li> 
        			
                    <div class="clearBoth"></div>        
                
                </ul>
            </div>
        	<!-------------------end menubarholder-------------------------------->
            <!-----------------------------------------------------start  dynamicCont----------------------------------------------------------->
            <div id="dynamicCont">
            <!--------------------------inset dynamicCont---------------------------------->
            		
            
            
            <!-------------------------end inset dynamicCont------------------------------->
            </div>
            <!-------------------------------------------------------end  dynamicCont----------------------------------------------------------->
            
        </div>
    <!-------------------end divLeft-------------------------------->
    <!-------------------start divRight--------------------------------->
        <div id="divRight">
        	<!---------------------start sidemenuHolder---------------------------->
            <div id="sidemenuHolder">
            	<ul class="nav nav-list">
                      <li class="nav-header boxshadow">TimeTable Categories</li>
                      <li><a href="#" id="examtt">Create Exam TimeTable</a></li>
                      <li><a href="#" id="classtt">Create Class TimeTable</a></li>
                      
                      <li class="nav-header boxshadow">TimeTable Options</li>
                      <!--<li><a href="#" onClick="addContent('course')">Add Course</a></li>-->
                      <li><a href="#" onClick="addContent('unit')">Add Unit</a></li>
                      <li><a href="#" onClick="addVenue()">Add Venue</a></li>
                      
                      <li class="nav-header boxshadow">View and Edit Timetable</li>
                      <li><a href="#" id="examtime" onClick="fetchtable(this)">View Exam TimeTable</a></li>
                      <li><a href="#" id="classtime" onClick="fetchclasstable(this)">View Class TimeTable</a></li>
                      <li><a href="#" id="editexamtime" onClick="edittable(this)">Edit Exam TimeTable</a></li>
                      <li><a href="#" id="editclasstime" onClick="edittable(this)">Edit Class TimeTable</a></li>
                     
                </ul>
            
            
            </div>
        	<!-----------------------end sidemenuHolder---------------------------->
        
        
        </div>
    <!---------------------end div Right------------------------------->
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


<div class="modal hide" id="tableModal">
  
</div>
</body>
</html>