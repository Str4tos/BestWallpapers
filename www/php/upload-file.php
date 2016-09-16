<?php
$uploaddir = './../img/'; 
$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
 
$ext = substr($_FILES['uploadfile']['name'],strpos($_FILES['uploadfile']['name'],'.'),strlen($_FILES['uploadfile']['name'])-1); 
$filetypes = array('.jpg','.gif','.bmp','.png','.JPG','.BMP','.GIF','.PNG','.jpeg','.JPEG');
 
if(!in_array($ext,$filetypes)){
	echo "<p>Данный формат файлов не поддерживается</p>";}
else{ 
	if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
		$SizeWal = $_POST['size'];
		$CatWal = $_POST['cat'];
		$mysqli = new mysqli("localhost", "root", "", "mysite");
		$mysqli->query("INSERT INTO `imgs`(`id`, `img`, `size`, `cat`) 
			VALUES (NULL,'img/" . $_FILES['uploadfile']['name'] . "','" . $SizeWal . "', '" . $CatWal . "')");
		$mysqli->close();
		echo "success";		
	} else {
		echo "error";
	}
}
?>