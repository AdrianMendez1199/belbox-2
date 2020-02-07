<?php
    $active1="active";
    include "head.php";
    include "header.php";
    include "aside.php";


    $count_files = mysqli_query($con, "select * from file where is_active = 1");
    $count_download = mysqli_query($con, "select sum(download) as download from file");
    $count_user=mysqli_query($con, "select * from user");

    $count_comments = mysqli_query($con, "SELECT * FROM out_file ouf 
    INNER JOIN file fl 
    ON fl.file  = ouf.filename 
    AND fl.status_file = 1");

?>
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->

    <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Dashboard<small>Panel de control</small> </h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <?php if(isset($_GET['invalid'])) : ?>
            <br />
                <div class="alert alert-danger"><?php echo base64_decode($_GET['invalid']);?></div>
            <br />
            <?php elseif(isset($_GET['success_pass'])) : ?>
            <br />
                <div class="alert alert-success"><?php echo base64_decode($_GET['success_pass']);?></div>
            <br />

            <?php elseif(isset($_GET['success'])) : ?>
            <br />
                <div class="alert alert-success"><?php echo base64_decode($_GET['success']);?></div>
            <br />

            <?php elseif(isset($_GET['error'])) : ?>
            <br />
                <div class="alert alert-danger"><?php echo base64_decode($_GET['error']);?></div>
            <br />
            <?php endif; ?>


     <?php if($is_admin == 0 ) : ?>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($count_files); ?></h3>
                            <p>Archivos en el Sistema</p>
                        </div>
                        <a href="search.php" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green"><!-- small box -->
                        <div class="inner">
                        <?php
                        //compruebo si hay archivos, sino hay muestro un cero
                            if (mysqli_num_rows($count_files)!=null){
                                 foreach ($count_download as $count) {
                        ?>
                            <h3><?php echo $count['download']; ?></h3>
                        <?php
                                } //end foreach
                            }else{

                        ?>
                                <h3>0</h3>
                        <?php
                            }

                        ?>
                            <p>Archivos Descargados</p>
                        </div>

                        <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow"><!-- small box -->
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($count_user); ?></h3>
                            <p>Usuarios del Sistema</p>
                        </div>
                        <a href="users.php" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red"><!-- small box -->
                        <div class="inner">
                          <h3><?php echo mysqli_num_rows($count_comments); ?></h3>
                          <p>Documentos en tránsito</p>
                        </div>
                        <a href="files_in_transit.php" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <?php else: ?>
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
            <?php endif; ?>

            <div class="row">
                <!-- .row -->
                <div class="col-md-4">
                    <div class="image view view-first">
                        <img class="thumb-image" style="width: 65%; display: block;" src="images/profiles/<?php echo $profile_pic ?>" alt="image">
                    </div>
                            <form method="post" id="formulario" enctype="multipart/form-data">
                              <input type="file" class="form-control" name="file">
                            </form>
                        <div id="respuesta"></div>
                    <br>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                <!-- <div id="result"></div> -->
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos Personales: </h3>
                        </div> <!-- /.box-header -->
                        <form role="form" method="post" action="action/users/updprofile2.php"><!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="fullname">Nombre Completo</label>
                                    <input name="fullname" type="text" class="form-control" id="fullname" value="<?php echo $fullname ?>">
                                </div>
                                <div class="form-group">
                                    <label for="username">Nombre de Usuario</label>
                                    <input name="username" type="username" class="form-control" id="username" value="<?php echo $username ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña Actual</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="*******">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Nueva Contraseña</label>
                                    <input name="new_password" type="password" class="form-control" placeholder="*******" id="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_new_password">Confirmar Nueva Contraseña</label>
                                    <input name="confirm_new_password" type="password" class="form-control" placeholder="*******" id="confirm_new_password">
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button name="token" type="submit" class="btn btn-success">Actualizar Datos</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>
    <!-- /.content -->


<?php include "footer.php"; ?>
<script>
    $(function(){
    $("input[name='file']").on("change", function(){
        var formData = new FormData($("#formulario")[0]);
        var ruta = "action/user/uploadprofile.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos)
            {
                $("#respuesta").html(datos);
            }
        });
    });
    });
</script>
