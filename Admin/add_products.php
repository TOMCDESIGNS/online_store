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
<script src="ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="images/jquery.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
		$("#parent").change(function(){
		   var parentID=$('#parent').val();
		   $.ajax({
		   url:'child_options.php',
		   type:'POST',
		   data: {parentID : parentID},
		   success: function(data){
			   $('#child').html(data);
		   }
		   
		   })
		});
	});
     
</script>
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
    $parent_option="select * from categories where parent=0";
	$res_parent=mysqli_query($db,$parent_option);
	$brand_option="select * from brands";
	$res_brand=mysqli_query($db,$brand_option);
?>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8"> 
<table class="table table-responsive table-hover table-bordered">
   <thead class="bg-primary">
      <th class="text-center" colspan="2"><h1>Add Product</h1></th>
   </thead>
   <tbody>
   <form method="post" action="add_products.php" enctype="multipart/form-data">
      <tr>  
		<th class="text-center"><h2>Product-Title</h2></th>
        <th class="text-center"><input type="text" class="form-control" name="product_title"></th>
      </tr>
	  <tr>  
		<th class="text-center"><h2>Parent</h2></th>
        <th class="text-center">
		     <select class="form-control" name="parent" id="parent">
		        <option value="#">Select Parent</option>
		        <?php 
				   while($row_parent=mysqli_fetch_array($res_parent)){
				?>
				<option value="<?=$row_parent['cats_id']; ?>"><?=$row_parent['cats_name']; ?></option>
				   <?php } ?>
		     </select>
      </tr>
	  <tr>  
		<th class="text-center"><h2>Category</h2></th>
        <th class="text-center">
		     <select class="form-control" name="child" id="child">
		        <option>Select Category</option>
		
		     </select></th>
      </tr>
	  <tr>  
		<th class="text-center"><h2>Brand</h2></th>
        <th class="text-center">
		     <select class="form-control" name="brand">
		        <option value="">Brand</option>
		        <?php 
				   while($row_brand=mysqli_fetch_array($res_brand)){
				?>
				<option value="<?=$row_brand['brand_id']; ?>"><?=$row_brand['brand_name']; ?></option>
				   <?php } ?>
		     <select>
      </tr>
	  <tr>  
		<th class="text-center"><h2>List-Price</h2></th>
        <th class="text-center"><input type="text" class="form-control" name="list_price"></th>
      </tr>
	  <tr>  
		<th class="text-center"><h2>Price</h2></th>
        <th class="text-center"><input type="text" class="form-control" name="price"></th>
      </tr>
	  <tr>  
		<th class="text-center"><h2>Product-Description</h2></th>
        <th class="text-center"><textarea placeholder="Enter your content" class="form-control ckeditor" cols="20" rows="12" name="product_desc"></textarea></th>
      </tr>
	  <tr>  
		<th class="text-center"><h2>Product-Image</h2></th>
        <th class="text-center"><input type="file" class="form-control" name="product_img"></th>
      </tr>
	  <tr>  
		<th class="text-center"><h2>Size</h2></th>
        <th class="text-center"><input type="text" class="form-control" name="product_size"></th>
      </tr>
	  <th colspan="2" class="text-center">
	      <button type="submit button" class="btn btn-success btn-lg" name="add_product">Add Product</button>
	  </th>
	</form>
   </tbody>
</table>
<?php 
  if(isset($_POST['add_product'])){
	  $pr_title=$_POST['product_title'];
	  $pr_parent=$_POST['parent'];
	  $pr_child=$_POST['child'];
	  $pr_brand=$_POST['brand'];
	  $pr_listprice=$_POST['list_price'];
	  $pr_price=$_POST['price'];
	  $pr_desc=$_POST['product_desc'];
	  $pr_img_name=$_FILES['product_img']['name'];
	  $pr_img_type=$_FILES['product_img']['type'];
	  $pr_img_size=$_FILES['product_img']['size'];
	  $pr_img_tmp=$_FILES['product_img']['tmp_name'];
	  $pr_size=$_POST['product_size'];
	  
	if($pr_title!=="" && $pr_parent!=="" && $pr_child!=="" && $pr_brand!=="" && $pr_listprice!=="" && $pr_price!=="" && $pr_desc!==""){
		$insert_sql="insert into products (product_title,cats_id,brand_id,list_price,price,product_desc,product_img,product_size) values ('$pr_title','$pr_child','$pr_brand','$pr_listprice','$pr_price','$pr_desc','$pr_img_name','$pr_size')";
		if($pr_img_size>0 && $pr_img_size<=500000){
			move_uploaded_file($pr_img_tmp,"../Shopping images/$pr_img_name");
		}
		else { echo "<script>alert('Maximum size 500kb allowed')</script>";
			   exit();
			   }
	$insert_query1=mysqli_query($db,$insert_sql)or die("Error: ".mysqli_error($db));
	if($insert_query1){
		echo "<script>alert('Product Added')</script>";
		header("Location: add_products.php");
		
	}
	
  }
  else{
	  echo "<script>alert('All fields are mandatory')</script>";
      exit();
  }
  }
?>

</div>
<div class="col-sm-2"></div>
</div>
</div> 

</body>
</html>	
<?php } ?>