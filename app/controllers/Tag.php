<?php
/**
* Tag controller
*/
class Tag extends DController{
	
    public function __construct(){
        parent::__construct();
        Session::checkSession();
        $data = array();
    }

    public function insertTag(){
        $data['title']   = "Listapp | Add programme";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tag');       
    }

	public function addTags(){
        $tagmodel = $this->load->model("TagModel");
        $input = $this->load->validation('DForm');
        $table = "tbl_tag";

        $input->post('tag_name');
  
        $name   = $input->values['tag_name'];

        $data = array(
            'tag_name' => trim($name)       
        ); 

        $tagName = trim($name);

        $re   = $tagmodel->tagNameExst($table,$tagName);

        if ($re>0) {
          echo '1';
          exit();
        }
        $result   = $tagmodel->insertTag($table,$data);
        echo json_encode(array("status" => TRUE));
        // $msg['success'] = false;
        // $msg['type'] = 'add';
        // if($result){
        //     $msg['success'] = true;
        // }
        // echo json_encode($msg);
	}

 //User List
  public function allTags(){
        $table = "tbl_tag";
        $tagmodel = $this->load->model("TagModel");
        $result   = $tagmodel->alltags($table);

        $data_html = '';
        $i=0;
        foreach($result as $value) { 
          $i++;
          $data_html .= '
          <tr>
              <td>' .$i. '</td>
              <td>' .$value['tag_name']. '</td>
              <td>
              <button type="button" class="btn btn-success" id="editId" data-editId="'.$value['id'].'"><i class="fa fa-edit" aria-hidden="true"></i>
              </button>
              <button type="button" class="btn btn-danger" id="delteId"  data-delteId="'.$value['id'].'"><i class="fa fa-trash" aria-hidden="true"></i>
              </button>
              </td>
          </tr>';             

        }
        echo json_encode($data_html);              
 }

	public function progEdit(){
        $id = $_GET['id'];
        
        $table = "tbl_tag";
        $tagmodel = $this->load->model("TagModel");
        $result   = $tagmodel->editPorgById($table,$id);

        foreach ($result as $value) {
          $output['id'] = $value['id'];
          $output['tag_name'] = $value['tag_name'];
        }
        echo json_encode($output);		
	}

    public function updateProgByAjax(){
        $input = $this->load->validation('DForm');
        $table = 'tbl_tag';
        $id  = $_POST['progId'];
        $cond = "id=$id";

        $input->post('tag_name');      
        
        $name   = $input->values['tag_name'];
        
        $data = array(
            'tag_name' => $name     
        );
        $tagmodel = $this->load->model("TagModel");
        $result   = $tagmodel->progUpdate($table,$data,$cond);
       if ($result) {
         echo"succes";
       }
    }

	public function deleteProg(){
        $table = "tbl_tag";

        $id = $_GET['id'];
        $cond = "id=$id";
        $tagmodel = $this->load->model("TagModel");
        $result   = $tagmodel->delPorgById($table,$cond);

        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);  		
	}

	public function searchByTag(){
		$table1 = "tbl_tagname";
		$this->load->view('admin/header');
	    $this->load->view('admin/sidebar');
        $catmodel = $this->load->model("TagModel");
        $data['tagnamelist']   = $catmodel->TagNameList($table1);   
		$this->load->view('admin/searchtag',$data);
		$this->load->view('admin/footer');		
	}

	public function searchMemberByTag(){
        $table = "tbl_tag";
                 
        $tag = $_GET['tag'];
        //$tg = implode(",", $tag);

        $phoneModel = $this->load->model("TagModel");
        $data['searchtag'] = $phoneModel->allMemByTag($table,$tag);       
        $this->load->view('admin/searchresult',$data);	
	}

	public function addTagName(){
		$table = "tbl_tagname";
		$this->load->view('admin/header');
	    $this->load->view('admin/sidebar');

        $catmodel = $this->load->model("TagModel");
        $data['tagnamelist']   = $catmodel->TagNameList($table);

		$this->load->view('admin/tagname',$data);
		$this->load->view('admin/footer');				
	}
	public function insertTagName(){
        $input = $this->load->validation('DForm');
        $table = "tbl_tagname";

        $input->post('tag_name');
         
        $name   = $input->values['tag_name'];

        $data=array(
               'tag_name'=>$name
        	);

        $catmodel = $this->load->model("TagModel");
        $result   = $catmodel->insertTagName($table,$data);


        if($result){
        $url = BASE_URL."/Tag/addTagName";
        header("Location: $url"); 
        }      
		
	}


}
?>