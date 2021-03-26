<?php

class Db_login extends Db_connect{
	
	public function check_login($username,$password){
		$username	=	escapeString($username);
		$password	=	escapeString($password);
		
		$sql		=	"SELECT userName,country,genre FROM `users` WHERE userName='$username' AND password='$password'";
		
		$result		=	$this->db->execute($sql);
		
		print_r($result);
		die();
	}
	
	public function escapeString($str){
		$str	=	htmlspecialchars($str);
		$str	=	trim($str);
		$str	=	mysqli_real_escape_string($this->db,$str);
		return $str;
	}
}