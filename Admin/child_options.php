<?php
   include("includes/db.php");
   $parent_id=$_POST['parentID'];
   $res_child=mysqli_query($db,"select * from categories where parent='$parent_id'");
   
  
   ?>
   <option value="">Select Category</option>
   <?php
   while($row_child=mysqli_fetch_array($res_child)){
	    $child=$row_child['cats_name'];
		$child_id=$row_child['cats_id'];
		echo "<option value='$child_id'>$child</option>";   
   } ?>
   