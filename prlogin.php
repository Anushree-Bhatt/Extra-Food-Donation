<!doctype html>
<html>
    <head>
        
        <title>www.foodonation.com</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
     
        <style>
            *{
                box-sizing: border-box;
            }
            body{
                background:url('food.jpg');
                background-size: cover; 
            }
            .wrap{
                max-width: 400px;
                margin: auto;
                margin-top: 50px;
                
                padding: 20px;
                font-family: sans-serif;
                background:#fff;
                border-radius:10px;
                
                
            }
            .wrap h2{
                font-size: 2em;
                text-align: center;
            }
        
          
           form{
                margin-top: 30px;
               
               
            }
            input[type=text],input[type=password],input[type=submit]{
                width:100%;
               padding: 10px;
                margin-bottom:15px;
                font-size:17px;
                border-radius:5px;
                outline:none;
                border:none;
                border: 2px solid gray;
                
            }
            label{
                font-size:20px;
                font-weight: bold;
            }
            input[type=submit]{
                background: red;
                border:none;
                color:#fff;
                font-size: 20px;
                font-weight: bold;
                margin-top: 20px;
                padding: 15px;
                cursor:pointer;
            }
            input[type=submit]:hover{
                background: orange;
            }
            p{
                text-align:center;
            }
            p a{
              text-decoration:none;
                font-weight:bold;
            }
        
        </style>
    </head>
    <body style="background-color: orange;">
    <div class="wrap">
        <form action="prlogin1.php" method="post">
        <h2><b>sign in</b></h2>
        <label> username:</label><br>
            <input type="text" name="u">
            <label> password:</label><br>
            <input type="password" name="p">
             <input type="submit" value="login" name="sub">
        </form>
        <p>not a member?<a href='prcreate.php'>create an account</a></p>
        
     </div>  
 </body>
 </html>
      
