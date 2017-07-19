<?php
  if ($_SERVER['SERVER_PORT'] == 443) {
  	header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  	exit;
  }

  if(!empty(@$_GET['username'])){
    require_once('calculate.php');
  }else{
    require_once('home.php');
  }
?>