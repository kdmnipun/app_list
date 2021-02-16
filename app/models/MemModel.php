<?php
/**
* Class MemModel
*/
class MemModel extends DModel{
	
	public function __construct(){
	     parent::__construct();
	}

	public function insertMember($table,$data){
         return $this->db->insert($table,$data);
	}

    public function registerMobileExists($table,$phone) {

		$sql   = "SELECT * FROM $table WHERE phone =?";
	    $count = $this->db->chcekData($sql,$phone);
        if ($count > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
	public function allMember($table){
	  $sql = "SELECT * FROM $table ORDER BY id DESC";	
	  return $this->db->select($sql);
	}

	public function memberById($table,$id){
	  $sql = "SELECT * FROM $table WHERE id=:id";
	  $data = array(":id"=>$id);
	  return $this->db->select($sql,$data);
	}

	public function updateMember($table,$data,$cond){
		return $this->db->update($table,$data,$cond);
	}

	public function delMemById($table,$cond){
		return $this->db->delete($table,$cond);
	}

	public function countMember($table){
		$sql="SELECT
		 COUNT(CASE WHEN gender = 'male' AND member = 'qa' THEN id END) AS qamales, 
		 COUNT(CASE WHEN gender = 'female' AND member = 'qa' THEN id END) AS qafemales,
		 COUNT(CASE WHEN gender = 'male' AND member = 'qg' THEN id END) AS qgmales,
		 COUNT(CASE WHEN gender = 'female' AND member = 'qg' THEN id END) AS qgfemales,
		 COUNT(CASE WHEN gender = 'male' AND member = 'qpm' THEN id END) AS qpmmales,
		 COUNT(CASE WHEN gender = 'female' AND member = 'qpm' THEN id END) AS qpmfemales, 
		 COUNT(CASE WHEN member = 'qa' THEN id END) AS qa,
		 COUNT(CASE WHEN member = 'qg' THEN id END) AS qg,
		 COUNT(CASE WHEN member = 'qpm' THEN id END) AS qpm,
		 COUNT(CASE WHEN member THEN id END) AS total
		 FROM $table";
		 return $this->db->select($sql);
	}

	public function countMemberChart($table){
		$sql="SELECT
		 COUNT(CASE WHEN gender = 'male' AND member = 'qa' THEN id END) AS qamales, 
		 COUNT(CASE WHEN gender = 'female' AND member = 'qa' THEN id END) AS qafemales,
		 COUNT(CASE WHEN gender = 'male' AND member = 'qg' THEN id END) AS qgmales,
		 COUNT(CASE WHEN gender = 'female' AND member = 'qg' THEN id END) AS qgfemales,
		 COUNT(CASE WHEN gender = 'male' AND member = 'qpm' THEN id END) AS qpmmales,
		 COUNT(CASE WHEN gender = 'female' AND member = 'qpm' THEN id END) AS qpmfemales, 
		 COUNT(CASE WHEN member = 'qa' THEN id END) AS qa,
		 COUNT(CASE WHEN member = 'qg' THEN id END) AS qg,
		 COUNT(CASE WHEN member = 'qpm' THEN id END) AS qpm,
		 COUNT(CASE WHEN member THEN id END) AS total

		 FROM $table";
		 return $this->db->select($sql);
	}
	public function countMemberChartJs($table){
		$sql="SELECT
		 COUNT(CASE WHEN member = 'qa' THEN id END) AS qa,
		 COUNT(CASE WHEN member = 'qg' THEN id END) AS qg,
		 COUNT(CASE WHEN member = 'qpm' THEN id END) AS qpm
		 FROM $table";
		 return $this->db->select($sql);
	}

	public function searchMember($table, $search){

    	if (isset($search) && !empty($search)) {

        $sql = "SELECT * FROM $table WHERE name LIKE '%$search%' OR phone LIKE '%$search%' OR concat_ws('/',reg,batch) 
            LIKE '%$search%' ";
        
    	}else{
    		$sql="";
    	}
        
		 return $this->db->select($sql);

	}

	public function searchMemberAtn($table, $search){
        
if (isset($search) && !empty($search)) {
        $sql = "SELECT * FROM $table WHERE name LIKE '%$search%' OR phone LIKE '%$search%' OR concat_ws('/',reg,batch) 
            LIKE '%$search%' LIMIT 1";
    	}else{
    		$sql="";
    	}
		    return $this->db->select($sql);

	}

	public function memberByIdName($table,$id){
	  $sql = "SELECT * FROM $table WHERE id=:id";
	  $data = array(":id"=>$id);
	  return $this->db->select($sql,$data);		
	}

    public function AvgByTagNDateLimit($tbl_attendance,$tag,$fdate,$tdate){

       $sql = "SELECT DISTINCT date FROM $tbl_attendance WHERE tag='$tag' AND date BETWEEN '$fdate' AND '$tdate' ";

      return $this->db->cow_count($sql);  
    }


    public function AvgByTagYear($tbl_attendance,$tag,$selectedYear){

       $sql = "SELECT DISTINCT date FROM $tbl_attendance WHERE tag='$tag' AND YEAR(date) = '$selectedYear' ";

      return $this->db->cow_count($sql);  
    }

	public function AvgByTagLimit($tbl_attendance,$tag,$fdate,$tdate){
	     $sql="SELECT * FROM tbl_attendance WHERE date BETWEEN '$fdate' AND '$tdate' AND tag='$tag' AND attend='present' ";
	           //echo $sql;
	  return $this->db->cow_count($sql);

	}

	public function AvgMemByProgLimit($tbl_attendance,$tbl_member,$tag,$fdate,$tdate){
       $sql="SELECT $tbl_attendance.*,$tbl_member.member,

        COUNT(CASE WHEN  member = 'qa' AND $tbl_attendance.attend='present' THEN 1 END) AS aqa, 

        COUNT(CASE WHEN member = 'qg' AND $tbl_attendance.attend='present'  THEN 1 END) AS aqg,

        COUNT(CASE WHEN member = 'qpm' AND $tbl_attendance.attend='present'  THEN 1 END) AS aqpm

        FROM $tbl_attendance
        INNER JOIN $tbl_member
        ON 
        $tbl_attendance.m_id = $tbl_member.id
        WHERE date BETWEEN '$fdate' AND '$tdate' AND
        $tbl_attendance.tag='$tag'
        ";
        return $this->db->select($sql);  		
	}

	public function TotalMemByTagLimit($tbl_attendance,$tbl_member,$tag,$fdate,$tdate){
       $sql="SELECT $tbl_attendance.*,$tbl_member.member,

        COUNT(CASE WHEN $tbl_attendance.attend='present' THEN 1 END) AS mem

        FROM $tbl_attendance
        INNER JOIN $tbl_member
        ON 
        $tbl_attendance.m_id = $tbl_member.id
        WHERE date BETWEEN '$fdate' AND '$tdate' AND
        $tbl_attendance.tag='$tag'
        
        ";
        return $this->db->select($sql); 
	}

	public function TotalProg($tbl_attendance,$tag){
	     $sql = "SELECT DISTINCT date FROM $tbl_attendance WHERE tag='$tag'";
	           //echo $sql;
	  return $this->db->cow_count($sql);		
	}

   //edited 17/08/2019
 	public function checkTag($tbl_attendance,$id){
	  $sql = "SELECT * FROM $tbl_attendance WHERE m_id='$id'";
	  //$data = array(":m_id"=>$id);
	  return $this->db->cow_count($sql);
	}

   //edited 17/08/2019
	public function delMemByTag($tbl_member,$tbl_attendance,$id){
        $sql="DELETE $tbl_attendance,$tbl_member FROM $tbl_attendance
          INNER JOIN
          $tbl_member ON $tbl_attendance.m_id = $tbl_member.id
          WHERE $tbl_member.id='$id' 
          ";

      return $this->db->JoinDelete($sql);  
}
	
}	
?>