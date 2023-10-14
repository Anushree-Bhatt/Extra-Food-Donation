<?php
    session_start();
    $id=$_SESSION['oid'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome To ExtraFoodDonation.com </title>
     <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
    #profileview div{
        margin-top: 30px;
        margin-left: 20px;
    }
    #profileview div label span{
        color:white;
    }
    table{
        width:800px;
        margin-top:30px;
        margin-left: 100px;
        text-align:center;
        table-layout: fixed;
    }
    table tr,td{
        padding:20px;
        color:white;
        border:1px solid #080808;
        border-collapse: collapse;
        font-size:18px;
        background: linear-gradient(top, #3c3c3c 0%,#222222 100%);
        background:-webkit-linear-gradient(top, #3c3c3c 0%,#222222 100%);
    }  
    table th{
        padding:20px;
        color:white;
        border:1px solid #080808;
        border-collapse: collapse;
        font-size:16px;
        background: linear-gradient(top, #3c3c3c 0%,#222222 100%);
        background:-webkit-linear-gradient(top, #3c3c3c 0%,#222222 100%);
    }  

    td:hover{
        background-color: purple;
    }
    #report_form{
        margin: 0px;
        width:400px;
        height:100vh;
        background-color: rgba(0,0,0,0.8);
        color:darkorange;
        font-size: 20px;
        float:right;
        display:none;
        transition: left 1s;
    }  
    #report_form form{
        margin: 20px 20px;
    } 
    #report_form form input{
        border-radius: 50px;
        
    } 
            input,textarea{
            border:none;
            outline:none;
            border:4px #fff dotted;
            background: transparent;
            border-radius:20px;
            box-sizing:border-box;
            color:#fff;
            font-size:16px;
            padding:10px;
            text-align:center;
            margin-top:30px;
        }
    ::placeholder{
        color:white;
        text-align:center;
        padding: 10px;
     }

     </style>
   
</head>

<body>
    <div id="main"> 
        <nav>
            <ul>
                <li><a href="prmain_page.php">HOME</a></li>
                <li><a href="prgallery.php">GALLERY</a></li>
                <li><a href="#" id="report">REPORT PROBLEM</a></li>
                <li><a href="#" id="sidebar">PROFILE</a></li>
                <li><a href="prlogout.php">LOGOUT</a></li>
            </ul>
        </nav>
        <header id="report_form">
            <form action="preport.php" method="post">
                <input type="number" name="sid" placeholder="Enter the sender's id"><br />
                <input type="number" name="fid" placeholder="Enter the food id"><br />
                <textarea rows="5" cols="40" name="problem" placeholder="Enter the problem"></textarea><br />
                <input type="submit" name="submit">
            </form>
        </header>

       <?php 
            include_once 'connection.php';
            $query="SELECT * FROM ORGANISATION 
                    WHERE oid=$id; ";
            $sql="SELECT * FROM DONATE_FOOD WHERE oid=$id;";
            
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
                $a=$row['o_username'];
                $b=$row['o_password'];
                $c=$row['o_email'];
                $d=$row['o_phone'];
                $e=$row['o_pincode'];
                echo'
                    <div id="profileview">
                        <div><label><span>Username</span> :'.$a.'</label><br /><br /></div>
                        <div><label><span>email </span>:'.$b.'</label><br /><br /></div>
                        <div><label><span>phone</span> :'.$c.'</label><br /><br /></div>
                        <div><label><span>pincode </span>:'.$d.'</label><br /><br /></div>
                        <div><label><span>password</span>:'.$e.'</label><br /><br /></div>
                    </div>';

            }
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
                $a1=$row1['uid'];
                $b1=$row1['fid'];
                $c1=$row1['num_plates'];
                $d1=$row1['dop'];
                $uquery="SELECT * FROM USERS WHERE uid=$a1; ";  
                            if(!mysqli_stmt_prepare($stmt,$uquery)){
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
                                $uname=$row2['username'];
                            }



                 echo   ' <table>
                    <tr>
                        <th>sender_name</th>
                        <th>sender_id</th>
                        <th>food_id</th>
                        <th>num_plates</th>
                        <th>date</th>
                    </tr>
                    <tr>
                        <td>'. $uname.'</td>
                        <td>'. $a1 .'</td>
                        <td>'. $b1 .'</td>
                        <td>'. $c1 .'</td>
                        <td>'. $d1 .'</td>
                    </tr>
                </table>';
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
                $("#report").click(function() {
                    $("#report_form").toggle();
                });
            });
       </script>
    
</body>
</html>