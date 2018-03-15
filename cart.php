<?php
   session_start();
   include("includes/db.php");
   if(isset($_SESSION['id'])){
	   $u_id=$_SESSION['id'];
   
    $c_pro_sql="select * from cart where user_id='$u_id'";
	   $res_c_pro=mysqli_query($db,$c_pro_sql);
   }
   else if(!isset($_SESSION['id'])){
	   echo "<script>alert('Please Login')</script>";
	   echo'<script>window.location="index.php";</script>';
   }
   
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-width=1">
<title>Online Shopping</title>
<link type="text/css" href="stylesheet.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body class="bg-success">
   <div class="container-fluid">
 
<?php	
	
	include("includes/header2.php");
	

?>	</br></br></br>
	<div class="row">
	  <div class="col-sm-2">
	  </div>
	  <div class="col-sm-8">
	     <div class="panel">
		    <div class="panel-heading" style="background-color:orange;">
			  <h1 class="text-center" style="color:white;">My Cart</h1>
			</div>
			<div class="panel-body">
			   <div class="panel-heading">
			      <div class="row">
				     <div class="col-sm-2">
					   <h3 class="text-center">Image</h3>
					 </div>
					 <div class="col-sm-2">
					   <h3 class="text-center">Price</h3>
					 </div>
					 <div class="col-sm-2">
					   <h3 class="text-center">Title</h3>
					 </div>
					 <div class="col-sm-2">
					 <h3 class="text-center">Quantity</h3>
					 </div>
					 <div class="col-sm-2">
					 <h3 class="text-center">Update cart</h3>
					 </div>
					 <div class="col-sm-2">
					 <h3 class="text-center">Total</h3>
					 </div>
				  </div>
			   </div>
			   <div class="panel-body">
			   <form method="POST">
			     <?php while($row_c_pro=mysqli_fetch_array($res_c_pro)){
	                   $pro_id=$row_c_pro['p_id'];
					   $pro_price=$row_c_pro['price'];
                       $pro_title=substr($row_c_pro['p_title'],0,13);
                       $pro_img=$row_c_pro['p_img'];
	                   $pro_qty=$row_c_pro['qty']; 
					 
					 ?>
					
			      <div class="row">
				     <div class="col-sm-2">
					   <center><img src="Shopping images/<?=$pro_img; ?>" width="80px" height="50px"></center>
					 </div>
					 <div class="col-sm-2">
					   <h3 class="text-center"><?=$pro_price; ?></h3>
					 </div>
					 <div class="col-sm-2">
					   <h3 class="text-center"><?=$pro_title; ?></h3>
					 </div>
					 <div class="col-sm-2">
					 </br><input type="number" class="form-control" value="<?=$pro_qty; ?>" min="0" name="qty">
					 </div>
					 <?php
					  if(isset($_GET['prod_id'])){
						  $prod_id=$_GET['prod_id'];
						 $qty=$_POST['qty'];
						 $refresh_sql=mysqli_query($db,"update cart set qty='$qty' where user_id='$u_id' && p_id='$prod_id'")or die("error: ".mysqli_error($db));
						
					 }
					 ?>
					 <div class="col-sm-2">
					 <center><a href="cart.php?prod_id=<?=$pro_id ?>"><button class="btn" type="submit" name="refresh"><span class="glyphicon glyphicon-refresh"></span></button></a></center>
					 </div>
					 
					 <div class="col-sm-2">
					 <h3 class="text-center">₹<?=$pro_qty * $pro_price ?>/-</h3>
					 </div>
				  </div></br></br>
				  <?php } ?>
				  </form>
			   </div>
			   <div class="panel-footer">
			     <center><button type="submit button" class="btn btn-success btn-lg" name="checkout">Proceed To Checkout</button></center>
			   </div>
			</div>
		 </div>
	  </div>
	  <div class="col-sm-2">
	  </div>
	</div>
	
	
	
  </div>



</body>
</html>