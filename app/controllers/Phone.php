<?php
/**
* Phone controller
*/
class Phone extends DController{
	
	public function __construct(){
        parent::__construct();
        Session::checkSession();
        $data = array();
	}

    public function Welcome(){
        $this->home();
    }

    public function home(){
        $data['title']   = "Listapp | Home";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }

    public function managePhoneList(){
        $data['title']   = "Listapp | Create phone list by member";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/phonelist');
        $this->load->view('admin/footer');        
    }

    
    public function filterPhoneList(){
             
        $table = "tbl_member";
                 
        $member = $_GET['member'];

        $phoneModel = $this->load->model("phoneModel");
        $data['membysearch'] = $phoneModel->memBySearch($table,$member);       
        $this->load->view('admin/listview',$data);         
    }

    public function filterListByActivity(){
        $phoneModel = $this->load->model("phoneModel");   
        $table = "tbl_member";
        $type = $_GET['type'];
         
        if (empty($_GET['member'])) {
          $data['membysearch'] = $phoneModel->memBy($table,$type);
          $this->load->view('admin/list',$data);
        }else{

          $data['membysearch'] = $phoneModel->memByActivity($table,$_GET['member'],$type);
          $this->load->view('admin/activitylist',$data); 
        }
              
    } 

    public function filterListByMember(){
        $table = "tbl_member";
                 
        $member = $_GET['member'];

        $phoneModel = $this->load->model("phoneModel");
        $data['allmemberbysercah'] = $phoneModel->allMemBySearch($table,$member);       
        $this->load->view('admin/allmemberbysercah',$data);                            
    }

    public function createListByProgramme(){
        $data['title']   = "Listapp | Create list by programme";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
        $table = "tbl_tag";
        $tagmodel = $this->load->model("TagModel");
        $data['progname']   = $tagmodel->alltags($table);         
        $this->load->view('admin/phonelistbyprog',$data);
        $this->load->view('admin/footer');        
    }

    public function filterListByProgramme(){
        $phoneModel = $this->load->model("phoneModel");   
        $table = "tbl_member";
        $tag = $_GET['tag'];
        
        $data['membysearch'] = $phoneModel->memByProg($table,$_GET['member'],$tag);

        $table = "tbl_tag";
        $tagmodel = $this->load->model("TagModel");
        $data['progname']   = $tagmodel->alltags($table);
                 
        $this->load->view('admin/membyprogrlist',$data); 

    }  
}
?>    