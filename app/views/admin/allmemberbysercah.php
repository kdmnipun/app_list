<!DOCTYPE html>
<html lang="en">
<head>
  <title>Members List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?php echo BASE_URL;?>/webroot/img/icon.png" type="image/png">
  <!-- Bootstrap Core CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/bootstrap.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/dataTables/jquery.dataTables.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

  <!-- DataTables Buttons CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/dataTables/buttons.dataTables.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

  <!-- Pace Theme CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/themes/blue/pace-theme-minimal.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
  
  <!-- Main CSS -->
  <link href="<?php echo BASE_URL;?>/webroot/css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css">  
 
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="back-btn">
                <a class="btn btn-success" href="<?php echo BASE_URL;?>/Phone/managePhoneList">Back</a>
                <a class="btn btn-success" href="<?php echo BASE_URL;?>">Home</a>                
            </div>
            <div class="button-add">
                 <button id="button" class="btn btn-default bttn">Delete row</button>
            </div>
            <div id="title3"  class="text-center">
               <h4 class="text-center">List:
                 <?php
                 $mem = $_GET['member'];
                 if (in_array('qa',$mem)) {
                   echo " QA";
                 }
                 if (in_array('qg',$mem)) {
                   echo " QG";
                 }
                 if (in_array('qpm',$mem)) {
                   echo " QPM";
                 }                           
                 ?>, Male 
               </h4>              
            </div>		 		
             
            <table class="table table-bordered table-striped" id="example">
              <thead>
                <tr>
                  <th style="width: 5%;">Sl</th>
                  <th style="width: 20%;">Name</th>
                  <th style="width: 10%;">Reg.</th>
                  <th style="width: 25%;">Phone</th>
                  <th style="width: 20%;">Comment</th>
                </tr>
              </thead>
              <tbody>
          <?php
             $counter =1;
             foreach ($allmemberbysercah as $value) {
          		if ($value['gender']=='male') {
                  $member = '';
                  if($value['member']=='qa'){
                     $member = 'QA';
                  }elseif($value['member']=='qg'){
                     $member = 'QG';
                  }else{
                  $member = 'QPM';
                  }                
          ?>		   		
                <tr>
                  <td><?php echo$counter++;?></td>
                  <td><?php echo$value['name'];?></td>
                  <td>
                  <?php echo $member;?><br>
                  <?php if(!empty($value['reg']) || !empty($value['batch'])){?>
                  <?php echo $value['reg'];?>/<?php echo $value['batch'];?>
                  <?php }?>
                  </td>
                  <td><?php echo$value['phone'];?></td>
                  <td></td>
                </tr>		   		
          <?php }?> 
          <?php }?>        
              </tbody>
            </table>

        <div class="button-add">
        <button id="button1" class="btn btn-default bttn">Delete row</button>
        </div>
            <div id="title1"  class="text-center">
               <h4 class="text-center">List:
                 <?php
                 $mem = $_GET['member'];
                 if (in_array('qa',$mem)) {
                   echo " QA";
                 }
                 if (in_array('qg',$mem)) {
                   echo " QG";
                 }
                 if (in_array('qpm',$mem)) {
                   echo " QPM";
                 }                           
                 ?>, Female 
               </h4>              
            </div>  
          <table class="table table-bordered table-striped" id="example1">
            <thead>
              <tr>
                <th style="width: 5%">Sl</th>
                <th>Name</th>
                <th>Reg.</th>
                <th>Phone</th>
                <th>Comment</th>
              </tr>
            </thead>
            <tbody>
          <?php
             $counter =1;
             foreach ($allmemberbysercah as $value) {
              if ($value['gender']=='female') {
                  $member = '';
                  if($value['member']=='qa'){
                     $member = 'QA';
                  }elseif($value['member']=='qg'){
                     $member = 'QG';
                  }else{
                  $member = 'QPM';
                  }                
          ?>           
              <tr>
                <td  style="width: 5%"><?php echo$counter++;?></td>
                <td><?php echo$value['name'];?></td>
                  <td>
                  <?php echo $member;?><br>
                  <?php if(!empty($value['reg']) || !empty($value['batch'])){?>
                  <?php echo $value['reg'];?>/<?php echo $value['batch'];?>
                  <?php }?>
                  </td>
                <td><?php echo$value['phone'];?></td>
                <td></td>
              </tr>         
        <?php }?> 
        <?php }?>        
            </tbody>
          </table>

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

 <!-- Pace JavaScript -->
 <script src="<?php echo BASE_URL;?>/webroot/js/pace.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

  <script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable({
       dom: 'Bfrtip',
       buttons: [
        {
            title: function() {
              return $('#title3').text()
            },
            extend: 'print',
            text: 'Print',
            autoPrint: false,
            exportOptions: {
                columns: ':visible',
                stripHtml: false
            },
            customize: function (win) {
                $(win.document.body).find('table').addClass('display').css('font-size', '10pt');
                $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                    $(this).css('background-color','#D0D0D0');
                });
                $(win.document.body).find( 'h1' )
                .addClass( 'compact' )
                .css( {"text-align": "center", "font-size": "25px"});
            }
        }
    ]     
    });
 
    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );

} );

//QA Female
$(document).ready(function() {
    var table = $('#example1').DataTable({
       dom: 'Bfrtip',
       buttons: [
        {
            title: function() {
              return $('#title1').text()
            },
            extend: 'print',
            text: 'Print',
            autoPrint: false,
            exportOptions: {
                columns: ':visible',
                stripHtml: false
            },
            customize: function (win) {
                $(win.document.body).find('table').addClass('display').css('font-size', '10pt');
                $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                    $(this).css('background-color','#D0D0D0');
                });
                $(win.document.body).find( 'h1' )
                .addClass( 'compact' )
                .css( {"text-align": "center", "font-size": "25px"});
            }
        }
    ]     
    });
 
    $('#example1 tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button1').click( function () {
        table.row('.selected').remove().draw( false );
    } );

} ); 
 
  </script>   
</body>
</html>                      