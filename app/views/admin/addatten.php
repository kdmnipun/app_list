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

.fom{
	border: none;
	color: green;
	font-size: 20px;
  background: none;
}
#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(http://localhost/app/webroot/img/loading-gif-png-5.gif) no-repeat center center;
  z-index: 10000;
}

#delModal.modal{
  z-index: 100000;
  background: none;
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
              ?> (Take Attendance)            
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
                <div class="result"></div>                
            </div>
        </div>        
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-lg-12">
                <form id="addAttndForm" class="attnfo keepFormData" action="" method="post" data-keep-form-data-clear-on-submit="yes"  autocomplete="off">

                <button type="button" class="btn btn-success" id="button2" style="margin: 10px 0px"><i class="fa fa-plus"></i> Add Member</button>

                <button type="reset" id="reset" class="btn btn-danger" value="Reset">Reset</button>

                <button  type="submit" onclick="return delete_confirm()" class="btn btn-warning pull-right" style="margin: 10px 0px">Take Attendance</button>

                <div class="">
                    <div class="well">
                        <div class="alert alert-info" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul>
                                <li>Be sure about the <span style="color:green;font-weight: bold;">date and programme</span></li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label>Select Date</label>
                            <input type="text" id="datepicker" name="date" class="form-control"/>
                            <input type="hidden" id="tag" name="tag" value="<?php echo $_GET['tag'];?>"  />
                        </div>
                        <div class="alert alert-danger" style="display: none;"></div>
                    </div>

                    Totall Attendance: <input type="text" id="example" class="fom" name="count" />

                    <!--table start-->

                    <div class="header_wrap">
                      <div class="num_rows">
                        <div class="form-group">  <!--    Show Numbers Of Rows    -->
                          <select class  ="form-control" name="state" id="maxRows">
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
                        foreach ($memlistbyprog as $key => $value) {
                        $i++;
                    ?>    
                
                        <tr class="odd gradeX text-center">
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
                                <select name="attend[<?php echo $value['id'];?>]" id="attendF" class="form-control">
                                  <option value="">Select</option>
                                  <option  class="attend select" value="present">Present</option>
                                  <option value="absent">Absent</option>
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

  <div class="modal fade" id="memModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sample Modal</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-info" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    <li>First fill the <span style="color: red;font-weight: bold">phone</span> field</li>
                    <li>Be sure about the phone number</li>
                    <li>Please do not add Mr, Miss, Md before the name</li>
                </ul>
            </div>
                <form class="cmxform" id="form1" action="" method="post">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="name">Name</label>
                                 <input type="text" id="name" name="name" class="form-control" />
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="phone">Phone</label>
                                 <input type="text" id="phone" name="phone" class="form-control" />
                                 <div id="result"></div>
                             </div>                             
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="gender">Gender</label>
                                 <select name="gender" id="gender"  class="form-control">
                                        <option value="">Select</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="member">Member type</label>
                                 <select name="member" id="member" class="form-control">
                                        <option value="">Select</option>
                                        <option value="qa">QA</option>
                                        <option value="qg">QG</option>
                                        <option value="qpm">QPM</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="type">Activity</label>
                                 <select name="type" id="type" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Regular</option>
                                        <option value="2">Irregular</option>
                                        <option value="3">New</option>
                                        <option value="4">Average</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="batch">Reg.</label>
                                 <input type="text" id="reg" name="reg" class="form-control"/>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="batch">Batch</label>
                                 <input type="text" id="batch" name="batch" class="form-control"/>
                             </div>
                         </div>
                         
                     </div>

                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label id="comment">Comment</label>
                                 <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                             </div>                             
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="panel panel-default">
                                <div class="panel-body">
                                   <legend class="text-left">Programme</legend>
                                   <div class="form-group">
                                   	<?php
                                       $tag=array($_GET['tag']);
                                   	?>
                                   <?php 
                                       foreach ($alltags as $key => $val) {
                                   ?>
                                        <div class="checkbox">
                                            <label class="checkbox-inline">
                                              <input name="tag[]" type="checkbox" value="<?php echo $val['id'];?>"
                                              <?php if (in_array($val['id'], $tag)) {
                                               echo "checked";
                                             }?>
                                             >
                                             <?php echo $val['tag_name'];?>
                                            </label>
                                        </div>
                                    <?php }?>                      
                                    </div>                                   
                                </div>
                             </div>                            
                         </div>
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-success">Submit</button>
                     </div>
                </form>
        </div>
      </div>
      
    </div>
  </div>
<!--Delete modal-->
 <div id="delModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-danger"><i class="fa fa-info-circle"></i> Warning</h4>
      </div>
      <div class="modal-body">
           <p class="text-danger">Attendance has been taken on this day</p>
      </div>
      <div class="modal-footer" style="border-top: none">
        <button type="button" id="del" class="btn btn-default" data-dismiss="modal">Close</button>
        <!--<button type="button" id="btDelete" class="btn btn-danger">Delete</button>-->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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


<!-- jquery keepFormData JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery.keepFormData.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

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

   $('#del').click(function(){
     var spinner = $('#loader');
     spinner.delay(100).fadeOut('slow').hide(0);
   })


    $(function(){
            $(document).on('submit', '#addAttndForm', function(e){
            e.preventDefault();
            var data = $('#addAttndForm').serialize();
            var hasError = false;
            var datepicker = $("#datepicker").val();
            var tag = $("#tag").val();
            var spinner = $('#loader');
            if (datepicker == '') {
                $('.alert-danger').html('Date is required').fadeIn().delay(1500).fadeOut('slow');
                hasError = true;
            }

            if(hasError == true) {return false;}

            if(hasError == false) {
                    spinner.show();
                    $.ajax({
                    type: "POST",
                    url: "<?php echo BASE_URL; ?>/Attendance/selectAttendance",
                    data: data,                 
                    success: function(data){
                    if (data == '1') {
                      //spinner.delay(150).fadeOut('slow').hide(0);
                      $('#delModal').modal({backdrop: 'static', keyboard: false}); 
                      $('#delModal').modal('show');
                      spinner.show();
                      //$('.alert-danger').html('Attendance has been taken on this day').fadeIn().delay(1500).fadeOut('slow');
                        }else{
                          spinner.hide();
                          toastr.options.onHidden = function() { window.location.href = "<?php echo BASE_URL;?>/Attendance/editAttend?tag="+tag; }
                          toastr.success('Attendance has taken successfully', 'Success Alert',{timeOut: 3000,progressBar: true});
                        }

                    },
                    error: function(){
                        alert('Could not add data');
                    }
                    });
            };
        });
    });


 $("select").change(function(){
var numberOfChecked = $('.select:checked').length;
 $('#example').val(numberOfChecked);
     
 });



     $(document).ready(function(){  
          $('#phone').change(function(){  
               var phone = $('#phone').val();  
               if(phone != '')  
               {  
                    $.ajax({  
                         url:"<?php echo BASE_URL;?>/Member/registerMobileExists",  
                         method:"POST",  
                         data:{phone:phone},  
                         success:function(data){  
                              $('#result').html(data);  
                         }  
                    });  
               }  
          });  
     });

    $(document).ready(function(){    
        $("#button2").click(function(){
            $("#memModal").modal("show");
            $("#memModal").find(".modal-title").text('Add member');
        });
    });


    $(function(){
            $(document).on('submit', '#form1', function(e){
            e.preventDefault();
            var data = $('#form1').serialize();
            var hasError = false;
            //var tag_name = $("#tag_name").val();

/*            if (tag_name == '') {
                $('.alert-danger').html('Programme name can not empty!').fadeIn().delay(1500).fadeOut('slow');
                hasError = true;
            }*/

            if(hasError == true) {return false;}

            if(hasError == false) {
                    $.ajax({
                    type: "POST",
                    url: "<?php echo BASE_URL; ?>/Member/insertMemberByAjax",
                    data: data,                 
                    success: function(response){
                    $("#memModal").modal("hide");
                    $('#form1')[0].reset();
                    toastr.success('Member Added successfully', 'Success Alert',{timeOut: 3000,progressBar: true});
                    window.setTimeout(function(){location.reload()},3000);
                    },
                    error: function(){
                        alert('Could not add data');
                    }
                    });
            };
        });
    });

//datepicker
var date = $('#datepicker').datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true
}).val();

var spinner = $('#loader');

// $.validator.setDefaults({
//   submitHandler: function () {
//     spinner.show();
//     $('form#addAttndForm').submit();
//   }
// });

// $("form#addAttndForm").validate({
//     ignore: [],
//     rules: {
//         date: {
//             required: true,
//             remote: {
//                 url: "<?php// echo BASE_URL;?>/Attendance/dateChecker",
//                 type: "post"
//              }            

//         },

                      
//     },
//     messages: {
//         date: {
//             required: "This field is required",
//             remote:   "Attendance already taken this day!"
//         },                                  
//     },
// });

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