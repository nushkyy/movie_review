<?php
	//including config and header files
	include("includes/config.php");
	include("theme/header.php");
	include("theme/navigation.php");
?>
<?php
	//include Movie Page
	include("includes/Movie_class.php");
	
	$movieClass	=	new Movie_class();
	
	//get latest movies
	$latest_releases	=	$movieClass->get_latest_movies();
	
	//get random movies
	$random_movies	=	$movieClass->get_random_movies();
	
	//get theaters list
	$theaters	=	$movieClass->get_theaters();
	
	//get login genre movies
	$my_genre_movies	=	$movieClass->get_genre_movies();
	
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 card">
			
			<div class="col-sm-12 " style="padding:0px;margin-top:10px;">
				
				<h4>Search</h4>
				<label class="control-label">Movie Name</label>
				<input type="text" class="form-control" name="movieName" id="movieName"  onchange="search_multiple();"/>
				
				<label class="control-label">Genre</label>
				<select class="form-control" name="genre" id="genre"  onchange="search_multiple();">
					<option value="All">All </option>
					<?php
						//printing movie genres list
						foreach($movie_genres as $row){?>
						
						<option value="<?php echo $row;?>"><?php echo $row;?></option>
						
					<?php }?>
				</select>
				
				<label class="control-label">Theaters</label>
				<select class="form-control" name="theater" id="theater" onchange="search_multiple();">
					<option value="All">All</option>
					<?php
						//printing movie genres list
						foreach($theaters as $row){?>
						
						<option value="<?php echo $row->theaterName;?>"><?php echo $row->theaterName;?></option>
						
					<?php }?>
			
				</select>
			</div>
			</div>
			
			<div class="col-sm-9">
			<h4>Latest Releases </h4>
			<div class="row" style="margin-left:10px;" id="latest">
			
			<?php
				foreach($latest_releases as $row){?>
				
					<div class="col-sm-3" style="padding:0px;">
					<div class="card" style="height:450px;">
					<a href="review.php?id=<?php echo $row->id;?>" style="text-decoration:none;color:#AAA;">
						<div style="height:250px;max-height:250px;overflow:hidden">
							<img class="card-img-top"  src="<?php echo $row->movieImage;?>" alt="Card image" style="width:100%">
						</div>
						<div class="card-body">
						  <h4 class="card-title"><?php echo $row->movieName;?></h4>
				
					  
						</div>
						</a>
					</div>
					</div>
					
				<?php } ?>
			
			</div>
			</div>
			
			<div class="col-sm-12">
			<br/><br/>
			<h4>Movies you may like</h4>
			<div class="row" style="margin-left:10px;">
			
			<?php
				foreach($random_movies as $row){?>
				
					<div class="card col-sm-2" style="padding:0px;">
					<div class="card "  style="height:450px;">
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
			
			</div>
			</div>
			<?php
				if(!empty($my_genre_movies)){?>
			<div class="col-sm-12">
			<br/><br/>
			<h4>Favourite Genre Movies</h4>
			<div class="row" style="margin-left:10px;">
			
			<?php
				foreach($my_genre_movies as $row){?>
				
					<div class="card col-sm-2" style="padding:0px;">
					<div class="card "  style="height:450px;">
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
			
			</div>
			</div>
				<?php } ?>
	
  <br>
  </div>
  </div>
  
  <script>
  
	function search_multiple(){
		
		var movieName	=	document.getElementById("movieName").value;
		var genre		=	document.getElementById("genre").value;
		var theater		=	document.getElementById("theater").value;
		
		if(movieName!="" || genre!="" || theater!=""){
			document.getElementById("latest").innerHTML="<center><img src='assets/loading.gif'/></center>";
			
			 $.post("search.php",
				{
					movieName: movieName,
					genre: genre,
					theater: theater,
				},
				function(data, status){
					document.getElementById("latest").innerHTML=data;
				});
		}
	}
	
	</script>
	
	<?php include("theme/footer.php");?>