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
	$theaterName		=	"";
	$location			=	"";
	$errorMsg			=	"";
	
	if(post_validate("save")=="save"){
		
		$obj	=	new Posts_class();
		
		$theaterName		=	$_POST['theaterName'];
		$location			=	$_POST['location'];
		
		if(empty($theaterName) OR empty($location)){
			$errorMsg		=	error_msg("Please fill all the fields");
		}else{
		
		$validate	=	$obj->validate_theater_name($theaterName);
		
		if($validate){
			$save		=	$obj->save_add_theater($theaterName,$location);

				if($save){
					$errorMsg	=	success_msg("Successfully saved");
				}else{
					$errorMsg	=	error_msg("Cannot save try again");
				}
				
		}else{
			$errorMsg	=	error_msg("This theater name already excist");
		}
		
		}
	}
	
	?>
	
	<div class="container">
	<div class="row">
		<div class="col-sm-12" style="padding:0px;">
		<form action="theaters_add_new.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<?php echo $errorMsg;?>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Theater Name <font color="red">*</font></label>
					<input class="form-control" type="text" value="<?php echo $theaterName;?>" name="theaterName" id="theaterName" placeholder="Please type theater name" required />
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Location<font color="red">*</font></label>
					<input class="form-control" type="text" value="<?php echo $location;?>" name="location" id="location" placeholder="Please type location name" required />
				</div>
			</div>
		
			<div class="col-sm-12">
			<br/><br/>
				<div class="form-group">
					<button style="margin-left:10px;" class="btn btn-danger float-right" type="submit" name="save" id="save" value="save">Save Theater</button>
				</div>
			</div>
		</div>
			</form>
		</div>
	
	</div>
	</div>
	<?php include("theme/footer.php");?>