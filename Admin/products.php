
<?php

session_start();
if(!isset($_SESSION['username'])){
	
	header("location: admin_login.php");
	
}
else{


include("includes/db.php");

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
<h1 class="text-center">Products</h1>
<a href="add_products.php"><button type="button" class="btn btn-success btn-lg pull-right" style="margin:10px;">Add Product</button></a>
<div class="row">
   <div class="col-sm-12">
       <table class="table table-bordered table-hover table-responsive">
	       <thead class="bg-primary">
		      <th class="text-center">Product</th>
			  <th class="text-center">Category</th>
			  <th class="text-center">Brand</th>
			  <th class="text-center">List-Price</th>
			  <th class="text-center">Price</th>
			  <th class="text-center">Product-Description</th>
			  <th class="text-center">Product-Image</th>
			  <th class="text-center">Edit</th>
			  <th class="text-center">Delete</th>
			  
		   </thead>
		   <tbody>
		      <?php
			      $sql4="select * from products";
				  $res4=mysqli_query($db,$sql4);
				  while($row4=mysqli_fetch_array($res4)){
					 $row4_cats_id=$row4['cats_id'];
					 $sql5="select * from categories where cats_id='$row4_cats_id'";
					 $res5=mysqli_query($db,$sql5);
					 $row5=mysqli_fetch_array($res5);
					 $row5_cats_name=$row5['cats_name'];
					 $row5_cats_parent=$row5['parent'];
					 $sql6="select * from categories where cats_id='$row5_cats_parent'";
					 $res6=mysqli_query($db,$sql6);
					 $row6=mysqli_fetch_array($res6);
					 $row6_cats_name=$row6['cats_name'];
					 $category="$row6_cats_name ~ $row5_cats_name";
					 $row4_brand_id=$row4['brand_id'];
					 $sql_brand="select * from brands where brand_id='$row4_brand_id'";
					 $res_brand=mysqli_query($db,$sql_brand);
					 $row_brand=mysqli_fetch_array($res_brand);
					 $brand=$row_brand['brand_name'];
					 
			  ?>
		      <tr>
			    <th class="text-center"><?=$row4['product_title'];?></th>
				<th class="text-center"><?=$category;?></th>
				<th class="text-center"><?=$brand;?></th>
				<th class="text-center"><?=$row4['list_price'];?></th>
				<th class="text-center"><?=$row4['price'];?></th>
				<th class="text-center"><?=substr($row4['product_desc'],0,20);?></th>
				<th class="text-center"><img src="../Shopping images/<?=$row4['product_img'];?>" height="80px" width="80px"></th>
				<th class="text-center"><a href="#"><span class="glyphicon glyphicon-edit"></span></a></th>
				<th class="text-center"><a href="#"><span class="glyphicon glyphicon-trash"></span></a></th>
			  </tr>
		   </tbody>
				  <?php } ?>
	   </table>
   
   
   </div>

</div>
</div>  
</body>
</head>
</html>
<?php } ?>