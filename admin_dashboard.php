<?php
	//including config and header files
	$login_type	=	"admin";
	include("includes/config.php");
	include("theme/header.php");
	include("theme/navigation.php");
?>
<?php
	include("includes/Posts_class.php");
	
	$obj	=	new Posts_class();
	$result	=	"";
	
	
	?>
	
	<div class="container">
	<div class="row">
		<div class="col-sm-12 row" style="padding:0px;">
			<div class="col-sm-3">
				<a href="movies_add.php">
					 <div class="card bg-primary text-white" style="padding:10px;">
						<div class="card-body" style="font-size:30px;">Movies</div>
					</div>
				</a>
			</div>
			
			<div class="col-sm-3">
				<a href="theaters_add.php">
					 <div class="card bg-success text-white" style="padding:10px;">
						<div class="card-body" style="font-size:30px;">Theaters</div>
					</div>
				</a>
			</div>
		</div>
	
	</div>
	</div>
	<?php include("theme/footer.php");?>