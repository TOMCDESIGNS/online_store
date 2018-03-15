<?php

session_start();
if(!isset($_SESSION['username'])){
	
	header("location: admin_login.php");
	
}
else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-width=1">
<title>Admin Panel</title>
<link type="text/css" href="stylesheet.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="images/jquery.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="bg-success">
<div class="container-fluid">
   
   <div class="well well-lg" style="background-color:orange;">
	  <div class="row">
	     <div class="col-sm-12">
		 <h1 align="center" style="color:white;">Welcome To The Admin Panel Of Online Shopping</h1>
		 
		 </div>
	  </div>
	</div>
   

<?php
    include("includes/navigation.php");

?> 
</div>

	  
</body>

</html>
<?php } ?>