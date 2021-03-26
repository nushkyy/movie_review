<?php

class Posts_class extends Db_connect{

	function get_movies(){
		$sql	=	"SELECT * FROM `movies`";
		
		$result	=	$this->execute($sql)->result();
		
		return $result;
	
	}
	
	function get_movie($id){
		$id	=	$this->escapeString($id);
		$sql	=	"SELECT * FROM `movies` WHERE `id`='$id'";
		
		$result	=	$this->execute($sql)->result();
		
		return $result;
	
	}
	
	function validate_movie_name($movieName,$id=""){
		$movieName	=	$this->escapeString($movieName);
		$id			=	$this->escapeString($id);
		if($id!=""){
			$sql		=	"SELECT `movieName` FROM `movies` WHERE `movieName`='$movieName' AND `id`!='$id'";

		}else{
			$sql		=	"SELECT `movieName` FROM `movies` WHERE `movieName`='$movieName'";

		}
		$rows		=	$this->execute($sql)->rows();
		
		if($rows>0){
			return false;
		}else{
			return true;
		}
	}
	function save_add_movie($movieName,$releaseDate,$movieGenre,$casts,$description,$numHours){
		$movieName		=	$this->escapeString($movieName);
		$releaseDate	=	$this->escapeString($releaseDate);
		$movieGenre		=	$this->escapeString($movieGenre);
		$casts			=	$this->escapeString($casts);
		$description	=	$this->escapeString($description);
		$numHours		=	$this->escapeString($numHours);
		
		$image_file		=	$this->upload_image();
		
		if($image_file==false){return "Image not valid";}
		
		
		$sql		=	"INSERT INTO `movies` (`movieName`,`releaseDate`,`movieImage`,`movieGenre`,`casts`,`description`,`numHours`) 
						 VALUES('$movieName','$releaseDate','$image_file','$movieGenre','$casts','$description','$numHours');";

		$result		=	$this->insert($sql);
		
		$insert_id	=	$this->get_id();
		
		if(isset($_POST['theaters'])){
			$theaterList	=	$_POST['theaters'];
		}else{
			$theaterList	=	array();
		}
		
		foreach($theaterList as $row){
			
			$sql	=	"INSERT INTO `movie_theaters` (`movieName`,`theaterName`) VALUES('$movieName','$row')";
			
			$result	=	$this->insert($sql);
		}
		
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	function update_movie($movieName,$releaseDate,$movieGenre,$casts,$description,$numHours,$id){
		$movieName		=	$this->escapeString($movieName);
		$releaseDate	=	$this->escapeString($releaseDate);
		$movieGenre		=	$this->escapeString($movieGenre);
		$casts			=	$this->escapeString($casts);
		$description	=	$this->escapeString($description);
		$numHours		=	$this->escapeString($numHours);
		$id				=	$this->escapeString($id);
						
		
		$sql		=	"UPDATE `movies` SET `movieName`='$movieName',`releaseDate`='$releaseDate',`movieGenre`='$movieGenre',`casts`='$casts',`description`='$description',`numHours`='$numHours' 
						WHERE `id`=$id";

		$result		=	$this->update($sql);
	
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	function delete_movie($id){
		$id				=	(int)$this->escapeString($id);
		$sql	=	"DELETE FROM `movies` WHERE `id`=$id";
		
		$result	=	$this->delete($sql);
		
		return $result;
	}

	function get_theaters(){
		$sql	=	"SELECT * FROM `theaters`";
		
		$result	=	$this->execute($sql)->result();
		
		return $result;
	
	}
	
	function validate_theater_name($theaterName,$id=""){
		$theaterName	=	$this->escapeString($theaterName);
		$id				=	$this->escapeString($id);
		
		if($id==""){
			$sql		=	"SELECT `theaterName` FROM `theaters` WHERE `theaterName`='$theaterName'";

		}else{
			$sql		=	"SELECT `theaterName` FROM `theaters` WHERE `theaterName`='$theaterName' AND `id`!=$id";
		}
		$rows		=	$this->execute($sql)->rows();
		
		if($rows>0){
			return false;
		}else{
			return true;
		}
	}
	function save_add_theater($theaterName,$location){
		$theaterName		=	$this->escapeString($theaterName);
		$location			=	$this->escapeString($location);
	
		$sql		=	"INSERT INTO `theaters` (`theaterName`,`location`) 
						 VALUES('$theaterName','$location');";
						
		$result		=	$this->insert($sql);
		
		if($result){
			return true;
		}else{
			return false;
		}
	}
	function get_theater_data($id){
		$id			=	$this->escapeString($id);
		$sql		=	"SELECT * FROM `theaters` WHERE `id`=$id";
		
		$result		=	$this->execute($sql)->result();
		
		return $result;
	}
	function update_theater($theaterName,$location,$id){
		$theaterName		=	$this->escapeString($theaterName);
		$location			=	$this->escapeString($location);
		$id					=	$this->escapeString($id);
	
		$sql		=	"UPDATE `theaters` SET `theaterName`='$theaterName',`location`='$location' WHERE `id`=$id;";
		
		$result		=	$this->update($sql);
		
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function search($movieName,$genre,$theater){
		if(empty($movieName) AND empty($genre) AND empty($theater)){return array();}
		
		$sql	=	"SELECT * FROM `movies` ";
		if($theater!="" && $theater!="All"){
			$theater=	$this->escapeString($theater);
			$sql.=" INNER JOIN `movie_theaters` ON `movie_theaters`.movieName=`movies`.movieName AND `movie_theaters`.theaterName='$theater'";
		}
		
		$sql	.=" WHERE ";
		
		if($movieName!="" && $movieName!="All"){
			$movieName		=	$this->escapeString($movieName);
			$sql.=" `movies`.`movieName` LIKE '%$movieName%' AND";
		}
		if($genre!="" && $genre!="All"){
			$genre		=	$this->escapeString($genre);
			$sql.=" `movies`.`movieGenre`='$genre'";
		}
		
		$sql	=	rtrim($sql,"AND");
		$sql	=	rtrim($sql,"WHERE ");

		$result	=	$this->execute($sql)->result();
		
		return $result;
		
	}
	function upload_image(){
		$target_dir = "assets/";
		//$target_file = $target_dir . sha1(uniqid()).".".$imageFileType;
		
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION));
		
		$target_file = $target_dir . sha1(uniqid()).".".$imageFileType;
		
		if(!isset($_FILES["file"])){return "";}
		if(isset($_POST["save"])) {
			$check = getimagesize($_FILES["file"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
			}
		}

		if (file_exists($target_file)) {
			$uploadOk = 0;
		}
		if ($_FILES["file"]["size"] > 500000) {
			$uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {

			$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			return false;
		} else {
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
				return $target_file;
			} else {
				return false;
			}
		}
	}

}