<?php
  if(!empty(@$_GET['username'])){
    require_once('calculate.php');
  }else{
    require_once('home.php');
  }
?>