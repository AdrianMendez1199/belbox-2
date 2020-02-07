<?php 

require_once("../../config/config.php");

if($_POST) {

	$file		  = trim($_POST['namecur']);
    $unidad_ejecutora = $_POST['unidad'];
    
    
    $sql = "SELECT fs.file, nombre,  fs.number_page , fs.nit, fs.caja
    FROM file fs
    INNER JOIN out_file of on fs.file = of.filename 
     WHERE file='$file' AND  fs.status_file = 1";
    $result  = mysqli_query($con , $sql);

    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    

    $error = base64_encode("Este CUR no esta en transito");
    if(!isset($data['nit'])) {
        header("Location: ../../home.php?error=$error");

    }else{
        extract($data);
        header("Location: ../../confirm_return.php?nit=$nit&file=$file&unidad=$unidad_ejecutora&numero_caja=$caja&number_page=$number_page");

        // $date_cur     = $data['date_cur'];
        // $nit		  = $data['nit'];
        // $caja = $data['caja'];
        // $number_page = $data['number_page'];
        // $desc = $data['description'];

        // $insert = "INSERT INTO files_returned (name, nit, unidad_ejecutora, fecha_entrega, numero_pagina, descripcion)
        // VALUES ('$file', '$nit', '$unidad_ejecutora', '$fecha_entrega', '$number_page', '$desc')";
        // $result = mysqli_query($con,$insert);
    
        // if($result) {
        //     $qr = "UPDATE file SET status_file = 0 WHERE file='$file' ";
     
        //     $update = mysqli_query($con,$qr);
    
        //     if($update) {
        //         $sucess = base64_encode("El archivo se registro como entregado");
        //         header("Location: ../../home.php?success=$sucess");
        //     }else{
        //         header("Location: ../../home.php?error=$error");
        //     }
        // }

    }

}