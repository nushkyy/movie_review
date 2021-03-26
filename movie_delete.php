<?php
	include("includes/config.php");
	
	$id				=	$_GET['id'];
	
	if(!empty($id)){
		include("includes/Posts_class.php");
	
		$obj			=	new Posts_class();
		//delete movies name
		$movies_list	=	$obj->delete_movie($id);
		
		Header("Location: movies_add.php?msg=Delete Successfully");
	}


?>