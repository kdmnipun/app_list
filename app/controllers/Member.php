<?php
/**
* Member controller
*/
class Member extends DController{
	
	public function __construct(){
        parent::__construct();
        Session::checkSession();
        $data = array();
	}

    public function Welcome(){
        $this->home();
    }

    public function home(){
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }
    public function createMember(){
        $data['title']   = "Listapp | Add member";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
        $table = "tbl_tag";
        $tagmodel = $this->load->model("TagModel");
        $data['progname']   = $tagmodel->alltags($table);        
        $this->load->view('admin/addmember',$data);
        $this->load->view('admin/footer');
    }
    public function memberList(){
        $data['title']   = "Listapp | Member list";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
        $table = "tbl_member";
        $memmodel = $this->load->model("MemModel");
        $data['allmember'] = $memmodel->allMember($table);

        $this->load->view('admin/memberlist',$data);
        $this->load->view('admin/footer');
    }

    public function addMember(){
        if (!($_POST)) {
            header("Location:".BASE_URL."/Member/createMember");
        }        
        $input = $this->load->validation('DForm');
        $table = "tbl_member";

        $input->post('name')
              ->isEmpty();
        $input->post('gender')
              ->isEmpty();
        $input->post('member')
              ->isEmpty();
        $input->post('reg');
        $input->post('batch');
        $input->post('type')
              ->isEmpty();
        $input->post('phone')
              ->isEmpty();
        $input->post('comment');

        if (isset($_POST['tag'])) {
            $tag = $_POST['tag'];
        }

        $name    = $input->values['name'];
        $gender    = $input->values['gender'];
        $member    = $input->values['member'];
        $reg    = $input->values['reg'];
        $batch    = $input->values['batch'];
        $type    = $input->values['type'];
        $phone    = $input->values['phone'];
        $comment    = $input->values['comment'];

       if (!empty($tag)) {                              
            $tg = implode(",", $tag);
            if ($input->submit()){
                    $data  = array(
                        'name'   => $name,   
                        'gender' => $gender,   
                        'member' => $member,   
                        'reg'  => $reg,    
                        'batch'  => $batch,    
                        'type'   => $type,    
                        'phone'  => $phone,    
                        'comment' => $comment,
                        'tag'    => $tg   
                    );

                    $usermodel = $this->load->model("MemModel");
                    $result = $usermodel->insertMember($table,$data);

                    $mdata = array();
                    if ($result == 1) {
                    $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                                        <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                        <strong>Success!</strong> Member added successfully.
                                      </div>";
                      }else{
                            $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                                        <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                        <strong>Success!</strong> Does not add.
                                      </div>";
                      }
                    
                    $url = BASE_URL."/Member/memberList?msg=".urlencode(serialize($mdata));
                    header("Location:".$url);                                                            
            }else{
                    $data['memErr'] = $input->errors;                   
                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');
                    $table = "tbl_tag";
                    $tagmodel = $this->load->model("TagModel");
                    $data['progname']   = $tagmodel->alltags($table);        
                    $this->load->view('admin/addmember',$data);
                    $this->load->view('admin/footer');             
            }            
            }else{
            if ($input->submit()){
                    $data  = array(
                        'name'   => $name,   
                        'gender' => $gender,   
                        'member' => $member,   
                        'reg'  => $reg,    
                        'batch'  => $batch,    
                        'type'   => $type,    
                        'phone'  => $phone,    
                        'comment' => $comment 
                    );

                    $usermodel = $this->load->model("MemModel");
                    $result = $usermodel->insertMember($table,$data);

                    $mdata = array();
                    if ($result == 1) {
                    $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                                        <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                        <strong>Success!</strong> Member added successfully.
                                      </div>";
                      }else{
                            $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                                        <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                        <strong>Success!</strong> Does not add.
                                      </div>";
                      }
                    
                    $url = BASE_URL."/Member/memberList?msg=".urlencode(serialize($mdata));
                    header("Location:".$url);                                                            
            }else{
                    $data['memErr'] = $input->errors;
                   
                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');
                    $table = "tbl_tag";
                    $tagmodel = $this->load->model("TagModel");
                    $data['progname']   = $tagmodel->alltags($table);        
                    $this->load->view('admin/addmember',$data);
                    $this->load->view('admin/footer');            
              }
            } 

    }

  public function registerMobileExists(){
      $input = $this->load->validation('DForm');
      $table = "tbl_member";
      $input->post('phone');
      $phone    = $input->values['phone'];

        $mmodel = $this->load->model("MemModel");
        $mmodel->registerMobileExists($table,$phone);


        if ($mmodel->registerMobileExists($table,$phone) == TRUE){
              echo '<div class="alert alert-warning alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Warning!</strong> The <span style="color:red;font-weight:bold">Phone number</span> is already exists, check that person or continue
                    </div>';
          }
     
  }

  public function memberEdit($id=NULL){
        $table = "tbl_member";
        $table1 = "tbl_tag";
		
		$mmodel = $this->load->model("MemModel");

		$data = $mmodel->memberByIdName($table,$id);
		foreach($data as $name){
        $data['title']   = "Listapp | ".$name['name'];
		}
		
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');

        
        $data['memberbyid'] = $mmodel->memberById($table,$id);
                    
        $tagmodel = $this->load->model("TagModel");
        $data['progname']   = $tagmodel->alltags($table1);        
        $this->load->view('admin/editmember',$data);
        $this->load->view('admin/footer');     
  }

  public function memberViewC($id=NULL){
        $table = "tbl_member";
        $table1 = "tbl_tag";
    
    $mmodel = $this->load->model("MemModel");

    $data = $mmodel->memberByIdName($table,$id);
    foreach($data as $name){
        $data['title']   = "Listapp | ".$name['name'];
    }
    
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');

        
        $data['memberbyid'] = $mmodel->memberById($table,$id);
                    
        $tagmodel = $this->load->model("TagModel");
        $data['progname']   = $tagmodel->alltags($table1);        
        $this->load->view('admin/viewmember',$data);
        $this->load->view('admin/footer');     
  }

  public function memberRedirect(){
        $url = BASE_URL."/Member/memberList";
        header("Location:".$url); 
  }

  public function memberViewBySearch($id=NULL){
	    $mmodel = $this->load->model("MemModel");
        $table = "tbl_member";
        $table1 = "tbl_tag";
		$data = $mmodel->memberByIdName($table,$id);
		foreach($data as $name){
        $data['title']   = "Listapp | ".$name['name'];
		}
		
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');

        
        $data['memberbyid'] = $mmodel->memberById($table,$id);
        $tagmodel = $this->load->model("TagModel");
        $data['progname']   = $tagmodel->alltags($table1);        
        $this->load->view('admin/memberviewserch',$data);
        $this->load->view('admin/footer');     
  }

  public function memberUpdate($id=NULL){
        if (!($_POST)) {
            header("Location:".BASE_URL."/Member/memberList/$id");
        }     
        $input = $this->load->validation('DForm');
        $table = "tbl_member";

        $input->post('name')
              ->isEmpty();
        $input->post('gender')
              ->isEmpty();
        $input->post('member')
              ->isEmpty();
        $input->post('reg');
        $input->post('batch');
        $input->post('type')
              ->isEmpty();
        $input->post('phone')
              ->isEmpty();
        $input->post('comment');

        if (isset($_POST['tag'])){
            $tag = $_POST['tag'];
        }

        $cond  = "id=$id";
        $name    = $input->values['name'];
        $gender    = $input->values['gender'];
        $member    = $input->values['member'];
        $reg    = $input->values['reg'];
        $batch    = $input->values['batch'];
        $type    = $input->values['type'];
        $phone    = $input->values['phone'];
        $comment    = $input->values['comment'];


       if (!empty($tag)) {                              
          $tg = implode(",", $tag);
                if ($input->submit()) {
                        $data  = array(
                            'name'   => $name,   
                            'gender' => $gender,   
                            'member' => $member,   
                            'reg'  => $reg,    
                            'batch'  => $batch,    
                            'type'   => $type,    
                            'phone'  => $phone,    
                            'comment' => $comment,
                            'tag'=> $tg      
                        );

                        $mmodel = $this->load->model("MemModel");
                        $result = $mmodel->updateMember($table,$data,$cond);

                        $mdata = array();
                        if ($result == 1) {
                        $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Success!</strong> Member updated successfully.
                                          </div>";
                          }else{
                                $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Warning!</strong> Does not update.
                                          </div>";
                          }
                        
                        $url = BASE_URL."/Member/memberList?msg=".urlencode(serialize($mdata));
                        header("Location:".$url);         
                }else{
                    $data['memErr'] = $input->errors;
                       
                    $table = "tbl_member";
                    $table1 = "tbl_tag";

                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');

                    $mmodel = $this->load->model("MemModel");
                    $data['memberbyid'] = $mmodel->memberById($table,$id);
                                
                    $tagmodel = $this->load->model("TagModel");
                    $data['progname']   = $tagmodel->alltags($table1);        
                    $this->load->view('admin/editmember',$data);
                    $this->load->view('admin/footer');         
                } 
            }else{
              if ($input->submit()) {
                      $data  = array(
                          'name'   => $name,   
                          'gender' => $gender,   
                          'member' => $member,   
                          'reg'    => $reg,    
                          'batch'  => $batch,    
                          'type'   => $type,    
                          'phone'  => $phone,    
                          'comment' => $comment    
                      );

                      $mmodel = $this->load->model("MemModel");
                      $result = $mmodel->updateMember($table,$data,$cond);

                      $mdata = array();
                      if ($result == 1) {
                      $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                                          <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                          <strong>Success!</strong> Member updated successfully.
                                        </div>";
                        }else{
                              $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                                          <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                          <strong>Warning!</strong> Does not update.
                                        </div>";
                        }
                      
                      $url = BASE_URL."/Member/memberList?msg=".urlencode(serialize($mdata));
                      header("Location:".$url);         
              }else{
                 $data['memErr'] = $input->errors;
                     
                  $table = "tbl_member";

                  $this->load->view('admin/header');
                  $this->load->view('admin/sidebar');

                  $mmodel = $this->load->model("MemModel");
                  $data['memberbyid'] = $mmodel->memberById($table,$id);
                  $this->load->view('admin/editmember',$data);
                  $this->load->view('admin/footer');         
              } 
        }
       
  }

  //edited 17/08/2019
  public function deleteMember($id=NULL){
        $table = "tbl_member";
        $tbl_attendance = "tbl_attendance";
        $cond  = "id=$id";
        $mmodel = $this->load->model("MemModel");

        $checkTag = $mmodel->checkTag($tbl_attendance,$id);

        if ($checkTag) {
          $result    = $mmodel->delMemByTag($table,$tbl_attendance,$id);
        $mdata = array();
        if ($result >= 1) {
                $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                                    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Success!</strong> Member Deleted successfully.
                                  </div>"; 
          }else{
                $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Warning!</strong> Does not delete.
                          </div>";
          }          
        }else{
          
        $deletedata    = $mmodel->delMemById($table,$cond);
        $mdata = array();
        if ($deletedata == 1) {
                $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                                    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Success!</strong> Member Deleted successfully.
                                  </div>"; 
          }else{
                $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Warning!</strong> Does not delete.
                          </div>";
            }

        }
        header("Location:".BASE_URL."/Member/memberList?msg=".urlencode(serialize($mdata))); 
  }

    public function insertMemberByAjax(){      
        $input = $this->load->validation('DForm');
        $table = "tbl_member";

        $input->post('name')
              ->isEmpty();
        $input->post('gender')
              ->isEmpty();
        $input->post('member')
              ->isEmpty();
        $input->post('reg');
        $input->post('batch');
        $input->post('type')
              ->isEmpty();
        $input->post('phone')
              ->isEmpty();
        $input->post('comment');

        if (isset($_POST['tag'])) {
            $tag = $_POST['tag'];
        }

        $name    = $input->values['name'];
        $gender    = $input->values['gender'];
        $member    = $input->values['member'];
        $reg    = $input->values['reg'];
        $batch    = $input->values['batch'];
        $type    = $input->values['type'];
        $phone    = $input->values['phone'];
        $comment    = $input->values['comment'];

       if (!empty($tag)) {                              
            $tg = implode(",", $tag);

                    $data  = array(
                        'name'   => $name,   
                        'gender' => $gender,   
                        'member' => $member,   
                        'reg'  => $reg,    
                        'batch'  => $batch,    
                        'type'   => $type,    
                        'phone'  => $phone,    
                        'comment' => $comment,
                        'tag'    => $tg   
                    );

                    $usermodel = $this->load->model("MemModel");
                    $result = $usermodel->insertMember($table,$data);

                  $msg['success'] = false;
                  $msg['type'] = 'add';
                  if($result){
                      $msg['success'] = true;
                  }
                  echo json_encode($msg); 

            }else{
                    $data  = array(
                        'name'   => $name,   
                        'gender' => $gender,   
                        'member' => $member,   
                        'reg'  => $reg,    
                        'batch'  => $batch,    
                        'type'   => $type,    
                        'phone'  => $phone,    
                        'comment' => $comment 
                    );

                    $usermodel = $this->load->model("MemModel");
                    $result = $usermodel->insertMember($table,$data);


                    $msg['success'] = false;
                    $msg['type'] = 'add';
                    if($result){
                        $msg['success'] = true;
                    }
                    echo json_encode($msg);                                                           
              }
      } 

              
}
?>