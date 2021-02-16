        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <form id="myForm" action="" method="post" autocomplete="off"> 
                        <div class="input-group custom-search-form">
                            <input type="text" id="search" class="form-control" name="search" placeholder="Name/Phone">
                                <span class="input-group-btn">
                                    <button id="button1" class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        </form>                        
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL;?>/Welcome" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users"></i> Members<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo BASE_URL;?>/Member/createMember">Add</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL;?>/Member/memberList">All members</a>
                            </li>
                        </ul>
                    </li>
                    <?php  if(Session::get("userLevel") == 2){?>
                    <li>
                        <a href="#"><i class="fa fa-paper-plane"></i> Programmes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">          
                            <li>
                                <a href="<?php echo BASE_URL;?>/Tag/insertTag">Add</a>
                            </li>                               
                        </ul>
                    </li>
                    <?php }?>
                    <?php  if(Session::get("userLevel") == 1){?>
                    <li>
                        <a href="#"><i class="fa fa-paper-plane"></i> Programmes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">          
                            <li>
                                <a href="<?php echo BASE_URL;?>/Tag/insertTag">Add</a>
                            </li>                               
                        </ul>
                    </li>
                    <?php }?>
                    <li>
                        <a href="#"><i class="fa fa-phone"></i> Manage phone list<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo BASE_URL;?>/Phone/createListByProgramme">Select phone list by prog.</a>
                            </li>                        
                            <li>
                                <a href="<?php echo BASE_URL;?>/Phone/managePhoneList">Select phone list</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-clock-o"></i> Attendance<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo BASE_URL;?>/Attendance/addAttendance">Attendance By Prog.</a>
                            </li>  
                            <li>
                                <a href="<?php echo BASE_URL;?>/Attendance/infoAttendance">Attendance Info.</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL;?>/Attendance/takeAttendanceNewForm">Attendance new form</a>
                            </li>                         
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cog" aria-hidden="true"></i>
                         User setting<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <?php  if(Session::get("userLevel") == 2){?>
                            <li>
                                <a href="<?php echo BASE_URL;?>/User/addUser">Add</a>
                            </li>
                            <?php }?>
                            <?php  if(Session::get("userLevel") == 1){?>
                            <li>
                                <a href="<?php echo BASE_URL;?>/User/addUser">Add</a>
                            </li>
                            <?php }?>                            
                            <li>
                                <a href="<?php echo BASE_URL;?>/User/listUser">All users</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

     <div class="modal fade" id="newModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header style-border">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Sample Modal</h4>

          </div>
        <div class="modal-body">
            <div class="modal-b"></div>
        </div>
        <div class="modal-footer style-border">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
   </div>
 </div>    