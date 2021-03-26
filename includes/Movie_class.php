<?php

class Movie_class extends Db_connect{
	
	public function get_latest_movies(){
		$sql	=	"SELECT * FROM `movies` ORDER BY `releaseDate` DESC LIMIT 3";
		
		return $this->execute($sql)->result();
	}
	public function get_random_movies(){
		$sql	=	"SELECT * FROM `movies` ORDER BY RAND() LIMIT 5";
		
		return $this->execute($sql)->result();
	}
	public function get_theaters(){
		$sql	=	"SELECT * FROM `theaters`";
		
		return $this->execute($sql)->result();
	}
	
	public function get_movie($id){
		$id	=	$this->escapeString($id);
		
		$sql	=	"SELECT * FROM `movies` WHERE `id`='$id'";
		
		return $this->execute($sql)->result();
	}
	
	public function get_genre_movies(){
		if(isset($_SESSION['user_data'])){
			$genre		=	$this->escapeString($_SESSION['user_data']['genre']);
			$sql	=	"SELECT * FROM `movies` WHERE `movieGenre`='$genre' ORDER BY RAND() LIMIT 5";
			
			return $this->execute($sql)->result();
		}
	}
	
	public function review_movie($description,$rating,$id){
		$id				=	$this->escapeString($id);
		$description	=	$this->escapeString($description);
		$rating			=	$this->escapeString($rating);
		$datetime		=	$this->escapeString(date("Y-m-d H:i:s"));
		$username		=	$this->escapeString($_SESSION['user_data']['username']);
		
		$sql	=	"INSERT INTO `rate_movies` (`movieId`,`rate`,`description`,`userName`,`datetime`) VALUES('$id','$rating','$description','$username','$datetime')";
		
		
		return $this->insert($sql);
	}
	
	public function have_review($id){
		$id				=	$this->escapeString($id);
		$username		=	$this->escapeString($_SESSION['user_data']['username']);
		
		$sql			=	"SELECT * FROM `rate_movies` WHERE `userName`='$username' AND `movieid`='$id'";
		
		
		return $this->execute($sql)->result();
	}
	public function all_review($id){
		$id				=	$this->escapeString($id);
		$username		=	$this->escapeString($_SESSION['user_data']['username']);
		
		$sql			=	"SELECT * FROM `rate_movies` WHERE `movieid`='$id' ORDER BY `datetime` DESC";

		
		return $this->execute($sql)->result();
	}
	public function get_percentage($id){
		$id				=	$this->escapeString($id);
		$username		=	$this->escapeString($_SESSION['user_data']['username']);
		
		$sql			=	"SELECT COALESCE((SUM(rate)*100)/(COUNT(id)*5),0) AS 'percentage' FROM `rate_movies` WHERE movieId='$id'";

		
		return $this->execute($sql)->result();
	}
	public function theatersShowing($name){
		$name				=	$this->escapeString($name);
		$username		=	$this->escapeString($_SESSION['user_data']['username']);
		
		$sql			=	"SELECT * FROM `movie_theaters` WHERE `movieName`='$name' ORDER BY `movieName` ";

		
		return $this->execute($sql)->result();
	}
	
}