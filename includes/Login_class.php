<?php

class Login_class extends Db_connect{
	
	public function check_login($username,$password){
		$username	=	$this->escapeString($username);
		$password	=	$this->escapeString($password);
		
		$sql		=	"SELECT userName,country,genre FROM `users` WHERE userName='$username' AND password='$password'";
		
		$result		=	$this->execute($sql)->result();
		
		return $result;
	}
	
	public function escapeString($str){
		$str	=	htmlspecialchars($str);
		$str	=	trim($str);
		$str	=	mysqli_real_escape_string($this->db,$str);
		return $str;
	}
	
}