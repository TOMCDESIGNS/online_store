<?php
   include("includes/db.php");
    if(isset($_GET['edit_id_cats']) && !empty($_GET['edit_id_cats'])){
			  
			  $update_cat=$_GET['edit_id_cats'];
			  $update_cat_sql="select * from categories where cats_id='$update_cat'";
			  $update_cat_res=mysqli_query($db,$update_cat_sql);
			  $update_cat_row=mysqli_fetch_array($update_cat_res);
				  $update_parent_id=$update_cat_row['parent'];
				  $update_cat_name=$update_cat_row['cats_name'];
			  
			  
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
	   
	   
	       <h1 class="text-center">Edit A Category</h1>
		<form method="post" action="edit_cat.php?edit_id_cats=<?php echo $update_cat; ?>">
		
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
			   <input type="text" name="category" placeholder="Category" class="form-control" value="<?php echo $update_cat_row['cats_name']; ?>">
		   
		   </div>
		   <div class="form-group">
		     <center><button type="button submit" name="edit_category" class="btn btn-success">Edit Category</center>
		   </div>
		</form>
	   
	   <?php
	   	 //Editing Form
   
     if(isset($_POST['edit_category'])){
		 $update_id=$_GET['edit_id_cats'];
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
			  
			  $sql3="update categories set cats_name='$cname',parent='$pname' where cats_id='$update_id'";
			  $result3=mysqli_query($db,$sql3);
			  header("Location: categories.php");
		  }
			
		}
      else{
		  echo "<script>alert('U must enter a Category')</script>";
	  }		
	 }
	   ?>
	   </div>
	   
	                 <!--Catergory Form Ends -->
	   
	   <div class="col-sm-1">
	   </div>
	                 <!--Catergory table Begins -->
	   
	   <div class="col-sm-5">
	   
	      <table class="table table-responsive table-bordered">
		      <thead>
			     <th class="text-center">Catergory</th>
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
