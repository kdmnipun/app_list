<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
     <?php
       if (!empty($title)){ 
              echo $title; 
          }else{ 
              echo 'Web app for phone list'; 
          }
      ?>
    </title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/bootstrap.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/metisMenu.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/dataTables/jquery.dataTables.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/dataTables/dataTables.responsive.css" rel="stylesheet">
    
    <!-- Year picker css -->
    <link href="<?php echo BASE_URL;?>/webroot/css/yearpicker.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
    <!-- jquery-ui CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/jquery-ui.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/timeline.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/startmin.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/morris.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

    <!-- Pace Theme CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/themes/blue/pace-theme-minimal.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

    <!-- toastr Theme CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/toastr.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="<?php echo BASE_URL;?>/webroot/css/font-awesome.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans|Pacifico|Poiret+One|Raleway|Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet"> 	

    <!-- Main CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="set_interval()"
onmousemove="reset_interval()"
onclick="reset_interval()"
onkeypress="reset_interval()"
onscroll="reset_interval()">
  <!--modal-->
  <!--Change password-->
  <div class="modal fade" id="upModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header style-border">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Sample Modal</h4>             
          </div>
        <div class="modal-body">
        <div class="alert alert-danger" style="display: none;"></div>
            <form id="upForm" method="post" autocomplete="off">
                 <input type="hidden" id="uid" name="useId" value="">
                 <div class="form-group">
                     <label for="pass">New Password</label>
                     <input type="password" name="pass" id="pass" class="form-control"/>
                 </div>

                 <div class="form-group">
                     <label for="newpassword">Re-Enter Password:</label>
                     <input type="password" name="newpassword" id="newpassword" class="form-control"/>
                 </div>
                 
                 <div class="form-group">
                     <button type="submit" id="passSave" class="btn btn-success">Update</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                     
                 </div>
            </form>
        </div>
      </div>
   </div>
 </div>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse header-color navbar-fixed-top" role="navigation">
        <div class="navbar-header logo-img">
            <a class="navbar-brand" href="<?php echo BASE_URL;?>"><img src="<?php echo BASE_URL;?>/webroot/img/list1.png"></a>
			<a class="navbar-brand icon-custom" href="<?php echo BASE_URL;?>">ListApp</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php echo Session::get("name");?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a id="upPass" href="#"><i class="fa fa-key"></i> Change Password</a>
                    </li>
                    <li><a href="<?php echo BASE_URL;?>/User/listUser"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo BASE_URL;?>/Login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

         