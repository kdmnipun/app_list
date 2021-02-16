<style type="text/css">

table th , table td{
    text-align: center;
}

table tr:nth-child(even){
    background-color: #e4e3e3
}

th {
  background: #;
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

/*#gif
{
  background: rgba( 255, 255, 255, 0.8 );
  display: none;
  height: 100%;
  position: fixed;
  width: 100%;
  z-index: 9999;
}*/

/*#gif img
{
  left: 50%;
  margin-left: -32px;
  margin-top: -32px;
  position: absolute;
  top: 50%;
}*/

#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.7) url(http://localhost/app/webroot/img/loading-gif-png-5.gif) no-repeat center center;
  z-index: 10000;
}
</style>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
            <h2 class="page-header" id="title">Programme:
               <?php
                if (isset($_GET['tag'])) {
                   $tag =$_GET['tag'];                 
                   foreach ($alltags as $val) {
                    if($tag==$val['id']){
                          echo $val['tag_name'];
                    }
                  }
                }
              ?> (Edit Attendance)            
              </h2>
                <?php
                if (!empty($_GET['msg'])) {
                      $msg = unserialize(urldecode($_GET['msg']));
                      if (isset($msg)) {
                          foreach ($msg as $key => $value) {
                                echo $value;
                             } 
                      }else{
                        header("Location:".BASE_URL."/Admin");
                      }  
                    } 
                ?>                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                          <div class="col-md-6">
                             <button type="button" class="btn btn-success" id="button2" style=""><i class="fa fa-plus"></i> Add Member</button>
                          </div>
                          <div class="col-md-6">
                              <div class="panel panel-default" style="background:#eee;">
                                  <div class="panel-body">
                                     <span class="text-center">Date: <?php echo $_GET['date'];?></span>
                                     <div class="row">
                                       <?php foreach($viewresult as $value){

                                            $QAm = $value['qamales'];
                                            $QAf = $value['qafemales'];
                                            $t_qa =  $QAm + $QAf;

                                            $QGm = $value['qgmales'];
                                            $QGf = $value['qgfemales'];
                                            $t_qg =  $QGm + $QGf;

                                            $QPMm = $value['qpmmales'];
                                            $QPMf = $value['qpmfemales'];
                                            $t_qpm =  $QPMm + $QPMf;

                                        ?>
                                         <div class="col-md-4">
                                           <div>
                                             <legend style="margin-bottom: 1px;"><h5>QA(<?php echo $t_qa;?>)</h5></legend>
                                             <h6>Male: <?php echo$value['qamales'];?>,  Female:  <?php echo$value['qafemales'];?></h6>
                                           </div>
                                           <h5>Totall: <?php echo$value['present'];?></h5>
                                         </div>

                                         <div class="col-md-4">
                                           <div>
                                             <legend style="margin-bottom: 1px;"><h5>QG(<?php echo $t_qg;?>)</h5></legend>
                                             <h6>Male: <?php echo$value['qgmales'];?>,  Female: <?php echo $value['qgfemales'];?></h6>
                                           </div>
                                         </div>
                                         <div class="col-md-4">
                                           <div>
                                             <legend style="margin-bottom: 1px;"><h5>QPM(<?php echo $t_qpm;?>)</h5></legend>
                                             <h6>Male: <?php echo$value['qpmmales'];?>,   Female: <?php echo$value['qpmfemales'];?></h6>
                                           </div>
                                         </div>
                                       <?php }?>
                                     </div> 
                                  </div>
                              </div>
                          </div>
                     </div>
                  </div>
                </div>  
                <div class="panel panel-default">
                  <div class="panel-body">
                      <form id="searchMem" autocomplete="off">
                        <label>Search Member</label>
                          <input type="text" id="searchkey" name="search" class="form-control" placeholder="Name/Mobile/Reg">
                          <input type="hidden" id="date" name="date" value="<?php echo $_GET['date'];?>">
                          <input type="hidden" id="tag" name="tag" value="<?php echo $_GET['tag'];?>">
                      </form>
                      <div id="searchResult" style="display: none;position: relative;"></div>
                  </div>
                </div>                    
            </div>                            
        </div>      
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-lg-12">
              <img src="<?php echo BASE_URL;?>/webroot/img/loader.gif" id="gif" style="display: block; margin: 0 auto; visibility: hidden;">
                <form id="editAttndForm" class="attnfo" action="<?php echo BASE_URL;?>/Attendance/EditSelectAttendance/<?php echo $_GET['date'];?>" method="post" autocomplete="off">
                <div class="">
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')" style="margin-bottom: 5px">Edit Attendance</button>

                    <div class="st" style="margin-bottom:10px;font-style: italic;padding-left:0;"><i class="fa fa-exclamation-circle"></i> It will take some time. Please be patient</div>

                    <div class="well"> 
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" id="datepicker" name="date" value="<?php echo $_GET['date'];?>" class="form-control" />
                            <input type="hidden" name="tag" value="<?php echo $_GET['tag'];?>"  />
                        </div>
                    </div>

                    <!--table start-->

                    <div class="header_wrap">
                      <div class="num_rows">
                        <div class="form-group">  <!--    Show Numbers Of Rows    -->
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
                        <th style="width: 10%">Sl</th>
                        <th style="width: 25%">Name & Reg</th>
                        <th style="width: 25%">Phone</th>
                        <th style="width: 20%">Prog.</th>
                        <th style="width: 20%">Attendance</th>
                        <th style="width: 20%">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i=0;
                        foreach ($editview as $key => $value) {
                        $i++;
                    ?>    
                       
                        <tr class="odd gradeX text-center">
                            <td><?php echo$i;?>
                                <input type="hidden" name="id" value="<?php echo $value['id'];?>" />
                                <input type="hidden" name="m_id[<?php echo$value['m_id']?>]" id="m_id" value="<?php echo$value['m_id']?>">
                            </td>
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
                               <?php
                                if (isset($_GET['tag'])) {
                                   $tag =$_GET['tag'];                 
                                   foreach ($alltags as $val) {
                                    if($tag==$val['id']){
                                          echo $val['tag_name'];
                                    }
                                  }
                                }
                              ?><br>
                              (<?php echo $value['date'];?>)
                            </td>
                            <td>
                               <p style="color:green;">Present</p>
                                <!-- <select name="attend[<?php// echo $value['m_id'];?>]" id="attend" class="form-control">
                                <option value="">Select</option>
                                <option <?php// if ($value['attend'] == 'present' ) echo 'selected' ; ?> value="present">Present
                                </option>

                                <option <?php //if ($value['attend'] == 'absent' ) echo 'selected' ; ?> value="absent">Absent
                                </option>
                                </select> -->
                            </td>
                            <td><button type="button" class="btn btn-primary" id="tag<%=count++%>" delId="<?php echo $value['id'];?>">X</button></td>
                        </tr>
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

            </div>

            </form>
        </div>
        </div>
        <!-- /.row -->
    </div>
</div><!--#page-wrapper-->
</div><!--#wrapper-->
<div id="loader"></div>
<!-- jQuery -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery-3.3.1.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/bootstrap.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery.validate.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- jquery-ui JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/dataTables/jquery.dataTables.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- jquery-ui JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery-ui.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>


<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/metisMenu.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>


<!-- Morris Charts JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/raphael.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<script src="<?php echo BASE_URL;?>/webroot/js/morris.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
      
<!-- Pace JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/pace.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Toastr JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/toastr.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Toastr JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/table.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/startmin.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script type="text/javascript">

  //delete- 
  $('button[id^="tag"]').on('click', function(){
   var id = $(this).attr('delId');
    if(confirm('Delete?'))
    {
      $.ajax({
        type: 'ajax',
        method: 'get',
        async: false,
        url: '<?php echo BASE_URL;?>/Attendance/deleteEditAtnMember',
        data:{id:id},
        dataType: 'json',
        success: function(response){
          if(response.success){
           // $('#delModal').modal('hide');
            toastr.success('Deleted successfully', 'Success Alert',{timeOut: 2000,progressBar: true});
            window.setTimeout(function(){location.reload()},2000);

          }else{
            alert('Error');
          }
        },
        error: function(){
          alert('Error deleting');
        }
      });
    }
  });


$(document).ready(function(){
  var spinner = $('#loader');
  $("#editAttndForm").on("submit", function(){
      spinner.show();
  });//submit
});//document ready
//datepicker
var date = $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();

//Create User form validation
$("form#editAttndForm").validate({
    ignore: [],
    rules: {
        date: {
            required: true,
        },

                      
    },
    messages: {
        date: {
            required: "This field is required",
        },                                  
    }
});



  $(document).ready(function(){
   function load_customer(searchkey)
     {
        var searchkey = $('#searchkey').val();
        var date = $('#date').val();
        var tag = $('#tag').val();
        $.ajax({
         url:"<?php echo BASE_URL; ?>/Attendance/searchMemberEditAtn",
         method:"POST",
         data:{searchkey:searchkey,date:date,tag:tag},
         success:function(data){
            if(data)
            {
           $('#searchResult').html(data);
            }
         }
        })
     }

     $('#searchkey').keyup(function(){
      var search= $(this).val();
      if(search != '')
      {
      $('#searchResult').css({"display": "block"});
       load_customer(search);
      }
      else{
        $('#searchResult').css({"display": "none"});
      }

     });

  });

  $(document).on('submit', '#editAttendanceForm', function(e){
    e.preventDefault();
    var data = $('#editAttendanceForm').serialize();

    var id = $('#memberid').val();
    var date = $('#date').val();
    var tag = $('#tag').val();

    var spinner = $('#loader');
    $.ajax({  
    type: "POST",  
    url:  "<?php echo BASE_URL; ?>/Attendance/editAtnList",  
    data: {id:id,date:date,tag:tag},    
    success: function(data){

      if (data == '1') {
        $('.alert-info').html('This <b>member</b> already exists.').fadeIn().delay(5000).fadeOut('slow');
        $('#searchResult').css({"display": "block"});
      }else{
       spinner.show();
       $('#searchResult').css({"display": "none"});
       $('form#editAttendanceForm')[0].reset();
       $('#searchMem')[0].reset();
       toastr.success('Member Added successfully', 'Success Alert',{timeOut: 3000,progressBar: true});
       window.setTimeout(function(){location.reload()},1000);
       // $("span").addClass("overlay");
       // toastr.success('Product successfully added to cart ', 'Success',{timeOut: 5000,progressBar: true});
     }
    }  
    });  
  });



//change by user
$(function(){
        $("#upPass").click(function(){
           $("#upModal").modal("show");
           $("#upModal").find(".modal-title").text('Update password');
           $('#upForm').attr('action', '<?php echo BASE_URL; ?>/User/updatePassAjax');           
        }); 

        $(document).on('submit', '#upForm', function(e){
        e.preventDefault();

        var hasError = false;
        var mnLength = 6;
        var pass = $("#pass").val();
        var newpassword = $("#newpassword").val();
        var id = $("#uid").val();

        if (pass == '') {
            $('.alert-danger').html('New password can not empty!').fadeIn().delay(1500).fadeOut('slow');
            hasError = true;
        } else if (newpassword == '') {
            $('.alert-danger').html('Re-password can not empty!').fadeIn().delay(1500).fadeOut('slow');
            hasError = true;
        } else if (pass != newpassword ) {
            $('.alert-danger').html('Password does not match!').fadeIn().delay(1500).fadeOut('slow');
            hasError = true;
        }else if(pass != ''){
          if (pass.length < mnLength){
            $('.alert-danger').html('Please enter at least 6 characters').fadeIn().delay(1500).fadeOut('slow');
            hasError = true;
          }
        }

        if(hasError == true) {return false;}

        if(hasError == false) {
                $.ajax({
                type: "POST",
                url: "<?php echo BASE_URL; ?>/User/updatePassAjax",
                data: {newpassword:newpassword},                 
                success: function(data){

                  $('#upModal').modal('hide');
                  $('#upForm')[0].reset();                  
                   toastr.success('Password updated successfully', 'Success Alert',{timeOut: 3000,progressBar: true});                    
                  }
                });
        };
    });
});


</script>
</body>
</html>