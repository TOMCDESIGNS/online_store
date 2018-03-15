<?php
   session_start();
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
	include("includes/banner.php");
    include("includes/db.php");
    if(isset($_GET['p_id']) && isset($_SESSION['id'])){
	   $user_id=$_SESSION['id'];
	   $p_id=$_GET['p_id'];
	   $g_pro_sql="select * from products where product_id='$p_id'";
	   $res_g_pro=mysqli_query($db,$g_pro_sql);
	   $row_g_pro=mysqli_fetch_array($res_g_pro);
	   $p_price=$row_g_pro['price'];
       $p_title=$row_g_pro['product_title'];
       $p_img=$row_g_pro['product_img'];
       $in_pro_sql="INSERT INTO `cart` (user_id,p_id,price,p_title,p_img,qty) VALUES ('$user_id', '$p_id', '$p_price', '$p_title', '$p_img', '1')";
       $res_in_pro=mysqli_query($db,$in_pro_sql);
	   echo'<script>window.location="index.php";</script>';
   }
   else if(isset($_GET['p_id']) && !isset($_SESSION['id'])){
	   echo "<script>alert('Please Login')</script>";
   }
?>
                   <!--Newest Products starts-->
<div class="row">

            <div class="col-sm-12">
			     <center><h1 id="part"><a href="#">Newest Products</a></h1></center>
				 <button type="button" class="btn" style="background-color:orange;color:white;margin:10px;float:right;"><b>View All</b></button>
				 </br>
			  
			</div>
</div>
			<div class="col-sm-12">
			
			             <?php
						    if(isset($_GET['catsid']) || isset($_GET['search'])){
								if(isset($_GET['catsid'])){
						    $catsid=$_GET['catsid'];
							$product_query="select * from products where cats_id='$catsid'";
							$result_product=mysqli_query($db,$product_query);
								}
							if(isset($_GET['search'])){
						    $search_key=$_GET['search_key'];
							$product_query="select * from products where product_title LIKE '%$search_key%' OR product_desc LIKE '%$search_key%'";
							$result_product=mysqli_query($db,$product_query);
							}
							while($row_product=mysqli_fetch_array($result_product)){
								  $pro_id=$row_product['product_id'];
						          $product_img=$row_product['product_img'];
								  $product_title=$row_product['product_title'];
								  $list_price=$row_product['list_price'];
								  $price=$row_product['price'];
						 ?>
						 
			      <div class="col-sm-3" style="margin-top:10px;">
				       <center id="products">
					      <a href="#"><img src="Shopping images/<?php echo $product_img; ?>" class="img-responsive img-thumbnail">
						  <h4><?php echo $product_title; ?></h4></a>
					      <p class="list-price text-danger">List Price:<s>Rs.<?php echo $list_price; ?></s></p>
						  <p>Price:Rs.<?php echo $price; ?></p>
						  <a href="index.php?p_id=<?= $pro_id ?>"><button type="button" class="btn btn-success">Add To Cart</button></a>
					      <button type="button" class="btn btn-danger">WishList</button>
					   
					   </center>
				  </div>	  
							<?php }} ?>
			</div>


                     <!--Newest Products Ends-->
<hr>


	
  </div>




</body>

</html>