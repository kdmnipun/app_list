<?php
/**
* User Contorller
*/
class User extends DController{
	
	public function __construct(){
	    parent::__construct();
	    Session::checkSession();
      $data = array();
	}

	public function Welcome(){
		$this->addUser();
	}

	public function addUser(){
    if(Session::get("userLevel") == 3){
        header("Location:".BASE_URL."/Welcome/home");
    }
    $data['title']   = "Listapp | Add user";
    $this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar');    	
    $this->load->view('admin/adduser');
    $this->load->view('admin/footer'); 
	}

	public function createUser(){
		if (!($_POST)) {
			header("Location:".BASE_URL."/User/addUser");
		}
        $table = "tbl_user";

        $input = $this->load->validation('DForm');
        
        $input->post('name')
              ->isEmpty(); 

        $input->post('username')
              ->isEmpty()
              ->checkExists($table); 

        $input->post('level')
              ->isEmpty();

        $input->post('password')
              ->isEmpty()              
              ->passChck(6);

        if ($input->submit()) {
                
                $name    = $input->values['name'];
                $username    = $input->values['username'];
                $level       = $input->values['level'];
                $password    = md5($input->values['password']);            
                $data  = array(
                    'name'       => $name,     
                    'username'   => $username,
                    'level'      => $level,      
                    'password'   => $password                          
                );

                $usermodel = $this->load->model("UserModel");
                $result = $usermodel->insertUser($table,$data);

                $mdata = array();
                if ($result == 1) {
                $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                                    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Success!</strong> User added successfully.
                                  </div>";
                  }else{
                        $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                                    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Success!</strong> Does not add.
                                  </div>";
                  }
                
                $url = BASE_URL."/User/listUser?msg=".urlencode(serialize($mdata));
                header("Location:".$url);
 
        }else{
               $data['userErr'] = $input->errors;
               
                $this->load->view('admin/header');
                $this->load->view('admin/sidebar');
                    
                $this->load->view('admin/adduser',$data);
                $this->load->view('admin/footer');                 
        }              		
	}
    //UserName Exsits
    public function userNameExsits(){
      $input = $this->load->validation('DForm');
      $table = "tbl_user";
      $input->post('username');
      $username    = $input->values['username'];

        $mmodel = $this->load->model("UserModel");
        $result = $mmodel->checkUserName($table,$username);
         
        if($result)
        {
          echo 'false';
        }
        else
        {
            echo'true';
        } 
  
    }

    public function userEditByAjax($id=NULL){
        $id = $_GET['id'];
        
        $table = "tbl_user";
        $usermodel = $this->load->model("UserModel");
        $result = $usermodel->fetchById($table,$id);

        foreach ($result as $value) {
          $output['id'] = $value['id'];
          $output['name'] = $value['name'];
          $output['username'] = $value['username'];
          $output['level'] = $value['level'];
        }
        echo json_encode($output);
     
  }


    public function updateUserByAjax(){
        $input = $this->load->validation('DForm');
        $table = 'tbl_user';
        $id  = $_POST['updateId'];
        $cond = "id=$id";

        $input->post('name');

        $input->post('level');

       
        
        $name   = $input->values['name'];
        $level   = $input->values['level'];

        

        $data = array(
            'name' => $name,   
            'level'=> $level   
        );
        $usermodel = $this->load->model("UserModel");

        $result   = $usermodel->userUpdate($table,$data,$cond);
       if ($result) {
         echo"succes";
       }
    }

    //password change
    public function updateUserPassAjax(){
        $input = $this->load->validation('DForm');
        $table = 'tbl_user';
        $id  = $_POST['passId'];
        $cond = "id=$id";

        $input->post('password');      
        
        $password   = md5($input->values['password']);        

        $data = array(
            'password' => $password     
        );
        $usermodel = $this->load->model("UserModel");

        $result   = $usermodel->userUpdate($table,$data,$cond);
       if ($result) {
         echo"succes";
       }
    }
    //password change By userSelf
    public function updatePassAjax(){
        $input = $this->load->validation('DForm');
        $table = 'tbl_user';
        $id  = Session::get("userID");
        $cond = "id=$id";     
        
        $newpassword =$_POST['newpassword'];

        $data = array(
            'password' => md5($newpassword)   
        );
        $usermodel = $this->load->model("UserModel");

        $result   = $usermodel->userUpdate($table,$data,$cond);
       if ($result) {
         echo"succes";
       }
    }


	public function listUser(){
        $data['title']   = "Listapp | User list";
        $this->load->view('admin/header',$data);
    		$this->load->view('admin/sidebar'); 
    		   	
      	$usertable = "tbl_user";
      	$usermodel = $this->load->model("UserModel");
      	$data['userlist'] = $usermodel->userList($usertable);

       	$this->load->view('admin/userlist',$data);
        $this->load->view('admin/footer');		
	}

 //User List
  public function ajaxUserLlist(){
        $usertable = "tbl_user";
        $usermodel = $this->load->model("UserModel");
        $result = $usermodel->userList($usertable);

        $result_html = '';
        $i=0;
        foreach($result as $value) {

          $level = '';
          if ($value['level'] == 2) {
              $level = 'Admin';
          }else if($value['level'] == 3){
              $level = 'Editor';
          } 
          
          if (Session::get("userLevel")==2 && $value['level']!=1) {
            $i++;
              $result_html .= '
                  <tr>
                      <td>' .$i. '</td>
                      <td>' .$value['name']. '</td>
                      <td>' .$value['username']. '</td>
                      <td>' .$level. '</td>
                      <td><button type="button" class="btn btn-success" id="editBtnId" data-editBtnId="'.$value['id'].'"><i class="fa fa-edit" aria-hidden="true"></i>
                      </button>

                      <button type="button" class="btn btn-success" id="editPass" data-editPass="'.$value['id'].'"><i class="fa fa-key" aria-hidden="true"></i>
                      </button>

                      <button type="button" class="btn btn-danger" id="delteBtnId"  data-delteBtnId="'.$value['id'].'"><i class="fa fa-trash" aria-hidden="true"></i>
                      </button>
                      </td>
                  </tr>';                   

          }elseif(Session::get("userLevel")==1){
            $i++;
              $result_html .= '
                  <tr>
                      <td>' .$i. '</td>
                      <td>' .$value['name']. '</td>
                      <td>' .$value['username']. '</td>
                      <td>' .$level. '</td>
                      <td><button type="button" class="btn btn-success" id="editBtnId" data-editBtnId="'.$value['id'].'"><i class="fa fa-edit" aria-hidden="true"></i>
                      </button>

                      <button type="button" class="btn btn-success" id="editPass" data-editPass="'.$value['id'].'"><i class="fa fa-key" aria-hidden="true"></i>
                      </button>

                      <button type="button" class="btn btn-danger" id="delteBtnId"  data-delteBtnId="'.$value['id'].'"><i class="fa fa-trash" aria-hidden="true"></i>
                      </button>
                      </td>
                  </tr>';                  

          }else{
            $i++;
              $result_html .= '
                  <tr>
                      <td>' .$i. '</td>
                      <td>' .$value['name']. '</td>
                      <td>' .$value['username']. '</td>
                      <td>' .$level. '</td>
                      <td></td>
                  </tr>';             
          }
        }
        echo json_encode($result_html);              
 }



  public function deleteUser($id=NULL){
        $table = "tbl_user";
        $cond  = "id=$id";
        $usermodel = $this->load->model("UserModel");
        $result    = $usermodel->delUserById($table,$cond);

        $mdata = array();
        if ($result == 1) {
                $mdata['msg'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'><span style='color:green;font-weight:bold;'>Data deleted successfully</span></div>";  
          }else{
                $mdata['msg'] = "Data does not deleted";
          }

        header("Location:".BASE_URL."/User/listUser?msg=".urlencode(serialize($mdata))); 
  }
  
  public function deleteAjaxUser(){
        $table = "tbl_user";
        $id = $_GET['id'];
        $cond = "id=$id";
        $usermodel = $this->load->model("UserModel");
        $result   = $usermodel->delUserById($table,$cond);

        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);           
    }
  
  public function userEdit($id=NULL){
        if ($id !== Session::get("userID")) {
           header("Location:".BASE_URL."/Admin");
        }
        $table = "tbl_user";

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');

        $usermodel = $this->load->model("UserModel");
        $data['userbyid'] = $usermodel->userById($table,$id);
        $this->load->view('admin/edituser',$data);
        $this->load->view('admin/footer');     
  }




  public function userUpdate($id=NULL){

        if (!($_POST)) {
            header("Location:".BASE_URL."/User/listUser/$id");
        }     
        $input = $this->load->validation('DForm');
        $input->post('username')
              ->isEmpty(); 
                           
        $input->post('level')
              ->isEmpty();

        if ($input->submit()) {

        $table = "tbl_user";
        $cond  = "id=$id";
        
        $username   = $input->values['username'];
        $level      = $input->values['level'];
        $data  = array(
            'username'   => $username,   
            'level'      => $level    
        );

        $usermodel = $this->load->model("UserModel");
        $result = $usermodel->userUpdate($table,$data,$cond);

        $mdata = array();
        if ($result == 1) {
                $mdata['msg'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'><span style='color:green;font-weight:bold;'>Data updated successfully</span>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button> 
                </div>";  
          }else{
                $mdata['msg'] = "Data does not updated";
          }

        header("Location:".BASE_URL."/User/listUser?msg=".urlencode(serialize($mdata)));
       //header("Location:".BASE_URL."/User/userEdit/$id");          
        }else{
           $data['userErrors'] = $input->errors;
           
           $table = "tbl_user";

           $this->load->view('admin/header');
           $this->load->view('admin/sidebar');

           $usermodel = $this->load->model("UserModel");
           $data['userbyid'] = $usermodel->userById($table,$id);
           $this->load->view('admin/edituser',$data);
           $this->load->view('admin/footer');          
        }        
  }

  public function userPassUpdate($id=NULL){
           if ($id !== Session::get("userID")) {
             header("Location:".BASE_URL."/Admin");
          }    
           // $table = "tbl_user";

           $this->load->view('admin/header');
           $this->load->view('admin/sidebar');

           // $usermodel = $this->load->model("UserModel");
           // $data['userbyid'] = $usermodel->userById($table,$id);
           $this->load->view('admin/changepassword');
           $this->load->view('admin/footer');     
  }

  public function updatePassword($id=NULL){
          if (!($_POST)) {
              header("Location:".BASE_URL."/User/userPassUpdate/$id");
          } 
             
          $table = "tbl_user";
          $input = $this->load->validation('DForm');
          
          $input->post('oldpassword')                
                ->isEmpty()
                ->oldPassCheck($table); 
                             
          $input->post('newpass')
                ->isEmpty();
                             
          $input->post('conpass')
                ->isEmpty()
                ->confirm('newpass');

          if ($input->submit()) {          
          $cond        = "id=$id";          
          //$oldpassword = $input->values['oldpassword'];
          //$newpass     = $input->values['newpass'];
          $conpass     = $input->values['conpass'];

          $data  = array(
                'password'   => md5($conpass)   
            );

          $usermodel = $this->load->model("UserModel");
          $result = $usermodel->passUpdate($table,$data,$cond);                      
          $mdata = array();
          if ($result == 1) {
                  $mdata['msg'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'><span style='color:green;font-weight:bold;'>Data updated successfully</span>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                      </button> 
                  </div>";  
            }else{
                  $mdata['msg'] = "Data does not updated";
            }
        header("Location:".BASE_URL."/User/listUser?msg=".urlencode(serialize($mdata)));

      }else{

           $data['passwordErrors'] = $input->errors;
               
           $this->load->view('admin/header');
           $this->load->view('admin/sidebar');

           $usermodel = $this->load->model("UserModel");
           $data['userbyid'] = $usermodel->userById($table,$id);
           $this->load->view('admin/changepassword',$data);
           $this->load->view('admin/footer');                  
        }    
  }

}
?>