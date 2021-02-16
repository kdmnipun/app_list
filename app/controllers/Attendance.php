<?php
/**
* Tag Attendance
*/
class Attendance extends DController{
    
    public function __construct(){
        parent::__construct();
        Session::checkSession();
        $data = array();
    }

    public function addAttendance(){
        $table = "tbl_tag";
        $tagmodel = $this->load->model("TagModel");
        $data['alltags']   = $tagmodel->alltags($table);
        $data['title']   = "Listapp | Attendance";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/attendance',$data);       
        $this->load->view('admin/footer');       
    }

    public function infoAttendance(){
        $table = "tbl_tag";
        $tagmodel = $this->load->model("TagModel");
        $data['alltags']   = $tagmodel->alltags($table);
        $data['title']   = "Listapp | Attendance info.";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/infoattendance',$data);       
        $this->load->view('admin/footer');       
    }

    public function fillAttendance(){
        // //table
         $table = "tbl_member";
         $tbl_tag = "tbl_tag";
         //$tbl_preatn = "tbl_preatn";

        //model
        //$attenModel = $this->load->model("attenModel");
        $tagmodel = $this->load->model("TagModel");
        $attenModel = $this->load->model("attenModel");

        //condition
        $tag = $_GET['tag'];   
        
        // data
        // $data['title']   = "Listapp | Take Attendance";
         $data['memlistbyprog'] = $attenModel->memberByProg($table,$tag);
         $data['alltags']   = $tagmodel->alltags($tbl_tag);
         

        // $this->load->view('admin/header',$data);
        // $this->load->view('admin/sidebar');       
        // $this->load->view('admin/addatten',$data); 
        $data['title']   = "Listapp | Take Attendance";

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');       
        $this->load->view('admin/atn/takeatn',$data); 
        $this->load->view('admin/atn/footer',$data);            
    }

    //UserName Exsits
    public function dateChecker(){
      $input = $this->load->validation('DForm');
      $table = "tbl_attendance";
      //$input->post('date');
      $date    = $_POST['date'];

      $attenModel = $this->load->model("attenModel");
      $result = $attenModel->checkDate($table,$date);
         
        if($result)
        {
          echo 'false';
        }
        else
        {
            echo'true';
        } 
  
    }

    public function selectAttendance(){
        if (!($_POST)) {
            header("Location:".BASE_URL."/Attendance/addAttendance");
        }
        $input = $this->load->validation('DForm');

        //table
        $tbl_attendance = "tbl_attendance";

        //model
        $attenModel = $this->load->model("attenModel");

        //condition
        //$tag   = $input->values['tag'];
        $input->post('tag');
        $input->post('date');
  
        $tag   = $input->values['tag'];
        $date   = $input->values['date'];
        $attend = $_POST['attend'];


        $re   = $attenModel->tagDateExst($tbl_attendance,$date,$tag);

        if ($re>0) {
          echo '1';
          exit();
        }

            foreach ($attend as $key => $value) {
              if ($value == 'present') {
                    $data = array(
                        'tag' => $tag,       
                        'm_id' => $key,       
                        'date' => $date,       
                        'attend' => 'present'       
                    );
                $result = $attenModel->addAttendByProg($tbl_attendance,$data);
                  }//else{
                 //    $data = array(
                 //        'tag' => $tag,       
                 //        'm_id' => $key,       
                 //        'date' => $date,       
                 //        'attend' => 'absent'       
                 //    );
                 //    //data
                 //    $result = $attenModel->addAttendByProg($tbl_attendance,$data);
                 // }   
            }

            echo json_encode(array("status" => TRUE));
      
        // $mdata = array();
        // if ($result == 1) {
        // $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
        //                     <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        //                     <strong>Success!</strong> Attendance taken successfully.
        //                   </div>";
        //   }else{
        //         $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
        //                     <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        //                     <strong>Success!</strong> Does not add.
        //                   </div>";
        //   }
        
        // $url = BASE_URL."/Attendance/editAttend?tag=".$tag."&msg=".urlencode(serialize($mdata));
        //     header("Location:".$url);

    }

    public function dateByAttendance(){
        //table
        $tbl_attendance = "tbl_attendance";
        $tbl_member = "tbl_member";
        $tbl_tag = "tbl_tag";

        //model
        $attenModel = $this->load->model("attenModel");
        $tagmodel = $this->load->model("TagModel");

        //condition
        $tag = $_GET['tag'];
        $date = $_GET['date'];
        $attend = $_GET['attend'];

        //data
        $data['title']   = "Listapp | Information for attendance";
        $data['memlistbyprogNdate'] = $attenModel->memberByProgByDate($tbl_attendance,$tbl_member,$tag,$date,$attend);
        $data['alltags']   = $tagmodel->alltags($tbl_tag);
      
        $this->load->view('admin/attendinfo',$data);   
    }

    public function editAttend(){
        //table
        $tbl_member = "tbl_member";
        $tbl_attendance = "tbl_attendance";
        $tbl_tag = "tbl_tag";

        //model
        $attenModel = $this->load->model("attenModel");
        $tagmodel = $this->load->model("TagModel");

        //condition
        $tag = $_GET['tag'];      
        
        //data
        $data['title']   = "Listapp | View Attendance";
        $data['editAtenbyprog'] = $attenModel->editAtenByProg($tag,$tbl_attendance);
        $data['alltags']   = $tagmodel->alltags($tbl_tag);

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');       
        $this->load->view('admin/editatten',$data); 
        $this->load->view('admin/footer',$data); 
    }

    public function editByAttendance(){
        if (!($_POST)) {
            header("Location:".BASE_URL."/Attendance/addAttendance");
        }
        $input = $this->load->validation('DForm');

        //table
        $tbl_attendance = "tbl_attendance";

        //model
        $attenModel = $this->load->model("attenModel");

        //condition
        $input->post('tag');
        $input->post('date');
  
        $tag   = $input->values['tag'];
        $date   = $input->values['date'];
        $attend = $_POST['attend'];

        foreach ($attend as $key => $value) {
          if ($value == 'present') {
                $data = array(
                    'tag' => $tag,       
                    'm_id' => $key,       
                    'date' => $date,       
                    'attend' => 'present'       
                );
            $result = $attenModel->addAttendByProg($tbl_attendance,$data);
             }else{
                $data = array(
                    'tag' => $tag,       
                    'm_id' => $key,       
                    'date' => $date,       
                    'attend' => 'absent'       
                );
                //data
                $result = $attenModel->addAttendByProg($tbl_attendance,$data);
             }   
        }

        $mdata = array();
        if ($result == 1) {
        $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Success!</strong> Attendance taken successfully.
                          </div>";
          }else{
                $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Success!</strong> Does not add.
                          </div>";
          }
        
        $url = BASE_URL."/Attendance/addAttendance?msg=".urlencode(serialize($mdata));
        header("Location:".$url);

    }

    public function viewByDate(){
        //table
        $tbl_member = "tbl_member";
        $tbl_attendance = "tbl_attendance";
        $tbl_tag = "tbl_tag";

        //model
        $attenModel = $this->load->model("attenModel");
        $tagmodel = $this->load->model("TagModel");

        //condition
        $tag = $_GET['tag'];
        $date = $_GET['date'];
        
        //data
        $data['title']   = "Listapp | View Attendance";
        $data['viewresult'] = $attenModel->viewResultByDateProg($tag,$date,$tbl_attendance,$tbl_member);
        $data['alltags']   = $tagmodel->alltags($tbl_tag);

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');       
        $this->load->view('admin/attenviewbydate',$data); 
        $this->load->view('admin/footer',$data); 
    }

    public function editByDate(){
        //table
        $tbl_member = "tbl_member";
        $tbl_attendance = "tbl_attendance";
        $tbl_tag = "tbl_tag";

        //model
        $attenModel = $this->load->model("attenModel");
        $tagmodel = $this->load->model("TagModel");

        //condition
        $tag = $_GET['tag'];
        $date = $_GET['date'];

        //data
        $data['title']   = "Listapp | Edit Attendance";

        $data['editview'] = $attenModel->viewByDateProg($tag,$date,$tbl_attendance,$tbl_member);

        $data['alltags']   = $tagmodel->alltags($tbl_tag);

        $data['viewresult'] = $attenModel->viewResultByDateProg($tag,$date,$tbl_attendance,$tbl_member);

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');       
        //$this->load->view('admin/editattenbyprogndate',$data);
        $this->load->view('admin/atn/editatten',$data); 
        //$this->load->view('admin/atn/footer/footer'); 
    }

    public function EditSelectAttendance($date){
        if (!($_POST)) {
            header("Location:".BASE_URL."/Attendance/addAttendance");
        }
        $input = $this->load->validation('DForm');

        //table
        $tbl_attendance = "tbl_attendance";

        //model
        $attenModel = $this->load->model("attenModel");

        //condition
        //$tag   = $input->values['tag'];
        $input->post('tag');
        $input->post('date');
  
        $tag   = $input->values['tag'];
        $Ddate   = $input->values['date'];
        $m_ids = $_POST['m_id'];

         

        foreach ($m_ids as $key => $value) {

          $sql = "UPDATE tbl_attendance SET attend='present', date='$Ddate' WHERE m_id='$key' AND date='$date' AND tag='$tag'";

            $result = $attenModel->editAttendByProgPresent($sql);
          // if ($value == 'present') {
          // $sql = "UPDATE tbl_attendance SET attend='present', date='$Ddate' WHERE m_id='$key' AND date='$date' AND tag='$tag'";

          //   $result = $attenModel->editAttendByProgPresent($sql);
          //    }elseif($value == 'absent'){

          //  $sql = "UPDATE tbl_attendance SET attend='absent', date='$Ddate' WHERE m_id='$key' AND date='$date' AND tag='$tag'";
          //       //data
          //   $result = $attenModel->editAttendByProgPresent($sql);
          //    }   
        }



        $mdata = array();
        if ($result == 1) {
        $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Success!</strong> Attendance Edited successfully.
                          </div>";
          }else{
                $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Success!</strong> Does not add.
                          </div>";
          }
        
        $url = BASE_URL."/Attendance/editAttend?tag=".$tag."&msg=".urlencode(serialize($mdata));
            header("Location:".$url);      
    }

    //Have to look---------------

    public function deleteByDate(){
        //table
        $tbl_attendance = "tbl_attendance";

        //model
        $attenModel = $this->load->model("attenModel");

        //condition
        $tag=$_GET['tag'];
        $date=$_GET['date'];

        $res = $attenModel->fetchTagDate($tbl_attendance,$tag,$date);

        foreach ($res as $key => $value) {
            $d=$value['date'];
            $t=$value['tag'];          
        }
        
        $sql = "DELETE FROM $tbl_attendance WHERE date='$d' AND tag='$t'";
        $result = $attenModel->deletDateByProg($sql);

        $mdata = array();
        if ($result > 1) {
        $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Success!</strong> Attendance deleted successfully.
                          </div>";
          }else{
                $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Warning!</strong> Does not add.
                          </div>";
          }
        
        $url = BASE_URL."/Attendance/editAttend?tag=".$tag."&msg=".urlencode(serialize($mdata));
            header("Location:".$url);        
    }

    public function infoAttendanceByDateDff(){
        //table
        error_reporting(0);
        $tbl_attendance = "tbl_attendance";
        $tbl_member = "tbl_member";
        $tbl_tag = "tbl_tag";

        //model
        $attenModel = $this->load->model("attenModel");
        $tagmodel = $this->load->model("TagModel");

        //condition
        $tag = $_GET['tag'];
        $f_date = $_GET['f_date'];
        $t_date = $_GET['t_date'];
        //$attend = $_GET['attend'];

        //data
        $data['title']   = "Listapp | Information for attendance";
        
        $result1 = $attenModel->infoAttenByfDateDff($tbl_attendance,$tbl_member,$tag,$f_date);

        $data['result1']=$result1;
        $val=array();
        foreach ($result1 as $value) {
            $val[]=$value['id'];
        }

        $result2 = $attenModel->infoAttenBytDateDff($tbl_attendance,$tbl_member,$tag,$t_date);
        $val1=array();
        foreach ($result2 as $value) {
           $val1[]=$value['id'];

        }
        $data['info'] =array_diff($val,$val1);

        $data['alltags']   = $tagmodel->alltags($tbl_tag);
      
        $this->load->view('admin/infoattenbydate',$data);        
    }


    public function attenAnalysis(){
        $tbl_attendance = "tbl_attendance";
        $tbl_member = "tbl_member";
        $tbl_tag = "tbl_tag";

        //model
        $attenModel = $this->load->model("attenModel");
        $tagmodel = $this->load->model("TagModel");

        //condition
        $tag = $_GET['tag'];
        $id = $_GET['id'];
        $name = $_GET['name'];

        //data
        $data['title']= "Listapp | Attendance analysis"; 
        $data['analysis'] = $attenModel->infoAttenAnalysis($tbl_attendance,$tbl_member,$tag,$id);

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');       
        $this->load->view('admin/attendanalysis',$data); 
        $this->load->view('admin/footer');     
    }

    public function selectAbsentMemByProg(){
        $tbl_attendance = "tbl_attendance";
        $tbl_member = "tbl_member";
        $tbl_tag = "tbl_tag";

        //model
        $attenModel = $this->load->model("attenModel");
        $tagmodel = $this->load->model("TagModel");
        $memmodel = $this->load->model("MemModel");

        //condition
        $tag = $_GET['tag'];
        //$member = $_GET['member'];
        $fdate = $_GET['fdate'];
        $tdate = $_GET['tdate'];
        $attend = $_GET['attend'];
        $num = $_GET['num'];

        $data['num']=$num;
        $data['attend']=$attend;

        //data
        $data['title']= "Listapp | Attendance analysis";

        $data['progname']   = $tagmodel->alltags($tbl_tag);
        
        

        if (empty($num)) {
        $data['absentanalysis'] = $attenModel->MemAbsentAnalysisNullNum($tbl_attendance,$tbl_member,$tag,$fdate,$tdate,$attend);
        }else{
        $data['absentanalysis'] = $attenModel->MemAbsentAnalysis($tbl_attendance,$tbl_member,$tag,$fdate,$tdate,$attend,$num);        }

        $data['numprog'] = $memmodel->AvgByTagNDateLimit($tbl_attendance,$tag,$fdate,$tdate);
     
        $this->load->view('admin/memabsent',$data);         
    }

    public function countMemberProAtn()
    {
        $tbl_attendance = "tbl_attendance";
        $tbl_member = "tbl_member";
        $tbl_tag = "tbl_tag";

        //model
        $attenModel = $this->load->model("attenModel");
        $tagmodel = $this->load->model("TagModel");
        $memmodel = $this->load->model("MemModel");

        //condition
        $tag = $_GET['tag'];
        $selectedYear = $_GET['year'];
        $data['inputYear'] = $_GET['year'];
        //$member = $_GET['member'];

        $attend = $_GET['attend'];

        $data['attend']=$attend;

        //data
        $data['title']= "Listapp | Attendance Count";

        $data['progname']   = $tagmodel->alltags($tbl_tag);
        
        //$data['absentanalysis'] = $attenModel->MemAbsentAnalysis($tbl_attendance,$tbl_member,$tag,$fdate,$tdate,$attend,$num); 

        $data['countAtn'] = $attenModel->countAtn($tbl_attendance,$tbl_member,$_GET['member'],$tag,$attend);

        $data['numprog'] = $memmodel->AvgByTagYear($tbl_attendance,$tag,$selectedYear);
     
        $this->load->view('admin/countmemberattendance',$data);  
    }

    public function deleteMultMembers(){
        //tables
        $tbl_attendance = "tbl_attendance";
        $tbl_member = "tbl_member";
        $tbl_tag = "tbl_tag";

        //models
        $attenModel = $this->load->model("attenModel");

        //condition
        $delid = $_POST['checked_id'];
        //$cond = "$delid";
        $nc = count($delid);
        $result   = $attenModel->delMultiMem($tbl_attendance,$tbl_member,$delid,$nc);

        $mdata = array();
        if ($result > 1) {
        $mdata['msg'] = "<div class='alert alert-success alert-dismissible'>
                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Success!</strong> Member deleted successfully.
                          </div>";
          }else{
                $mdata['msg'] = "<div class='alert alert-danger alert-dismissible'>
                            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Warning!</strong> Not working.
                          </div>";
          }
        
       $url = BASE_URL."/Attendance/editAttend?tag=".$tag."&msg=".urlencode(serialize($mdata));
       header("Location:".$url); 
    }

    public function selectAttendMem(){ 
        //tables
        $tbl_attendance = "tbl_attendance";
        $tbl_member = "tbl_member";
        $tbl_tag = "tbl_tag";

        //Models 
        $attenModel = $this->load->model("attenModel");
        $tagmodel = $this->load->model("TagModel");  

        //conditions 
        $id = $_GET['checked_id'];
        $tag = $_GET['tag'];


        $data['progname']   = $tagmodel->alltags($tbl_tag);
         
        $data['membysearch'] = $attenModel->selectAttendList($tbl_attendance,$tbl_member,$id,$tag);
        $this->load->view('admin/selectedlist',$data);

    } 


    public function takeAttendanceNewForm(){
        $data['title']   = "Listapp | Edit Attendance";

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');       
        $this->load->view('admin/atn/takeatn'); 
        $this->load->view('admin/atn/footer'); 
    }

    public function searchMemberAtn(){
        $input = $this->load->validation('DForm');
        $table = "tbl_member";

        $input->post('searchkey');

        $search  = $input->values['searchkey'];



        $mmodel = $this->load->model("MemModel");
        $response = $mmodel->searchMemberAtn($table, trim($search));

      $datatable = '';
        if ($response) {
      $datatable .='
      <div class="panel" style="position: absolute;z-index: 999; width: 100%;border: 1px solid #ddd;">
      <div class="panel-body custompanel" style="background-color:#f5f5f5">
      <div class="alert alert-info" style="display: none;"></div>
      <form id="takeAttendanceForm">
      <table class="table table-borderless">
        <thead>
          <tr>
            <th>Name</th>
            <th>Member</th>
            <th>Mobile</th>
            <th>Attendance</th>
          </tr>
        </thead>
        <tbody>';

        foreach ($response as $value) {

              if ($value['member'] == 'qa') {
                  $member = 'QA';
              }else if($value['member'] == 'qg'){
                  $member = 'QG';
              }else{
                  $member = 'QPM';
              }
        if ($value['member'] == 'qa') {
            $datatable .= '
                <tr>
                <td class="p-2" id="customerName">'.$value['name'].'
                <input type="hidden" name="memberid" id="memberid" value="'.$value['id'].'">
                </td>
                <td class="p-2">'.$member.'</td>
                <td class="p-2" id="customerMobile">'.$value['phone'].'
                </td>
                <td>
                   <button id="takeatn" class="btn btn-success">Present</button>
                </td>
                </tr>
               ';
           }else{
            $datatable .= '
                <tr>
                    <td>'.$value['name'].'
                    <input type="hidden" name="memberid" id="memberid" value="'.$value['id'].'">
                    </td>
                    <td>'.$member.'<br>'.$value['reg'].'/'.$value['batch'].'</td>
                    <td>'.$value['phone'].'</td>
                    <td>
                     <button id="takeatn" class="btn btn-success">Present</button>
                    </td>
                </tr>
               '; 
            }
        }
      $datatable .='</tbody>
                    </table>
                   </form>
                 </div>
                </div>
              ';
      }else{
            $datatable .='
            <div class="panel panel-default" style="position: absolute;z-index: 999; width: 100%">
               <div class="panel-body">
                 <h3 class="text-center">Not found</h3>
               </div>
            </div>
            ';

      }
      echo $datatable;
  }

    public function searchMemberEditAtn(){
        $input = $this->load->validation('DForm');
        $table = "tbl_member";

        $input->post('searchkey');
        $input->post('date');
        $input->post('tag');

        $search  = $input->values['searchkey'];
        $date  = $input->values['date'];
        $tag  = $input->values['tag'];



        $mmodel = $this->load->model("MemModel");
        $response = $mmodel->searchMemberAtn($table, trim($search));

      $datatable = '';
        if ($response) {
      $datatable .='
      <div class="panel" style="position: absolute;z-index: 999; width: 100%;border: 1px solid #ddd;">
      <div class="panel-body custompanel" style="background-color:#f5f5f5">
      <div class="alert alert-info" style="display: none;"></div>
      <form id="editAttendanceForm">
      <table class="table table-borderless">
        <thead>
          <tr>
            <th>Name</th>
            <th>Member</th>
            <th>Mobile</th>
            <th>Attendance</th>
          </tr>
        </thead>
        <tbody>';

        foreach ($response as $value) {

              if ($value['member'] == 'qa') {
                  $member = 'QA';
              }else if($value['member'] == 'qg'){
                  $member = 'QG';
              }else{
                  $member = 'QPM';
              }
        if ($value['member'] == 'qa') {
            $datatable .= '
                <tr>
                <td class="p-2" id="customerName">'.$value['name'].'
                <input type="hidden" name="memberid" id="memberid" value="'.$value['id'].'">
                </td>
                <td class="p-2">'.$member.'</td>
                <td class="p-2" id="customerMobile">'.$value['phone'].'
                <input type="hidden" name="date" id="date" value="'.$date.'">
                <input type="hidden" name="tag" id="tag" value="'.$tag.'">
                </td>
                <td>
                   <button id="takeatn" class="btn btn-success">Present</button>
                </td>
                </tr>
               ';
           }else{
            $datatable .= '
                <tr>
                    <td>'.$value['name'].'
                    <input type="hidden" name="memberid" id="memberid" value="'.$value['id'].'">
                    </td>
                    <td>'.$member.'<br>'.$value['reg'].'/'.$value['batch'].'</td>
                    <td>'.$value['phone'].'
                    <input type="hidden" name="date" id="date" value="'.$date.'">
                    <input type="hidden" name="tag" id="tag" value="'.$tag.'">
                    </td>
                    <td>
                     <button id="takeatn" class="btn btn-success">Present</button>
                    </td>
                </tr>
               '; 
            }
        }
      $datatable .='</tbody>
                    </table>
                   </form>
                 </div>
                </div>
              ';
      }else{
            $datatable .='
            <div class="panel panel-default" style="position: absolute;z-index: 999; width: 100%">
               <div class="panel-body">
                 <h3 class="text-center">Not found</h3>
               </div>
            </div>
            ';

      }
      echo $datatable;
  }

  // attendance add member
  public function addAtnList(){
    $input = $this->load->validation('DForm');
    $table = "tbl_preatn";
    //Models 
    $attenModel = $this->load->model("attenModel");
    $input->post('memberid');
    $memberid   = $input->values['memberid'];

    $data = array(
        'memberid' => $memberid      
    ); 

    $re = $attenModel->memNameExst($table,$memberid);

    if ($re>0) {
      echo '1';
      exit();
    }

    $result   = $attenModel->addAtnList($table,$data);
    echo json_encode(array("status" => TRUE));
  }

 // attendance edit member
  public function editAtnList(){
    $input = $this->load->validation('DForm');
    $table = "tbl_attendance";
    //Models 
    $attenModel = $this->load->model("attenModel");
    $input->post('id');
    $input->post('date');
    $input->post('tag');

    $id   = $input->values['id'];
    $date   = $input->values['date'];
    $tag   = $input->values['tag'];

    $re   = $attenModel->memExstByTagDate($table,$id,$date,$tag);

    if ($re>0) {
      echo '1';
      exit();
    }else{
        $data = array(
            'm_id' => $id,
            'date' => $date,
            'tag' => $tag,
            'attend' => 'present'      
        ); 
        $result   = $attenModel->editAtnList($table,$data);
        echo json_encode(array("status" => TRUE));
    } 


  }


  public function atnList(){
        $tbl_preatn = "tbl_preatn";
        $tbl_member = "tbl_member";

        $attenModel = $this->load->model("attenModel");
        $result   = $attenModel->atnList($tbl_preatn,$tbl_member);

        $data_html = '';
        $i=0;
        if ($result) {
            foreach($result as $value) { 
              $i++;

              if ($value['member'] == 'qa') {
                  $member = 'QA';
              }else if($value['member'] == 'qg'){
                  $member = 'QG';
              }else{
                  $member = 'QPM';
              }

            if ($value['member'] == 'qa') {
                $data_html .= '
                <tr>
                  <td>' .$i. '</td>
                  <td>' .$value['name']. '<input type="hidden" name="m_id['.$value['id'].']" id="m_id" value="'.$value['id'].'">
                  </td>
                  <td>' .$member. '</td>
                  <td>' .$value['phone']. '</td>
                  <td>
                  <button type="button" class="btn btn-default" id="delteId"  data-delteId="'.$value['pre_id'].'"><i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
                  </td>
                </tr>
                   ';
               }else{
                $data_html .= '
              <tr>
                  <td>' .$i. '</td>
                  <td>' .$value['name']. '<input type="hidden" name="m_id['.$value['id'].']" id="m_id" value="'.$value['id'].'"></td>
                  <td>'.$member.'<br>'.$value['reg'].'/'.$value['batch'].'</td>
                  <td>'.$value['phone'].'</td>
                  <td>
                  <button type="button" class="btn btn-default" id="delteId"  data-delteId="'.$value['pre_id'].'"><i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
                  </td>
               </tr>
                   '; 

               }
            }
        }else{
            $data_html .='
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
             </tr>
            ';

        }

        echo json_encode($data_html);  
  }

 public function takeFinalAtn(){
        $input = $this->load->validation('DForm');

        //table
        $tbl_attendance = "tbl_attendance";
        $tbl_preatn = "tbl_preatn";

        //model
        $attenModel = $this->load->model("attenModel");

        //condition
        //$tag   = $input->values['tag'];
        $input->post('tag');
        $input->post('date');
 
  
        $tag   = $input->values['tag'];
        $date   = $input->values['date'];
        

        $countRow   = $attenModel->countRow($tbl_preatn);
        $re   = $attenModel->tagDateExst($tbl_attendance,$date,$tag);

        if ($re>0) {
          echo '1';
          exit();
        }elseif ($countRow == 0) {
          echo '2';
          exit();
        }else{
        $m_ids = $_POST['m_id'];
        foreach ($m_ids as $key => $value) {
         $data = array(
            'tag' => $tag,       
            'm_id' => $key,       
            'date' => $date,      
            'attend' => 'present'       
        );

        $result = $attenModel->addAttendByProg($tbl_attendance,$data);
          }
        if ($result) {
             $attenModel->emptyDataTable($tbl_preatn);
         } 
        echo json_encode(array("status" => TRUE));

        }


 }

 public function deleteAtnMember(){
        $table = "tbl_preatn";

        $id = $_GET['id'];
        $cond = "pre_id=$id";
        $attenModel = $this->load->model("attenModel");
        $result   = $attenModel->deleteAtnMember($table,$cond);

        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);  
 }

 public function countatnMem(){
    $tbl_preatn = "tbl_preatn";
    $tbl_member = "tbl_member";

    $attenModel = $this->load->model("attenModel");
    $countRow   = $attenModel->countResultByMem($tbl_preatn,$tbl_member);

    $data_html = '';

    foreach ($countRow as $value) {
        $QAm = $value['qamales'];
        $QAf = $value['qafemales'];
        $t_qa =  $QAm + $QAf;

        $QGm = $value['qgmales'];
        $QGf = $value['qgfemales'];
        $t_qg =  $QGm + $QGf;

        $QPMm = $value['qpmmales'];
        $QPMf = $value['qpmfemales'];
        $t_qpm =  $QPMm + $QPMf;

        $data_html .='
         <div class="row">
             <div class="col-md-4">
         <div>
           <legend style="margin-bottom: 1px;"><h5>QA('.$t_qa.')</h5></legend>
           <h6>Male: '.$value['qamales'].',  Female: '.$value['qafemales'].'</h6>
         </div>
             </div>
             <div class="col-md-4">

         <div>
           <legend style="margin-bottom: 1px;"><h5>QG('.$t_qg.')</h5></legend>
           <h6>Male: '.$value['qgmales'].',  Female: '.$value['qgfemales'].'</h6>
         </div>
             </div>
             <div class="col-md-4">

         <div>
           <legend style="margin-bottom: 1px;"><h5>QPM('.$t_qpm.')</h5></legend>
           <h6>Male: '.$value['qpmmales'].',   Female: '.$value['qpmfemales'].'</h6>
         </div>
             </div>
         </div> 
         <h5>Totall: '.$value['total'].'</h5>';
    }

    echo json_encode($data_html);
 }

 public function deleteEditAtnMember(){
    $input = $this->load->validation('DForm');
    //table
    $table = "tbl_attendance";



        $id = $_GET['id'];
        $cond = "id=$id";
        $attenModel = $this->load->model("attenModel");
        $result   = $attenModel->deleteAtnMember($table,$cond);

        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);

 }
}
?>