<?php

session_start();

?>

<!DOCTYPE html>
<html  lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-width=1">
<title>Admin Panel</title>
<script src="ckeditor/ckeditor.js"></script>
<link type="text/css" href="stylesheet.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="images/jquery.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="bg-success">
<div class="container">
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">

<form action="admin_login.php" method="post" style="margin-top:250px;">
<table class="table table-responsive table-hover">
   
    <thead>
	
	<tr>
	<h1 align="center">Admin Login</h1>
	</tr>
	
	</thead>
	<tbody>
	<tr>
	<td align="center">Username:</td>
	<td align="center"><input type="text" name="username" placeholder="Username" class="form-control"></td>
	</tr>
	<tr>
	<td align="center">Password:</td>
	<td align="center"><input type="password" name="password" placeholder="Password" class="form-control"></td>
	</tr>
	
	</tbody>
	
 
</table>
<center><input type="submit" name="login" value="Login" class="btn btn-success"></center>


</form>
</div>
<div class="col-sm-3"></div>
</div>
</div>

</body>
</html>
<?php
include("includes/db.php");

if(isset($_POST['login'])){
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$_SESSION['username']="$username";
	$query="select * from admin_login where username='$username' && password='$password'";
	$result=mysqli_query($db,$query);
	if(mysqli_num_rows($result)>0){
		header("location: index.php");
	}
	else{
		echo "<script>alert('Email or password incorrect');</script>";
	}
}

?>