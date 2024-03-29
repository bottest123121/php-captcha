﻿<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "test") or die("Connection Error: " . mysqli_error($conn));

if(count($_POST)>0) {
if($_POST["captcha_code"]==$_SESSION["captcha_code"]){
$success_message = "Your message received successfully";
mysqli_query($conn, "INSERT INTO tblcontact (user_name, user_email,subject,content) VALUES ('" . $_POST['userName']. "', '" . $_POST['userEmail']. "','" . $_POST['subject']. "','" . $_POST['content']. "')");
}
else{
$error_message = "Incorrect Captcha Code";
}
}
?>
<html>
<head>
<title>Contact Form</title>
<style>
body {
	font-family:calibri;
	width:610px;
}
.demo-error {
	display:inline-block;
	color:#FF0000;
	margin-left:5px;
}
.demo-input {
    width: 100%;
    border-radius: 5px;
    border: #CCC 1px solid;
    padding: 10px;
    margin-top: 5px;
}
.demo-btn {
	padding: 10px;
    border-radius: 5px;
    background: #478347;
    border: #325a32 1px solid;
    color: #FFF;
    font-size: 1em;
    width: 100%;
    cursor:pointer;
}
.demo-heading {
	font-size: 1.5em;
    border-bottom: #CCC 1px solid;
    margin-bottom:5px;
}
.demo-table {
    background: #dcfddc;
    border-radius: 5px;
    padding: 10px;
}
.demo-success {
    margin-top: 5px;
    color: #478347;
    background: #e2ead1;
    padding: 10px;
    border-radius: 5px;
}
.captcha-input {
	background:#FFF url('captcha_code.php') repeat-y;
	padding-left: 85px;
}
</style>
</head>
<body>
<form name="frmContact" method="post" action="">
<div class="demo-heading">Contact Form</div>
<table border="0" cellpadding="10" cellspacing="1" width="100%" class="demo-table">
<tr class="tablerow">
<td width="50%">Name<br/><input type="text" name="userName" class="demo-input"></td>
<td width="50%">Email<br/><input type="text" name="userEmail" class="demo-input"></td>
</tr>
<tr class="tablerow">
<td colspan="2">Subject<br/><input type="text" name="subject" class="demo-input"></td>
</tr>
<tr class="tablerow">
<td colspan="2">Content<br/><textarea name="content" class="demo-input" rows="5"></textarea></td>
</tr>
<tr class="tablerow">
<td>Captcha Code: <div id="error-captcha" class="demo-error"><?php if(isset($error_message)) { echo $error_message; } ?></div><br/>
<input name="captcha_code" type="text" class="demo-input captcha-input">
</td>
<td><br/><input type="submit" name="submit" value="Submit" class="demo-btn"></td>
</tr>
</table>
<?php if(isset($success_message)) { ?>
<div class="demo-success"><?php echo $success_message; ?></div>
<?php } ?>
</form>
</body></html>