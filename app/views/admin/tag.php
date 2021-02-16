
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Programme</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <button class="btn s-btn col-md-12" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  Add programme
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="panel panel-default">
                      <div class="panel-body">
                          <legend>Add Programme</legend>
                          <div class="alert alert-danger" style="display: none;"></div>
                          <div id="erorr"></div>
                          <form action="<?php echo BASE_URL; ?>/Tag/addTags" method="post" id="tagForm">
                               <div class="form-group">
                                  <input type="text" name="tag_name" class="form-control" id="tag_name" placeholder="Enter programme name...." /> 
                               </div>
                               <div class="form-group">
                                   <button type="submit" class="btn btn-success">Add</button>
                               </div>
                          </form> 
                      </div>
                    </div>
                </div>                    
                </div>                
            </div>
            <div class="row mg-top">
                <div class="col-md-12">
                    <div class="panel panel-default">
                          <div class="panel-body">
                              <legend>Programme list</legend>
                              <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th style="width: 5%">Sl</th>
                                        <th style="width: 30%">Programme</th>
                                        <th style="width: 30%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody id="data_html">

                                    </tbody>
                                  </table>
                              </div>
                          </div>
                    </div>                    
                </div>                            
            </div>
        </div>
    </div><!--#page-wrapper-->
</div><!--#wrapper-->

<!--Edit modal-->
   <div class="modal fade" id="editProgModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header style-border">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title"></h4>             
          </div>
        <div class="modal-body">
        <div class="alert alert-danger" style="display: none;"></div>
            <form id="editprogForm" method="post">
                 <input type="hidden" id="progId" name="progId" value="0">
                 <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" name="tag_name" id="id_name" class="form-control"/>
                 </div>

                 <div class="form-group">
                     <button type="submit" id="progSave" class="btn btn-success">Update</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
            Can not delete this
      </div>
      <div class="modal-footer">
        <button type="button" id="btDelete" class="btn btn-danger">Delete</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!--<button type="button" id="btDelete" class="btn btn-danger">Delete</button>-->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- jQuery -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery-3.3.1.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/bootstrap.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Validation JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery.validate.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/dataTables/jquery.dataTables.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>


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
//Search modal
$('#button1').on('click', function(){
     var live = $('#search').val();
     if (live != '') {
     $('#newModal').modal('show');
     $('#newModal').find('.modal-title').text('Search result');
      }
  $.ajax({
      type: 'ajax',
      method: 'POST',
      url: '/Welcome/searchModal',
      data: {search:live},
      async: false,
      dataType: 'text',
      success: function(data){
       $(".modal-b").html(data);
      },
      error: function(){
        alert('Could not Edit Data');
      }
  });
}); 

//Search modal
$('#myForm').submit(function(e){
  e.preventDefault();
     var live = $('#search').val();
     if (live != '') {
     $('#newModal').modal('show');
     $('#newModal').find('.modal-title').text('Search result');
      }
  $.ajax({
      type: 'ajax',
      method: 'POST',
      url: '/Welcome/searchModal',
      data: {search:live},
      async: false,
      dataType: 'text',
      success: function(data){
       $(".modal-b").html(data);
      },
      error: function(){
        alert('Could not Edit Data');
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

    //add tag
    loadData();
    $(function(){
            $(document).on('submit', '#tagForm', function(e){
            e.preventDefault();
            var data = $('#tagForm').serialize();
            var hasError = false;
            var tag_name = $("#tag_name").val();

            if (tag_name == '') {
                $('.alert-danger').html('Programme name can not empty!').fadeIn().delay(1500).fadeOut('slow');
                hasError = true;
            }

            if(hasError == true) {return false;}

            if(hasError == false) {

                    $.ajax({
                    type: "POST",
                    url: "<?php echo BASE_URL; ?>/Tag/addTags",
                    data: data,                 
                    success: function(data){
                      if (data == '1') {
                        $('.alert-danger').html('This programme name already exists').fadeIn().delay(1500).fadeOut('slow');
                      }else{
                     $('#tagForm')[0].reset();
                    toastr.success('Programme added successfully', 'Success Alert',{timeOut: 3000,progressBar: true});
                    loadData();
                      }

                    },
                    error: function(){
                        alert('Could not add data');
                    }
                    });
            };
        });
    });


  //update
  $(document).on('submit', '#editprogForm', function(event){  
       event.preventDefault();
       var name = $('#id_name').val();  

       if(name != ''){       
            $.ajax({  
                 url:"<?php echo BASE_URL; ?>/Tag/updateProgByAjax",  
                 method:'POST',  
                 data:new FormData(this),  
                 contentType:false,  
                 processData:false,  
                 success:function(data){
                  if (data.trim()=='succes') {
                      $('#editprogForm')[0].reset();  
                      $('#editProgModal').modal('hide');                  
                       toastr.success('Programme Updated successfully', 'Success Alert',{timeOut: 3000,progressBar: true}); 
                       }
                 loadData();
                 }  
            });              
       }  
       else  
       {  
            $('.alert-danger').html('Programme can not be empty!').fadeIn().delay(5000).fadeOut('slow');  
       }  
  });

 //fetch data by Id
  $('#data_html').on('click', '#editId', function(e){
    e.preventDefault();
    $("#editProgModal").modal("show");
    $("#editProgModal").find(".modal-title").text('Edit programme');
    $('#editprogForm').attr('action', '<?php echo BASE_URL; ?>/Tag/updateUserByAjax');
    var id = $(this).attr('data-editId');
    $.ajax({
      type: 'ajax',
      method: 'get',
      url: '<?php echo BASE_URL; ?>/Tag/progEdit',
      data: {id: id},
      async: false,
      dataType: 'json',
      success: function(data){
        $("#id_name").val(data.tag_name);
        $("#progId").val(data.id);
      },
      error: function(){
        alert('Could not Edit Data');
      }
    });        
  });

  //delete- 
  $('#data_html').on('click', '#delteId', function(){
    var id = $(this).attr('data-delteId');
    $('#delModal').modal('show');
    //prevent previous handler - unbind()
    $('#btDelete').unbind().click(function(){
      $.ajax({
        type: 'ajax',
        method: 'get',
        async: false,
        url: '<?php echo BASE_URL;?>/Tag/deleteProg',
        data:{id:id},
        dataType: 'json',
        success: function(response){
          if(response.success){
            $('#delModal').modal('hide');
            toastr.success('Programme Deleted successfully', 'Success Alert',{timeOut: 3000,progressBar: true});
            loadData();
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
  loadData();
   function loadData(){   
    $.ajax({
        url:"<?php echo BASE_URL;?>/Tag/allTags",
        type: 'POST',
        dataType: 'JSON',

        success:function (data) {
            $('#data_html').html(data);
        }
    });
  }
</script>
</body>
</html>    