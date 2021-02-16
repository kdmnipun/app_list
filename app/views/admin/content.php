
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashbord</h1>            
                </div>
            </div>

            <!-- ... Your content goes here ... -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="huge">QA</div>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                                foreach ($count as  $value) {
                                                    echo $value['qa'];
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left count blue"><i class="fa fa-male" aria-hidden="true"></i></br>
                                     <p>
                                    <?php
                                         foreach ($count as  $value) {
                                            echo$value['qamales'];
                                         }
                                     ?>                                         
                                     </p>                            
                                    </span>
                                    <span class="pull-right count blue"><i class="fa fa-female" aria-hidden="true"></i></br>
                                    <p>
                                    <?php
                                         foreach ($count as  $value) {
                                            echo$value['qafemales'];
                                         }
                                     ?> 
                                    </p>
                                    </span>

                                    <div class="clearfix"></div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                       <div class="huge">QG</div>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                                foreach ($count as  $value) {
                                                    echo $value['qg'];
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                                <div class="panel-footer">
                                    <span class="pull-left count green"><i class="fa fa-male" aria-hidden="true"></i></br>
                                     <p>
                                    <?php
                                         foreach ($count as  $value) {
                                            echo$value['qgmales'];
                                         }
                                     ?>                                         
                                     </p>                            
                                    </span>
                                    <span class="pull-right count green"><i class="fa fa-female" aria-hidden="true"></i></br>
                                    <p>
                                    <?php
                                         foreach ($count as  $value) {
                                            echo$value['qgfemales'];
                                         }
                                     ?> 
                                    </p>
                                    </span>

                                    <div class="clearfix"></div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="huge">
                                             QPM
                                        </div>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                                foreach ($count as  $value) {
                                                    echo $value['qpm'];
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left count orange"><i class="fa fa-male" aria-hidden="true"></i></br>
                                     <p>
                                    <?php
                                         foreach ($count as  $value) {
                                            echo$value['qpmmales'];
                                         }
                                     ?>                                         
                                     </p>                            
                                    </span>

                                    <span class="pull-right count  orange"><i class="fa fa-female" aria-hidden="true"></i></br>
                                    <p>
                                    <?php
                                         foreach ($count as  $value) {
                                            echo$value['qpmfemales'];
                                         }
                                     ?> 
                                    </p>
                                    </span>

                                    <div class="clearfix"></div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="text">
                                        <div class="text-style">
                                            Members
                                        </div>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="count  red">
                                    <p>
                                    <?php
                                         foreach ($count as  $value) {
                                            echo$value['total'];
                                         }
                                     ?> 
                                    </p>
                                    </span>

                                    <div class="clearfix"></div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default panel-pad hd">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart" aria-hidden="true"></i> Member Bar Chart    
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="panel panel-default panel-pad hd">
                          <!-- /.panel-heading -->
                            <div class="panel-heading">
                                Attendance Average    
                            </div>
                          <div class="panel-body">
                                <div class="form-group">
                                    <select id="selectbox_id" name="selectbox_name" class="form-control">
                                         <option value="">Select Prog.</option>
                                         <?php 
                                             foreach ($progname as $key => $value) {
                                         ?>
                                         <option value="<?php echo$value['id'];?>"><?php echo $value['tag_name'];?></option>
                                         <?php }?>
                                    </select>
                                </div>
                                <div id="artist"></div>
                          </div>
                          <!-- /.panel-body -->
                      </div>
                    <!-- /.panel -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="panel panel-default panel-pad well">
                          <!-- /.panel-heading -->
                          <div class="panel-body">
                          <legend>Attendance Average By Date Range</legend>
                          <div class="alert-danger"></div>
                              <form id="avgForm" action="http://localhost/app/Welcome/AjaxAvgByLimt" method="post">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <label>Select Prog.</label>
                                        <div class="form-group">
                                            <select id="select_id" name="select_id" class="form-control">
                                                 <option value="">Select Prog.</option>
                                                 <?php 
                                                     foreach ($progname as $key => $value) {
                                                 ?>
                                                 <option value="<?php echo$value['id'];?>"><?php echo $value['tag_name'];?></option>
                                                 <?php }?>
                                            </select>
                                        </div>
                                        <div class="select-id" style="font-size: 15px;margin-top: -18px;color: red;font-style: italic;"></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label>From(Last Prog.)</label>
                                        <div class="form-group">
                                            <input type="text" name="fdate" class="form-control" id="fdate" placeholder="Date..">
                                        </div>
                                        <div class="f-date" style="font-size: 15px;margin-top: -18px;color: red;font-style: italic;"></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label>To(Recent Prog.)</label>
                                        <div class="form-group">
                                            <input type="text" name="tdate" class="form-control" id="tdate" placeholder="Date..">
                                        </div>
                                        <div class="t-date" style="font-size: 15px;margin-top: -18px;color: red;font-style: italic;"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px;margin-bottom: 18px"> 
                                    <div class="form-group">
                                        <button id="avgbutn" class="btn btn-primary  col-md-12 col-lg-12">Submit</button>
                                    </div>
                                </div>   
                                </form>
                                <div></div>
                          </div>
                          <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->
                  </div><!--col-lg-12 col-md-12-->
             </div><!--row-->
        </div>
    </div><!--#page-wrapper-->
</div><!--#wrapper-->

     <div class="modal fade" id="avgModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-body">
            <div id="avg-limit"></div>
        </div>
        <div class="modal-footer style-border">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
   </div>
 </div> 


<!-- jQuery -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery-3.3.1.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/bootstrap.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Validation JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery.validate.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/dataTables/jquery.dataTables.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- jquery-ui JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/jquery-ui.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/metisMenu.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>


<!-- Morris Charts JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/raphael.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<script src="<?php echo BASE_URL;?>/webroot/js/morris.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<!-- Pace JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/pace.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Toastr JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/toastr.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/startmin.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<script type="text/javascript">

$('#avgbutn').on('click',function(e){
  e.preventDefault();

     var select_id = $('#select_id').val();
     var fdate = $('#fdate').val();   
     var tdate = $('#tdate').val();

     var hasError = false;

    if (select_id == '') {
        $('.select-id').html('Field is required').fadeIn().delay(1500).fadeOut('slow');
        hasError = true;
    }  
    if (fdate == '') {
        $('.f-date').html('Field is required').fadeIn().delay(1500).fadeOut('slow');
        hasError = true;
    } 
     if (tdate == '') {
        $('.t-date').html('Field is required').fadeIn().delay(1500).fadeOut('slow');
        hasError = true;
    }
    if(hasError == true) {return false;}
if(hasError == false) {

  $('#avgModal').modal('show');

  $.ajax({
      type: 'ajax',
      method: 'POST',
      url: '/Welcome/AjaxAvgByLimt',
      data: {select_id:select_id,fdate:fdate,tdate:tdate},
      async: false,
      dataType: 'text',
      success: function(data){
      var data= jQuery.parseJSON(data);
       $("#avg-limit").hide().html(data).fadeIn(1000);
      },
      error: function(){
        alert('Could not Edit Data');
      }
  });
}
});
  
$('#selectbox_id').change(function(){
var selectbox_id = $(this).val();
if (selectbox_id!=0) {
  var data_String;
  data_String = 'selectbox_id='+selectbox_id;
  //alert(data_String);
  $.post('/Welcome/AjaxPorgAvg',data_String,function(data){
    var data= jQuery.parseJSON(data);
    $("#artist").hide().html(data).fadeIn(1000);
  });

}else{
  $('#artist').text("");

}
});

$(function() {
        Morris.Bar({
          element: 'morris-bar-chart',
          barSize: 35,
          barColors: ['#0B62A4','#5cb85c','#f0ad4e'],
          data: <?php echo $countchart;?>,
          xkey: 'total',
          ykeys: ['qa', 'qg', 'qpm'],
          labels: ['QA', 'QG','QPM'],
  gridTextSize: 11,
  hideHover: 'auto',
  resize: true,
  hoverCallback: function (index, options, content, row) {
    return 'Total member ' + row.total + '<br><span style="color:#0B62A4;font-weight: bold;">  QA ' + row.qa + '</span><br><span style="color:#5cb85c;font-weight: bold;"> QG ' + row.qg + '</span><br> <span style="color:#f0ad4e;font-weight: bold;">QPM ' + row.qpm + '</span>';
  }       
        });

});

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
</script>
</body>
</html>    


