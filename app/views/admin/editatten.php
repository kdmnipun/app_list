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
              ?>            
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
            </div>
        </div>        
        <div class="row">
            <div class="col-lg-12">
                <form id="editAttndForm" class="attnfo" action="<?php echo BASE_URL;?>/Attendance/editByAttendance" method="post" autocomplete="off">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped  table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; text-align: center;">Sl</th>
                                        <th style="width: 25%;text-align: center;">Prog.</th>
                                        <th style="width: 20%;text-align: center;">Date</th>
                                        <th style="width: 25%;text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i=0;
                                    foreach ($editAtenbyprog as $key => $value) {
                                    $i++;
                                ?>    
                            
                                    <tr class="odd gradeX text-center">
                                        <td><?php echo $i;?></td>
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
                                        <td><?php echo $value['date'];?></td>
                                        <td>
                                          <div class="dropdown">
                                              <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-default">Action <b class="caret"></b></a>
                                              <ul class="dropdown-menu">
                                                  <li>
                                                  <a href="<?php echo BASE_URL;?>/Attendance/viewByDate?date=<?php echo $value['date'];?>&tag=<?php echo$_GET['tag'];?>">View Report
                                                  </a>            
                                                  </li>
                                                  <li><a href="<?php echo BASE_URL;?>/Attendance/editByDate?date=<?php echo $value['date'];?>&tag=<?php echo$_GET['tag'];?>">Edit</a></li>
                                                  <li><a onclick="return confirm('Delete?')" href="<?php echo BASE_URL;?>/Attendance/deleteByDate?date=<?php echo $value['date'];?>&tag=<?php echo$_GET['tag'];?>">Delete</a></li>
                                              </ul>
                                          </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div><!--#page-wrapper-->
