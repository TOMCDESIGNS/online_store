<?php
   session_start();
   include("includes/db.php");
	     $user_id=$_SESSION['id'];
		 $update_profile="select * from users where id='$user_id'";
		 $res_profile=mysqli_query($db,$update_profile);
		 $row_profile=mysqli_fetch_array($res_profile);
		 $user_name=$row_profile['name'];
		 $user_email=$row_profile['email'];
		 $user_pass=$row_profile['password'];

?>
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
	  <div class="col-sm-4">
	     <div class="panel">
		    <div class="panel-heading text-center" style="background-color:orange;">
			   <h1 style="color:white;">My Account</h1>
			</div>
			<div class="panel-body text-center">
			   <h2>Orders</h2>
			   <a href="#"><h4>My Orders</h4></a><hr>
			   <h2>Wishlist</h2>
			   <a href="#"><h4>My Wishlist</h4></a><hr>
			   <h2>Settings</h2>
			   <a href="myaccount.php?id=<?=$user_id ?>"><h4>Change Password</h4></a>
			   <a href="myaccount.php"><h4>Update Profile</h4></a>
			   <a href="#"><h4>Deactivate Account</h4></a>
			</div>
		 </div>
	  </div>
	  <div class="col-sm-6">
	  <?php
	      if(isset($_GET['id'])){ ?>
			  <h1 class="text-center">Change Password</h1>
		 <form action="#" method="post">
		           <div class="form-group">
				     <label for="name">Old Password:</label>
					 <input type="password" class="form-control" name="old_pass" placeholder="Old Password">
				   </div>
		           <div class="form-group">
			         <label for="email">New Password:</label>
					 <input type="password" class="form-control" name="new_pass" placeholder="New Password">
				   </div>
				   <div class="form-group">
			         <label for="email">Confirm Password:</label>
					 <input type="password" class="form-control" name="con_new_pass" placeholder="Confirm Password">
				   </div>
				   <div class="form-group text-center">
				   <button type="submit button" class="btn btn-success" name="change_pass">Change Password</button>
		 	       </div>
		 </form>
		  
		  <?php } 
		  
		  else { ?>
		  <h1 class="text-center">Profile</h1>
		 <form action="#" method="post">
		           <div class="form-group">
				     <label for="name">Name:</label>
					 <input type="text" class="form-control" name="new_name" placeholder="Enter your name" value="<?=$user_name ?>">
				   </div>
		           <div class="form-group">
			         <label for="email">Email:</label>
					 <input type="email" class="form-control" name="new_email" placeholder="Enter your email" value="<?=$user_email ?>">
				   </div>
				   <div class="form-group text-center">
				   <button type="submit button" class="btn btn-success" name="update_profile">Update</button>
		 	       </div>
		 </form>
	     
		  <?php } ?>
	  </div>
	  <div class="col-sm-2">
	  </div>
	</div>
	
	
  </div>




</body>

</html>
<?php
  if(isset($_POST['change_pass'])){
			  $old_pass=$_POST['old_pass'];
			  $new_pass=$_POST['new_pass'];
			  $con_new_pass=$_POST['con_new_pass'];
			  if($new_pass!=$con_new_pass){
				  echo "<script>alert('$new_pass dont match $con_new_pass')</script>";
				  exit();
			  }
			  else
			  if($old_pass==$user_pass){
				  $change_pass_sql="update users set password='$new_pass' where id='$user_id'";
				  $res_change_pass=mysqli_query($db,$change_pass_sql);
				  echo "<script>alert('Password Updated Successfully')</script>";
			  }
			  else{
				  echo "<script>alert('Incorrect current password')</script>";
				  exit();
			  }
		  }
  if(isset($_POST['update_profile'])){
	  $new_name=$_POST['new_name'];
	  $new_email=$_POST['new_email'];
	  if($new_name!="" && $new_email!=""){
		  $res_update_pro=mysqli_query($db,"update users set name='$new_name',email='$new_email' where id='$user_id'");
		  echo "<script>alert('Profile Updated Successfully')</script>";
				echo "<script>window.open('index.php','_self')</script>";
	  }
	  else{
			echo "<script>alert('All fields are mandatory')</script>";
			exit();
	  }
  }
?>