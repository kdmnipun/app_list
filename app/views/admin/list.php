
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashbord</h1>
                <h2>Welcome to dashbord</h2>
            </div>
        </div>

  <h4 class="text-center">List:QA,Female</h4>


  <button id="button">Delete row</button>
    <div>
    Toggle column: <a class="toggle-vis" data-column="0">Name</a> - <a class="toggle-vis" data-column="1">Phone</a> - <a class="toggle-vis" data-column="2">Comment</a>     
    </div>              
  <table class="table table-bordered" id="example">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Comment</th>
      </tr>
    </thead>
    <tbody>
<?php
   foreach ($membysearch as $value) {
        if ($value['member']==1 AND $value['gender']==1) {
?>              
      <tr>
        <td><?php echo$value['name'];?></td>
        <td><?php echo$value['phone'];?></td>
        <td><?php echo$value['comment'];?></td>
      </tr>             
<?php }else{ echo"";}?> 
<?php }?>        
    </tbody>
  </table>

<h2 class="text-center">List:QA,Male</h2>

  <table class="table table-bordered" id="example">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
<?php
   foreach ($membysearch as $value) {
        if ($value['member']==1 AND $value['gender']==2) {
?>              
      <tr>
        <td><?php echo$value['name'];?></td>
        <td><?php echo$value['phone'];?></td>
        <td><?php echo$value['comment'];?></td>
      </tr>             
<?php }else{ echo"";}?> 
<?php }?>        
    </tbody>
  </table>






<h2 class="text-center">List:QG</h2>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
<?php
   foreach ($membysearch as $value) {
        if ($value['member']==2) {
                
?>              
      <tr>
        <td><?php echo$value['name'];?></td>
        <td><?php echo$value['phone'];?></td>
        <td><?php echo$value['comment'];?></td>
      </tr>               
<?php }?>
<?php }?>        
    </tbody>
  </table>

    </div>
</div><!--#page-wrapper-->