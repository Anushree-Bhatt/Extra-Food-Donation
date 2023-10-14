<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>welcome to gallery page</title>
    <style type="text/css" media="all">
		.*{
	padding:0px;
	margin:0px;
	box-sizing: border-box;
}

.container{
	width:100%;
	height:auto;
	margin:auto;
	position: auto;
	display: flex;
	flex-flow: row wrap;
	justify-content:space-evenly,center;
}

.container a:hover{
	background-color: rgba(0,0,0,0.5);
}
.container a{
	margin:10px;
	flex-basis: 18%;
}

.gallery-img div{
	width: 100%;
	height:235px;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}
.gallery-img h2{
	font-family: catamaran;
	font-size: 20px;
	font-weight:700px;
	color:#111;	
}

.uploading_form{
	text-align: center;
	margin: 100px 400px;
}
form{
	width: 100%;
	background-color:rgba(0,0,0,0.5);
	padding: 50px 0px;
}
input[type="text"]{
	background: white;
    border:none;
    color:#black;
    font-size: 20px;
     font-weight: bold;
     margin-top: 10px;
     padding: 5px;
     cursor:pointer;
     border-radius:50px;
 }
 button{
 	padding: 10px;

 }
 </style>
</head>

<body>
	<div class="container">
		<?php
			include_once 'connection.php';
			$sql="SELECT * FROM POSTS ORDER BY 'pid' DESC;";

			$stmt=mysqli_stmt_init($connection);
			if(!mysqli_stmt_prepare($stmt,$sql)){
						echo 'SQL statemt failed';
			}
			else{
						mysqli_stmt_execute($stmt);
						$res=mysqli_stmt_get_result($stmt);

						while($row=mysqli_fetch_assoc($res)){
							$imgg=$row['imgfullname'];
							$imggg=$row['title'];
							$imgggg=$row['des'];
							echo '<a href="" class="gallery-img">
										<div style="background-image:url( images/'.$imgg.' )"></div>
										<h2>'.$imggg.'</h2>
										<p>'.$imgggg.'</p>
								</a>';
						}
			}
		?>
	</div>

	<?php

	if($_SESSION['receiver']){
	echo '<div class="uploading_form">
			<form action="prgallery1.php" method="post" enctype="multipart/form-data">
			<input type="text" name="fname"  placeholder="File name ..."><br /><br />
			<input type="text" name="ftitle"  placeholder="image title ..."><br /><br />
			<input type="text" name="fdesc"  placeholder="Image description ..."><br /><br />
			<input type="File" name="file"> <br /><br/>
			<button type="submit" name="upload">upload</button>
			
			</form>
		</div>';
    }
    else{
    	echo 'login to upload photo';
    }
	?>
</body>
</html>