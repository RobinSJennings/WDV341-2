
<?php


$fileName = $_POST["file"];

	if(isset($_FILES['uploadFile'])){
      $errors= array();
      $file_name = $_FILES['uploadFile']['name'];
      $file_size =$_FILES['uploadFile']['size'];
      $file_tmp =$_FILES['uploadFile']['tmp_name'];
      $file_type=$_FILES['uploadFile']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadFile']['name'])));
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
		 echo "<br><h3>File Name: $file_name</h3><br>";
         echo "<h3>Success</h3>";
      }else{
         print_r($errors);
      }
   }
		else "isset failed";

?>
<html>

<head>
	<style>
		
	
		body{
			background-color: black;
			color: white;
		}
	</style>
</head>

<body>

	<form method = "POST" action = "chooseFile.php" enctype="multipart/form-data">
		<p>Please Enter A File Name:
			<input type = "text" name = "file"></p>
		<p>Please Choose A File: 
			<input type = "file" name = "uploadFile"></p>
			<input type = "submit" value = "Choose File">
			<input type = "reset" value = "Reset">
	</form>
<?php //echo "<h2>File Name: $fileName<h2>";?>
<?php //echo "<h2>File: $uploadFile</h2>";?>
</body>

</html>