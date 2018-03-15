<?php 
  include("includes/db.php");
   $parent_id=$_POST['parentID'];
    echo "<script>alert('id is $parent_id')</script>";
	$result10=mysqli_query($db,"select * from categories where parent='$parent_id'");
	$row10=mysqli_fetch_array($result10);
	$row10_name=$row10['cats_name'];
?>
	<option value=""></option>
	