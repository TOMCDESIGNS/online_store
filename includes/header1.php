<div class="well well-lg" style="background-color:orange;">
	  <div class="row">
	     <div class="col-sm-4">
		 <h1 align="center" style="color:white;">Online Shopping</h1>
		 
		 </div>
		 
		 <div class="col-sm-5">
		 
		    <form class="input-group form-inline" method="post" action="#" style="align:center;padding-top:18px;">
			
			<input type="text" name="search" class="form-control input-lg" placeholder="Search For Products">
			
			<div class="input-group-btn"><button type="submit" name="submit" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-search"></i></button>
			</div>
			</form>
		 
		 </div>
		 
		 <div class="col-sm-3">
		 <h4 style="color:white;text-align:center;">Welcome Guest!</h4>
		    <center><button type="button" class="btn" style="background-color:darkorange;margin-top:13px;"><h4 style="color:white;">
			Cart&nbsp<span class="glyphicon glyphicon-shopping-cart"></h4>
			</span></button>
			<button type="button" class="btn" style="background-color:darkorange;margin-top:13px;"><h4 style="color:white;">
			LogIn&nbsp<span class="glyphicon glyphicon-user"></h4>
			</span></button></center>
		 
		 </div>
	  
	  </div>
	  <div class="row">
		
	      <div class="col-sm-2"></div>
		  <!--Navigation begins here-->
		  <div class="col-sm-8">
		  
		    <div class="navbar" style="margin-bottom:-23px;margin-top:15px;background-color:orange;">
			    <div class="navbar-header">
			      <button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				      <span class="icon-bar" style="background-color:white";></span>
					  <span class="icon-bar" style="background-color:white";></span>
					  <span class="icon-bar" style="background-color:white";></span>
				  </button>
			    </div>
			 <div class="navbar-collapse collapse">
			   <ul class="nav navbar-nav">
			       <li><a href="index.php">Home</a></li>
				   <?php
			   
			       include("db.php");
				   $nav_menu="select * from categories where parent=0";
				   $result_menu=mysqli_query($db,$nav_menu);
				   while($row_menu=mysqli_fetch_array($result_menu)){
					   $cats_id=$row_menu['cats_id'];
					   
					   
					?>   
			       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $row_menu['cats_name']; ?>
				      <span class="caret"></span></a>
				     <?php
					     $nav_dropdown="select * from categories where parent='$cats_id'";
				         $result_dropdown=mysqli_query($db,$nav_dropdown);
				         
					  ?> 
				      <ul class="dropdown-menu">
					  <?php while($row_dropdown=mysqli_fetch_array($result_dropdown)){ ?>
					      <li><a href="#"><?php echo $row_dropdown['cats_name']; ?></a></li>
				   
						 <?php } ?>  
					     
					  
					  </ul>
					 
				    </li>
					 
				   <?php } ?>
				   
				   
			   
			   
			   </ul>
			 </div>  
			
			</div>
		  
		  </div>
		  <!--Navigation Ends here-->
		<div class="col-sm-2"></div>
		  
	    </div>  
	</div>
	