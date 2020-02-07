<?php 
require_once("./config/config.php");



$filename = $_GET['file'];



$sql = "SELECT *FROM file WHERE file='$filename' ";

$result  = mysqli_query($con , $sql);

$data = mysqli_fetch_array($result, MYSQLI_ASSOC);

// print_r($data);
// die;

       $unidad_ejecutora = $data['unidad_ejecutora'];
        $date_cur   = $data['date_cur'];
        $nit = $data['nit'];
        $caja = $data['caja'];
        $number_page = $data['number_page'];
        $desc = $data['description'];

        $insert = "INSERT INTO files_returned (name, nit, unidad_ejecutora, fecha_entrega, numero_pagina, descripcion)
        VALUES ('$filename', '$nit', '$unidad_ejecutora', NOW(), '$number_page', '$desc')";



// print_r($insert);
// die;
        $result = mysqli_query($con,$insert);
    
        if($result) {
            $qr = "UPDATE file SET status_file = 0 WHERE file='$filename' ";
     
            $update = mysqli_query($con,$qr);
    
            if($update) {
                $sucess = base64_encode("El archivo se registro como entregado");
                header("Location: home.php?success=$sucess");
            }else{
                header("Location: home.php?error=$error");
            }
        }