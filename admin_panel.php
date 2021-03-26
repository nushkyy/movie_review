<?php
	//including config and header files
	//$login_type	=	"admin";
	include("includes/config.php");
	include("theme/header.php");
	include("theme/navigation.php");
?>
<?php
	include("includes/Admin_class.php");
	
	$login	=	new Admin_class();
	$result	=	"";
	
	if(post_validate("submit")=="submit"){
		
		$username	=	$_POST['username'];
		$password	=	sha1($_POST['password']);
		
		$result	=	$login->check_login($username,$password);
		
		if(count($result)>0){
			
			$data					=	array(
											"username"=>$result[0]->userName,
											"logged"=>1,
											"country"=>"",
											"genre"=>"",
											"login_time"=>date("Y-m-d H:i:s"),
											
											);
			
			$_SESSION['admin_data']	=	$data;
			$_SESSION['user_data']	=	$data;

			Header("Location:admin_dashboard.php");
			
		}
	}
	?>
	
	<div class="container">
	<div class="row">
	<div class="col-sm-4" style="padding:0px;">&nbsp;</div>
	<div class="col-sm-4" style="padding:0px;">
	<p>Example Username : admin</p>
	<p>Example Password : 123456</p>
		<form action="admin_panel.php" method="post" name="login">
		
			<div class="form-group">
				<label class="control-label">Admin Username</label>
				<input type="text" class="form-control" name="username" id="username"/>
			</div>
			<div class="form-group">
				<label class="control-label">Admin Password</label>
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