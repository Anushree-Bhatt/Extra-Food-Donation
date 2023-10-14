<?php
echo 'hellooo';
session_start();
if($_SESSION['sender']==true){
session_destroy();
header("Location:pfirstpage.html");
}
else{
	?>
	<script type="text/javascript">
		alert("you did not login");
		window.open('pmain_page.php');
	</script>
	<?php
}
?>