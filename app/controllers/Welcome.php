<?php
/**
* Welcome controller
*/
class Welcome extends DController{
	
	public function __construct(){
        parent::__construct();
        Session::checkSession();
        $data = array();
	}

    public function Welcome(){
        $this->homeConte();
    }

    public function home(){
        $table = "tbl_member";
        $tbl_tag = "tbl_tag";
        $data['title']   = "Listapp | Home";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');

        $mmodel = $this->load->model("MemModel");
        $tagmodel = $this->load->model("TagModel");

        $dat['progname']   = $tagmodel->alltags($tbl_tag);
        $dat['count'] = $mmodel->countMember($table); 
        $data = $mmodel->countMemberChart($table);
        $dat['countchart'] = json_encode($data); 
        
        $this->load->view('admin/home',$dat);
   
    }

    public function homeConte(){
        $table = "tbl_member";
        $tbl_tag = "tbl_tag";

        $data['title']   = "Listapp | Home";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');

        $mmodel = $this->load->model("MemModel");
        $tagmodel = $this->load->model("TagModel");
        
        $dat['progname']   = $tagmodel->alltags($tbl_tag);
        $dat['count'] = $mmodel->countMember($table); 
        $data = $mmodel->countMemberChart($table);
        $dat['countchart'] = json_encode($data); 
		
        $data = $mmodel->countMemberChartJs($table);
    		foreach($data as $value){
    			$val[]=$value['qa'];
    			$val[]=$value['qg'];
    			$val[]=$value['qpm'];
    		}
        $dat['countMemberChartJs'] = json_encode($val); 
        
        $this->load->view('admin/content',$dat);
   
    }

    public function searchModal(){
        if (!($_POST)) {
            header("Location:".BASE_URL."/Welcome/home");
        }

        $input = $this->load->validation('DForm');
        $table = "tbl_member";

        $input->post('search');

        $search  = $input->values['search'];



        $mmodel = $this->load->model("MemModel");
        $result = $mmodel->searchMember($table, $search);

         if ($result) {
                echo "<h3>Search key: ".$_POST['search']."</h3>";
                $data="";
                $data.='<table class="table table-striped"><tr>
                             <th>Sl</th>
                             <th>Name</th>
                             <th>Member</th>
                             <th>Phone</th>
                        </tr>';
                $i=0;
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
                $data.='<tr>
                           <td>'.$i.'</td>
                           <td><a href='.BASE_URL.'/Member/memberViewBySearch/'.$value['id'].' target="_blank">'.$value['name'].'</a></td>
                           <td><a href='.BASE_URL.'/Member/memberViewBySearch/'.$value['id'].' target="_blank">'.$member.'</a></td>
                           <td><a href='.BASE_URL.'/Member/memberViewBySearch/'.$value['id'].' target="_blank">'.$value['phone'].'</a></td>
                        </tr>'; 
                   }else{
                    $data.='<tr>
                               <td>'.$i.'</td>
                               <td><a href='.BASE_URL.'/Member/memberViewBySearch/'.$value['id'].' target="_blank">'.$value['name'].'</a></td>
                               <td><a href='.BASE_URL.'/Member/memberViewBySearch/'.$value['id'].' target="_blank">'.$member.'<br>'.$value['reg'].'/'.$value['batch'].'</a></td>
                               <td><a href='.BASE_URL.'/Member/memberViewBySearch/'.$value['id'].' target="_blank">'.$value['phone'].'</a></td>
                            </tr>'; 
                   }   
                            

            }
             echo $data;
         }else{
            echo "<div class='text-center'><h2>Nothing found</h2></div>";
         }

    }

    public function AjaxPorgAvg(){
        //table
        $tbl_attendance = "tbl_attendance";
        $table = "tbl_member";
        $tbl_tag = "tbl_tag";

        //model
        $attenModel = $this->load->model("attenModel");
        $mmodel = $this->load->model("MemModel");
        $tagmodel = $this->load->model("TagModel");



        //cond
        $tag =$_POST['selectbox_id'];

        $prog  = $tagmodel->alltags($tbl_tag);
        foreach ($prog as $key => $value) {
         if ($tag==$value['id']) {
           $tagName=$value['tag_name'];
         }
        }
        $date= $attenModel->AvgByTagNDate($tbl_attendance,$tag);
        $tagMem = $attenModel->AvgByTag($tbl_attendance,$tag);
        $totalprog = $mmodel->TotalProg($tbl_attendance,$tag);


        $allmem = $attenModel->AvgMemByProg($tbl_attendance,$table,$tag);
        foreach ($allmem as $key => $value) {
           $qa = $value['aqa'];
           $qg = $value['aqg'];
           $qpm = $value['aqpm'];
        }

        $totalMem = $attenModel->TotalMemByTag($tbl_attendance,$table,$tag);

         foreach ($totalMem as $key => $value) {
           $total= $value['mem'];
         }
        $percentageqa = get_percentage($total,$qa);
        $percentageqg = get_percentage($total,$qg);
        $percentageqpm = get_percentage($total,$qpm);

        $data='';
        if ($date==0) {
        $data.='<div style="font-size: 21px;margin-bottom: 15px;">Programme: <span style="color:#0B62A4;font-style: bold;text-decoration: underline;font-style:italic">'.ucfirst($tagName).'</span></div>';

        $data.='<div class="avg" style="font-size: 21px;margin-bottom: 15px;">Attendance Average: <span class="a-span" style="color:#5CB85C">0</span> (Attendance has not taken)</div>';
        }else{
        $sum=$tagMem/$date;
        $avg=number_format($sum,2);
        
        $data.='<div class="pull-right" style="font-size:20px;"> Total Programme: '.$totalprog.'</div>';

        $data.='<div style="font-size: 21px;margin-bottom: 15px;">Programme: <span style="color:#0B62A4;font-style: bold;text-decoration: underline;font-style:italic">'.ucfirst($tagName).'</span></div>';

        $data.='<div class="avg" style="font-size: 21px;margin-bottom: 15px;">Attendance Average: <span class="a-span" style="color:#5CB85C">' .$avg.'</span></div>';

        $data.='<div style="font-size: 21px;margin-bottom: 3px;">Attendance  Percentage:</div> <div class="percent" style="font-size: 21px;"><span class="avg-span" style="text-decoration: underline;color:#337AB7">QA: ' .$percentageqa.'%'.'</span>  <span class="avg-span" style="text-decoration: underline;color:#5CB85C">QG: '.$percentageqg.'%'.'</span> <span class="avg-span" style="text-decoration: underline;color:#F0AD4E"> QPM: ' .$percentageqpm.'%</span></div>';
        }

        echo json_encode($data);
                      
    }

    public function AjaxAvgByLimt(){
        //table
        $tbl_attendance = "tbl_attendance";
        $table = "tbl_member";
        $tbl_tag = "tbl_tag";

        //model
        //$attenModel = $this->load->model("attenModel");
        $mmodel = $this->load->model("MemModel");
        $tagmodel = $this->load->model("TagModel");



        //cond
        $tag =$_POST['select_id'];
        $fdate =$_POST['fdate'];
        $tdate =$_POST['tdate'];

        $prog  = $tagmodel->alltags($tbl_tag);
        foreach ($prog as $key => $value) {
         if ($tag==$value['id']) {
           $tagName=$value['tag_name'];
         }
        }

        $date= $mmodel->AvgByTagNDateLimit($tbl_attendance,$tag,$fdate,$tdate);

        $tagMem = $mmodel->AvgByTagLimit($tbl_attendance,$tag,$fdate,$tdate);


        $allmem = $mmodel->AvgMemByProgLimit($tbl_attendance,$table,$tag,$fdate,$tdate);
        foreach ($allmem as $key => $value) {
           $qa = $value['aqa'];
           $qg = $value['aqg'];
           $qpm = $value['aqpm'];
        }

        $totalMem = $mmodel->TotalMemByTagLimit($tbl_attendance,$table,$tag,$fdate,$tdate);

         foreach ($totalMem as $key => $value) {
           $total= $value['mem'];
         }
        $percentageqa = get_percentage($total,$qa);
        $percentageqg = get_percentage($total,$qg);
        $percentageqpm = get_percentage($total,$qpm);

        $data='';
        if ($date==0) {
        $data.='<legend>Selected date: '.$fdate.' <span style="color:#0B62A4;">To</span> '.$tdate.'</legend>';  
        $data.='<div class="date pull-right"><span calss="found" style="font-size:21px">Number Of Programme: '.$date.'</div>';

        $data.='<div style="font-size: 21px;margin-bottom: 15px;">Programme: <span style="color:#0B62A4;font-style: bold;text-decoration: underline;font-style:italic">'.ucfirst($tagName).'</span></div>';

        $data.='<div class="avg" style="font-size: 21px;margin-bottom: 15px;">Attendance Average: <span class="a-span" style="color:#5CB85C">0</span></div>';
        }else{
        $sum=$tagMem/$date;
        $avg=number_format($sum,2);

        $data.='<legend>Selected date: '.$fdate.' <span style="color:#0B62A4;">To</span> '.$tdate.'</legend>';

        $data.='<div class="date pull-right"><span calss="found" style="font-size:21px">Number Of Programme: '.$date.'</div>';

        $data.='<div style="font-size: 21px;margin-bottom: 15px;">Programme: <span style="color:#0B62A4;font-style: bold;text-decoration: underline;font-style:italic">'.ucfirst($tagName).'</span></div>';

        $data.='<div class="avg" style="font-size: 21px;margin-bottom: 15px;">Attendance Average: <span class="a-span" style="color:#5CB85C">' .$avg.'</span></div>';

        $data.='<div style="font-size: 21px;margin-bottom: 3px;">Attendance  Percentage:</div> <div class="percent" style="font-size: 21px;"><span class="avg-span" style="text-decoration: underline;color:#337AB7">QA: ' .$percentageqa.'%'.'</span>  <span class="avg-span" style="text-decoration: underline;color:#5CB85C">QG: '.$percentageqg.'%'.'</span> <span class="avg-span" style="text-decoration: underline;color:#F0AD4E"> QPM: ' .$percentageqpm.'%</span></div>';
        }

        echo json_encode($data);
        //echo json_encode($tagMem);
                      
    }

    public function notFound(){
        $this->load->view('404');
    }
}
?>