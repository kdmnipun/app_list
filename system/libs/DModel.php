<?php
/**
* Database connection
*/
class DModel{
	protected $db = array();
	
	public function __construct(){
	//$dns = 'mysql:host=localhost;dbname:db_mvc';
     $dns = 'mysql:dbname=list_app;host:localhost';
     $user = 'root';
     $pass = ''; 		
     $this->db = new Database($dns,$user,$pass);
	}
}
?>