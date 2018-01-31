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
<link rel="stylesheet" type="text/css" href="css/bootstrap/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/noticeboard.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/pagination.js"></script>
<script type="text/javascript" src="js/noticeboard.js"></script>
<script type="text/javascript">
    var pager = new Pager('results', 4, 'pager', 'pageNavPosition');
    pager.init();
    pager.showPage(1);
    </script>

</head>

<body>
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
                    <li class="thin-right-border"><a  href="home.php">HOME</a></li>
                    <li class="thin-right-border"><a href="timetable.php "id="classtt" class="mousetopointer">TIMETABL</a></li>
                    <li class="thin-right-border"><a href="noticeboard.php">NOTICEBOARD</a></li>
                    <li><a href="sendmessages.php">GCM SERVICES</a></li> 
        			
                    <div class="clearBoth"></div>        
                
                </ul>
            </div>
        	<!-------------------end menubarholder-------------------------------->
            <!-----------------------------------------------------start  dynamicCont----------------------------------------------------------->
            <div id="dynamicCont">
            <!--------------------------inset dynamicCont---------------------------------->
            	<div id="addnewNotice">
                	<div id="action_header">
                    	<label class="labelstyle">CREATE A NEW NOTICE</label> 
                        
                        <!--<div class="clearBoth"></div>-->
                 	</div>
                    <span style="display:none; position:fixed; top:40%; left:48%;" id="addAlertSpan"></span>
                    <form>
                	<table class="boxshadow displaytable" border="0" cellpadding="2" cellspacing="1" >
                    	<tr>
                        	<td width="10"></td>
                        	<td class="tdfont">Category</td>
                            <td id="selectTD"  class="table_padding_top">
                            	
                           	</td>
                        </tr>
                        <tr>
                        	<td></td>
                        	<td class="tdfont">Publish</td>
                            <td>
                            	<select id="publish">
                                	<option value="0">Select Option</option>
                                	<option value="yes">Yes</option>
                                    <option value="no">No</option>
                                                             
                                </select>
                           	</td>
                        </tr>
                        <tr>
                       	    <td></td>
                        	<td class="tdfont">Select Notice Expiry Date</td>
                            <td>
                                <div class="input-append date" id="expirydate" data-date="2012-08-15" data-date-format="yyyy-mm-dd"><input style="width:183px;" id="txtexpirydate" type="text" value="" placeholder="Expiry Date" readonly><span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        	<td></td>
                        	<td class="tdfont">Notice</td>
                            <td><textarea onKeyUp="MaxLength(this, 255, 'counter')"id="txtnotice"></textarea><br />
                            <span id="counter" style="color:#000000;">You have 255 characters left.</span>
                            </td>
                        </tr>
                        <tr>
                        	<td></td>
                        	<td></td>
                        	<td class="table_padding_bottom">
                            	<button type="button" class="btn btn-success input-large" id="btnSave">Save</button>
                                <button type="reset" class="btn" id="btnReset">Cancel</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                    
                    
                </div>
            
            
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
                      <li class="nav-header boxshadow">NoticeBoard Options</li>
                      <li><a href="noticeboard.php">Create New Notice</a></li>
                      <li><a href="#">View Older Posts</a></li>
                      
                      <li class="nav-header boxshadow">Noticeboard by category</li>
                      <li><a href="#" onClick="fetchNotice('admin')">Administrative Notices</a></li>
                      <li><a href="#" onClick="fetchNotice('entertainment')">Entertainment</a></li>
                      <li><a href="#" onClick="fetchNotice('lostNfound')">Lost and Found</a></li>
                      <li><a href="#" onClick="fetchNotice('events')">Events</a></li>
                      <li><a href="#" onClick="fetchNotice('religious')">Religious</a></li>
                      <li><a href="#" onClick="fetchNotice('others')">Others</a></li>
                      
                      

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


<div class="modal hide" id="myModal">
  
</div>


</body>
</html>