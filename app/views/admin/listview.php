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
            <h4 class="text-center">List:QA, Male</h4>              
            <table class="table table-bordered table-striped" id="example">
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
             foreach ($membysearch as $value) {
          		if ($value['member']==1 && $value['gender']==2) {
          ?>		   		
                <tr>
                  <td><?php echo$counter++;?></td>
                  <td><?php echo$value['name'];?></td>
                  <td><?php if($value['member']==1){echo "QA";}?></td>
                  <td><?php echo$value['phone'];?></td>
                  <td></td>
                </tr>		   		
          <?php }else{ echo"";}?> 
          <?php }?>        
              </tbody>
            </table>

        <div class="button-add">
        <button id="button1" class="btn btn-default bttn">Delete row</button>
        </div>
        <h4 class="text-center">List:QA, Female</h4>
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
           $counter=1;
           foreach ($membysearch as $value) {
            if ($value['member']==1 && $value['gender']==1) {
        ?>          
              <tr>
                <td  style="width: 5%"><?php echo$counter++;?></td>
                <td><?php echo$value['name'];?></td>
                <td><?php if($value['member']==1){echo "QA";}?></td>
                <td><?php echo$value['phone'];?></td>
                <td></td>
              </tr>         
        <?php }else{ echo"";}?> 
        <?php }?>        
            </tbody>
          </table>


        <div class="button-add">
        <button id="button2" class="btn btn-default bttn">Delete row</button>
        </div>
        <h4 class="text-center">List:QG, Male</h4>

          <table class="table table-bordered table-striped" id="example2">
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
           $counter=1;
           foreach ($membysearch as $value) {
            if ($value['member']==2 && $value['gender']==2) {
                  
        ?>          
              <tr>
                <td><?php echo $counter++;?></td>
                <td><?php echo$value['name'];?></td>
                <td><?php if($value['member']==2){echo "QG";}?></td>
                <td><?php echo$value['phone'];?></td>
                <td></td>
              </tr>           
        <?php }?>
        <?php }?>        
            </tbody>
          </table>

        <div class="button-add">
        <button id="button3" class="btn btn-default bttn">Delete row</button>
        </div>
        <h4 class="text-center">List:QG, Female</h4>

          <table class="table table-bordered table-striped" id="example3">
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
           $counter=1;
           foreach ($membysearch as $value) {
            if ($value['member']==2 && $value['gender']==1) {
                  
        ?>          
              <tr>
                <td><?php echo $counter++;?></td>
                <td><?php echo$value['name'];?></td>
                <td><?php if($value['member']==2){echo "QG";}?></td>
                <td><?php echo$value['phone'];?></td>
                <td></td>
              </tr>           
        <?php }?>
        <?php }?>        
            </tbody>
          </table>

        <div class="button-add">
        <button id="button4" class="btn btn-default bttn">Delete row</button>
        </div>
        <h4 class="text-center">List:QPM, Male</h4>

          <table class="table table-bordered table-striped" id="example4">
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
           $counter=1;
           foreach ($membysearch as $value) {
            if ($value['member']==3 && $value['gender']==2) {
                  
        ?>          
              <tr>
                <td><?php echo $counter++;?></td>
                <td><?php echo$value['name'];?></td>
                <td><?php if($value['member']==3){echo "QPM";}?></td>
                <td><?php echo$value['phone'];?></td>
                <td></td>
              </tr>           
        <?php }?>
        <?php }?>        
            </tbody>
          </table>

        <div class="button-add">
        <button id="button5" class="btn btn-default bttn">Delete row</button>
        </div>
        <h4 class="text-center">List:QPM, Female</h4>

          <table class="table table-bordered table-striped" id="example5">
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
           $counter=1;
           foreach ($membysearch as $value) {
        		if ($value['member']==3 && $value['gender']==1) {
        		   		
        ?>		   		
              <tr>
                <td><?php echo $counter++;?></td>
                <td><?php echo$value['name'];?></td>
                <td><?php if($value['member']==3){echo "QPM";}?></td>
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
              title:'List:QA, Male',
              extend: 'print',
              text: 'Print',
              autoPrint: false,
              exportOptions: {
                  columns: ':visible',
              },
              customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '10pt');
                  $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                      $(this).css('background-color','#D0D0D0');
                  });
                  $(win.document.body).find('h1').css('text-align','center');
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
              title:'List:QA, Female',
              extend: 'print',
              text: 'Print',
              autoPrint: false,
              exportOptions: {
                  columns: ':visible',
              },
              customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '10pt');
                  $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                      $(this).css('background-color','#D0D0D0');
                  });
                  $(win.document.body).find('h1').css('text-align','center');
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

  //QG Male
  $(document).ready(function() {
      var table = $('#example2').DataTable({
         dom: 'Bfrtip',
         buttons: [
          {
              title:'List:QG, Male',
              extend: 'print',
              text: 'Print',
              autoPrint: false,
              exportOptions: {
                  columns: ':visible',
              },
              customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '10pt');
                  $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                      $(this).css('background-color','#D0D0D0');
                  });
                  $(win.document.body).find('h1').css('text-align','center');
              }
          }
      ]     
      });
   
      $('#example2 tbody').on( 'click', 'tr', function () {
          if ( $(this).hasClass('selected') ) {
              $(this).removeClass('selected');
          }
          else {
              table.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
          }
      } );
   
      $('#button2').click( function () {
          table.row('.selected').remove().draw( false );
      } );

  } ); 

  //QG Female
  $(document).ready(function() {
      var table = $('#example3').DataTable({
         dom: 'Bfrtip',
         buttons: [
          {
              title:'List:QG, Female',
              extend: 'print',
              text: 'Print',
              autoPrint: false,
              exportOptions: {
                  columns: ':visible',
              },
              customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '10pt');
                  $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                      $(this).css('background-color','#D0D0D0');
                  });
                  $(win.document.body).find('h1').css('text-align','center');
              }
          }
      ]    
      });
   
      $('#example3 tbody').on( 'click', 'tr', function () {
          if ( $(this).hasClass('selected') ) {
              $(this).removeClass('selected');
          }
          else {
              table.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
          }
      } );
   
      $('#button3').click( function () {
          table.row('.selected').remove().draw( false );
      } );

  } );  

  //QPM Male
  $(document).ready(function() {
      var table = $('#example4').DataTable({
         dom: 'Bfrtip',
         buttons: [
          {
              title:'List:QPM, Male',
              extend: 'print',
              text: 'Print',
              autoPrint: false,
              exportOptions: {
                  columns: ':visible',
              },
              customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '10pt');
                  $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                      $(this).css('background-color','#D0D0D0');
                  });
                  $(win.document.body).find('h1').css('text-align','center');
              }
          }
      ]     
      });
   
      $('#example4 tbody').on( 'click', 'tr', function () {
          if ( $(this).hasClass('selected') ) {
              $(this).removeClass('selected');
          }
          else {
              table.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
          }
      } );
   
      $('#button4').click( function () {
          table.row('.selected').remove().draw( false );
      } );

  } ); 

  //QPM Female
  $(document).ready(function() {
      var table = $('#example5').DataTable({
         dom: 'Bfrtip',
         buttons: [
          {
              title:'List:QPM, Female',
              extend: 'print',
              text: 'Print',
              autoPrint: false,
              exportOptions: {
                  columns: ':visible',
              },
              customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '10pt');
                  $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                      $(this).css('background-color','#D0D0D0');
                  });
                  $(win.document.body).find('h1').css('text-align','center');
              }
          }
      ]  	
      });
   
      $('#example5 tbody').on( 'click', 'tr', function () {
          if ( $(this).hasClass('selected') ) {
              $(this).removeClass('selected');
          }
          else {
              table.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
          }
      } );
   
      $('#button5').click( function () {
          table.row('.selected').remove().draw( false );
      } );

  } ); 

  </script>   
</body>
</html>                      