<?php
 if($_GET['id']){
    $id = $_GET['id'];

    require_once("../config/config.php");
    $deleted = mysqli_query($con, "DELETE FROM user where id={$id}");

    if($deleted){
        header("Location: ../users.php?success");
    }else{
        header("Location: ../users.php?error");
    }
 }