<?php

class Register_class extends Db_connect{
	
	public function check_user($username){
		//validate username already excists
		$username	=	$this->escapeString($username);
		
		$sql		=	"SELECT userName,country,genre FROM `users` WHERE userName='$username'";
		
		$result		=	$this->execute($sql)->result();
		
		if(count($result)>0){
			return false;
			
		}else{
			return true;
		}
		
		return $result;
	}
	public function save_user($username,$password,$country,$genre){
		//inserting username to database
		$username	=	$this->escapeString($username);
		$password	=	$this->escapeString(sha1($password));
		$country	=	$this->escapeString($country);
		$genre	=	$this->escapeString($genre);
		

		$sql		=	"INSERT INTO `users` (`userName`,`password`,`country`,`genre`) VALUES('$username','$password','$country','$genre')";
	
		$result		=	$this->insert($sql);
		
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	public function escapeString($str){
		//escaping string
		$str	=	htmlspecialchars($str);
		$str	=	trim($str);
		$str	=	mysqli_real_escape_string($this->db,$str);
		return $str;
	}
	
}