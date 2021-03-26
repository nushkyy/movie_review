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
	
	//get theater list
	$theaterList	=	$obj->get_theaters();
	
	if(post_validate("save")=="save"){
		
		
		
		$movieName		=	$_POST['movieName'];
		$releaseDate	=	$_POST['releaseDate'];
		$movieGenre		=	$_POST['movieGenre'];
		$casts			=	$_POST['casts'];
		$description	=	$_POST['description'];
		$numHours		=	$_POST['numHours'];
		
		if(isset($_POST['theaters'])){
			$theaters		=	$_POST['theaters'];
		}else{
			$theaters		=	"";
		}
		
		
		$validate		=	$obj->validate_movie_name($movieName);
		
		
		if($validate){
			$save		=	$obj->save_add_movie($movieName,$releaseDate,$movieGenre,$casts,$description,$numHours);
		
			if($save==="Image not valid"){
				$errorMsg	=	error_msg("Image not valid only upload image jpg,png under 5 mb");
			}else{
				
				if($save){
					$errorMsg	=	success_msg("Successfully saved");
				}else{
					$errorMsg	=	error_msg("Cannot save try again");
				}
				
			}
		}else{
			$errorMsg	=	error_msg("This movie name already excist");
		}
	
	}
	
	?>
	
	<div class="container">
	<div class="row">
		<div class="col-sm-12" style="padding:0px;">
		<form action="movies_add_new.php" method="post" enctype="multipart/form-data">
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
					<label class="control-label">Available Theaters <font color="red">*</font></label>
					<select class="form-control" name="theaters[]" id="theaters[]" multiple ><?php foreach($theaterList as $row){?><option value="<?php echo $row->theaterName;?>" <?php if(in_array($row->theaterName,$theaters)){echo "selected";}?>><?php echo $row->theaterName;?></option><?php } ?></select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Movie Hours <font color="red">*</font></label>
					<input type="number" step="any" class="form-control" name="numHours" id="numHours" value="<?php echo $numHours;?>" placeholder="Please type Hours" />
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Movie Image <font color="red">*</font></label>
					<br/>
					    <span class="btn btn-primary btn-file">
							Browse <input type="file" name="file" required>
						</span>
				</div>
			</div>
			<div class="col-sm-12">
			<br/><br/>
				<div class="form-group">
					<button style="margin-left:10px;" class="btn btn-danger float-right" type="submit" name="save" id="save" value="save">Save Movie</button>
				</div>
			</div>
		</div>
			</form>
		</div>
	
	</div>
	</div>
	<?php include("theme/footer.php");?>