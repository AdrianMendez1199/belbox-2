<?php

require_once("../../config/config.php");


 if($_POST){

    define('MB', 1048576);
   
    $target_dir = "../../images/profiles/";
    $id = uniqid();
    $file_name = str_replace(' ', '-', $id.$_FILES["filename"]["name"]);
    
    $target_file = $target_dir . basename($file_name);


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    

   if (!in_array($imageFileType, array('png', 'jpg', 'jpge'))) {
       $error = "Tipo de imagen no soportado";
       $uploadOk = 0;
   }

   if($_FILES['filename']['size'] > 4 * MB){
      $error = "El tamaño maximo soportado son 4 MB";
      $uploadOk = 0;
   }

   if(file_exists($target_file)){
       $error = "el archivo existe";
       $uploadOk = 0;
   }


   // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("Location: ../../users.php?errorfile=$error");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {

            $id = $_POST['id'];
            $fullname = trim($_POST['fullname']);
            $email =    trim($_POST['email']);
            $is_admin = (int) $_POST['is_admin'];


            $query ="UPDATE user SET email='$email', 
             fullname='$fullname', is_admin='$is_admin', image='$file_name' WHERE id='$id' ";
            $edit = mysqli_query($con, $query);


       
    
    if($edit){
                header("Location: ../../users.php?successfile");
            }else{
                header("Location: ../../users.php?erroredit");
            }

        } else {
            header("Location: ../../users.php?errorfile=$error");
        }
    }



 }