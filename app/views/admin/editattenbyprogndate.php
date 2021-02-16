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
                              ?>
                            </td>
                            <td>
                                <select name="attend[<?php echo $value['m_id'];?>]" id="attend" class="form-control">
                                <option value="">Select</option>
                                <option <?php if ($value['attend'] == 'present' ) echo 'selected' ; ?> value="present">Present
                                </option>

                                <option <?php if ($value['attend'] == 'absent' ) echo 'selected' ; ?> value="absent">Absent
                                </option>
                                </select>
                            </td>
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

/*function delete_confirm(){
  var numberOfChecked = $('.checkbox:checked').length;
    if($('.checkbox:checked').length > 0){
        var result = confirm("You have given "+ numberOfChecked +" members to present ?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
}*/

  viewData();
  //update
  $(document).on('submit', '#userForm', function(event){  
       event.preventDefault();
       var name = $('#name').val();  
       var level = $('#level').val();

       if(name != '' && level != ''){       
            $.ajax({  
                 url:"<?php echo BASE_URL; ?>/User/updateUserByAjax",  
                 method:'POST',  
                 data:new FormData(this),  
                 contentType:false,  
                 processData:false,  
                 success:function(data)  
                 {

              if (data.trim()=='succes') {
                      $('#userForm')[0].reset();  
                      $('#myModal').modal('hide');                  
                       toastr.success('User Update successfully', 'Success Alert',{timeOut: 3000,progressBar: true}); 
                   }
                      viewData();
                 }  
            });              
       }  
       else  
       {  
            $('.alert-danger').html('Name or User role can not be empty!').fadeIn().delay(5000).fadeOut('slow');  
       }  
  });

  //password change
  $(document).on('submit', '#passForm', function(event){  
       event.preventDefault();
         
        $(".error").hide();
        var hasError = false;
        var minLength = 6;
        var oldpass = $('#oldpass').val();  
        var password = $('#password').val();


        if (oldpass == '') {
            $('.alert-danger').html('New password can not empty!').fadeIn().delay(1500).fadeOut('slow');
            hasError = true;
        } else if (password == '') {
            $('.alert-danger').html('Re-enter password can not empty!').fadeIn().delay(1500).fadeOut('slow');
            hasError = true;
        } else if (oldpass != password ) {
            $('.alert-danger').html('Password does not match!').fadeIn().delay(1500).fadeOut('slow');
            hasError = true;
        }else if(oldpass != ''){
          if (oldpass.length < minLength){
            $('.alert-danger').html('Please enter at least 6 characters').fadeIn().delay(1500).fadeOut('slow');
            hasError = true;
          }
        }

        if(hasError == true) {return false;}

       if(hasError == false){       
            $.ajax({  
                 url:"<?php echo BASE_URL; ?>/User/updateUserPassAjax",  
                 method:'POST',  
                 data:new FormData(this),  
                 contentType:false,  
                 processData:false,  
                 success:function(data)  
                 {

              if (data.trim()=='succes') {
                       toastr.success('User password updated successfully', 'Success Alert',{timeOut: 3000,progressBar: true}); 
                      $('#passForm')[0].reset();  
                      $('#passModal').modal('hide');  
                   }
                      viewData();
                 }  
            });              
       }  
  
  });


 //fetch data by Id
  $('#hodm_results').on('click', '#editBtnId', function(e){
    e.preventDefault();
    $("#myModal").modal("show");
    $("#myModal").find(".modal-title").text('Edit user');
    $('#userForm').attr('action', '<?php echo BASE_URL; ?>/User/updateUserByAjax');
    var id = $(this).attr('data-editBtnId');
    $.ajax({
      type: 'ajax',
      method: 'get',
      url: '<?php echo BASE_URL; ?>/User/userEditByAjax',
      data: {id: id},
      async: false,
      dataType: 'json',
      success: function(data){
        $("#name").val(data.name);
        $("#username").val(data.username);
        $("#level").val(data.level);
        $("#updateId").val(data.id);
      },
      error: function(){
        alert('Could not Edit Data');
      }
    });        
  });


 //fetch data by Id for password
  $('#hodm_results').on('click', '#editPass', function(e){
    e.preventDefault();

    $("#passModal").modal("show");
    $("#passModal").find(".modal-title").text('Update user password');
    $('#passForm')[0].reset();
    $('#passForm').attr('action', '<?php echo BASE_URL; ?>/User/updateUserPassAjax');

    var id = $(this).attr('data-editPass');
    $.ajax({
      type: 'ajax',
      method: 'get',
      url: '<?php echo BASE_URL; ?>/User/userEditByAjax',
      data: {id: id},
      async: false,
      dataType: 'json',
      success: function(data){
        $("#passId").val(data.id);
      },
      error: function(){
        alert('Could not Edit Data');
      }
    });        
  });


  //delete- 
  $('#hodm_results').on('click', '#delteBtnId', function(){
    var id = $(this).attr('data-delteBtnId');
    $('#deleteModal').modal('show');
    //prevent previous handler - unbind()
    $('#btnDelete').unbind().click(function(){
      $.ajax({
        type: 'ajax',
        method: 'get',
        async: false,
        url: '<?php echo BASE_URL;?>/User/deleteAjaxUser',
        data:{id:id},
        dataType: 'json',
        success: function(response){
          if(response.success){
            $('#deleteModal').modal('hide');
            toastr.success('User Deleted successfully', 'Success Alert',{timeOut: 3000,progressBar: true});
            //$('.alert-success').html('User deleted successfully').fadeIn().delay(4000).fadeOut('slow');
            viewData();
          }else{
            alert('Error');
          }
        },
        error: function(){
          alert('Error deleting');
        }
      });
    });
  }); 

  // Load Data
  viewData();
   function viewData(){   
    $.ajax({
        url:"<?php echo BASE_URL;?>/User/ajaxUserLlist",
        type: 'POST',
        dataType: 'JSON',

        success:function (data) {
            $('#hodm_results').html(data);
        }
    });
  }


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