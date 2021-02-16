<?php

spl_autoload_register(function($class){
  include_once"system/libs/".$class.".php";
});

include_once"app/config/config.php";
include_once"app/redirect/redirect.php";
include_once"app/helper/helper.php";

$main = new Main();

/*
$url =isset($_GET['url']) ? $_GET['url'] : NULL;

if ($url != NULL) {
  $url = rtrim($url,"/");
  $url = explode("/",filter_var($url, FILTER_SANITIZE_URL));
}else{
  unset($url);
}



if (isset($url[0])) {
include'app/controllers/'.$url[0].'.php';
$ctrl = new $url[0]();

    if (isset($url[2])) {
      $param=$url[2];
      $string = $url[1];
      $ctrl->$string($param);
    }else{
      if (isset($url[1])) {
        $string = $url[1];
        $ctrl->$string();
      }
    }
} else {
include'app/controllers/Index.php';
   $ctrl = new Index();
   $ctrl->home();

}
*/

?>