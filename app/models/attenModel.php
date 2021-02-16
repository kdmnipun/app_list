<?php
/**
* Class attenModel
*/
class attenModel extends DModel{
	
	public function __construct(){
	     parent::__construct();
	}

	public function memberByProg($table,$tag){
       $sql = "SELECT * FROM $table WHERE tag LIKE '%{$tag}%' ORDER BY member";
    	return $this->db->select($sql);	
	}

	public function checkDate($tbl_attendance,$date){
		$sql   = "SELECT * FROM $tbl_attendance WHERE date =?";
	  return $count = $this->db->affectedRows($sql,$date);
        // if ($count > 0)
        // {
        //     return true;
        // }
        // else
        // {
        //     return false;
        // }
	}
	
	public function addAttendByProg($tbl_attendance,$data){
	  return $this->db->insert($tbl_attendance,$data);	
	}


	public function memberByProgByDate($tbl_attendance,$tbl_member,$tag,$date,$attend){

       $sql ="SELECT $tbl_attendance.*,$tbl_member.name,member,reg,batch,gender,phone FROM $tbl_attendance
              INNER JOIN $tbl_member
              ON $tbl_attendance.m_id = $tbl_member.id
              WHERE 
              $tbl_attendance.tag LIKE '%{$tag}%'
              AND date LIKE '%{$date}%'
              AND attend LIKE '%{$attend}%'"; 
          //echo $sql;
        return $this->db->select($sql); 
	}

	public function viewByDateProg($tag,$date,$tbl_attendance,$tbl_member){

       $sql ="SELECT $tbl_attendance.*,$tbl_member.name,member,reg,batch,gender,phone FROM $tbl_attendance
              INNER JOIN $tbl_member
              ON $tbl_attendance.m_id = $tbl_member.id
              WHERE 
              $tbl_attendance.tag LIKE '%{$tag}%'
              AND date LIKE '%{$date}%'
             "; 
          //echo $sql;
        return $this->db->select($sql); 
	}

	public function editAtenByProg($tag,$tbl_attendance){

       $sql = "SELECT DISTINCT date FROM $tbl_attendance WHERE tag LIKE '%{$tag}%' ORDER BY date DESC";

    	return $this->db->select($sql);		
	}

	public function viewResultByDateProg($tag,$date,$tbl_attendance,$tbl_member){
/*       $sql = "SELECT 
             COUNT(CASE WHEN attend='present' then 1 end) AS present,
             COUNT(CASE WHEN attend='absent' then 1 end) AS absent
             FROM $tbl_attendance 
             WHERE tag LIKE '%{$tag}%' AND 
             date LIKE '%{$date}%' 
             ORDER BY id DESC";*/
       $sql = "SELECT
				COUNT(CASE WHEN $tbl_attendance.attend='present' then 1 end) AS present, $tbl_attendance.*,$tbl_member.member,gender,
				COUNT(CASE WHEN gender = 'male' AND member = 'qa' AND $tbl_attendance.attend='present' THEN 1 END) AS qamales, 

				COUNT(CASE WHEN gender = 'female' AND member = 'qa' AND $tbl_attendance.attend='present' THEN 1 END) AS qafemales,

				COUNT(CASE WHEN gender = 'male' AND member = 'qg' AND $tbl_attendance.attend='present'  THEN 1 END) AS qgmales,

				COUNT(CASE WHEN gender = 'female' AND member = 'qg' AND $tbl_attendance.attend='present'  THEN 1 END) AS qgfemales,

				COUNT(CASE WHEN gender = 'male' AND member = 'qpm' AND $tbl_attendance.attend='present'  THEN 1 END) AS qpmmales,

				COUNT(CASE WHEN gender = 'female' AND member = 'qpm' AND $tbl_attendance.attend='present'  THEN 1 END) AS qpmfemales

				FROM $tbl_attendance
				INNER JOIN $tbl_member
				ON 
				$tbl_attendance.m_id = $tbl_member.id
				WHERE 
				$tbl_attendance.tag LIKE '%{$tag}%'
				AND date LIKE '%{$date}%'
              ";
              //echo $sql;
       return $this->db->select($sql);			
	}

  public function countResultByMem($tbl_preatn,$tbl_member){
       $sql = "SELECT COUNT(*) AS total,
         $tbl_preatn.*,$tbl_member.member,gender,

        COUNT(CASE WHEN gender = 'male' AND member = 'qa' THEN 1 END) AS qamales, 

        COUNT(CASE WHEN gender = 'female' AND member = 'qa' THEN 1 END) AS qafemales,

        COUNT(CASE WHEN gender = 'male' AND member = 'qg' THEN 1 END) AS qgmales,

        COUNT(CASE WHEN gender = 'female' AND member = 'qg' THEN 1 END) AS qgfemales,

        COUNT(CASE WHEN gender = 'male' AND member = 'qpm' THEN 1 END) AS qpmmales,

        COUNT(CASE WHEN gender = 'female' AND member = 'qpm' THEN 1 END) AS qpmfemales

        FROM $tbl_preatn
        INNER JOIN $tbl_member
        ON 
        $tbl_preatn.memberid = $tbl_member.id";
              //echo $sql;
       return $this->db->select($sql);  
  }

	public function editAttendByProgPresent($sql){
		$stmt= $this->db->prepare($sql);
		//echo $sql;
		return $stmt->execute();
	}

	public function fetchTagDate($tbl_attenda,$tag,$date){
	    $sql = "SELECT * FROM $tbl_attenda WHERE tag LIKE '%{$tag}%' AND date LIKE '%{$date}%'";
	       //echo $sql;
	    return $this->db->select($sql);	    	
	}

	public function deletDateByProg($sql){
		//echo $sql;
        return $this->db->exec($sql);
	}

	public function infoAttenByfDateDff($tbl_attendance,$tbl_member,$tag,$f_date){
       $sql ="SELECT $tbl_attendance.*,$tbl_member.id,name,member,reg,batch,gender,phone FROM $tbl_attendance
              INNER JOIN $tbl_member
              ON $tbl_attendance.m_id = $tbl_member.id
              WHERE 
              $tbl_attendance.tag LIKE '%{$tag}%' AND date='$f_date' AND attend='present'"; 
              //echo $sql;
        return $this->db->select($sql); 		
	}


	public function infoAttenBytDateDff($tbl_attendance,$tbl_member,$tag,$t_date){
       $sql ="SELECT $tbl_attendance.*,$tbl_member.id,name,member,reg,batch,gender,phone FROM $tbl_attendance
              INNER JOIN $tbl_member
              ON $tbl_attendance.m_id = $tbl_member.id
              WHERE 
              $tbl_attendance.tag LIKE '%{$tag}%' AND date='$t_date' AND attend='present'"; 
              //echo $sql;
        return $this->db->select($sql); 		
	}


  public function infoAttenAnalysis($tbl_attendance,$tbl_member,$tag,$id){

       $sql ="SELECT $tbl_attendance.*,$tbl_member.name,member,reg,batch,gender,phone FROM $tbl_attendance
              INNER JOIN $tbl_member
              ON $tbl_attendance.m_id = $tbl_member.id
              WHERE 
              $tbl_attendance.tag LIKE '%{$tag}%' AND m_id=$id ORDER BY date DESC"; 
              //echo $sql;
        return $this->db->select($sql);       
  }


  public function AvgByTag($tbl_attendance,$tag){
     $sql="SELECT *
           FROM $tbl_attendance WHERE tag='$tag' AND attend='present'";
           //echo $sql;
  return $this->db->cow_count($sql);

  }

  public function AvgByTagNDate($tbl_attendance,$tag){

       $sql = "SELECT DISTINCT date FROM $tbl_attendance WHERE tag='$tag'";

      return $this->db->cow_count($sql);   
  }

  public function AvgMemByProg($tbl_attendance,$tbl_member,$tag){
       $sql="SELECT $tbl_attendance.*,$tbl_member.member,

        COUNT(CASE WHEN  member = 'qa' AND $tbl_attendance.attend='present' THEN 1 END) AS aqa, 

        COUNT(CASE WHEN member = 'qg' AND $tbl_attendance.attend='present'  THEN 1 END) AS aqg,

        COUNT(CASE WHEN member = 'qpm' AND $tbl_attendance.attend='present'  THEN 1 END) AS aqpm

        FROM $tbl_attendance
        INNER JOIN $tbl_member
        ON 
        $tbl_attendance.m_id = $tbl_member.id
        WHERE 
        $tbl_attendance.tag='$tag'

        ";
        return $this->db->select($sql);  

  }

  public function TotalMemByTag($tbl_attendance,$tbl_member,$tag){
       $sql="SELECT $tbl_attendance.*,$tbl_member.member,

        COUNT(CASE WHEN $tbl_attendance.attend='present' THEN 1 END) AS mem

        FROM $tbl_attendance
        INNER JOIN $tbl_member
        ON 
        $tbl_attendance.m_id = $tbl_member.id
        WHERE 
        $tbl_attendance.tag='$tag'

        ";
        return $this->db->select($sql);  
  }

    public function delMultiMem($tbl_attendance,$tbl_member,$delid){
        $clause = " WHERE ";//Initial clause
        $sql="DELETE $tbl_attendance,$tbl_member FROM $tbl_attendance
          INNER JOIN
          $tbl_member ON $tbl_attendance.m_id = $tbl_member.id";

            if(isset($delid)){
                foreach($delid as $c){
                    $sql .= $clause." $tbl_member.id=".$c."";
                    $clause = " OR ";//Change  to OR after 1st WHERE 
                }
            }
        echo $sql.'<br>';//Remove after testing

      return $this->db->JoinDelete($sql);  
    }

  public function MemAbsentAnalysis($tbl_attendance,$tbl_member,$tag,$fdate,$tdate,$attend,$num){
       $sql ="SELECT $tbl_attendance.*,$tbl_member.name,member,reg,batch,gender,phone, SUM(attend='$attend') as abs FROM $tbl_attendance INNER JOIN $tbl_member ON $tbl_attendance.m_id = $tbl_member.id WHERE $tbl_attendance.tag LIKE '%$tag%' AND attend='$attend' AND $tbl_attendance.date BETWEEN '$fdate' AND '$tdate' GROUP BY $tbl_attendance.m_id HAVING abs = '$num' ORDER BY abs"; 
              //echo $sql;
        return $this->db->select($sql);     
  }

  public function MemAbsentAnalysisNullNum($tbl_attendance,$tbl_member,$tag,$fdate,$tdate,$attend){
       $sql ="SELECT $tbl_attendance.*,$tbl_member.name,member,reg,batch,gender,phone, SUM(attend='$attend') as abs FROM $tbl_attendance INNER JOIN $tbl_member ON $tbl_attendance.m_id = $tbl_member.id WHERE $tbl_attendance.tag LIKE '%$tag%' AND attend='$attend' AND $tbl_attendance.date BETWEEN '$fdate' AND '$tdate' GROUP BY $tbl_attendance.m_id  ORDER BY abs DESC"; 
              //echo $sql;
        return $this->db->select($sql);   
  }

  public function countAtn($tbl_attendance,$tbl_member,$member,$tag,$attend){
      // echo $sql ="SELECT $tbl_attendance.*,$tbl_member.name,member,reg,batch,gender,phone, SUM(attend='$attend') as abs FROM $tbl_attendance INNER JOIN $tbl_member ON $tbl_attendance.m_id = $tbl_member.id WHERE $tbl_attendance.tag LIKE '%$tag%' AND attend='$attend'  GROUP BY $tbl_attendance.m_id  ORDER BY member"; 
              //echo $sql;
      $clause = " WHERE ";//Initial clause
      $sql="SELECT $tbl_attendance.*,$tbl_member.name,member,reg,batch,gender,phone, SUM(attend='$attend') as abs FROM $tbl_attendance INNER JOIN $tbl_member ON $tbl_attendance.m_id = $tbl_member.id  ";//Query stub 
          if(isset($member)){
              foreach($member as $c){
                  if(!empty($c)){
                      $sql .= $clause." member='$c' AND $tbl_attendance.tag LIKE '%$tag%' AND attend='$attend'";
                      //$sql .= $clause." ".$c." LIKE '%{$c}%'";
                      $clause = " OR ";//Change  to OR after 1st WHERE
                  }   
              }
              $sql .="  GROUP BY $tbl_attendance.m_id  ORDER BY member";
          }
    
        return $this->db->select($sql);  
  }







  public function selectAttendList($tbl_attendance,$tbl_member,$id,$tag){

        $clause = " WHERE ";//Initial clause
        $sql="SELECT * FROM  $tbl_member  ";//Query stub 
            foreach($id as $c){
                $sql .= $clause." id='$c' ";
                $clause = " OR ";
            }
         $sql.=" ORDER BY member ";   
        //echo $sql."<br>";//Remove after testing

        return $this->db->select($sql); 
  }


  public function attenDate($date,$tag){
     $sql="SELECT *
           FROM tbl_attendance WHERE tag='$tag' AND date='$date'";
           //echo $sql;
     return $this->db->select($sql);
  }

  public function tagDateExst($tbl_attendance,$date,$tag){
    $sql   = "SELECT * FROM $tbl_attendance WHERE date='$date' AND tag='$tag'";
      return $this->db->cow_count($sql);
  }

  public function addAtnList($table,$data){
        return $this->db->insert($table,$data);
  }

  public function atnList($tbl_preatn,$tbl_member){

       $sql ="SELECT $tbl_preatn.*,$tbl_member.id,name,member,reg,batch,phone FROM $tbl_preatn
              INNER JOIN $tbl_member
              ON $tbl_preatn.memberid = $tbl_member.id
              ORDER BY $tbl_preatn.pre_id
              "; 
              //echo $sql;
        return $this->db->select($sql);     
  }

  public function emptyDataTable($tbl_preatn){
      $sql = "TRUNCATE $tbl_preatn";
       
      //Prepare the SQL query.
      $statement = $this->db->prepare($sql);
       
      //Execute the statement.
      $statement->execute();
  }

  public function deleteAtnMember($table,$cond){
    return $this->db->delete($table,$cond);
  }

  public function countRow($tbl_preatn){
    $sql   = "SELECT * FROM $tbl_preatn";
      return $this->db->cow_count($sql);
  }

  public function countatnMem($tbl_preatn){
    $sql   = "SELECT * FROM $tbl_preatn";
      return $this->db->cow_count($sql);
  }

  public function editAtnList($table,$data){
    return $this->db->insert($table,$data);
  }

  public function memNameExst($table,$memberid){
    $sql   = "SELECT * FROM $table WHERE memberid ='$memberid'";
      return $this->db->cow_count($sql);
  }

  public function memExstByTagDate($table,$id,$date,$tag){
    $sql   = "SELECT * FROM $table WHERE m_id='$id' AND date='$date' AND tag='$tag'";
      return $this->db->cow_count($sql);
  }

}	
?>