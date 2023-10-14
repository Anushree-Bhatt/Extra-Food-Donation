<?php
echo 'hellooo';
session_start();
if($_SESSION['receiver']==true){
session_destroy();
header("Location:pfirstpage.html");
}
else{
	?>
	<script type="text/javascript">
		alert("you did not login");
		window.open('prmain_page.php');
	</script>
	<?php
}
?>