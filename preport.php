<?php
session_start();
$id=$_SESSION['oid'];
if(isset($_POST['submit'])){
	$uid=$_POST['sid'];
	$fid=$_POST['fid'];
	$prob=$_POST['problem'];

	if(empty($uid) || empty($fid) || empty($prob)){

		?>
		<script type="text/javascript">
			alert("fill in the fields completely");
			window.open('prmain_page.php','_self');
		</script>
		<?php
	}
	else{
		include_once 'connection.php';
		//query
		$sql="INSERT INTO REPORT (oid,uid,problem,fid) 
		      VALUES (?,?,?,?);";
		 //create a prepared statement
		      $stmt=mysqli_stmt_init($connection);

		  //prepare the prepared statemment
		     if(!mysqli_stmt_prepare($stmt,$sql)){
		     	echo "error";
		     }
		     else{
		     	//bind the parameters
		     	mysqli_stmt_bind_param($stmt,"iisi",$id,$uid,$prob,$fid);
		     	mysqli_stmt_execute($stmt);

		     	?>
		     	<script type="text/javascript">
		     		alert("problem report is successfully submitted to sender");
		     		window.open('prmain_page.php');
		     	</script>
		     	<?php
		     }
		}

}
else{
	header("Location:prmain_page.php?Incomplete_form");
}


?>
		