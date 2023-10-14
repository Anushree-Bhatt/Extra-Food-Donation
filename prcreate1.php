<?php
   session_start();
   if(isset($_POST['submit'])){
   
	$user=$_POST['username'];
	$email=$_POST['email'];
	$phone=$_POST['number'];
	$pwd=$_POST['password'];
	$pin=$_POST['pincode'];

	/*if(empty($user) || empty($email) || empty($phone) || empty($pwd) || empty($pin) ){
		header("Location:pcreate.php?incomplete_form");
	}
	else{*/
		 include_once 'connection.php';
		$sql="INSERT INTO ORGANISATION (o_username,o_pincode,o_password,o_email,o_phone)
		      VALUES (?,?,?,?,?);";
		 //create a prepared statement
		      $stmt=mysqli_stmt_init($connection);

		  //prepare the prepared statemment
		     if(!mysqli_stmt_prepare($stmt,$sql)){
		     	echo "error";
		     }
		     else{
		     	//bind the parameters
		     	mysqli_stmt_bind_param($stmt,"sissi",$user,$pin,$pwd,$email,$phone);
		     	mysqli_stmt_execute($stmt);
		     	
		     	$res=mysqli_stmt_get_result($stmt);
		     	$row=mysqli_fetch_assoc($res);

		     	$user=$row['o_username'];
		     	$_SESSION['receiver']=$user;

		     	$id=$row['oid'];
		     	$_SESSION['oid']=$id;

		     	$pincode=$row['o_pincode'];
		     	$_SESSION['pin']=$pincode;

		     	?>
		     	<script type="text/javascript">
		     		alert("Succesfully done! Welcome to extra food donation!");
		     		window.open('prmain_page.php');
		     	</script>
		     	<?php
		     }
	//}

}
else{
	header("Location:prcreate.php?Incomplete_form");
}


?>