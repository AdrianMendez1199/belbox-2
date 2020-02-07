<?php 
    $active2="active"; 
    require_once("head.php"); 
    require_once("header.php"); 
    require_once("aside.php"); 
?>



    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Búsqueda de Archivos</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="search.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Búsqueda Archivo</li>
            </ol>
        </section> 


    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
    <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Mis Archivos </h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
            </ol>
        </section>  
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-12">
                <table class="table table-responsive-sm table-bordered table-striped ">
                    <th>Creado Por</th>
                    <th>Nombre del archivo</th>
                    <th>Descripcion</th>
                    <th>Publico</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                <tbody>
                    <?php 
                        $sql = "SELECT 
                        description, filename, fullname, email, is_public, fs.created_at
                        FROM file fs
                        INNER JOIN user us
                        ON us.id = fs.user_id";

                        $result = mysqli_query($con, $sql);
                        while($file = mysqli_fetch_array($result, MYSQLI_ASSOC)):
                    ?>

                    <tr>
                        <td><?php echo $file['fullname']; ?></td>
                        <td><?php echo $file['filename']; ?></td>
                        <td><?php echo $file['description']; ?></td>
                        <?php if($file['is_public'] == 1): ?>
                        <td> <p class="label label-success">Publico<p> </td>
                        <?php else:?>
                        <td> <p class="label label-warning">Privado<p> </td>
                        <?php endif; ?>
                        <td><?php echo $file['created_at']; ?></td>

                    </tr>

                 <?php endwhile; ?>
                </tbody>
                </table>

                </div>
            </div>
        </section>
     </div>