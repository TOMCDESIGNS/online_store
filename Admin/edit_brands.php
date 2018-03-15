<?php
  include("includes/db.php");
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
		
		$edit_id=$_GET['edit_id'];
		$edit_brand="select * from brands where brand_id='$edit_id'";
		$result_edit=mysqli_query($db,$edit_brand);
		$row_edit=mysqli_fetch_array($result_edit);
		$edit_brand=$row_edit['brand_name'];
		
	}

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
<div class="row">
<div class="col-sm-12"> 
<div class="col-sm-3"></div> 
<div class="col-sm-6">
<h1 class="text-center">Brands</h1><hr>
<form class="form-inline text-center" action="edit_brands.php?update_id=<?php echo $edit_id; ?>" method="post">
  <label for="brandName">Edit Brand:</label>
  <div class="input-group">
   <input class="form-control" type="text" name="brandName" value="<?php if(isset($_POST['brandName'])){echo $_POST['brandName'];}else echo $edit_brand;?>">   
   <div class="input-group-btn">
   <button type="submit button" class="btn btn-success" name="edit_brand">Edit Brand</button>
  </div>
   </div>    
   </form><hr>
   <?php
	     if(isset($_POST['edit_brand'])){
			 $update_id=$_GET['update_id'];
			 $bname=$_POST['brandName'];
			 if($_POST['brandName']!==''){
				 
				 $check_brand="select * from brands where brand_name='$bname'";
				 $result_check=mysqli_query($db,$check_brand);
				 $count=mysqli_num_rows($result_check);
				 if($count>0){
					 
					echo "<script>alert('$bname already exists')</script>";
					
				 }
			else{
				
				$update_brand="update brands set brand_name='$bname' where brand_id='$update_id'";
				 $result_update=mysqli_query($db,$update_brand);
				 header("Location: brands.php");
			}
            
			 }
			 else
					echo "<script>alert('U must Enter a Brand Name')</script>";
			 
			 
		 }
	 
	 ?>
<table class="table table-responsive table-hover table-bordered text-center" style="margin:auto;">
   <thead>
      <th class="text-center">Edit</th>
      <th class="text-center">Brands</th>
	  <th class="text-center">Delete</th>
   </thead>
   <tbody>
   <?php
      
	  $select_brand="select * from brands";
	  $results_brands=mysqli_query($db,$select_brand);
	  while($row_brands=mysqli_fetch_array($results_brands)){
		  $brand_id=$row_brands['brand_id'];
   ?>
      
   <tr>
      <td><a href="edit_brands.php?edit_id=<?php echo $brand_id; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
      <td><?php echo $row_brands['brand_name']; ?></td>
	  <td><a href="brands.php?delete_id=<?php echo $brand_id; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
   </tr>
   
	  <?php } ?>
   
   
   </tbody>


</table>

<?php
  
    if(isset($_GET['delete_id']) && !empty($_GET['delete_id'])){
		
		$delete_id=$_GET['delete_id'];
		$delete_brand="delete from brands where brand_id='$delete_id'";
		$result_delete=mysqli_query($db,$delete_brand);
		header("Location: brands.php");
		
	}

?>



</div>
<div class="col-sm-3"></div> 
</div>
</div>
</div>
</body>
</head>
</html>