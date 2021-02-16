<!DOCTYPE html>
<html lang="en">
<head>
  <title>Members List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">

table th , table td{
    text-align: center;
}

table tr:nth-child(even){
    background-color: #e4e3e3
}

th {
  color: #000;
}

.pagination {
  margin: 0;
}

.pagination li:hover{
    cursor: pointer;
}

.header_wrap {
  padding:30px 0;
}
.num_rows {
  width: 20%;
  float:left;
}
.tb_search{
  width: 20%;
  float:right;
}
.pagination-container {
  width: 70%;
  float:left;
}

.rows_count {
  width: 20%;
  float:right;
  text-align:right;
  color: #999;
}
.fom {
    border: none;
    color: green;
    font-size: 21px;
}


</style>
  <link rel="icon" href="<?php echo BASE_URL;?>/webroot/img/icon.png" type="image/png">
  <!-- Bootstrap Core CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/bootstrap.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/dataTables/jquery.dataTables.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

  <!-- DataTables Buttons CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/dataTables/buttons.dataTables.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

  <!-- toastr Theme CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/toastr.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

  <!-- Pace Theme CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/themes/blue/pace-theme-minimal.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
  
  <!-- Main CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css">  
 
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="back-btn">
                <a class="btn btn-success" href="<?php echo BASE_URL;?>/Attendance/infoAttendance">Back</a>
                <a class="btn btn-success" href="<?php echo BASE_URL;?>">Home</a>               
            </div>
            
            <div class="title text-center">
                <h3>Programme: 
                 <?php

                 $tag =$_GET['tag'];                 
                 foreach ($progname as $val) {
                  if($tag==$val['id']){
                        echo$val['tag_name'];
                  }

                }
                ?>
                </h3>
                <h3><?php echo ucfirst($_GET['attend']);?> List Between <?php echo $_GET['fdate'];?> - <?php echo $_GET['tdate'];?></h3>
            </div>

            <div class="prog text-right">
              <h4>Number Of Programme: <?php echo $numprog;?></h4>
            </div>

             <form name="bulk_action_form" action="<?php echo BASE_URL;?>/Attendance/selectAttendMem" method="get" onSubmit="return delete_confirm();"/>

             <input type="hidden" name="tag" value="<?php echo $_GET['tag'];?>" />

            <?php
            if ($_GET['attend']=='absent') {
            ?>
              <button formtarget="_blank" type="submit" class="btn btn-primary" style="">Create List</button>
              <button type="button" class="btn btn-danger" name="delete" id="delete" style="">Delete Member</button>
            <?php }?>

            <?php
            if ($_GET['attend']=='present') {
            ?>
           <button formtarget="_blank" type="submit" class="btn btn-primary" style="">Create List</button>
            <?php }?>

            <div class="header_wrap">
              <div class="num_rows">
                <div class="form-group">  <!--Show Numbers Of Rows-->
                  <select class="form-control" name="state" id="maxRows">
                     <option value="25">25</option>
                     <option value="50">50</option>
                     <option value="70">70</option>
                     <option value="100">100</option>
                     <option value="5000">Show ALL Rows</option>
                  </select>
                </div>
              </div>
              <div class="tb_search">
                  <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search.." class="form-control">
              </div>
            </div>
           <table class="table table-striped table-class" id= "table-id">  
            <thead>
                <tr>
              <?php
              //if ($_GET['attend']=='absent') {
              ?>
                <th style="width: 6.4%;padding-left: 0px">
                <input type="checkbox" id="select_all" name="" value=""/>  Select All
                </th>
              <?php //}?>
                <th style="width: 10%">Sl</th>
                <th style="width: 20%">Name & Reg</th>
                <th style="width: 20%">Phone</th>
                <th style="width: 15%"><?php if($_GET['attend']=='absent'){echo "Absent ";}else{echo "Present ";}?>(Times)</th>
              </tr>
            </thead>
            <tbody>
            <?php
                if(!empty($absentanalysis)){
                $i=0;
                foreach ($absentanalysis as $key => $value) {
                $i++;
            ?>    
        
                <tr class="odd gradeX text-center">
              <?php
              //if ($_GET['attend']=='absent') {
              ?>                
                    <td><input type="checkbox" id="id" name="checked_id[]" class="checkbox" value="<?php echo $value['m_id']; ?>"/></td>
              <?php //}?>
                    <td><?php echo$i;?></td>
                    <td><?php echo $value['name'];?><br>
                    <?php if ($value['member']== 'qa') {
                        echo"QA";
                    }elseif($value['member']== 'qg'){
                        echo"QG";
                    }else{
                        echo"QPM";
                    }
                   ?><br>
                  <?php if(!empty($value['reg']) || !empty($value['batch'])){?>
                  <?php echo $value['reg'];?>/<?php echo $value['batch'];?>
                  <?php }?>
                    </td>
                    <td><?php echo $value['phone'];?></td>
                    <td>
                   <?php $tag = explode(",", $value['tag']);
                   ?>
                    <?php 
                    if (!empty($progname)) {
                       foreach ($progname as $key => $val) {
                    ?>
                                  <?php if (in_array($val['id'], $tag)) {
                                  
                                   ?>
                    <a style="color:red;font-size: 15px" href="<?php echo BASE_URL;?>/Attendance/attenAnalysis?id=<?php echo $value['m_id'];?>&tag=<?php echo $val['id'];?>&tag_name=<?php echo $val['tag_name'];?>&name=<?php echo $value['name'];?>&member=<?php echo $value['member'];?>" target="_blank">
                    <?php echo $value['abs'];?>
                    </a>
                    <?php }?>
                    <?php }?>
                    <?php }?>
                    </td>
                </tr>
                <?php }?>
                <?php }?>

            </tbody>
            </table>
            <!--    Start Pagination -->
              <div class='pagination-container'>
                <nav>
                  <ul class="pagination">
                   <!-- Here the JS Function Will Add the Rows -->
                  </ul>
                </nav>
              </div>

              <div class="rows_count">Showing 11 to 20 of 91 entries</div>
            </form>
        </div>
    </div>
<!-- jQuery -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery-3.3.1.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/bootstrap.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script> 
   
  <!-- DataTables  JavaScript -->
  <script src="<?php echo BASE_URL;?>/webroot/js/dataTables/jquery.dataTables.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>  
  <!-- DataTables Button JavaScript -->
  <script src="<?php echo BASE_URL;?>/webroot/js/dataTables/dataTables.buttons.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

  <!-- DataTables Print Button JavaScript -->
  <script src="<?php echo BASE_URL;?>/webroot/js/dataTables/buttons.print.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

  <!-- Table JavaScript -->
  <script src="<?php echo BASE_URL;?>/webroot/js/table.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

  <!-- Toastr JavaScript -->
  <script src="<?php echo BASE_URL;?>/webroot/js/toastr.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

 <!-- Pace JavaScript -->
 <script src="<?php echo BASE_URL;?>/webroot/js/pace.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

  <script type="text/javascript">

        // Delete button clicked
        $('#delete').click(function(){

      var numberOfChecked = $('.checkbox:checked').length;
          if($('.checkbox:checked').length > 0){
              var result = confirm("You have selected "+ numberOfChecked +"  Are you sure to delete selected users?");
          }
         if (result == true) {

            // Get userid from checked checkboxes
            var users_arr = [];
            $(".checkbox:checked").each(function(){
                var userid = $(this).val();
                users_arr.push(userid);
            });

            // Array length
            var length = users_arr.length;
            if(length > 0){
               // AJAX request
               $.ajax({
                  url: '<?php echo BASE_URL;?>/Attendance/deleteMultMembers',
                  type: 'post',
                  data: {checked_id: users_arr},
                  success: function(response){
                     // Remove <tr>
                     $(".checkbox:checked").each(function(){
                         var userid = $(this).val();
                         $('#tr_'+userid).remove();
                     });
                      toastr.success('Member Added successfully', 'Success Alert',{timeOut: 3000,progressBar: true});
                      window.setTimeout(function(){location.reload()},3000);
                  }
               });
            }
         }else{
          alert('Select at least 1 record to delete.');
          return false;
      } 
      });


    function delete_confirm(){
      var numberOfChecked = $('.checkbox:checked').length;
        if($('.checkbox:checked').length > 0){
            var result = confirm("You have selected "+ numberOfChecked +"  member(s)?");
            //alert('Correct! You guessed it in ' + numberOfChecked + ' clicks.');
            if(result){
                return true;
            }else{
                return false;
            }
        }else{
            alert('Select at least 1 record.');
            return false;
        }
    }

    $(document).ready(function(){
        $('#select_all').on('click',function(){
            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                 $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });
      
        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#select_all').prop('checked',true);
            }else{
                $('#select_all').prop('checked',false);
            }
        });
    });
  </script>   
</body>
</html>                      