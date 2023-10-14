<?php
if(isset($_POST['ok'])){
	include_once 'connection.php';
	require 'mailer/PHPMailerAutoload.php';
	session_start();
	$id=$_SESSION['uid'];
	$name=$_SESSION['sender'];

	$o_id=$_POST['o_pincode']; //f

	
	$num_ppl=$_POST['num_ppl'];
	$date=$_POST['date'];
	$oid=$_POST['oid'];
///////////////////////////////////////////////////////////////////////
	/*// mailing variables
	$to=$o_email;
	$from=$u_email;
	$subject="food_details";
	$message="Number of plates given:".$num_ppl."<br />Sender's id:".$id."<br />sender's: ".$name." <br />sender's phone.no: ".$u_phone."<br />";
	//echo $message;

	$body=$message."<br /><br />This is an automated message .please dont reply to this email.";

	$from_new="From:".$from;
	mail($to, $subject, $body,$from_new);*/
///////////////////////////////////////////////////////////////////////
	$query=" INSERT INTO DONATE_FOOD (uid,oid,num_plates,dop)
			 VALUES (?,?,?,?) ;";
	//initialize statement
	$stmt=mysqli_stmt_init($connection);
	//prepare it
	if(! mysqli_stmt_prepare($stmt,$query)){

	?>
			<script type="text/javascript">
			alert('statement failed to prepare');
			</script>
			<?php
	}
	else{
			//bind parameters
			mysqli_stmt_bind_param($stmt,"iiis",$id,$oid,$num_ppl,$date);
			//execute the statement;
			mysqli_stmt_execute($stmt);

			//now send the mail to organisation
			?>
			<script type="text/javascript">
			alert('Congratulations!you are ready to donate the food');
			window.open("pmain_page.php");
			</script>
			<?php

			
		}
}

?>