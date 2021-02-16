<?php
/**
* Login Contorller
*/
class Login extends DController{
	
	public function __construct(){
	    parent::__construct();
	}

	public function Welcome(){
		$this->login();
	}

	public function login(){
		Session::init();
		if (Session::get("login") == true) {
			header("Location: ".BASE_URL."/Welcome");
		}

        $this->load->view("login/login");

	}

	public function loginAuth(){
		if (!($_POST)) {
			header("Location:".BASE_URL."/Login/login");
		}
        $table = "tbl_user";

        $input = $this->load->validation('DForm');
        
        $input->post('username')
              ->isEmpty(); 
                           
        $input->post('password')
              ->isEmpty(); 

        $mdata = array();
        if ($input->submit()) {
                
                $username    = $input->values['username'];
                $password    = md5($input->values['password']);
                $data  = array(
                    'username'   => $username,     
                    'password'   => $password     
                );

				$loginModel = $this->load->model("LoginModel");
				$count = $loginModel->userControl($table,$username,$password);

                
			if ($count>0) {
				$result = $loginModel->getUserData($table,$username,$password);
				Session::init();
				Session::set("login",true);
				Session::set("name",$result[0]['name']);
				Session::set("username",$result[0]['username']);
				Session::set("userPass",$result[0]['password']);
				Session::set("userID",$result[0]['id']);
				Session::set("userLevel",$result[0]['level']); 
				header("Location: ".BASE_URL."/Welcome/home");
			}else{
                $mdata['msg'] = "<div class='alert alert-warning alert-dismissible fade in'>
                     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>                
                     <span style='color:red;font-weight:bold;'>Username or password doesn't match!</span></div>";
                $url = BASE_URL."/Login?msg=".urlencode(serialize($mdata));
                header("Location:".$url);                				
			}
 
        }else{
            $data['loginerr'] = $input->errors;
	        $this->load->view("login/login",$data);	                       
        }  


	}

	public function logout(){
		Session::init();
		Session::destroy();
		header("Location: ".BASE_URL."/Login");
	}
}
?>