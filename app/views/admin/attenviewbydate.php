<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">View Report</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="well">
				<?php 
				if (!empty($viewresult)) {
				foreach ($viewresult as $key => $value) {
				?>
                   <h3>Prog. Name: 
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
                   </h3>
                   <h3>Date: <?php echo DateFormatDay($_GET['date']);?></h3>

                   <div class="panel panel-default" style="padding:20px">            
                   <div style="margin-bottom: 30px">
	                   <legend><h3>QA</h3></legend>
	                   <h4>Male: <?php echo $value['qamales'];?>,  Female: <?php echo $value['qafemales'];?></h4>
                   </div>

                   <div style="margin-bottom: 30px">
	                   <legend><h3>QG</h3></legend>
	                   <h4>Male: <?php echo $value['qgmales'];?>,  Female: <?php echo $value['qgfemales'];?></h4>
                   </div>

                   <div style="margin-bottom: 30px">
	                   <legend><h3>QPM</h3></legend>
	                   <h4>Male: <?php echo $value['qpmmales'];?>,   Female: <?php echo $value['qpmfemales'];?></h4>
                   </div>
                   <h3>Totall Attendance: <?php echo $value['present']?></h3>
                   </div>
				<?php }?>
				<?php }?>
                </div>
            </div>
        </div>

    </div>
</div>