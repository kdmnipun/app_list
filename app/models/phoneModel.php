<?php
/**
* Class phoneModel
*/
class phoneModel extends DModel{
	
	public function __construct(){
	     parent::__construct();
	}

	public function memBySearch($table,$member){

			$clause = " WHERE ";//Initial clause
			$sql="SELECT * FROM  $table  ";//Query stub	
			    if(isset($member)){
			        foreach($member as $c){
			            if(!empty($c)){
			                $sql .= $clause." member=".$c."";
			                //$sql .= $clause." ".$c." LIKE '%{$c}%'";
			                $clause = " OR ";//Change  to OR after 1st WHERE
			            }   
			        }
			    }
			//echo $sql;//Remove after testing


    	return $this->db->select($sql);		
	}

	public function memByActivity($table,$member,$type){

            if (!empty($member)) {
			$clause = " WHERE ";//Initial clause
			$sql="SELECT * FROM  $table  ";//Query stub	
			    if(isset($member)){
			        foreach($member as $c){
			            if(!empty($c)){
			                $sql .= $clause." member='$c' AND type=".$type."";
			                //$sql .= $clause." ".$c." LIKE '%{$c}%'";
			                $clause = " OR ";//Change  to OR after 1st WHERE
			            }   
			        }
			    }
			//echo $sql;//Remove after testing
            }



    	return $this->db->select($sql);		
	}

	public function memBy($table,$type){
            	$sql="SELECT * FROM tbl_member WHERE member=1 AND type=".$type." OR member=2 AND type=".$type." OR member=3 AND type=".$type."";
            	//echo $sql;
            	return $this->db->select($sql);	
	}

    public function allMemBySearch($table,$member){
            if (!empty($member)) {
			$clause = " WHERE ";//Initial clause
			$sql="SELECT * FROM  $table  ";//Query stub	
			    if(isset($member)){
			        foreach($member as $c){
			            if(!empty($c)){
			                $sql .= $clause." member='$c'";
			               
			                $clause = " OR ";
			            }   
			        }
			    }
			$sql .=" ORDER BY member";
            } 
            return $this->db->select($sql);	   	
    }

    public function memByProg($table,$member,$tag){
            if (!empty($member)) {
			$clause = " WHERE ";//Initial clause
			$sql="SELECT * FROM  $table  ";//Query stub	
			    if(isset($member)){
			        foreach($member as $c){
			            if(!empty($c)){
			                $sql .= $clause." member='$c' AND tag LIKE '%{$tag}%'";
			                //$sql .= $clause." ".$c." LIKE '%{$c}%'";
			                $clause = " OR ";//Change  to OR after 1st WHERE
			            }   
			        }
			        $sql .=" ORDER BY member";
			    }
			//echo $sql;//Remove after testing
            }



    	return $this->db->select($sql);	
    }
}
?>	