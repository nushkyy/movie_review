<?php

class Admin_class extends Db_connect{

	public function check_login($username,$password){
	//Check login of admin username and find user_type 2 if admin
		$username	=	$this->escapeString($username);
		$password	=	$this->escapeString($password);
		
		$sql		=	"SELECT userName,country,genre FROM `users` WHERE userName='$username' AND password='$password' AND `user_type`='2'";
		
		$result		=	$this->execute($sql)->result();
		
		return $result;
	}
	
	public function escapeString($str){
	//Escape strings to make it more safe
		$str	=	htmlspecialchars($str);
		$str	=	trim($str);
		$str	=	mysqli_real_escape_string($this->db,$str);
		return $str;
	}
	


}