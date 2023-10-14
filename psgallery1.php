<?php
include_once 'connection.php';

if(isset($_POST['upload'])){
	session_start();
	$user=$_SESSION['sender'];
	$id=$_SESSION['uid'];
	
	$given_fname=$_POST['fname'];
	$title=$_POST['ftitle'];
	$des=$_POST['fdesc'];
	$file=$_FILES['file']['name'];
	$path="images/".$file;// bcz you have to save ur img in images folder with red.jpg name right? like images/red.jpg!
	$tmp_name=$_FILES['file']['tmp_name'];

	$filesize=$_FILES['file']['size'];
	$fileerror=$_FILES['file']['error'];

	//actually tmp_name is the original location of your file in computer;
	$fileext=explode(".",$file);//you will have whatever is there in filename after dot. like jpg,png etc as second data
	$fileactualext=strtolower(end($fileext));
	//do array to check extensions 
	$allowed_extensions=array("jpg","png","gif");

	if(in_array($fileactualext, $allowed_extensions)){
		//move_uploaded_file($tmp_name,$path);
		if($filesize < 200000){
				if($fileerror == 0){
						//$imagefullname = $file.".". uniqid(" " ,true).".".$fileactualext;//because there might be two images of same name and if second image is uploaded then overlaps the first image position with same name. Since we dont want to lose any images , on server side store the filename in such a way taht all images have unique name.uniqid is a fn used to generate random no

						//now consider the tplace to store like u did above for path! The thing is you have changed the name of file now.!!!
						//$fileDest="images/".$imagefullname;
						

							if(empty($title) || empty($des) ){
									?>
									<script type="text/javascript">
									alert("incomplete form filling");
									window.open("psgallery.php");
									</script>
									<?php	
									header("Location:psgallery.php");
							}
							else{
									$query="INSERT INTO POSTS (title,des,imgfullname,uid) VALUES (?,?,?,?);";
									$stmt=mysqli_stmt_init($connection);
									if(! mysqli_stmt_prepare($stmt,$query)){
											echo 'SQL statement failed';
									}
									else{
											mysqli_stmt_bind_param($stmt,"sssi",$title,$des,$file,$id);
											mysqli_stmt_execute($stmt);

											move_uploaded_file($tmp_name,$path );
											header("Location:pgallery.php?upload_successful");
									}
							} 
			  }
			  else{
					?>
					<script type="text/javascript">
					alert("file error!");
					window.open("psgallery.php");
					</script>
					<?php
				}

		}
		else{
			?>
		<script type="text/javascript">
			alert("file size is too big!");
			window.open("psgallery.php");
		</script>
		<?php
		}


	
	}
	else{

		?>
		<script type="text/javascript">
			alert("You need to upload proper file");
			window.open("psgallery.php");
		</script>
		<?php
		
	}
header("location:psgallery.php");
}else{
	echo 'submit it first!';
}
?>