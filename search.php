<?php
$active5 = "active";
require_once("head.php");
require_once("header.php");
require_once("aside.php");


?>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">


<div class="content-wrapper">
    <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
        <!-- Content Header (Page header) -->
        <h1>Búsqueda de Archivos</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
            <li class="active">Búsqueda Archivo</li>
        </ol>
    </section>

    <section class="content">
        <!-- Main content -->
        <div class="row">
            <!-- Small boxes (Stat box) -->
            <div class="col-md-6 col-md-offset-3">
                <?php
                if (isset($_GET['error'])) {
                    echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i>";
                    echo base64_decode($_GET['error']);
                    " </p>";
                }
                ?>
                <div class="box box-primary">
                    <!-- general form elements -->
                    <div class="box-header with-border">
                        <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Buscar Archivo</h3>
                    </div>

                    <form role="form" action="searchfile.php" method="post" enctype="multipart/form-data">
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>CUR</label>
                                <input type="text"  name="cur" class="form-control" rows="3" placeholder="Ingresa el número e CUR"></input>
                            </div>
                            <div class="form-group">
                                <label>Unidad Ejecutora</label>
                                <input type="text"  name="unidad" class="form-control" rows="3" placeholder="Ingresa ID de UE"></input>
                            </div>

                            <div class="form-group">
                                <label>NIT</label>
                                <input type="text"  name="nit" class="form-control" rows="3" placeholder="Nit empresa beneficiaria"></input>
                            </div>
                            <div class="form-group">
                                <label>Fecha inicial</label>
                                <input type="date"  name="fecha_inicial" class="form-control" rows="3" placeholder=""></input>
                            </div>
                            <div class="form-group">
                                <label>Fecha final</label>
                                <input type="date"  title="Fecha requerida" name="fecha_final" class="form-control" rows="3" placeholder=""></input>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"> Buscar Archivo</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div><!-- /.row -->
    </section>
</div><!-- /.content -->



<!-- 
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
                        <th>Creado Por</th>
                        <th>Nombre del archivo</th>
                        <th>Descripcion</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </thead>
                <tbody>
                    <?php
                    $sql = "SELECT us.id, code, download, status_file,
                        description, file as filename, filename as f, fullname, email, is_public, fs.created_at
                        FROM file fs INNER JOIN user us
                        ON us.id = fs.user_id
                        WHERE fs.is_active = 1
                        AND us.is_active = 1";

                    $result = mysqli_query($con, $sql);
                    while ($file = mysqli_fetch_array($result, MYSQLI_ASSOC)) :
                    ?>

                    <tr>
                        <td><?php echo $file['fullname']; ?></td>
                        <td><?php echo $file['filename']; ?></td>
                        <td><?php echo $file['description']; ?></td>
                        <td><?php echo $file['created_at']; ?></td>
                        <td>

                        <a class="label label-info" 
                          href="viewfile.php?id=<?php echo base64_encode($file['id']) ?>&filename=<?php echo base64_encode($file['filename']) ?>">
                          Visualizar
                        </a>
                           <?php if (isset($is_admin) && in_array($is_admin, array(0, 1))) : ?>
                                <a class="label label-success" 
                                href="action/file/dwnfl.php?id=<?php echo base64_encode($file['id']) ?>&count=<?php echo base64_encode($file['download']) ?>&code=<?php echo base64_encode($file['code']) ?> ">
                                Descargar</a>

                            <a class="label label-warning" onclick="printJS('storage/data/<?php echo $file['id'] ?>/<?php echo $file['f'] ?>')">
                                Imprimir
                        </a>
                           <?php endif; ?>
                           <?php if ($file['status_file'] == 1) : ?>
                                <a class="label label-danger">En tránsito</a>
                        <?php endif; ?>
                        </td>
                        
                    </tr>

                 <?php endwhile; ?>
                </tbody>
                </table>

                </div>
            </div>
        </section>
     </div> -->

<?php require_once "footer.php"; ?>

<script>
    $(document).ready(function() {
        $("#tb-files").DataTable();
    })
</script>