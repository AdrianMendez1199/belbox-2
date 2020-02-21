<?php
  require_once ("../../config/config.php");
  if($_POST && !empty($_POST)) {

    session_start();

    $cur = trim(mysqli_real_escape_string($con, $_POST['cur']));
    $unidad = trim(mysqli_real_escape_string($con, $_POST['unidad']));
    $nit = trim(mysqli_real_escape_string($con, $_POST['nit']));
    $fechacur = trim(mysqli_real_escape_string($con, $_POST['fechacur']));
    $caja = trim(mysqli_real_escape_string($con, $_POST['caja']));
    $name_user = trim(mysqli_real_escape_string($con, $_POST['nombre']));
    $ministerio = trim(mysqli_real_escape_string($con, $_POST['ministerio']));
    $departamento = trim(mysqli_real_escape_string($con, $_POST['departamento']));
    $fechaentrega = trim(mysqli_real_escape_string($con, $_POST['fechaentrega']));
    $user_id = $_SESSION["user_id"];
    $number_page = $_POST['number_page'];



    $query = "SELECT *FROM file WHERE file='$cur' AND unidad_ejecutora='$unidad' ";

    $data = mysqli_query($con, $query);

    $da = mysqli_fetch_array($data, MYSQLI_ASSOC);



    if(!$da){
        $error = base64_encode("El cur que intenta buscar no se encuentra en la base de datos");
        header("location: ../../outfile.php?error=$error");
        return false;

    }

    else if($da['status_file'] == 1) {
        $error = base64_encode('error el archivo que intenta buscar, ya esta en transito.');
        header("location: ../../outfile.php?error=$error");

        return false;
    }


    // mysqli_begin_transaction($con, MYSQLI_TRANS_START_READ_WRITE);

    $query = "INSERT INTO out_file (filename, unidad_ejecutora, nit, fecha_cur, numero_caja, nombre, ministerio, departemento, fecha_entrega, number_page)
    VALUES('$cur', '$unidad', '$nit', '$fechacur', '$caja', '$name_user', '$ministerio', '$departamento', '$fechaentrega', $number_page)";
  
    $result = mysqli_query($con, $query);
    // mysqli_autocommit($con, false);


    if($result) {
        // header("Location: ../../outfile.php?success");
        $update = "UPDATE file set status_file = 1 WHERE file='$cur' ";
        $ms = mysqli_query($con, $update);

        if($update) {
            // mysqli_commit($con);
            header("location: ../../outfile.php?success");

        }else{
            header("location: ../../outfile.php?error1");
        }

    }else{


        header("location: ../../outfile.php?error2");
    }
}else{
    header("location: ../../outfile.php?error3");

}


?>
