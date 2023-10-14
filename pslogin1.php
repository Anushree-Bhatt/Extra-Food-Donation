<?php
session_start();
if(isset($_POST['login'])) {
	$uname=$_POST['uname'];
	$Password=$_POST['pd'];

	if(empty($uname) || empty($Password)){

		?>
		<script type="text/javascript">
			alert("fill in the fields completely");
			window.open('pslogin.php','_self');
		</script>
		<?php
	}
	else{
		include_once 'connection.php';
		//query
		$query="SELECT * 
			    FROM USERS
			    WHERE username = '$uname' AND password = '$Password' ;";

		$run=mysqli_query($connection, $query);
		$count=mysqli_num_rows($run);
		$res=mysqli_fetch_assoc($run);

		if($count == 1){
			$_SESSION['sender']=$uname;
			$id=$res['uid'];
			$e=$res['email'];
			$e_pass=$res['e_password'];
			$phon=$res['phone'];
			$pin=$res['pincode'];
			$_SESSION['pin']=$pin;
			$_SESSION['uid']=$id;
			$_SESSION['uemail']=$e;
			$_SESSION['uphone']=$phon;
			$_SESSION['e_pass']=$e_pass;
			//echo $_SESSION['pin'];
			echo "WELCOME";
			header("location:pmain_page.php");
		}
		else{
			 ?>
		<script type="text/javascript">
			alert("OOPS! Mismatch of username and password");
			//{{{{header("location:pslogin.php");}}}}}
				window.open('pslogin.php','_self');//opens same page
		
		</script>
	<?php
		}
	}

}
else{
	?>
		<script type="text/javascript">
			alert("Error has occured");
			window.open('plogin.php','_self');
		</script>
	<?php
}

?>