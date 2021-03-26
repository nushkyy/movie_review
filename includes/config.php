<?php
	session_start();
//get page title
	include("titles.php");

	$parent_file	=	$_SERVER["SCRIPT_FILENAME"];
	$parent_file	=	explode("/",$parent_file);
	$page_title		=	"Movie Review";

	if(isset($titles[$parent_file[count($parent_file)-1]])){
		$page_title	=	$titles[$parent_file[count($parent_file)-1]];
	}
	
	$web_title		=	"Movie Review";
//end of get page title

//genre list
	$movie_genres	=	array("Action","Comedy","Sci-fi","Animation");
//end of genre list

//country list
	$country_list	=	array("Sri lanka","United Kingdom","India","USA","UAE","Other");
//end of country list

	if(isset($need_login)){
		if($need_login=="1"){
			if(!isset($_SESSION['user_data'])){
				Header("Location:login.php");
			}
		}
	}
	if(isset($login_type)){
		if($login_type=="admin"){
			if(!isset($_SESSION['admin_data'])){
				Header("Location:admin_panel.php");
			}
		}
	}
	function post_validate($var){
		
		if(isset($_POST[$var])){
			$var	=	$_POST[$var];
			$var	=	htmlspecialchars($var);
			$var	=	trim($var);
			
			return $var;
		}else{
			return "";
		}
	}
	
	if(isset($login_type)){
		
	}
	function success_msg($msg){
		return '<div class="alert alert-success col-sm-12">
				<strong>Info !</strong> '.$msg.'
			  </div>';
	}
	function error_msg($msg){
		return '<div class="alert alert-danger col-sm-12">
				<strong>Info !</strong> '.$msg.'
			  </div>';
	}
	include("Db_connect.php");
?>