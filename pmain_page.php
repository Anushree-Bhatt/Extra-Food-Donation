<?php
    include_once 'connection.php';
    session_start();
    $id=$_SESSION['uid'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome To ExtraFoodDonation.com </title>
     <style type="text/css" media="all">
    *{
        padding:0;
        margin:0;
        font-family: verdana;
        box-sizing: border-box;
    }
    #main{
        width: 100%;
        height: 100vh;
        background:url('food_donation.jpg') center no-repeat;
        background-size: cover;
    }
    nav{
        width:100%;
        height:80px;
        background-color: rgba(0,0,0,0.5);
        line-height:80px;
        font-size: 20px;
    }
    nav ul{
        float:right;
        margin-right: 20px;
    }
    nav ul li{
        list-style-type: none;
        display:inline-block;
        transition: 0.6s all;
    }
    nav ul li:hover{
        background-color: darkorange;
    }
    nav ul li a{
        text-decoration: none;
        color: white;
        padding:30px;
    }
    .sendfood{
        box-sizing: border-box;
        border: 1px solid white;
        position: absolute;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        padding:20px;
        border-radius: 50px;
        transition: 0.5s all;
        color: white;
         background-color:rgba(128,0,0,0.9);

    }
    #send div:hover{
        background-color:darkorange;
    }

    #profileview{
        width:400px;
        height:100vh;
        background-color: rgba(0,0,0,0.8);
        color:darkorange;
        font-size: 20px;
        float:right;
        display:none;
        transition: left 1s;
    }
    #reportview{
        width:400px;
        height:100vh;
        background-color: rgba(0,0,0,0.8);
        color:darkorange;
        font-size: 20px;
        float:right;
        display:none;
        transition: left 1s;
    }
    #profileview div{
        margin-top: 30px;
        margin-left: 20px;
    }
    #reportview{
        margin-top: 0px;
        margin-left: 20px;

    }
    #profileview div label span{
        color:white;
    }
    #reportview div label span{
        color:white;
    }    
        
    
     </style>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   
</head>

<body>
    <div id="main"> 
        <nav>
            <ul>
                <li><a href="pmain_page.php">HOME</a></li>
                 <li><a href="#" id="reportbar">REPORTED_PROBLEMS</a></li>
                <li><a href="psgallery.php">GALLERY</a></li>
                <li><a href="#" id="sidebar">PROFILE</a></li>
                <li><a href="plogout.php">LOGOUT</a></li>
            </ul>
        </nav>
        <a href="psender.php" id="send">
            <div class="sendfood">
               <h1>SEND FOOD</h1>
            </div>
        </a>

     <?php

            $query="SELECT * FROM USERS 
                    WHERE uid = $id ; ";
            $sql="SELECT * FROM REPORT 
                    WHERE uid = $id; ";

            $stmt=mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmt,$query)){
                ?>
                <script type="text/javascript">
                    alert("statement not prepared");
                    window.open('pmain_page.php');
                </script>
                <?php
            }
            else{
                mysqli_stmt_execute($stmt);
                $res=mysqli_stmt_get_result($stmt);
                $row=mysqli_fetch_assoc($res);
                $a=$row['username'];
                $b=$row['password'];
                $c=$row['email'];
                $d=$row['phone'];
                $e=$row['pincode'];
                echo'
                    <div id="profileview">
                        <div><label><span>Username</span> :'.$a.'</label><br /><br /></div>
                        <div><label><span>email </span>:'.$b.'</label><br /><br /></div>
                        <div><label><span>phone</span> :'.$c.'</label><br /><br /></div>
                        <div><label><span>pincode </span>:'.$d.'</label><br /><br /></div>
                        <div><label><span>password</span>:'.$e.'</label><br /><br /></div>
                    </div>';

            }
            //////////////////////////////////////////////////////////////////////
            if(!mysqli_stmt_prepare($stmt,$sql)){
                      ?>
                <script type="text/javascript">
                    alert("statement not prepared");
                    window.open('pmain_page.php');
                </script>
                <?php
            }
            else{
                      mysqli_stmt_execute($stmt);
                      $result=mysqli_stmt_get_result($stmt);
                      while($row1=mysqli_fetch_assoc($result)){
                            $a=$row1['oid'];
                            $b=$row1['problem'];
                            $sql1="SELECT * FROM ORGANISATION WHERE oid=$a;";

                            if(!mysqli_stmt_prepare($stmt,$sql1)){
                                 ?>
                                 <script type="text/javascript">
                                 alert("statement not prepared");
                                 window.open('pmain_page.php');
                                 </script>
                                 <?php
                            }
                           else{
                                 mysqli_stmt_execute($stmt);
                                 $result1=mysqli_stmt_get_result($stmt);
                                  $row2=mysqli_fetch_assoc($result1);
                                  $name=$row2['o_username'];
                             }


                            echo'
                                <div id="reportview">
                                    <div><label><span>Username</span> :'.$name.'</label><br /><br /></div>
                                    <div><label><span>problem </span>:'.$b.'</label><br /><br /><hr /></div> 
                                </div>';
                       }
            }


        ?>
    </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#sidebar").click(function() {
                    $("#profileview").toggle();
                });
            });
         </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#reportbar").click(function() {
                    $("#reportview").toggle();
                });
            });
         </script>
   
</body>
</html>