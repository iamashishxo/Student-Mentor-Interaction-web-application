<?php
  include_once('mentorpage.php');
  include_once("logindb.php");
  require('authentication.php');
  include("HOD.php");
  
  
  if(isset($_COOKIE['user'])) {
    $username= $_COOKIE['user'];
}
  if($username=='' || $username==null){
    header("location:logout.php");
  }
  
  $query1="select * from mentor_login where user_id ='$username'";
  $mentor_table=mysqli_query($con,$query1);
  $mentor_info=mysqli_fetch_assoc($mentor_table);

  $query4="select * from mentor_login ";
  $allmentor=mysqli_query($con,$query4);
  $mentorlist=array();
  if ($allmentor && mysqli_num_rows($allmentor) > 0) {
    while ($mrows = mysqli_fetch_assoc($allmentor)) {
        $mentorlist[] = $mrows;
    }

  }


  $query2="select * from mentor_respond";
  $student_query=mysqli_query($con,$query2);
  $studentData1 = array();
  if ($student_query && mysqli_num_rows($student_query) > 0) {
    while ($rowss = mysqli_fetch_assoc($student_query)) {
        $studentData1[] = $rowss;
    }
}

  $query="select * from students_query where send_to = '$username'";
  $student_q=mysqli_query($con,$query);
  $studentData = array();
  if ($student_q && mysqli_num_rows($student_q) > 0) {
    while ($rows = mysqli_fetch_assoc($student_q)) {
        $studentData[] = $rows;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Page</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background: linear-gradient(75deg,#10add46c ,#35dae022);
            
        }

        header {
            background-color: #007BFF;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        h1 {
            font-size: 36px;
        }

        .container {
            max-width: 900px;
            margin: 10px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: linear-gradient(75deg,#10add46c ,#35dae022);
            animation: slide-up 0.5s ease-out forwards;
            opacity: 0%;
            z-index: 0;
        }

        .mentor-info {
            text-align: center;
            overflow: hidden;
            white-space: nowrap;
            animation: slideInLeft 1s forwards;
        }
        

        .mentor-actions {
            text-align: center;
        }
        .previlege-actions {
            text-align: center;
            display: none;
            
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            font-size: 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.5s ease, box-shadow 0.5s ease;
           
        }

        .btn:hover {
            background-color: #14b0e0fe;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); 
            background: linear-gradient(to bottom right, #33ccff 40%, #ba91e4 100%);
        }
        
       
        .img{
            top:15px;
            position: absolute;
            left:85px;  
            border-radius:10%;  
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
        }
        .rtable{
            position: absolute;
            top:auto;
            left:300px;
            font-size:23px;
            text-align: center;
            font-family: 'Roboto', sans-serif;
        }
        .responsedisplay{
            display: none;
            
        }
        
        .reply{
            
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            background: linear-gradient(to left, #33ccff 0%, #ba91e4be 100%);
            font-size: 25PX;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.105);
            margin-top: 20px;
            margin-left:100px;
            margin-right: 100px;
            max-height: 1000px;
        }  
        .reply:hover{
            background-color: #14b0e0fe;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); 
            background: linear-gradient(to bottom right, #33ccff35 40%, #ba91e435 100%);
        }
       .commenthead{
           
            font-size: 25px;
            
        }
        
        .comment{
            display: none;
            max-height: 1000px;
            overflow-y: auto;
            margin-bottom: 25px;
            animation: slideInLeft 1s forwards;
          
        }
       
        .replybtn{
            padding: 10px 20px;
            background-color: #007BFF;
            font-size: 20px;
            color: #fff;
            border-radius: 15px;
            position:relative;
            left: 1500px;
            bottom: 10px;
            cursor: pointer;
            width: 200px;
            transition: background-color 0.5s ease, box-shadow 0.5s ease;

        }
        .replybtn:hover {
            background-color: #14b0e0fe;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); 
            background: linear-gradient(to bottom right, #33ccff 40%, #ba91e47e 100%);
        }
      
        .front-div {
            position:fixed;
            top:400px;
            left:710px;
            width: 700px;
            height: 350px;
            background-image: url(pipng.png);
            background-size: cover;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            z-index: 2;
            padding: 10px;
            color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.495);
            display: none;
            animation: slide-up 0.5s ease-out forwards;
            
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
        .btn-send{
          
            background-color: #007BFF;
            width:100px;
            height: 40px;
            border-radius: 15px;
            font-size: 20px;
            margin-top: 50px;
            
        }

        .btn-send:hover{
            color: black;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); 
            background: linear-gradient(to bottom right, #33ccff 40%, #ba91e4 100%);
        }
        @keyframes slideInLeft {
             from {
                  transform: translatey(-500%);
              }
             to {
             transform: translatey(0);
              }
            }
            .confirm{
            position: fixed;
            top:300px;
            right:50px;
            width:400px;
            height: 120px;
            background: linear-gradient(to left, #33ccff 0%, #ba91e4be 100%);
            padding: 20px;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
            box-shadow: 10px 10px 15px rgba(0, 0, 255, 0.7);
            display: none;
            animation: slideInLeft 1s forwards;
            opacity: 0%;
            z-index: 1;
        }
      
        @keyframes slideInLeft {
             from {
                  transform: translatex(-10%);
                  opacity: 0%;
              }
             to {
             transform: translatex(0);
             opacity: 100%;
              }
            }
        .btn-yes{
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 15px;
            margin: 10px;
            cursor: pointer;
            font-size: 20px;
            width: max-content;
            transition: background-color 0.5s ease, box-shadow 0.5s ease;
            margin-left: 10px;
            text-align: center;
            text-decoration: none;
        }
        .btn-cancle{
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 15px;
            margin: 10px;
            cursor: pointer;
            font-size: 20px;
            width: 50px;
            transition: background-color 0.5s ease, box-shadow 0.5s ease;
            text-align: center;
        }
        
        .close-button {
         position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-weight: bold;
        font-size: 20px;
        color: red;
    }
    .close-button:hover {
     color: darkred;
     }
    .tabletr{ 
        background: linear-gradient(to left, #33ccff 0%, #ba91e4be 100%);
    }
    .tracedisplay{
        display:none;
        position: relative;
        right: 150px;
    }

    .mentordisplay{
        display:none;
        
    }
    .more{
        text-decoration: none;
        width:220px;
        height: 40px;
        border-radius: 15px;
        font-size: 20px;
        padding: 10px;
        color:black;
        display: none;
        margin-top: 5px;
        background-image: url('downloa1d.jpeg');
        background-position-y:-8px ;
        cursor: pointer;
    }
    .more:hover{
            
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.7); 
        }
    .previlegebtn {
            
            padding: 10px 20px;
            background-color: #007BFF;
            font-size: 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
            animation: slide-up 1s forwards;
            opacity: 0%;
        }
        .previlegebtn:hover{
            color: black;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); 
            background: linear-gradient(to bottom right, #33ccff 40%, #ba91e4 100%);
        }
        .position{
            position: absolute;
            top:300px;
            right:30px;
            width:430px;
            height: 180px;
            background: linear-gradient(to left, #33ccff 0%, #ba91e4be 100%);
            padding: 20px;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
            box-shadow: 10px 10px 15px rgba(0, 0, 255, 0.7);
            display: none;
            animation: slideInLeft 1s forwards;
            opacity: 0%;
        }
        #format:hover{
            color: red;
        }
        
        .format{
            position: absolute;
            top:300px;
            left:50px;
            width:400px;
            height: 180px;
            background: linear-gradient(to left, #33ccff 0%, #ba91e4be 100%);
            padding: 20px;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
            box-shadow: 10px 10px 15px rgba(0, 0, 255, 0.7);
            display: none;
            animation: slideInLeft 1s forwards;
            opacity: 0%;
        }
    </style>
</head>
<body>
    <header >
        <image src="download.png" height="150" width="153" class="img"> </image>        
        <h1>Welcome ,<span style="margin-left: 3px;"><?php echo $mentor_info['mentor_name']; ?></span></h1>
</span> </h1>
        <p style="font-size: 25px;" id="dash">Your Dashboard for Mentorship</p>
        <br>
        
    </header>




    <div class="container" id="id">
        <div class="mentor-info">
            <h2>Your Mentor Information</h2>
            <p style="font-size: 20px;">Name:<span id="mentorname"><?php echo $mentor_info['mentor_name']; ?></span></p>
            <p  style="font-size: 20px;">Email: <span><?php echo $mentor_info['mentor_email']; ?></span></p>
            <p style="font-size: 20px;">Status:Your Account is Active</p>
            
            <button class="more" id="Previlege"><B>PREVILEGE</B></button>
            
        </div>

        <div class="previlege-actions" id=previlegection>
            <h2>Previlege Actions</h2><br>
          
        <button id="format" class="previlegebtn" onclick="warning();">Format logins </button>
        <button id="changeposition" onclick="position();" class="previlegebtn">Pass position</button>
        <button id="traceall" class="previlegebtn">Trace All</button>
        
        </div>

        <div class="mentor-actions" id="mentoraction">
            <h2>Actions</h2>
            
            <button id="checkbtn" class="btn">Visit Queries</button>
            <button id="giverespond" class="btn">Give a Response</button>
            <button id class="btn"  onclick="logout();">Logout</button>
        </div>
    </div> 

    
</div>


<div class="confirm" id="log1">
          <h2>confirm you want to log out?</h2>
          <a href="login.php" class="btn-yes" > yes</a>
          <a class="btn-cancle" onclick="logout();" >cancel</a>
    </div>




    <div class="format" id="format1">
    <form method="POST">
          <h3>WARNING!!. This will format all the students login records they will no longer be able to login. Only new signup can gain access. confirm your format?</h3>
          <button type="submit" name="format"  class="btn-yes" onclick="alert('Data format Successfull!')"> yes</button>
          <a class="btn-cancle" onclick="warning();" >cancel</a>
    </form>
    </div>





    <div class="position" id="position">
        <form  method="POST">
          <h2>Select Mentor Name to whom the previlege should be passed</h2>

      <select name="HOD" style=" width:100%;font-size:25px; background:transparent">
               <?php 
                     foreach ($mentorlist as $row) {
                     ?>
                        <option value="<?php echo $row['user_id']; ?>"  style="background-color: black;color:white; font-size:20px"><?php echo $row['mentor_name']; ?></option>
                     <?php
                 }
                     ?>
        </select>
          <input type="text" style="display:none;" name="menusn" value="<?php echo $mentor_info['user_id']; ?>">
          <input  type="submit" class="btn-yes" value="pass" onclick="    alert('previlege passed !!. you no longer will be able to access previleges.');"></input>
          <a class="btn-cancle" onclick="position();" >cancel</a>
        </form>
    </div>

<div id="response" class="responsedisplay" >
    <table border="1" class="rtable" style="margin: 20px;">;
        <tr class="tabletr"> 

            <td width="500px" height="70px">Student USN </td> 
            <td width="900px">Query from Student </td> 

        </tr> 
        <?php 
            foreach ($studentData as $row) {
            ?>
                <tr> 
                    <td ><?php echo $row['student_usn']; ?></td>
                    <td ><?php echo $row['student_query']; ?></td>
                </tr>
            <?php
            }
            ?>
        <tr>
            <td >List is concluded here</td>
            <td >No Further Querires to be Displayed </td>
        </tr>
       
      
    </table>
</div>


<div id="comments" class="comment"> 
<?php
        // Loop through $studentData to generate comments section
        foreach ($studentData as $row) {
        ?>
            <div class="reply">
                <h1 class="commenthead"><?php echo $row['student_usn']; ?></h1>
                <p style="display:none">q_id:<?php echo $row['q_id']; ?></p>
                <p><?php echo $row['student_query']; ?></p>
             
                <button type="button" class="replybtn" data-studentUsn="<?php echo $row['student_usn'];  ?>" data-query="<?php echo $row['student_query']; ?>" data-q_id="<?php echo $row['q_id']; ?>" >reply</button>
            </div>
        <?php
        }
        ?>
        <div class="reply">
            <h1 style="text-align: center; font-size:20px">End of list no Querires to Display </h1>
        </div>
    </div>

    <div class="front-div" id="front">
    <div class="close-button" id="closeButton" onclick="front.style.display='none';">X</div>
          <form  method="POST">
            <table>
            
                <tr>
                    <h1>Respond Form</h1>
                    <td> <span style="margin-left: 70px;text-align: center;">Sendto:</span></td>
                    <td > <input style="width:300px;font-size: 25px;margin-left: 10px;background: transparent;color:white;" type="text" id="readonly" name="respond_to" value="null" readonly></td>
                    
                </tr>
                    <td> <span style="margin-left: 70px;text-align: left;">Name:</span></td>
                    <td > <input style="width:300px;font-size: 25px;margin-left: 10px;background: transparent;color:white;" type="text" id="readonly2" name="mentorname" value="null" required readonly="true"></td>
                    
                </tr>
                <tr>
                    
                    <td style="display:none"> <input style="width:300px;font-size: 25px;margin-left: 10px;background: transparent;" type="text" id="readonly3" name="q_id" value="null" required readonly="true"></td>
                    </td>
                    <td style="display:none"> <input style="width:300px;font-size: 25px;margin-left: 10px;background: transparent;" type="text" id="studentquery" name="query" value="null" required readonly="true"></td>
                    </td>
                </tr>
                <tr>
                <td ><span>Send Response:</span></td> 
                    <td > <textarea style="width:300px;font-size: 25px;margin-left: 10px;background: transparent;color:white;" id="mentorreply" name="mentorreply" value="null" required></textarea></td>
                </tr>
                <tr>
                <td><input type="submit" class="btn-send" name="sendtostudent" onclick="alert('Respond has been concluded . if any field was missing it will notifiy you ');" value="send"></input></td>
                </tr>
                
            </table>
          </form>
        </div>








        <div id="trace" class="tracedisplay" >
           <table border="1" class="rtable" style="margin: 20px;">
                <tr class="tabletr"> 

                    <td width="500px" height="70px">Student USN </td> 
                    <td width="900px">Query from Student </td> 
                    <td width="500px" height="70px">Asked To </td> 
                    <td width="500px" height="70px">Reply from mentor </td> 

                </tr> 
                <?php 
                    foreach ($studentData1 as $row) {
                    ?>
                        <tr> 
                            <td ><?php echo $row['sendto']; ?></td>
                            <td ><?php echo $row['questions']; ?></td>
                            <td ><?php echo $row['mentor_name']; ?></td>
                            <td ><?php echo $row['mentor_reply']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
            <?php if (empty($studentData1)) { ?>
                    <tr> 
                        <td> 
                            No usn found
                        </td> 
                        <td> 
                            No query exist database empty
                        </td>  
                        <td>
                            no mentor found
                        </td>
                        <td>
                            no reply found
                        </td>
                    </tr>
                    <?php } ?>
                    <tr class="tabletr"> 

                            <td colspan="8" height="70px">All History Traced </td> 

                    </tr> 
            </table>

        </div>

      <div id="mentor" class="mentordisplay" >
    <table border="1" class="rtable" style="margin: 20px;">
        <tr class="tabletr"> 

            <td width="500px" height="70px">mentor Number</td> 
            <td width="900px">mentor name </td> 

        </tr> 
        <?php 
            foreach ($mentorlist as $row) {
            ?>
                <tr> 
                    <td ><?php echo $row['user_id']; ?></td>
                    <td ><?php echo $row['mentor_name']; ?></td>
                </tr>
            <?php
            }
            ?>
       
      
    </table>
      </div>


</div>
</body>
<script>
 
  var HOD="<?php echo $mentor_info['HOD'];?>";
 if(HOD == 1){
    
    var btn1=document.getElementById("Previlege");
    btn1.style.display='inline-block';
    var dash=document.getElementById("dash");
    dash.textContent="HOD Dashboard With Additional Previlege";
}
 


function logout(){

       var logout=document.getElementById('log1');
       var posi=document.getElementById('position');
       posi.style.display="none";
       format1.style.display="none";
        if(logout.style.display=="block"){
           logout.style.display="none";
         }else{
             logout.style.display="block";
         }
    }


function position(){
var posi=document.getElementById('position');
var logout=document.getElementById('log1');
logout.style.display="none";
format1.style.display="none";
 if(posi.style.display=="block"){
    posi.style.display="none";
  }else{
      posi.style.display="block";
  }
}

function warning(){
var posi=document.getElementById('position');
var logout=document.getElementById('log1');
logout.style.display="none";
posi.style.display="none";
 if(format1.style.display=="block"){
    format1.style.display="none";
  }else{
      format1.style.display="block";
  }
}
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("comments").addEventListener("click", function(event) {
    if (event.target.classList.contains("replybtn")) {
        var q_id = event.target.dataset.q_id;
        var studentUsn = event.target.dataset.studentusn;
        var query= event.target.dataset.query;
       
        give_reply(studentUsn,query);
        id(q_id);
    }
})
    function give_reply(studentusn1,query) {
        //var mentorname=document.getElementById("mentorname").textContent;
        // localStorage.setItem("username",studentusn); 
        // localStorage.setItem("name",mentorname);
       //  window.location.href="response.php";
       var input=document.getElementById("readonly");
       var front=document.getElementById("front");
       var mentorname=document.getElementById("readonly2");
       var querydisplay=document.getElementById("studentquery");
   
       front.style.display="block";
       input.value = studentusn1;
       var nameofmentor='<?php echo $mentor_info['mentor_name']; ?>';
       mentorname.value=nameofmentor;
       querydisplay.value=query;
    }   

    function id(q_id){
        var sq_id=document.getElementById("readonly3");
       
       sq_id.value=q_id;
    }
    
    
    
     checkbtn.addEventListener("click", function() {
           comments.style.display="none"
           trace.style.display="none"
           mentor.style.display="none";
        if (response.style.display === "none") {
            response.style.display = "block"; 
        } 
         else 
         response.style.display="none"
    });

     giverespond.addEventListener("click", function() {
        response.style.display="none"
        trace.style.display="none"
        mentor.style.display="none";
        if (comments.style.display === "none") {
            comments.style.display = "block"; 
        
        } 
         else 
         comments.style.display="none"
    });


    traceall.addEventListener("click", function() {
        {response.style.display="none"
        comments.style.display="none"
        mentor.style.display="none";}
        if (trace.style.display === "none") {
            trace.style.display = "block"; 
        
        } 
         else 
         trace.style.display="none"
    });
    
    
    Previlege.addEventListener("click", function() {
       
        var previlegeaction=document.getElementById('previlegection');
        
        if (previlegeaction.style.display === "none") {
         previlegeaction.style.display="block";
        } 
         else{ 
            previlegeaction.style.display="none";
         }
    });

   
});
    
</script>
</html>