<?php
session_start();
if(isset($_SESSION['time1'])){
 if(time()-$_SESSION['time1']>3600){
  session_destroy();
  header('location:logout.php');
  die();
 }

}
$_SESSION['time1']=time();


?>