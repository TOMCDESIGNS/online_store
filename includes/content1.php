<?php
   
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
			<div class="row">
			<div class="col-sm-12">
			
			             <?php
						    include("includes/db.php");
							$product_query="select * from products order by 1 desc limit 0,8";
							$result_product=mysqli_query($db,$product_query);
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
					      <p class="list-price text-danger">List Price:<s> ₹<?php echo $list_price; ?></s></p>
						  <p>Price: ₹<?php echo $price; ?></p>
						  <a href="index.php?p_id=<?= $pro_id ?>"><button type="button" class="btn btn-success">Add To Cart</button></a>
					      <button type="button" class="btn btn-danger">WishList</button>
					   
					   </center>
				  </div>	  
							<?php } ?>
			</div>
			</div>


                     <!--Newest Products Ends-->
<hr>

                     <!--Best Of Electronics Starts-->

<div class="row">

            <div class="col-sm-12">
			     <center><h1 id="part"><a href="#">Best Of Electronics</a></h1></center>
				 <button type="button" class="btn" style="background-color:orange;color:white;margin:10px;float:right;"><b>View All</b></button>
				 </br>
			  
			</div>
</div>
			<div class="row">
			<div class="col-sm-12">
			 <?php
							$cats_res1=mysqli_query($db,"select * from categories where parent='1'");
							while($row_cats1=mysqli_fetch_array($cats_res1)){
							$cats_id2=$row_cats1['cats_id'];
							$pro_elec_query="select * from products where cats_id='$cats_id2' order by 1 desc limit 0,8";
							$result_pro_elec=mysqli_query($db,$pro_elec_query);
							
							while($row_product1=mysqli_fetch_array($result_pro_elec)){
								  $pro_id1=$row_product1['product_id'];
						          $product_img1=$row_product1['product_img'];
								  $product_title1=$row_product1['product_title'];
								  $list_price1=$row_product1['list_price'];
								  $price1=$row_product1['price'];
						 ?>
			      <div class="col-sm-3" style="margin-top:10px;">
				       <center id="products">
					      <a href="#"><img src="Shopping images/<?php echo $product_img1; ?>" class="img-responsive img-thumbnail">
						  <h4><?php echo $product_title1; ?></h4></a>
					      <p class="list-price text-danger">List Price:<s> ₹<?php echo $list_price1; ?></s></p>
						  <p>Price: ₹<?php echo $price1; ?></p>
						  <a href="index.php?p_id=<?= $pro_id1 ?>"><button type="button" class="btn btn-success">Add To Cart</button></a>
					      <button type="button" class="btn btn-danger">WishList</button>
					   
					   </center>
				  </div>  
							<?php }} ?>
			</div>
			</div>


					 <!--Best Of Electronics Ends-->
					 
					 
					 
