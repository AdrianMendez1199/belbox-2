<?php
    require_once("./head.php"); 
    require_once("./header.php"); 
    require_once("./aside.php");

    require_once("./config/config.php");

    $sql = "SELECT *FROM files_returned";
    $result = mysqli_query($con, $sql);
?>

    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Archivos Recibidos</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Archivos Recibidos</li>
            </ol>
        </section>

        <section class="content">
        <div class="row">
            <div class="col-md-12">
                <table id="tb-recived" class="table table-responsive-sm table-bordered table-striped " id="tb-files">
                    <thead>
                        <th>CUR</th>
                        <th>Unidad Ejecutora</th>
                        <th>Nit</th>
                        <th>Paginas en el retorno</th>
                        <th>Descripcion</th>
                        <th>Fecha entrega</th>
                        <th>Caja</th>
                        <th>Recibido Por</th>
                    </thead>
                    <tbody>
                    <?php while ($data = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td><?php echo $data['name']?></td>
                            <td><?php echo $data['unidad_ejecutora']?></td>
                            <td><?php echo $data['nit']?></td>
                            <td><?php echo $data['numero_pagina']?></td>
                            <td><?php echo $data['descripcion']?></td>
                            <td><?php echo $data['fecha_entrega']?></td>
                            <td><?php echo $data['caja']?></td>
                            <td><?php echo $data['received_by']?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>
    </div>

    <?php require_once ("footer.php"); ?>

<script>
  $(document).ready(function() {
    $("#tb-recived").DataTable();
  })
</script>