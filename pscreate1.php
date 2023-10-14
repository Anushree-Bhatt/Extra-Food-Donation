<?php
	include_once 'connection.php';
	session_start();
  if(isset($_POST['submit'])){
   
	$user=$_POST['username'];
	$email=$_POST['email'];
	$phone=$_POST['number'];
	$pwd=$_POST['password'];
	$pin=$_POST['pincode'];

	if(empty($user) || empty($email) || empty($phone) || empty($pwd) || empty($pin) ){
		header("Location:pcreate.php?incomplete_form");
	}
	else{
		
		$select="SELECT email FROM USERS WHERE email=? Limit 1 ;";
		$insert="INSERT INTO USERS (username,email,phone,password,pincode) 
		      VALUES (?,?,?,?,?);";
		 //create a prepared statement
		   $stmt=mysqli_stmt_init($connection);
		   $run=mysqli_stmt_init($connection);

		  //prepare the prepared statemment
		     if(! mysqli_stmt_prepare($stmt,$select)){
		     	echo "error";
		     }
		     else{
			     	mysqli_stmt_bind_param($stmt,"s",$email);
			     	mysqli_stmt_execute($stmt);
			     	$result=mysqli_stmt_get_result($stmt);
			     	//$count=mysqli_num_rows($result);
			     	//if($count == 0){
			     		echo "No row selected";
			     	// }
			     //	else{
			     		  if(! mysqli_stmt_prepare($run,$insert)){
			     		  	?>
			     				<script type="text/javascript">
						     		alert("statement not prepared!");
						     	</script>
						     	<?php
						     		header("Location:pscreate.php");

							}
							else{
								mysqli_stmt_bind_param($run,"ssisi",$user,$email,$phone,$pwd,$pin);
						     	mysqli_stmt_execute($run);

						     	$res=mysqli_stmt_get_result($run);
						     	$row=mysqli_fetch_assoc($res);

						     	$user=$row['username'];
						     	$_SESSION['sender']=$user;

						  		$pin=$row['pincode'];
						  		$_SESSION['pin']=$pin;

						  		$id=$row['id'];
						  		$_SESSION['uid']=$id;
						     	
						     	$phon=$row['phone'];
						     	$_SESSION['uphone']=$phon;

						     	?>
						     	<script type="text/javascript">
						     		alert("Succesfully done! Welcome to extra food donation!");
						     		window.open("pmain_page.php");
						     	</script>
						     	<?php
							}
				
					//}
			}	     		
			     	
	}

}
else{
		header("Location:pcreate.php?Incomplete_form");
}











		 /*    else{
		     	//bind the parameters
		     	mysqli_stmt_bind_param($stmt,"ssisi",$user,$email,$phone,$pwd,$pin);
		     	mysqli_stmt_execute($stmt);
		     	$res=mysqli_stmt_get_result($stmt);
		     	$row=mysqli_fetch_assoc($res);
		     	$id=$row['id'];
		     	$e=$row['email'];
		     	$phon=$row['phone'];
		     	$e_pass=$row['e_password'];
		     	$pin=$row['pincode'];
		     	$_SESSION['uid']=$id;
		     	$_SESSION['pin']=$pin;
		     	$_SESSION['sender']=$user;
		     	$_SESSION['uemail']=$e;
		     	$_SESSION['uphone']=$phon;
		     	$_SESSION['e_pass']=$e_pass;

		     	?>
		     	<script type="text/javascript">
		     		alert("Succesfully done! Welcome to extra food donation!");
		     		window.open('pmain_page.php');
		     	</script>
		     	<?php
		     }
	}

}
else{
	header("Location:pcreate.php?Incomplete_form");
}*/


?>