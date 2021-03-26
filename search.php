<?php
	$need_login	=	"1";
	include("includes/config.php");
	include("includes/Posts_class.php");
	
	$obj	=	new Posts_class();
	
	$movieName	=	$_POST['movieName'];
	$genre		=	$_POST['genre'];
	$theater		=	$_POST['theater'];
	
	$search_result	=	$obj->search($movieName,$genre,$theater);
	
	
	foreach($search_result as $row){?>
	
	<div class="col-sm-3" style="padding:0px;">
					<div class="card" style="height:450px;">
					<a href="review.php?id=<?php echo $row->id;?>" style="text-decoration:none;color:#AAA;">
						<div style="min-height:250px;max-height:250px;overflow:hidden">
							<img class="card-img-top"  src="<?php echo $row->movieImage;?>" alt="Card image" style="width:100%">
						</div>
						<div class="card-body">
						  <h4 class="card-title"><?php echo $row->movieName;?></h4>
						 
					  
						</div>
						</a>
					</div>
	</div>
	
	<?php } ?>