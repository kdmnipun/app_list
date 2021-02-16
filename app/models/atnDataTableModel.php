<?php
/**
* Class attenModel
*/
class atnDataTableModel extends DModel{

	public function __construct(){
	     parent::__construct();
	}

    public function atnList($table){
      $sql = "SELECT * FROM $table";   
      return $this->db->select($sql);
    }

}	