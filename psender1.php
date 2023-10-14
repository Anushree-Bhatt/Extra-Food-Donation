<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
    table{
        width:800px;
        margin-top:30px;
        margin-left: 100px;
        text-align:center;
        table-layout: fixed;
    }
    table tr,td{
        padding:20px;
        color:white;
        border:1px solid #080808;
        border-collapse: collapse;
        font-size:18px;
        background: linear-gradient(top, #3c3c3c 0%,#222222 100%);
        background:-webkit-linear-gradient(top, #3c3c3c 0%,#222222 100%);
    }  
    table th{
        padding:20px;
        color:yellow;
        border:1px solid #080808;
        border-collapse: collapse;
        font-size:20px;
        background: linear-gradient(top, #3c3c3c 0%,#222222 100%);
        background:-webkit-linear-gradient(top, #3c3c3c 0%,#222222 100%);
    } 
    body{
    	background:url('htmlcolor.jpg') fixed no-repeat center;
     }

</style>
</head>
<body>
<?php
if(isset($_POST['validate'])){
	include_once 'connection.php';
	session_start();
	//$id=$_SESSION('sender');
	//$user=$_SESSION('sender');

	$num_ppl=$_POST['num_ppl'];
	$current=$_POST['pre_date'];
	$pin=$_SESSION['pin'];
	$givendate=strtotime($current);
	$o=date('Y-m-d');
	$odate=strtotime($o);
	$req=$odate-$givendate;
	//echo $req;
	if($req > 86400){
		//echo not valid
		?>
		<script type="text/javascript">
			alert('Sorry your food cannot be donated!');
			window.open('psender.php');
		</script>
		<?php
	}
	else{
		$query="SELECT * FROM ORGANISATION 
				WHERE o_pincode = '$pin' ;";
			//initilaize the statement;
		$stmt=mysqli_stmt_init($connection);
		//prepare the statement;
		if(! mysqli_stmt_prepare($stmt,$query)){
			?>
			<script type="text/javascript">
			alert('statement failed to prepare');
			</script>
			<?php
		}
		else{
			//execute the statement;
			mysqli_stmt_execute($stmt);

			$res=mysqli_stmt_get_result($stmt);
			while($row=mysqli_fetch_assoc($res)){

			$a=$row['o_username'];
			$b=$row['o_pincode'];
			$c=$row['o_email'];
			$d=$row['o_phone'];
			$e=$row['oid'];

			echo '
					<form action="psender2.php" method="post">
						<div style="display:none;">"
						<input value=" '.$a.' " name="o_username">
						<input value=" '.$b.' " name="o_pincode">
						<input value=" '.$c.' " name="o_email">
						<input value=" '.$d.' " name="o_phone">
						
							<input value=" '.$num_ppl.' " name="num_ppl">
							<input value=" '.$current.' " name="date">
							<input value=" '.$e.' " name="oid">
						</div>
                <table>
                    <tr>
                        <th>organisation</th>
                        <th>pincode</th>
                        <th>email</th>
                        <th>phone.no</th>
                        <th>choose</th>
                    </tr>
                    <tr>
                        <td>'. $a.'</td>
                        <td>'. $b .'</td>
                        <td>'. $c .'</td>
                        <td>'. $d .'</td>
                        <td><input type="submit" name="ok" value="OK"></td>
                    </tr>
                </table>
                 </form>';
		
		}

		}

	}
}
else{
	?>
			<script type="text/javascript">
			alert('submit the form');
			</script>
			<?php
}

?>

</body>
</html>