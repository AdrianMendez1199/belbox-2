<?php
	session_start();

	require_once( "../../config/config.php");
	// require_once( "../class.upload.php");

if(!empty($_POST) && isset($_SESSION["user_id"])){
	$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
	$code = "";
	for($i=0;$i<12;$i++){
	    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
	}


	$code = $code;
	$is_public 	  = isset($_POST["is_public"]) ? 1 : 0;
	$folder_id 	  = isset($_POST["folder_id"]) ? $_POST["folder_id"] : $_SESSION["user_id"];
	$user_id      = $_SESSION["user_id"];
	$description  = trim($_POST["description"]);
	$filename     = $_FILES['filename']['name'];
	$date_cur     = $_POST['datecur'];
	$file		  = trim(strtoupper($_POST['namecur']));
	$nit		  = $_POST['nit'];
	$unidad_ejecutora = $_POST['unidad'];
	$caja = $_POST['caja'];
	$number_page = $_POST['number_page'];

	$url = "../../storage/data/".$_SESSION['user_id']."/";

	if(!is_dir($url)) {
		mkdir($url, 0777, true);
	}

	$target_file = $url . basename($filename);



	$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if (!in_array($fileType, array('pdf', 'jpg', 'png'))){
		$error = base64_encode('solo esta permitido subir pdf, png, jpg');
		 header("location: ../../newfile.php?error=$error");
	}

	if(move_uploaded_file($_FILES['filename']['tmp_name'], $target_file)) {

		$sql = "INSERT INTO file (code, filename, description, download, is_public, user_id, is_folder, folder_id,
		  created_at, file, status_file, is_active,
		 nit, unidad_ejecutora, caja, date_cur, number_page)
		VALUES ('$code','$filename','$description', 0, '$is_public', '$user_id', 0, '$folder_id',
		NOW(), '$file', 0, 1, '$nit', '$unidad_ejecutora', '$caja', '$date_cur', '$number_page')";

		$query=mysqli_query($con, $sql);

	
		if ($query) {

			$success = base64_encode("exito");
			header("location: ../../newfile.php?success=$success");
		}else{
			$error = base64_encode("Ocurrio un error al subir el archivo");
			header("location: ../../newfile.php?error");
		}

	}else{
		$error = base64_encode('Ocurrio un errror al subir el archivo');
		header("location: ../../newfile.php?error=$error");
	}

}

?>
