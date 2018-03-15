<?php
  include("includes/db.php");
  if(isset($_SESSION['id'])){
  $uid=$_SESSION['id'];
  $count_cart=mysqli_query($db,"select * from cart where user_id='$uid'");
  $count_cart_no=mysqli_num_rows($count_cart);
  }
?>
<div class="well well-lg" style="background-color:orange;">
	  <div class="row">
	     <div class="col-sm-4">
		 <h1 align="center" style="color:white;">Online Shopping</h1>
		 
		 </div>
		 
		 <div class="col-sm-5">
		 
		    <form class="input-group form-inline" method="get" action="pages.php" style="align:center;padding-top:18px;">
			
			<input type="text" name="search_key" class="form-control input-lg" placeholder="Search For Products">
			
			<div class="input-group-btn"><button type="submit" name="search" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-search"></i></button>
			</div>
			</form>
		 
		 </div>
		 
		 <div class="col-sm-3">
		 <h4 style="color:white;text-align:center;">Welcome <?php if(isset($_SESSION["name"])){ echo " ".$_SESSION['name']."!"; } else{ echo "Guest!";} ?></h4>
		    <center><a href="cart.php"><button type="button" id="cart" class="btn" style="background-color:darkorange;margin-top:13px;">
			<h4 style="color:white;"><span class="badge" style="background-color:orange;font-size:20px;"><?php if(isset($_SESSION['id'])) echo $count_cart_no; else echo 0; ?></span>Cart&nbsp
			<span class="glyphicon glyphicon-shopping-cart"></h4></span></button></a>
			<?php
			if(isset($_SESSION['name'])){ ?>
				<button type="button" class="btn dropdown" style="background-color:darkorange;margin-top:13px;">
			<h4 style="color:white;" class="dropdown-toggle" data-toggle="dropdown">My Account&nbsp<span class="caret"></h4>
			</span>
			<ul class="dropdown-menu">
			 <li><a href="myaccount.php">Account</a></li>
			 <li><a href="#">Orders</a></li>
			 <li><a href="#">Wishlist</a></li>
			 <li><a href="logout.php">Logout</a></li>
			</ul></button></center>
			<?php }
			else{
			?>
		  <button type="button" class="btn" style="background-color:darkorange;margin-top:13px;" data-toggle="modal" data-target="#mymodal">
			<h4 style="color:white;">LogIn&nbsp<span class="glyphicon glyphicon-user"></h4>
			</span></button></center>
		 <div class="modal fade" id="mymodal">
		   <div class="modal-dialog bg-success">
		     <div class="modal-content">
			   <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h1 class="text-center" id="header">LogIn</h1>
			   </div>
			   <div class="modal-body" id="body">
			       <form method="POST" action="index.php">
				   <div class="form-group">
				     <label for="email">Email:</label>
					 <input type="email" class="form-control" name="email" placeholder="Enter your email">
				   </div>
				   <div class="form-group">
				     <label for="password">Password:</label>
					 <input type="password" class="form-control" name="password" placeholder="Enter your password">
				   </div>
				   <div class="form-group text-center">
				   <button type="submit button" class="btn btn-success" name="login">LogIn</button>
				   </div>
				   </form>
				   <a href="reg.php"><h4 class="pull-right">New User? Sign Up </h4></a>
				   <div class="clearfix"></div>
			   </div>
			 </div>
		   </div>
		 </div>
			<?php } ?>
		 </div>
	  
	  </div>
	  
	  <?php
	  include("includes/db.php");
	  if(isset($_POST['login'])){
		  $email=mysqli_real_escape_string($db,$_POST['email']);
		  $password=mysqli_real_escape_string($db,$_POST['password']);
		  $pass_secure=md5($password);
		 echo "<script>alert('$pass_secure');</script>";
		if($email!="" && $password!=""){
			$login_sql="select * from users where email='$email' && password='$pass_secure'";
			$res_login=mysqli_query($db,$login_sql);
			$count_login=mysqli_num_rows($res_login);
			if($count_login>0){
				$row_login=mysqli_fetch_array($res_login);
				$u_name=$row_login['name'];
				$u_id=$row_login['id'];
				$_SESSION["id"]=$u_id;
				$_SESSION["name"]=$u_name;
				header("Location: index.php");
			}
			else{
				echo "<script>alert('Incorrect Email Id or Password')</script>";
			}
		}
		else{
				echo "<script>alert('All Fields are mandatory')</script>";
				exit();
			}
	  }
	  
	  ?>
	  
	  <div class="row">
		
	      <div class="col-sm-2"></div>
		  <!--Navigation begins here-->
		  <div class="col-sm-8">
		  
		    <div class="navbar" style="margin-bottom:-23px;margin-top:15px;background-color:orange;">
			    <div class="navbar-header">
			      <button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				      <span class="icon-bar" style="background-color:white";></span>
					  <span class="icon-bar" style="background-color:white";></span>
					  <span class="icon-bar" style="background-color:white";></span>
				  </button>
			    </div>
			 <div class="navbar-collapse collapse">
			   <ul class="nav navbar-nav">
			       <li><a href="index.php">Home</a></li>
				   <?php
			   
			       include("db.php");
				   $nav_menu="select * from categories where parent=0";
				   $result_menu=mysqli_query($db,$nav_menu);
				   while($row_menu=mysqli_fetch_array($result_menu)){
					   $cats_id=$row_menu['cats_id'];
					   
					   
					?>   
			       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $row_menu['cats_name']; ?>
				      <span class="caret"></span></a>
				     <?php
					     $nav_dropdown="select * from categories where parent='$cats_id'";
				         $result_dropdown=mysqli_query($db,$nav_dropdown);
				         
					  ?> 
				      <ul class="dropdown-menu">
					  <?php while($row_dropdown=mysqli_fetch_array($result_dropdown)){ ?>
					      <li><a href="pages.php?catsid=<?=$row_dropdown['cats_id'] ?>"><?php echo $row_dropdown['cats_name']; ?></a></li>
				   
						 <?php } ?>  
					     
					  
					  </ul>
					 
				    </li>
					 
				   <?php } ?>
				   
				   
			   
			   
			   </ul>
			 </div>  
			
			</div>
		  
		  </div>
		  <!--Navigation Ends here-->
		<div class="col-sm-2"></div>
		  
	    </div>  
	</div>
	
	