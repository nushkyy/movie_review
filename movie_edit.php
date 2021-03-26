<?php
	//including config and header files
	$login_type	=	"admin";
	include("includes/config.php");
	include("theme/header.php");
	include("theme/navigation.php");
?>
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>
<?php
	include("includes/Posts_class.php");
	$movieName		=	"";
	$releaseDate	=	"";
	$movieGenre		=	"";
	$casts			=	"";
	$description	=	"";
	$numHours		=	"";
	$errorMsg		=	"";
	$theaters		=	array();
	
	$obj			=	new Posts_class();
	$id				=	"";
	if(isset($_GET['id'])){
		$id				=	$_GET['id'];	
	}
	
	//get theater list
	$theaterList	=	$obj->get_theaters();
	
	if(post_validate("update")=="update"){
		
		
		
		$movieName		=	$_POST['movieName'];
		$releaseDate	=	$_POST['releaseDate'];
		$movieGenre		=	$_POST['movieGenre'];
		$casts			=	$_POST['casts'];
		$description	=	$_POST['description'];
		$numHours		=	$_POST['numHours'];

		
		$validate		=	$obj->validate_movie_name($movieName,$id);
		
		
		if($validate){
			$save		=	$obj->update_movie($movieName,$releaseDate,$movieGenre,$casts,$description,$numHours,$id);
		
			if($save==="Image not valid"){
				$errorMsg	=	error_msg("Image not valid only upload image jpg,png under 5 mb");
			}else{
				
				if($save){
					$errorMsg	=	success_msg("Successfully updated");
				}else{
					$errorMsg	=	error_msg("Cannot update try again");
				}
				
			}
		}else{
			$errorMsg	=	error_msg("This movie name already excist");
		}
	
	}
	
	
		if(!empty($id)){
				$movie_data		=	$obj->get_movie($id);
				
				$movieName		=	$movie_data[0]->movieName;
				$releaseDate	=	$movie_data[0]->releaseDate;
				$movieGenre		=	$movie_data[0]->movieGenre;
				$casts			=	$movie_data[0]->casts;
				$description	=	$movie_data[0]->description;
				$numHours		=	$movie_data[0]->numHours;
		}
	
		
		
	
	?>
	
	<div class="container">
	<div class="row">
		<div class="col-sm-12" style="padding:0px;">
		<form action="movie_edit.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
		<div class="row">
			<?php echo $errorMsg;?>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Movie Name <font color="red">*</font></label>
					<input class="form-control" type="text" value="<?php echo $movieName;?>" name="movieName" id="movieName" placeholder="Please type movie name" required />
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Release Date <font color="red">*</font></label>
					<input class="form-control" type="date" value="<?php echo $releaseDate;?>" name="releaseDate" id="releaseDate" required placeholder="Please type release date" value="<?php echo date("Y-m-d");?>"/>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Movie Genre <font color="red">*</font></label>
					<select class="form-control" name="movieGenre" id="movieGenre" required>
						<option value=""></option>
						<?php
							foreach($movie_genres as $row){?>
							
								<option value="<?php echo $row;?>" <?php if($row== $movieGenre){echo "selected";}?>><?php echo $row;?></option>
							
							<?php } ?>
					</select>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Movie Casts (Seperate with comma)</label>
					<input class="form-control" type="text" value="<?php echo $casts;?>" name="casts" id="casts" placeholder="Please type casts name" />
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Movie Description <font color="red">*</font></label>
					<textarea class="form-control" name="description" id="description" placeholder="Please type Description" ><?php echo $description;?></textarea>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Movie Hours <font color="red">*</font></label>
					<input type="number" step="any" class="form-control" name="numHours" id="numHours" value="<?php echo $numHours;?>" placeholder="Please type Hours" />
				</div>
			</div>
			<div class="col-sm-12">
			<br/><br/>
				<div class="form-group">
					<button style="margin-left:10px;" class="btn btn-danger float-right" type="submit" name="update" id="update" value="update">Update Movie</button>
				</div>
			</div>
		</div>
			</form>
		</div>
	
	</div>
	</div>
	<?php include("theme/footer.php");?>