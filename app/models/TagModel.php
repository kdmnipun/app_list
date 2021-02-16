<?php
/**
* Class TagModel
*/
class TagModel extends DModel{
	
	public function __construct(){
	     parent::__construct();
	}

	public function insertTag($table,$data){
        return $this->db->insert($table,$data);
	}
	
	public function alltags($table){
	  $sql = "SELECT * FROM $table ORDER BY id";	
	  return $this->db->select($sql);
	}

	public function delPorgById($table,$cond){	
	  return $this->db->delete($table,$cond);
	}

	public function editPorgById($table,$id){	
	  $sql = "SELECT * FROM $table WHERE id=:id";
	  $data = array(":id"=>$id);
	  return $this->db->select($sql,$data);
	}
	public function progUpdate($table,$data,$cond){	
      return $this->db->update($table,$data,$cond);
	}

	public function tagNameExst($table,$tagName){
		$sql   = "SELECT * FROM $table WHERE tag_name ='$tagName'";
	    return $this->db->cow_count($sql);

	}

}	
?>