<?php
session_start();

if(isset($_SESSION['time'])){
 if(time()-$_SESSION['time']>3600){
  session_destroy();
  header("location:logout.php");
  die();
 }

}
$_SESSION['time']=time();




/*include("logindb.php");
 if($_SERVER['REQUEST_METHOD']=='POST'){
   $usn=$_POST['user-pass-usn'];
   $newpassword=$_POST['password'];
    
       if(!empty($newpassword) ||!empty($usn)){
      
         $query="update student_login set pass ='$newpassword' where user='$usn'";
         mysqli_query($con,$query);
         

        }else{

            echo"<script>alert(\"Please try later there a some Problem in the database\")</script>";
        }
}*/

?>