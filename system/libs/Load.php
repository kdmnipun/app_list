<?php
/**
* load class
*/
class Load{	
	
	public function __construct(){

	}

	public function view($FileName,$data = false){
	  if ($data == true) {
           extract($data);
	  	}	
      include 'app/views/'.$FileName.'.php';
	}

	public function model($model){	
      include 'app/models/'.$model.'.php';
      return new $model();
	}

	public function validation($modelName){
      include 'app/validations/'.$modelName.'.php';
      return new $modelName();
	}
}
?>