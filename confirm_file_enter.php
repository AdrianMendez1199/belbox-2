<?php 
require_once("./config/config.php");



$filename = $_GET['file'];
$received_by = $_GET['received_by'];


$sql = "SELECT *FROM file WHERE file='$filename' ";

$result  = mysqli_query($con , $sql);

$data = mysqli_fetch_array($result, MYSQLI_ASSOC);



       $unidad_ejecutora = $data['unidad_ejecutora'];
        $date_cur   = $data['date_cur'];
        $nit = $data['nit'];
        $caja = $data['caja'];
        $number_page = $data['number_page'];
        $desc = $data['description'];


        $insert = "INSERT INTO files_returned (name, nit, unidad_ejecutora, fecha_entrega, caja, numero_pagina, descripcion, received_by)
        VALUES ('$filename', '$nit', '$unidad_ejecutora', NOW(), '$number_page', '$desc', '$caja', '$received_by')";
        

        $result = mysqli_query($con,$insert);
    
        if($result) {
            $qr = "UPDATE file SET status_file = 0 WHERE file='$filename' ";
            $dl = "DELETE FROM out_file WHERE filename='$filename'";

            $update = mysqli_query($con,$qr);
            $delete = mysqli_query($con,$dl);
    
            if($update) {
                $sucess = base64_encode("El archivo se registro como entregado");
                header("Location: home.php?success=$sucess");
            }else{
                header("Location: home.php?error=$error");
            }
        }