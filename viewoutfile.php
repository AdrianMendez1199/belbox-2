<?php

require_once("./config/config.php");

require_once("head.php");
require_once("header.php");
require_once("aside.php");

if ($_GET) {
    $filename = trim($_GET['filename']);

    $sql = "SELECT *FROM out_file WHERE filename = '$filename' ";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
}


?>

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text text-danger">Archivos en Transito </h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="search.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive-sm table-bordered table-striped " id="tb-files">
                    <thead>
                        <th>CUR</th>
                        <th>Unidad Ejecutora</th>
                        <th>Nit</th>
                        <th>Fecha</th>
                        <th>Numero Caja</th>
                        <th>Nombre Responsable</th>
                        <th>Ministerio</th>
                        <th>Departamento</th>
                        <th>Fecha entrega</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if ($data) : ?>
                                <td><?php echo  $data['filename'] ?></td>
                                <td><?php echo  $data['unidad_ejecutora'] ?></td>
                                <td><?php echo  $data['nit'] ?></td>
                                <td><?php echo  $data['fecha_cur'] ?></td>
                                <td><?php echo  $data['numero_caja'] ?></td>
                                <td><?php echo  $data['nombre'] ?></td>
                                <td><?php echo  $data['ministerio'] ?></td>
                                <td><?php echo  $data['departemento'] ?></td>
                                <td><?php echo  isset($data['number_page']) ? $data['number_page'] : ''; ?></td>
                                <td><?php echo  date('d-m-Y', strtotime($data['fecha_entrega']));?></td>
                            <?php else : ?>
                                <td>Este Cur no esta fuera</td>
                            <?php endif; ?>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div>