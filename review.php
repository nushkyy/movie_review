<?php
	//including config and header files
	$need_login	=	"1";
	include("includes/config.php");
	include("theme/header.php");
	include("theme/navigation.php");
?>
<?php
	//include Movie Page
	include("includes/Movie_class.php");
	
	$movieClass	=	new Movie_class();
	
	//get movie data
	$id			=	$_GET['id'];
	
	$movie_data	=	$movieClass->get_movie($id);
	
		if(post_validate("review")=="review"){

			$description	=	$_POST['description'];
			$rating			=	$_POST['rating'];
			
			$result			=	$movieClass->review_movie($description,$rating,$id);
		}
	$already_review			=	$movieClass->have_review($id);
	$all_review				=	$movieClass->all_review($id);
	$get_percentage			=	$movieClass->get_percentage($id);
	$theatersShowing		=	$movieClass->theatersShowing($movie_data[0]->movieName);
	?>
	<div class="container">
		<div class="row">
			
			<div class="col-sm-3">
				<img src="<?php echo $movie_data[0]->movieImage;?>" alt="" style="max-height:300px;" />
				<br/>
				<p>Release Date : <b><?php echo $movie_data[0]->releaseDate;?></b></p>
				<p>Genre : <b><?php echo $movie_data[0]->movieGenre;?></b></p>
				<p>Num Hours : <b><?php echo $movie_data[0]->numHours;?></b></p>
				<table>
					<thead>
						<tr>
							<th>Theater</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							foreach($theatersShowing as $row){?>
							
							<tr>
								<td><?php echo $row->theaterName;?></td>
							</tr>
							
							<?php } ?>
					</tbody>
					</table>
			</div>
			<div class="col-sm-9">
				<h3><?php if(isset($movie_data[0])){echo $movie_data[0]->movieName;}?></h3>
				<p><?php if(isset($movie_data[0])){echo $movie_data[0]->description;}?></p>
				<h5>Review : <?php if(isset($get_percentage[0])){echo number_format($get_percentage[0]->percentage,2);}else{echo "0";}?>%</h5>
				<hr/>
				<br/>
			<?php	
				if(count($already_review)>0){?>
					<h4>You already posted review for this movie</h4>
				<?php }else{?>
			<form action="review.php?id=<?php echo $id;?>" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
			<h5>Post your review</h5>
				<div class="form-group">
					<label class="label-control">Description</label>
					<textarea class="form-control" name="description" id="description" placeholder="Type your review" required></textarea>
				</div>
			
				<div class="form-group">
					<label class="label-control">Rating</label>
					<select class="form-control" name="rating" id="rating" required>
						<option value="5">5 Start</option>
						<option value="4">4 Start</option>
						<option value="3">3 Start</option>
						<option value="2">2 Start</option>
						<option value="1">1 Start</option>
					</select>
				</div>
				
				<div class="form-group">
					<button class="btn btn-warning" name="review" id="review" value="review" type="submit">Post Review</button>
				</div>
			</form>
				<?php } ?>
				
				<br/>
				<h5>Previous Reviews</h5>
				<?php
					foreach($all_review as $row){?>
					
					<div class="card col-sm-12" style="padding:5px;color:#EEE">
						<p><?php echo $row->userName;?></p>
						<p>Number of stars : <?php echo $row->rate;?></p>
						<p>Description : <?php echo $row->description;?></p>
					</div>
					<br/>
					<?php } ?>
		</div>
	</div>
	</div>
	<?php include("theme/footer.php");?>
	