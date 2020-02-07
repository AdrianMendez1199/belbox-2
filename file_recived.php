<?php
    require_once("./head.php"); 
    require_once("./header.php"); 
    require_once("./aside.php");
    
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
                <table class="table table-responsive-sm table-bordered table-striped " id="tb-files">
                    <thead>
                        <th>CUR</th>
                        <th>Unidad Ejecutora</th>
                        <th>Recibido Por</th>
                        <th>Cantidad de paginas</th>
                        <!-- <th></th> -->
                    </thead>
                    <tbody>
                        <?php if (isset($_GET['file'])) : ?>
                         <td><?php echo $_GET['file']; ?></td>
                         <td><?php echo $_GET['unidad']; ?></td>
                         <td><?php echo $_GET['nit']; ?></td>
                         <td><?php echo $_GET['number_page']; ?></td>
                         <td><?php echo $_GET['numero_caja']; ?></td>
                         <td>   
                             <a href="confirm_file_enter.php?file=<?php echo $_GET['file'] ?>"
                             class="label label-success">
                                Confirmar
                             </a>
                             <a href="home.php" class="label label-danger">
                                Cancelar
                             </a>
                        </td>
                        <?php endif;  ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>

    </div><!-- /.content -->

