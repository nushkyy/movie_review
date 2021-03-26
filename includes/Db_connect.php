<?php

class Db_connect{
	
	public $db;
	public $last_result;
	public $tt;
	
	function __construct(){
		$this->connect();
	}
	
	public function connect(){
			$this->db	=	mysqli_connect("localhost","","","movie");
	}
	public function execute($sql){
		$result		=	mysqli_query($this->db,$sql);
		$rows       =   array();
		$num_rows	=	mysqli_num_rows($result);
		
		if($num_rows>0){
			try{
				while($row = mysqli_fetch_object($result)) {
					$rows[]=$row;
				}
			
			}catch (Exception $e){
				
			}
		}
		$this->last_result	=	$rows;

		return $this;
	}
	
	public function result(){
		return $this->last_result;
	}
	
	public function rows(){
		return count($this->last_result);
	}
	public function escapeString($str){
		$str	=	htmlspecialchars($str);
		$str	=	trim($str);
		$str	=	mysqli_real_escape_string($this->db,$str);
		return $str;
	}
	
	
	public function insert($sql){
		$result		=	mysqli_query($this->db,$sql);
		
		return $result;
	}
	
	public function update($sql){
		$result		=	mysqli_query($this->db,$sql);
		return $result;
	}
	
	public function delete($sql){
		$result		=	mysqli_query($this->db,$sql);
		return $result;
	}
	
	public function get_id(){
		$last_id = mysqli_insert_id($this->db);
		
		return $last_id;
	}
	
	
	
}