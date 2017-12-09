<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</head>

<body>


<div id="content">
<!---------------------------------------header img-------------------------->
	<div id="banner">
    <img id="headerimg" src="images/android_header_bg.png" width="90" height="100">
    <h2 id="h2title">SMART ONLINE NOTICEBOARD</h2>
    </div>
    
<!-----------------------------------end header img-------------------------->
<!-------------------------------start login form---------------------------->
	<div id="addnewelement" align="center">
    	<form>
            <table class="boxshadow displaytable" border="0" cellpadding="2" cellspacing="5" align="center">
            	<tr align="center">
                	<td><label class="labelstyle">Username</label></td>
                    
                    <td><input type="text" id="txtUsername" class="input-large" placeholder="Username" /></td>
                </tr>
                <tr align="center">
                	<td ><label class="labelstyle" >Password</label></td>
                    <td><input type="password" id="txtPassword" class="input-large" placeholder="Password" /></td>
                </tr>
                <tr align="center">
                	<td></td>
                    <td><button type="button" id="btnLogin" class="btn btn-success">Sign In</button>
                    <button type="reset" id="btnReset" class="btn">Cancel</button></td>
                </tr>
                <tr align="center">
               		<td></td>
                	<td colspan="2"><a> Forgot Password ?</a></td>
                </tr>
            </table>
		</form>
    </div>

<!-------------------------------end login form---------------------------->
	
</div>





</body>
</html>