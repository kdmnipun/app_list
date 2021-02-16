<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Attendance Analysis(<?php echo $_GET['tag_name'];?>)</h1>
            </div>
        </div>
            <div class="name well">
                <h2 class="text-center">
                 <?php echo $_GET['name'];?><small style="font-size: 14px"><?php if($_GET['member']=='qa'){
                 	echo "(QA)";
                 }elseif ($_GET['member']=='qg') {
                 	echo "(QG)";
                 }elseif ($_GET['member']=='qpm'){
                 	echo "(QPM)";
                 }
                 ?></small>
                </h2>
            </div>
            <table class="table table-striped" id="analyTable">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Prog.</th>
                  <th>Date</th>
                  <th>Attendance</th>
                </tr>
              </thead>
              <tbody>
               <?php
                   $i=0;
                   if (!empty($analysis)) {
                   foreach ($analysis as $key => $value) {
                    $i++;
               ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $_GET['tag_name'];?></td>
                  <td><?php echo $value['date'];?></td>
                  <td>
                  <?php
                   if($value['attend']=="present"){
                   	  echo"<div style='color:green;font-weight: bold;'>Present</div>";
                   }else{
                   	echo"<div style='color:red;font-weight: bold;'>Absent</div>";
                   }
                  ?>
                  </td>
                </tr> 
                <?php }?>              
                <?php }?>              
              </tbody>
            </table>
    </div>
</div>
