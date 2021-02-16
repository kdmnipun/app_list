<?php
/**
* DForm class
* form validation
*/
class DForm extends DModel{
	public $currentValue;
	public $values = array();
	public $errors = array();

	public function __construct(){
      parent::__construct();
	}

	public function post($key){
       $this->values[$key] = trim($_POST[$key]);
       $this->values[$key] = stripcslashes($_POST[$key]);
       $this->values[$key] = htmlspecialchars($_POST[$key]);
       $this->currentValue = $key;
       return $this;
	}
	public function image($file){
       $this->values[$file] = $_FILES[$file];
       $this->currentValue = $file;
       return $this;
	}
	public function imageNameEmpty(){
      $emptyImag = empty($this->values[$this->currentValue]['name']);
      return  $emptyImag;
	}

	public function imageEmpty(){
       if (empty($this->values[$this->currentValue]['name'])) {
       	    $this->errors[$this->currentValue]['imgempty'] = "Field must not be empty";      	    
       }
       return $this;
	}
	
	public function imageValidation(){
       if (!empty($this->values[$this->currentValue]['name'])) {

     /* $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $this->values[$this->currentValue]['name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        if (in_array($file_ext, $permited) == false) {
             $this->errors[$this->currentValue]['validImage']  = "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }*/

		$allowed =  array('jpg', 'jpeg', 'png', 'gif');
		$filename = $this->values[$this->currentValue]['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed) ) {
		             $this->errors[$this->currentValue]['validImage']  = "<span class='error'>You can upload only:-"
		             .implode(', ', $allowed)."</span>";
		}            
     	    
       }
       return $this;
	}

	public function imageSize($maxsize){
       if (!empty($this->values[$this->currentValue]['name'])) {
       	   $file_name = $this->values[$this->currentValue]['name'];
       	   $file_size = $this->values[$this->currentValue]['size'];
       	   if($file_size > $maxsize){
       	    $this->errors[$this->currentValue]['imgSize'] = "Image size should be less then 1MB!"; 
       	   }
       	      	    
       }
       return $this; 
	}	

    public function folerPath($path){

       if (!empty($this->values[$this->currentValue]['name'])) {
          $file_name = $this->values[$this->currentValue]['name'];          
          $file_temp = $_FILES[$this->currentValue]['tmp_name'];

          $div = explode('.', $file_name);
          $file_ext = strtolower(end($div));
          $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
          $uploaded_image = $path.$unique_image;
          move_uploaded_file($file_temp, $uploaded_image);
          return $uploaded_image;    	    
       }
       return $this;

    }

	public function isEmpty(){
       if (empty($this->values[$this->currentValue])) {
       	    $this->errors[$this->currentValue]['empty'] = "Field must not be empty";      	    
       }
       return $this;
	}


	public function lenght($min=0,$max){
		if (strlen($this->values[$this->currentValue]) < $min OR strlen($this->values[$this->currentValue]) > $max) {
			$this->errors[$this->currentValue]['lenght'] = "Should Min ".$min." And Max ".$max." Characters.";
		}
       return $this;
	}

	public function validEmail(){
		if (!empty($this->values[$this->currentValue])) {
		    if (!filter_var($this->values[$this->currentValue], FILTER_VALIDATE_EMAIL)) {
		      $this->errors[$this->currentValue]['email']  = "Invalid email format";
		    }
		}
      		return $this;		
	}

	public function existData($table){

		if (!empty($this->values[$this->currentValue])) {
            $data  = $this->values[$this->currentValue];
			$sql   = "SELECT * FROM $table WHERE email =?";
		    $count = $this->db->chcekData($sql,$data);

		    if ($count > 0) {
		        $this->errors[$this->currentValue]['dataexist'] = "Email already exist!";		          
		    }             
		}
      		return $this;			
	}

	public function checkExists($table){

		if (!empty($this->values[$this->currentValue])) {
            $data  = $this->values[$this->currentValue];
			$sql   = "SELECT * FROM $table WHERE username =?";
		    $count = $this->db->chcekData($sql,$data);

		    if ($count > 0) {
		        $this->errors[$this->currentValue]['dataexist'] = "Username already exist!";		          
		    }             
		}
      		return $this;			
	}

	public function passChck($min=0){
		if (!empty($this->values[$this->currentValue])) {
	      if (strlen($this->values[$this->currentValue]) < $min) {
		        $this->errors[$this->currentValue]['passlenght'] = "Password Must Be ".$min." Characters!";
	      		}
		}
      		return $this;		
	}

	public function oldPassCheck($table){

		if (!empty($this->values[$this->currentValue])) {
            $data = $this->values[$this->currentValue];
            $pass = md5($data);
		    if ($pass!=Session::get("userPass")) {
		        $this->errors[$this->currentValue]['oldpassword'] = "Old password does not match!";		          
		    }             
		}
      		return $this;				
	}

	public function confirm($newpass){
		if (!empty($this->values[$this->currentValue])) {
			$con = $this->values[$this->currentValue];
			$conpass=$_POST[$newpass];
	      if ($conpass != $con) {
		        $this->errors[$this->currentValue]['notmatch'] = "Password does't match!";
	      		}
		}
      		return $this;	
	}

	public function submit(){
		if (empty($this->errors)) {
			return true;
		}else{
			return false;
		}
	}

 
	
}
?>