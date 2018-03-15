<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-width=1">
<title>Online Shopping</title>
<link type="text/css" href="stylesheet.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="images/jquery.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="bg-success">
   <div class="container-fluid">
 
<?php	
	
	include("includes/header2.php");

?>	
	<div class="row">
	  <div class="col-sm-4"></div>
	    <div class="col-sm-4">
		           <h1 class="text-center" id="header">SignUp</h1>
                 <form method="POST">
				   <div class="form-group">
				     <label for="name">Name:</label>
					 <input type="text" class="form-control" name="name" placeholder="Enter your name" required="true">
				   </div>
				   <div class="form-group">
				     <label for="email">Email:</label>
					 <input type="email" class="form-control" name="email" placeholder="Enter your email" required="true">
				   </div>
				   <div class="form-group">
				     <label for="password">Password:</label>
					 <input type="password" class="form-control" name="password" placeholder="Enter your password" required="true">
				   </div>
				   <div class="form-group">
				     <label for="c_password">Confirm Password:</label>
					 <input type="password" class="form-control" name="c_password" placeholder="Confirm password" required="true">
				   </div>
				   <div class="form-group text-center">
				   <button type="submit button" class="btn btn-success" id="login" name="signup">SignUp</button>
				   </div>
				 </form>
        </div>				 
	<div class="col-sm-4"></div>
	</div>
  </div>




</body>

</html>
<?php
include("includes/db.php");
if(isset($_POST['signup'])){
	$c_name=$_POST['name'];
	$c_email=$_POST['email'];
	$c_pass=mysqli_real_escape_string($db,$_POST['password']);
	$cc_pass=mysqli_real_escape_string($db,$_POST['c_password']);
	$secure_pass=md5($c_pass);
	if($c_pass==$cc_pass){
		$c_reg_sql="insert into users (name,email,password) values ('$c_name','$c_email','$secure_pass')";
		$c_reg_query=mysqli_query($db,$c_reg_sql);
		if($c_reg_query){
			echo "<script>alert('Registration Successful');</script>";
			echo "<script>window.location='index.php';</script>";
		}
	}
}
?>
