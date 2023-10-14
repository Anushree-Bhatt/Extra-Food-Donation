<?php
session_start();
if(isset($_POST['sub'])) {
	$uname=$_POST['u'];
	$Password=$_POST['p'];

	if(empty($uname) || empty($Password)){

		?>
		<script type="text/javascript">
			alert("fill in the fields completely");
			window.open('prlogin.php','_self');
		</script>
		<?php
	}
	else{
		include_once 'connection.php';
		//query
		$query="SELECT * 
			    FROM ORGANISATION
			    WHERE o_username = '$uname' AND o_password = '$Password' ;";

		$run=mysqli_query($connection, $query);
		$count=mysqli_num_rows($run);
		$res=mysqli_fetch_assoc($run);

		if($count == 1){
			$_SESSION['receiver']=$uname;
			$id=$res['oid'];
			$_SESSION['oid']=$id;
		//	echo $_SESSION['uid'];

			echo "WELCOME";
			header("location:prmain_page.php");
		}
		else{
			 ?>
		<script type="text/javascript">
			alert("OOPS! Mismatch of username and password");
			//{{{{header("location:pslogin.php");}}}}}
				window.open('prlogin.php','_self');//opens same page
		
		</script>
	<?php
		}
	}

}
else{
	?>
		<script type="text/javascript">
			alert("Error has occured");
			window.open('prlogin.php','_self');
		</script>
	<?php
}

?>