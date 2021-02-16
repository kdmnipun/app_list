<?php
/**
* Tag Attendance
*/
class AttenTable extends DController{
    
    public function __construct(){
        parent::__construct();
        Session::checkSession();
        $data = array();
    }

    public function dataTalbleAtnList(){
        $table = "tbl_preatn";
        $model = $this->load->model("atnDataTableModel");
        $result  = $model->atnList($table);

        if($result > 0) {
            $json = array();
            while($row = $result->fetch()){
                $json[] = array(
                    'name' => $row['name'],
                    'phone' => $row['phone'],
                    'reg' => $row['reg']
                );
            }

            $json['success'] = true;
            echo json_encode($json);
        }

    }
}    