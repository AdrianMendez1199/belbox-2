<?php

require_once("./config/config.php");
require_once("head.php");
require_once("header.php");
require_once("aside.php");

$sql = "SELECT ouf.*
FROM out_file ouf 
INNER JOIN file fl 
ON fl.file  = ouf.filename 
AND fl.status_file = 1";

$result = mysqli_query($con, $sql);

?>


<div class="content-wrapper">
<section class="content-header">
        <h1 class="text text-info">Historico Archivos en Transito </h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="search.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <table id="hist-files" class="table table-responsive-sm table-bordered table-striped " id="tb-files">
                    <thead>
                        <th>CUR</th>
                        <th>Unidad Ejecutora</th>
                        <th>Nit</th>
                        <th>Fecha</th>
                        <th>Numero Caja</th>
                        <th>Nombre Responsable</th>
                        <th>Ministerio</th>
                        <th>Departamento</th>
                        <th>Numero de paginas</th>
                        <th>Fecha entrega</th>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                        <tr>
                                <td><?php echo  $data['filename'] ?></td>
                                <td><?php echo  $data['unidad_ejecutora'] ?></td>
                                <td><?php echo  $data['nit'] ?></td>
                                <td><?php echo  $data['fecha_cur'] ?></td>
                                <td><?php echo  $data['numero_caja'] ?></td>
                                <td><?php echo  $data['nombre'] ?></td>
                                <td><?php echo  $data['ministerio'] ?></td>
                                <td><?php echo  $data['departemento'] ?></td>
                                <td><?php echo  isset($data['number_page']) ? $data['number_page'] : ''; ?></td>
                                <td><?php echo  date('d-m-Y', strtotime($data['fecha_entrega'] ));?></td>
                            </tr>
                            <?php endwhile; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </section>

</div>


<?php 
require_once ("./footer.php");
?>

<script>
 $(document).ready(function() {
     $("#hist-files").DataTable();
 })
 </script>