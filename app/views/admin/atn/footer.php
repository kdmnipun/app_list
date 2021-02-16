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
                                 <input type="text" id="name" name="name" class="form-control" required>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="phone">Phone</label>
                                 <input type="text" id="phone" name="phone" class="form-control" required >
                                 <div id="result"></div>
                             </div>                             
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="gender">Gender</label>
                                 <select name="gender" id="gender"  class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="member">Member type</label>
                                 <select name="member" id="member" class="form-control" required>
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
                                 <select name="type" id="type" class="form-control" required>
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
        <button type="button" id="del" class="btn delbtn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--select modal-->
 <div id="selectModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-info-circle"></i> Warning</h4>
      </div>
      <div class="modal-body">
           <p class="">Select Members.</p>
      </div>
      <div class="modal-footer" style="border-top: none">
        <button type="button" id="del" class="btn delbtn btn-default" data-dismiss="modal">Close</button>
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

<!-- Table JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/table.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/startmin.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script type="text/javascript">
//datepicker
var date = $('#datepicker').datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true
}).val();

$('.delbtn').click(function(){
var spinner = $('#loader');
spinner.delay(100).fadeOut('slow').hide(0);
})

function atn_confirm(){
  return confirm('Are you sure?');
}

// Add the following into your HEAD section
var timer = 0;
function set_interval() {
  // the interval 'timer' is set as soon as the page loads
  timer = setInterval("auto_logout()", 1800000);
  // the figure '10000' above indicates how many milliseconds the timer be set to.
  // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
  // So set it to 300000
}

function reset_interval() {
  //resets the timer. The timer is reset on each of the below events:
  // 1. mousemove   2. mouseclick   3. key press 4. scroliing
  //first step: clear the existing timer

  if (timer != 0) {
    clearInterval(timer);
    timer = 0;
    // second step: implement the timer again
    timer = setInterval("auto_logout()", 1800000);
    // completed the reset of the timer
  }
}

function auto_logout() {
  // this function will redirect the user to the logout script
  window.location = "<?php echo BASE_URL; ?>/Login/logout";
}


// $('#datatables').dataTable( {
//         "bProcessing": true,
//         "sAjaxSource": '<?php // echo BASE_URL; ?>/AttenTable/dataTalbleAtnList'
//   });


  $(document).ready(function(){
   function load_customer(searchkey)
     {
        var searchkey = $('#searchkey').val();
        $.ajax({
         url:"<?php echo BASE_URL; ?>/Attendance/searchMemberAtn",
         method:"POST",
         data:{searchkey:searchkey},
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

  $(document).on('submit', '#takeAttendanceForm', function(e){
    e.preventDefault();
    var data = $('#takeAttendanceForm').serialize();
    $.ajax({  
    type: "POST",  
    url:  "<?php echo BASE_URL; ?>/Attendance/addAtnList",  
    data: data,    
    success: function(data){

      if (data == '1') {
        $('.alert-info').html('You have already selected this <b>MEMBER</b>.').fadeIn().delay(5000).fadeOut('slow');
        $('#searchResult').css({"display": "block"});
      }else{
       $('#searchResult').css({"display": "none"});
       $('form#takeAttendanceForm')[0].reset();
       $('#searchMem')[0].reset();
       toastr.success('Member selected successfully ', 'Success',{timeOut: 3000,progressBar: true});
       loadData();
      }

       // toastr.success('Product successfully added to cart ', 'Success',{timeOut: 5000,progressBar: true});
    }  
    });  
  });

loadData();
function loadData(){   
$.ajax({
    url:"<?php echo BASE_URL; ?>/Attendance/atnList",
    type: 'POST',
    dataType: 'JSON',

    success:function (data) {
        $('#data_html').html(data);
    }
});
}

  //delete- 
  $('#data_html').on('click', '#delteId', function(){
    var id = $(this).attr('data-delteId');

    if(confirm('Delete?'))
    {
      $.ajax({
        type: 'ajax',
        method: 'get',
        async: false,
        url: '<?php echo BASE_URL;?>/Attendance/deleteAtnMember',
        data:{id:id},
        dataType: 'json',
        success: function(response){
          if(response.success){
           // $('#delModal').modal('hide');
            toastr.success('Deleted successfully', 'Success Alert',{timeOut: 3000,progressBar: true});
            loadData();
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

  $(function(){
          $(document).on('submit', '#takeAttendance', function(e){
          e.preventDefault();
          var data = $('#takeAttendance').serialize();
          var hasError = false;
          var datepicker = $("#datepicker").val();
          var tag = $("#tag").val();
          var spinner = $('#loader');
          if (datepicker == '') {
              $('.alert-danger').html('Date is required.').fadeIn().delay(1500).fadeOut('slow');
              hasError = true;
          }

          if(hasError == true) {return false;}

          if(hasError == false) {
                  spinner.show();
                  $.ajax({
                  type: "POST",
                  url: "<?php echo BASE_URL; ?>/Attendance/takeFinalAtn",
                  data: data,                 
                  success: function(data){
                  if (data == '1') {
                    $('#delModal').modal({backdrop: 'static', keyboard: false}); 
                    $('#delModal').modal('show');
                    spinner.show();
                      }else if (data == '2') {
                      $('#selectModal').modal({backdrop: 'static', keyboard: false}); 
                      $('#selectModal').modal('show');
                        }else{
                        loadData();
                        $('form#takeAttendance')[0].reset();
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

$(function(){
   var a = setInterval("countMember()",500);
});
   function countMember(){
      $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>/Attendance/countatnMem',
          dataType: 'JSON',
          success: function(data) {
              $('#countMember').html(data);
          }
      });

  } //END $(document).ready()

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
                    //window.setTimeout(function(){location.reload()},3000);
                    },
                    error: function(){
                        alert('Could not add data');
                    }
                    });
            };
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