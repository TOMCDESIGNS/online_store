<?php
    include("includes/db.php");
	if(isset($_GET['delete_id_cats']) && !empty($_GET['delete_id_cats'])){
		
		$delete_id1=$_GET['delete_id_cats'];
		$delete_cat="delete from categories where cats_id='$delete_id1'";
		$res_delete=mysqli_query($db,$delete_cat);
		header("Location: categories.php");
	}
    
?>