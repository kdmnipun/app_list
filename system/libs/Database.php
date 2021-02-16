<?php
/**
* 
*/
class Database extends PDO{
	
	public function __construct($dns,$user,$pass){
         parent::__construct($dns,$user,$pass);   
	}

    //Select data 
	public function select($sql, $data=array(), $fetchStyle = PDO::FETCH_ASSOC){
       $stmt = $this->prepare($sql);

       foreach ($data as $key => $value) {
       	    $stmt->bindParam($key,$value);
       }

       $stmt->execute();
       return $stmt->fetchAll($fetchStyle);
	}

    //Insert data 
	public function insert($table,$data){
		$keys = implode(",", array_keys($data));
		$values = ":".implode(", :", array_keys($data));

		$sql = "INSERT INTO $table($keys) VALUES($values)";
		$stmt =	$this->prepare($sql);

		foreach ($data as $key => $value) {
				$stmt->bindValue(":$key",$value);
			}
	    return $stmt->execute();
	}

	//Update data
	public function update($table,$data,$cond){
        $updateKeys = NULL;    
        foreach ($data as $key => $value) {
        	$updateKeys .= "$key=:$key,";
        }       
        $updateKeys = rtrim($updateKeys,","); 

		$sql = "UPDATE $table SET $updateKeys WHERE $cond";
		$stmt = $this->prepare($sql);

		foreach ($data as $key => $value) {
				$stmt->bindValue(":$key",$value);
			}
			
		return $stmt->execute();

	}

	//Delete data
	public function delete($table,$cond,$limit = 1){
        $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
        return $this->exec($sql);
	}

	//JoinDelete data
	public function JoinDelete($sql){
        return $this->exec($sql);
	}

	public function affectedRows($sql,$username,$password){
		$stmt = $this->prepare($sql);
		$stmt->execute([$username, $password]);
		return $stmt->rowCount();
	}

	public function chcekData($sql, $data){
		$stmt = $this->prepare($sql);
		$stmt->execute([$data]);
		return $stmt->rowCount();
	}

	public function cow_count($sql){
		$stmt = $this->prepare($sql);
		$stmt->execute();
		return $stmt->rowCount();
	}

	public function selectUser($sql,$username,$password){
		$stmt = $this->prepare($sql);
		$stmt->execute([$username, $password]);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>