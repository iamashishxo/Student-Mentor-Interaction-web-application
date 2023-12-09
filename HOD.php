<?php
include_once('logindb.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST["format"])){
        $warning="truncate table student_loginnn";
        mysqli_query($con,$warning);
      }



    if(isset($_POST["HOD"])){


    $mentorusn=$_POST["HOD"];
    $username=$_POST["menusn"];
    
    $query1="update mentor_login set HOD='0' where user_id='$username'";
    mysqli_query($con,$query1);
    $query="update mentor_login set HOD='1' where user_id='$mentorusn'";
    mysqli_query($con,$query);
   }
   
}
?>
