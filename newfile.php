<?php
    $active5="active";
    include "head.php";
    include "header.php";
    include "aside.php";

    $folders = mysqli_query($con, "select * from file where user_id=$my_user_id and is_folder=1 and folder_id is NULL order by created_at desc");

?>

    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Nuevo Archivo</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Nuevo Archivo</li>
            </ol>
        </section>

        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong>archivo subido exitosamente</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-warning'> <i class=' fa fa-exclamation-circle'></i> No se pudo subir, hubo un error.</p>";
                        }elseif (isset($_GET['error2']) && isset($_GET['max_size'])) {
                            echo "<p class='alert alert-info'> <i class=' fa fa-exclamation-circle'></i> Hubo un error el archivo supero el peso máximo.</p>";
                        }elseif (isset($_GET['error3']) && isset($_GET['fatal'])) {
                            echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> Error fatal, el archivo no se pudo cargar.</p>";
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Cargar Nuevo Archivo</h3>
                        </div><!-- /.box-header -->

                        <form role="form" action="action/file/addfile.php" method="post" enctype="multipart/form-data"><!-- form start -->
                            <div class="box-body">
                              <div class="form-group">
                                  <label>NOMBRE DE ARCHIVO / CUR</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NOMBRE DEL ARCHIVO CON LETRAS MAYÚSCULAS Y DIGITOS NUMÉRICOS SIN ESPACIO ENTRE SÍ Y SIN CARACTERES ESPECIALES')"></i>
                                    <input type="text" name="namecur" class="form-control" rows="3" placeholder="Ej: CUR123456789"></input>
                              </div>
                              <div class="form-group">
                                  <label>UNIDAD EJECUTORA</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="unidad" onClick="alert('INGRESAR EL ID REGISTRADO PARA LA UNIDAD EJECUTORA')"></i>
                                    <input type="text" name="unidad" class="form-control" rows="3" placeholder="Ej: 201"></input>
                              </div>
                              <div class="form-group">
                                  <label>NIT</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="nit" onClick="alert('INGRESAR EL NÚMERO DE NIT SIN GUIÓN')"></i>
                                    <input type="text" name="nit" class="form-control" rows="3" placeholder="Ej: 12345678"></input>
                              </div>
                              <div class="form-group">
                                  <label>FECHA DEL CUR</label>
                                  <input type="date" name="datecur" class="form-control" rows="3" placeholder=""></input>
                              </div>
                              <div class="form-group">
                                  <label>CAJA NÚMERO</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NÚMERO DE CAJA A LA QUE PERTENECE EL CUR')"></i>
                                    <input type="text" name="caja" class="form-control" rows="3" placeholder="Ingresa el número de caja a la que pertenece el CUR"></input>
                              </div>

                              <div class="form-group">
                                  <label>NUMERO PAGINAS CUR</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NÚMERO DE PÁGINA QUE TIENE EL CUR')"></i>
                                    <input type="text" name="number_page" class="form-control" rows="3" placeholder="Ingresa el número de páginas que tiene el CUR"></input>
                              </div>

                              <div class="form-group">
                                    <label>DESCRIPCIÓN</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Observaciones adicionales"></textarea>
                                </div>

                                <div class="form-group">
                                    <span class="btn btn-my-button btn-file" style="width: 100%; margin-top: 5px;">
                                        Selecionar Archivo<input type="file" name="filename">
                                    </span>
                                </div>
                                <div class="form-group">

                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Subir archivo</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>
