<?php
	//including config and header files
	include("includes/config.php");
	include("theme/header.php");
	include("theme/navigation.php");
?>
<?php
	include("includes/Register_class.php");
	
	$register	=	new Register_class();
	$result	=	"";
	
	$username	=	"";
	$password	=	"";
	$country	=	"";
	$genre		=	"";
	$errorMsg	=	"";
		
	if(post_validate("submit")=="submit"){
		
		$username	=	$_POST['username'];
		$password	=	($_POST['password']);
		$country	=	($_POST['country']);
		$genre		=	($_POST['genre']);
		
		$result	=	$register->check_user($username);
		
		if(empty($username)){$errorMsg=error_msg("Username field is required");}
		if(empty($password)){$errorMsg=error_msg("Password field is required");}
		if(empty($country)){$errorMsg=error_msg("Country field is required");}
		if(empty($genre)){$errorMsg=error_msg("Favorite Genre field is required");}
		if(strlen($password)<5){$errorMsg=error_msg("Password field need minimum 5 letters");}
		
		if(empty($errorMsg)){
		if($result){
			
			
			$result	=	$register->save_user($username,$password,$country,$genre);
			
			if($result){
				$data					=	array(
											"username"=>$username,
											"genre"=>$genre,
											"country"=>$country,
											"logged"=>1,
											"login_time"=>date("Y-m-d H:i:s"),
											
											);
			
				$_SESSION['user_data']	=	$data;	
				Header("Location:index.php");
			}else{
				$errorMsg	=	error_msg("Cannot register now try again");
			}
			
		}else{
			$errorMsg	=	error_msg("This username already been registered");
		}
		}
	}
	?>
	
	<div class="container">
	<div class="row">
	<div class="col-sm-4" style="padding:0px;">&nbsp;</div>
	<div class="col-sm-4" style="padding:0px;">
	<?php echo $errorMsg;?>
		<form action="register.php" method="post" name="login">
		
			<div class="form-group">
				<label class="control-label">Username  <font color="red">*</font></label>
				<input type="text" class="form-control" name="username" id="username" value="<?php echo $username;?>" required/>
			</div>
			<div class="form-group">
				<label class="control-label">Password  <font color="red">*</font></label>
				<input type="password" class="form-control" name="password" id="password" required/>
			</div>
			<div class="form-group">
				<label class="control-label">Favorite Genre  <font color="red">*</font>
				</label>
				<select class="form-control" name="genre" id="genre" required>
						<option value=""></option>
						<?php
							foreach($movie_genres as $row){?>
							
								<option value="<?php echo $row;?>" <?php if($row== $genre){echo "selected";}?>><?php echo $row;?></option>
							
							<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label class="control-label">Country <font color="red">*</font>
				</label>
				<select class="form-control" name="country" id="country" required>
						<option value=""></option>
						<?php
							foreach($country_list as $row){?>
							
								<option value="<?php echo $row;?>" <?php if($row==$country){echo "selected";}?>><?php echo $row;?></option>
							
							<?php } ?>
				</select>
			</div>
		
			<div class="form-group">
				<button type="submit" class="btn btn-info btn-flat" name="submit" id="submit" value="submit">Register !</button>
			</div>
		
		
		
		</form>
		<div class="col-sm-4" style="padding:0px;">&nbsp;</div>
	</div>
	</div>
	</div>
	
	<?php include("theme/footer.php");?>
	