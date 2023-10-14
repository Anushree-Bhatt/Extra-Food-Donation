<!DOCTYPE html>
<html>
<head>
	<title>registration form</title>
	<style>
		body{
	background: url('food_donation.jpg') center fixed;
	background-size: cover;
	background-repeat:no-repeat;
	height: 100vh;
	width:auto;
     
}
.simple-form{
	text-align: center;
	margin: 100px 400px;

}
#registration
{
	width: 100%;
	background-color: #051019;
	opacity: 0.8;
	padding: 50px 0px;


}
#button
{   width: 250px;
	padding: 10px;
	border-radius: 5px;
outline: 0px;
}
#ph{
    width:250px;
	padding:10px;
	border-radius: 5px;
}
#rd{
	margin-left:50px;  
color: white;
font-size: 18px;
}
#but{
	width: 250px;
	padding: 10px;
	border-radius: 5px;
outline: 0px;
}
#a{
	text-align: center;
	color:white;
	padding: 30px;
	font-size: 25px;
}
#b{
	text-align: center;
	color:white;
	padding: 34px;
	font-size: 25px;
}
#c{  
	text-align: center;
	color:white;
	padding: 5px;
	font-size: 25px;
}
#d{
	text-align: center;
	color:white;
	padding: 25px;
	font-size: 25px;
}
#e{
	text-align: center;
	color:white;
	padding: 30px;
	font-size: 25px;
}
#xy{
	border:none;
	outline: none;
	padding:10px;
	color:#fff;
	font-size: 16px;
	font-family: arial;
	background: #ff2676;
	cursor:pointer;
	border-radius: 20px;  
	}
	       input[type=submit]{
            border:none;
            outline:none;
            padding:10px;
            color:white;
            font-size:16px;
            font-family: Arial;
            background:grey;
            cursor:pointer;
            border-radius:20px;
        }
        #but:hover{
        	background-color:#ff267e ;
        }
	</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>

	<div class="simple-form">
	
		<form id="registration" action="pscreate1.php" method="post">
			<label id="a"> username :  </label>
			<input type="text" name="username" id="button" placeholder="enter your user name"><br><br>
			<label id="b"> email-id :  </label>
            <input type="email" name="email" id="button" placeholder="enter your email id"><br><br>
            <label id="c"> phone number :  </label>
            <input type="number" name="number" id="button" placeholder="enter your phone number "><br><br>
            <label id="d"> password :  </label>
            <input type="password" name="password" id="ph" placeholder="enter your password"><br><br>
            <label id="e"> pincode :  </label>
            <input type="number" name="pincode" id="button" placeholder="pincode"><br><br>
          	<input type="submit" name="submit" id="but" value="register" >



		</form>





	</div>

</body>
</html>
