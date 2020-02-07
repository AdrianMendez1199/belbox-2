<?php
require_once("config/config.php");

    $cur = mysqli_real_escape_string($con, trim($_GET['cur']));
    $unidad = mysqli_real_escape_string($con, trim($_GET['unidad']));
    $nit = mysqli_real_escape_string($con, trim($_GET['nit']));
    $fecha_inicial = mysqli_real_escape_string($con, trim($_GET['fecha_inicial']));
    $fecha_final = mysqli_real_escape_string($con, trim($_GET['fecha_final']));



    $query = "SELECT *FROM file
    WHERE is_active = '1'";


    if (!empty($cur)) {
        $query .= "AND file = '$cur' ";
    }

    if (!empty($unidad)) {
        $query .= "AND unidad_ejecutora = $unidad ";
    }

    if (!empty($nit)) {
        $query .= "AND nit = $nit ";
    }

    if (!empty($fecha_inicial) && !empty($fecha_final)) {
        $query .= "AND date_cur  BETWEEN CAST('$fecha_inicial' AS DATE) AND  CAST('$fecha_final' AS DATE) ";
    }


    $result = mysqli_query($con, $query);


require_once("head.php");
require_once("header.php");
require_once("aside.php");

?>
  
<div class="content-wrapper">
    <section class="content-header">
        <h1>Mis Archivos </h1>
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
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>

                            <tr>
                                <td><?php echo $data['file']; ?></td>
                                <td><?php echo $data['unidad_ejecutora']; ?></td>
                                <td><?php echo $data['nit']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($data['date_cur'])); ?></td>
                                <td><?php echo $data['caja']; ?></td>
                                <td>

                                    <a class="label label-info" href="viewfile.php?id=<?php echo base64_encode($data['user_id']) ?>&filename=<?php echo base64_encode($data['filename']) ?>">
                                        Visualizar
                                    </a>
                                    <?php if (isset($is_admin) && in_array($is_admin, array(0, 1))) : ?>
                                        <a class="label label-success" href="action/file/dwnfl.php?id=<?php echo base64_encode($data['user_id']) ?>&count=<?php echo base64_encode($data['download']) ?>&code=<?php echo base64_encode($data['code']) ?> ">
                                            Descargar</a>

                                        <a class="label label-warning" onclick="printJS('storage/data/<?php echo $data['user_id']; ?>/<?php echo $data['filename']; ?>')">
                                            Imprimir
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($data['status_file'] == 1) : ?>
                                        <a href="viewoutfile.php?filename=<?php echo $data['file']; ?>" class="label label-danger">En tránsito</a>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div>

<?php require_once "footer.php"; ?>