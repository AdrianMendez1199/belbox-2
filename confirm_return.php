<?php
    require_once("./head.php"); 
    require_once("./header.php"); 
    require_once("./aside.php");

?>




    <div class="content-wrapper">
    <section class="content-header">
        <h3>Infomación CUR entrada</h3>
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
                        <th>Cantidad de paginas</th>
                        <th>Recibidor Por</th>
                        <th>Fecha Recibido</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php if (isset($_GET['file'])) : ?>
                         <td><?php echo $_GET['file']; ?></td>
                         <td><?php echo $_GET['unidad']; ?></td>
                         <td><?php echo $_GET['nit']; ?></td>
                         <td><?php echo $_GET['number_page']; ?></td>
                         <td><?php echo $_GET['received_by']; ?></td>
                         <td><?php echo $_GET['date_received']; ?></td>
                         <td>   
                             <a href="confirm_file_enter.php?file=<?php echo $_GET['file'] ?>&received_by=<?php echo $_GET['received_by'] ?>"
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
<?php require_once ("footer.php"); ?>

<script>
  $(document).ready(function() {
    $("#tb-user").DataTable();
  })
</script>
