<?php
$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","username","password","database_name");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		echo '<script>alert("Wrong Usarname or Password")</script>';
	} else {
		session_start();
		$_SESSION["loggedin"] = true;
		header("Location: welcome.php");
	}
}
?>
<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<form name="frmUser" method="post" action="">
	<div class="message"><?php if($message!="") { echo $message; } ?></div>
		<table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
			<tr class="tableheader">
			<td align="center" colspan="2">Login</td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="userName" placeholder="User Name" class="login-input"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="password" placeholder="Password" class="login-input"></td>
			</tr>
			<tr class="tableheader">
			<td align="center" colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
			</tr>
		</table>
</form>
</body></html>