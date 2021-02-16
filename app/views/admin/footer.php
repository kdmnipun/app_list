</div><!--#wrapper-->

<!-- jQuery -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery-3.3.1.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/bootstrap.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Validation JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery.validate.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/dataTables/jquery.dataTables.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

  <!-- YearPicker -->
  <script src="<?php echo BASE_URL;?>/webroot/js/yearpicker.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

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

<!-- Custom Theme JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/startmin.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script type="text/javascript">
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
      $('#phone').keyup(function(){  
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

//Create User form validation
$("form#form6").validate({
    rules: {
        name: {
            required: true,

        },
        username: {
            required: true,
            remote: {
                url: "<?php echo BASE_URL;?>/User/userNameExsits",
                type: "post"
             }            

        },

        level: {
            required: true,

        },

        password: {
            required: true,
            minlength: 6

        },                                  
    },
    messages: {
        name: {
            required: "This field is required",

        },
        username: {
            required: "This field is required",
            remote:   "The username already exists. Please use a different username"
        },

        level: {
            required: "This field is required",
        },

        password: {
            required: "This field is required",
            minlength: "Please enter at least 6 characters"
        },                                    
    }
});


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