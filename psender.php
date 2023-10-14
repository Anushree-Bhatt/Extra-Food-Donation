
<html>
    <head>
        <title>sender</title>
    <style>
        body{
            background: url(food_donation.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            margin:0;
            padding:0;
            font-family:sans-serif;
        }    
        .login{
            margin:auto;
            width:250px;
            box-shadow: 0px; 8px 16px 0px rgba(0,0,0,0.9);
            padding: 80px 40px;
            margin-top:50px;
            background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
             background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
        }
        h2{
            margin:0 0 30px 0;
            padding: 10px;
            color:#efed40;
            text-align: center;
        }
        input{
            width:100%;
            margin-bottom:30px;
        }
        input[type=text]{
            border:none;
            outline:none;
            border:2px #fff dotted;
            background: transparent;
            border-radius:20px;
            box-sizing:border-box;
            color:#fff;
            font-size:16px;
            padding:10px;
            text-align:center;
        }
       
        input[type=submit]{
            border:none;
            outline:none;
            padding:10px;
            color:#fff;
            font-size:16px;
            font-family: Arial;
            background:#ff267e;
            cursor:pointer;
            border-radius:20px;
        }
        input[type=submit]:hover{
            background: #efed40;
            color:#262626;
        }
        .question{
             color:rgba(255,255,255,0.8);
            font-family: Arial;
            font-size:16px;
            margin-bottom: 10px;
        }
        ::placeholder{
            color:rgba(255,255,255,0.5);
            text-align:center;
        }
        
    </style>
    </head>
    
    <body>
        <div class="login">
            <h2> DONATE FOOD</h2>
            <form action="psender1.php" method="post">
                <div class="question">For How Many people can you surve?:</div>
                <input type="text" name="num_ppl" placeholder="Approximately">
                <div class="question">When was it prepared?</div>
                <input type="text" name="pre_date" placeholder="yy-mm-dd">
                <input type="submit" name="validate" value="validation">
                
            </form>
        </div>
    
    
    </body>
</html>