<?php
	//including config and header files
	include("includes/config.php");
	include("theme/header.php");
	include("theme/navigation.php");
?>
<?php
	include("includes/Db_login.php");
	include("includes/Login_class.php");
	
	$login	=	new Login_class();
	$result	=	"";
	$errorMsg	=	"";
	
	if(post_validate("submit")=="submit"){
		
		$username	=	$_POST['username'];
		$password	=	sha1($_POST['password']);
		
		$result	=	$login->check_login($username,$password);
		
		if(count($result)>0){
			
			$data					=	array(
											"username"=>$result[0]->userName,
											"genre"=>$result[0]->genre,
											"country"=>$result[0]->country,
											"logged"=>1,
											"login_time"=>date("Y-m-d H:i:s"),
											
											);
											
			
			$_SESSION['user_data']	=	$data;
			 
			setcookie("username", $result[0]->userName, time() + (86400 * 30), "/"); 
			Header("Location:index.php");
			
	}else{
		$errorMsg	=	error_msg("Username or password wrong");
	}
	}
	?>
	
	<div class="container">
	<div class="row">
	<div class="col-sm-4" style="padding:0px;">&nbsp;</div>
	<div class="col-sm-4" style="padding:0px;">
	
		<form action="login.php" method="post" name="login">
		<?php echo $errorMsg;?>
			<div class="form-group">
				<label class="control-label">Username</label>
				<input type="text" class="form-control" name="username" id="username" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>"/>
			</div>
			<div class="form-group">
				<label class="control-label">Password</label>
				<input type="password" class="form-control" name="password" id="password"/>
			</div>
		
			<div class="form-group">
				<button type="submit" class="btn btn-info btn-flat" name="submit" id="submit" value="submit">Log In !</button>
			</div>
		
		
		
		</form>
		<div class="col-sm-4" style="padding:0px;">&nbsp;</div>
	</div>
	</div>
	</div>
	<?php include("theme/footer.php");?>