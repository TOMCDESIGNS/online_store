
<?php

session_start();
if(!isset($_SESSION['username'])){
	
	header("location: admin_login.php");
	
}
else{


   include("includes/db.php");
   
     if(isset($_POST['add_category'])){
		 
		 $pname=$_POST['parent'];
		 $cname=$_POST['category'];
		 
		if($cname!==""){
			
			$sql2="select * from categories where cats_name='$cname' && parent='$pname'";
			$result2=mysqli_query($db,$sql2);
			$count1=mysqli_num_rows($result2);
			if($count1>0){
				echo "<script>alert('$cname already exists')</script>";
			}
		  else{
			  
			  $sql3="insert into categories (cats_name,parent) values ('$cname','$pname')";
			  $result3=mysqli_query($db,$sql3);
			  header("Location: categories.php");
		  }
			
		}
      else{
		  echo "<script>alert('U must enter a Category')</script>";
	  }		
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
                      <!--Catergory Form Begins -->
<?php 
			    $sql1="select * from categories where parent=0";
				$result1=mysqli_query($db,$sql1);
				
?>
       <div class="col-sm-6">
	   
	       <h1 class="text-center">Add A Category</h1>
		<form method="post" action="categories.php">
		
		   <div class="form-group">
		       <label for="parent">Parent:</label>
		       <select class="form-control" name="parent">
			      <option value="0">Parent</option>
<?php while($row1=mysqli_fetch_array($result1)){ ?>
				 <option value="<?php echo $row1['cats_id']; ?>"><?php echo $row1['cats_name']; ?></option>
<?php } ?>
			 
			  </select>
		   </div>
		   <div class="form-group">
		       <label for="parent">Category:</label>
			   <input type="text" name="category" placeholder="Category" class="form-control">
		   
		   </div>
		   <div class="form-group">
		     <center><button type="button submit" name="add_category" class="btn btn-success">Add Category</center>
		   </div>
		</form>
	   
	   
	   </div>
	   
	                 <!--Catergory Form Ends -->
	   
	   <div class="col-sm-1">
	   </div>
	                 <!--Catergory table Begins -->
	   
	   <div class="col-sm-5">
	   
	      <table class="table table-responsive table-bordered">
		      <thead>
			     <th class="text-center">Category</th>
				 <th class="text-center">Parent</th>
				 <th class="text-center">Edit</th>
				 <th class="text-center">Delete</th>
			  </thead>
			  <tbody>
<?php 
				    $parent_sql="select * from categories where parent=0";
					$parent_result=mysqli_query($db,$parent_sql);
					while($row_parent=mysqli_fetch_array($parent_result)){
				       $parent_id=$row_parent['cats_id'];
				
?>
			   <tr class="bg-primary">
			     <th class="text-center"><?php echo $row_parent['cats_name']; ?></th>
				 <th class="text-center">Parent</th>
				 <th class="text-center"><a href="edit_cat.php?edit_id_cats=<?php echo $parent_id; ?>"><span class="glyphicon glyphicon-edit" style="color:white;"></span></a></th>
			     <th class="text-center"><a href="delete_cats.php?delete_id_cats=<?php echo $parent_id; ?>"><span class="glyphicon glyphicon-trash" style="color:white;"></span></a></th>
			   </tr>
<?php
				     $child_sql="select * from categories where parent='$parent_id'";
					$child_result=mysqli_query($db,$child_sql);
					while($row_child=mysqli_fetch_array($child_result)){
						$child_id=$row_child['cats_id'];
?>
			   
			   <tr class="bg-info">
			     <th class="text-center"><?php echo $row_child['cats_name']; ?> </th>
				 <th class="text-center"><?php echo $row_parent['cats_name']; ?></th>
				 <th class="text-center"><a href="edit_cat.php?edit_id_cats=<?php echo $child_id; ?>"><span class="glyphicon glyphicon-edit"></span></a></th>
			     <th class="text-center"><a href="delete_cats.php?delete_id_cats=<?php echo $child_id; ?>"><span class="glyphicon glyphicon-trash"></span></a></th>
			   </tr>
<?php }} ?>
			  
			  </tbody>
		  
		  
		  
		  </table>
		  
	   
	   
	   </div>

	  
                           <!--Catergory table Ends -->
  
  </div>



</div>
</div>  
</body>
</head>
</html>
<?php } ?>