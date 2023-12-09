<?php
  include("logindb.php");
  $error="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name=$_POST['name'];
  $username=$_POST['user'];
  $password=$_POST['password'];
 
  $query="select * from student_login where user='$username'";
  $result = mysqli_query($con, $query);

  if($result && mysqli_num_rows($result)>0){
    $error="There is an active account already persent";
  }
  else{
    $query2="insert into student_login (user,pass,student_name) values ('$username','$password','$name')";
    mysqli_query($con, $query2);
    $error="Account has been created Successfully";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /*background:linear-gradient( 45deg,#10add490 ,#35dae03a);*/
            background-image: url('po.jpg');
            background-size: cover;
            background-position: center;
            z-index: 0;
            overflow: hidden;

        }

        .signup-container {
            position: absolute;
            width: 500px;
            left: 1350px;
            top: 350px;
            padding: 20px;
            border-radius: 5px;
            color: aliceblue;
            text-align: center;
            animation: slide-up 3s ease-out forwards;
            opacity: 0%;
        }

       

        @keyframes slide-up {
            from {
                transform: translateY(10%);
                opacity: 0%;
            }

            to {
                transform: translateY(0);
                opacity: 100%;
            }
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"]
        {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.5s ease, box-shadow 0.5s ease;

        }

        button:hover {
            background-color: #14b0e0fe;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        }

        .header {

            color: #fff;
            margin-left: 270px;
            margin-top: 290px;
            font-size: 45px;
            animation: slideInLeft 3s forwards;
            opacity: 0%;
        }

        h1 {
            font-size: 36px;
        }

        .container {
            max-width: 1100px;
            margin-left: 70px;
            padding: 5px;
            color: whitesmoke;
            border-radius: 5px;
            background-color: whitesmoke;
            box-shadow: 0 0 20px 5px rgba(52, 152, 219, 0.01);
            background: transparent;
            height: max-content;

        }

        .img {
            top: 260px;
            position: absolute;
            left: 85px;
            border-radius: 10%;
            box-shadow: 10px 10px 15px rgba(255, 255, 255, 0.3);
            animation: slideInLeft 0.1s forwards;
            opacity: 0%;

        }

        @keyframes slideInLeft {
            from {
                transform: translatey(-10%);
                opacity: 0%;
            }

            to {
                transform: translatey(0);
                opacity: 100%;
            }
        }

        h2 {
            font-size: 30px;
            color: aliceblue;
        }

        p {
            font-size: 20px;
        }
        #name{
            width: 95%;
        }
        #user {
            width: 95%;
        }

        #password {
            width: 95%;

        }

        .dep {
            color: #fff;
            margin-left: 170px;
            margin-top: 100px;
            font-size: 45px;
            opacity: 0%;
            animation: slideIn 5s forwards;
        }

        @keyframes slideIn {
            from {
                transform: translatex(-5%);
                opacity: 0%;
            }

            to {
                transform: translatex(0);
                opacity: 100%;
            }
        }
        .container {
            max-width: 1100px;
            margin-left: 70px;
            padding: 5px;
            color: whitesmoke;
            border-radius: 5px;
            background-color: whitesmoke;
            box-shadow: 0 0 20px 5px rgba(52, 152, 219, 0.01);
            background: transparent;
            height: max-content;

        }
        .btn{
            background: transparent;
            color:rgba(52, 152, 219, 0.5);
            font-size: 20px;
            text-decoration: none;
        }
        .btn:hover{
            background:none;
            box-shadow:0px 5px 2px rgba(255, 255, 255, 0.5);
        }
    </style>

</head>

<body>
<div id="id">
    <div>
        <image src="download.png" height="150" width="153" class="img"> </image>
        <h1 class="header">Shri Dharmasthala Manjunatheshwara <br> <span style="font-size: 40px;">College of Engineering and Technology Dharwad</span></h1>
        <P class="dep">Department Of Computer Science Engineering</P>
        <br>
        <div class="container">
        <h2>Insturctions </h2>
        <p>Make sure that the username you enter should be Your USN. Check your name properply before submitting</p>
        </div>
    </div>
    
    
    <div class="signup-container" >
        <h1>Signup</h1>
        <form  method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" style="background: transparent;color:#fff" required>
            <label for="User">Username:</label>
            <input type="text" id="user" name="user" style="background: transparent;color:#fff" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" style="background: transparent;color:#fff" required>

            <button type="submit" id="singupbtn" onclick="check();">submit</button>
            <span id="resu" style="margin-left: 15px;font-size: 20px; background:transparent; color:#fff"><?php echo $error; ?><script>event.preventDefault();</script></span>
        </form>
        <br>
        <a class="btn" href="login.php">Back to Login</a>
     </div>
</div>
     
</body>
<script>

function check() {
    var usnPattern = /^2SD\d{2}[a-zA-Z]{2}\d{3}$/;
    var usn = document.getElementById("user").value; 
    if (!usnPattern.test(usn)) {
        alert("Invalid username. Make sure the username should be your USN.");
        event.preventDefault();
    }
}

</script>

</html>