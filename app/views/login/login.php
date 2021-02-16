<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Listapp | Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/bootstrap.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/metisMenu.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/timeline.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/startmin.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?php echo BASE_URL;?>/webroot/css/font-awesome.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css">
  

    <!-- Main CSS -->
    <link href="<?php echo BASE_URL;?>/webroot/css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css">
    <style>
    form.cmxform label.error { color: red; font-size: 15px; font-weight: normal; font-style: italic;}
    form.cmxform label {
      width: auto;
      display: block;
      float: none;
    }
    /* Popup container - can be anything you want */
    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
        margin-bottom: 15px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* The actual popup */
    .popup .popuptext {
        visibility: hidden;
        width: 160px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -80px;
    }

    /* Popup arrow */
    .popup .popuptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
        from {opacity: 0;} 
        to {opacity: 1;}
    }

    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity:1 ;}
    }    
    </style>    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                <?php
                    if (isset($loginerr)) {
                        echo"<div id='error' style='border:1px solid red;padding:5px 10px; margin: 5px;color:red'>";
                      foreach ($loginerr as $key => $value) {
                        switch ($key) {
                          case 'username':
                            foreach ($value as $val) {
                              echo"Username: ".$val."</br>";
                            }
                            break;

                          case 'password':
                            foreach ($value as $val) {
                              echo"Password: ".$val."</br>";
                            }
                            break;
                          
                          default:

                            break;
                        }
                      }
                        echo"</div>";
                    }
                ?>                    
                      <?php
                      if (!empty($_GET['msg'])) {
                            $msg = unserialize(urldecode($_GET['msg']));
                            if (isset($msg)) {
                              foreach ($msg as $key => $value) {
                                  echo"<span style='color:green;font-weight:bold;'>".$value."</span>";
                                 } 
                            }else{
                              header("Location:".BASE_URL."/Admin");
                            }  
                          } 
                      ?>                      
                        <form id="form7" class="cmxform"  action="<?php echo BASE_URL;?>/Login/loginAuth" method="post" role="form" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" class="form-control" placeholder="Username..." name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" class="form-control" placeholder="Password..." name="password" type="password" value="">
                                </div>

                                <div class="popup" onclick="myFunction()">forgot password?
                                  <span class="popuptext" id="myPopup">Please contact with admin!</span>
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
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

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/metisMenu.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>       

<!-- Custom Theme JavaScript -->
<script src="<?php echo BASE_URL;?>/webroot/js/startmin.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

<script>
//Select Member form validation
$("form#form7").validate({
    rules: {
        'username': {
            required: true
        },        
        'password': {
            required: true
        }
    },
    messages: {
        'username': {
            required: "This field is required",

        },        
        'username': {
            required: "This field is required",

        },                                   
    }    

});

// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>

</body>
</html>