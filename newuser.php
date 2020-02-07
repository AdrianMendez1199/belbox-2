<?php
    $active5="active";
    include "head.php";
    include "header.php";
    include "aside.php";
 
?>

    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Nuevo Usuario</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Nuevo Usuario</li>
            </ol>
        </section>

        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong>El usuario se registro correctamente</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-danger'> <i class='fa fa-exclamation-circle'></i>";  echo  $_GET['error']; "</p>";
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Crear Nuevo Usuario</h3>
                        </div><!-- /.box-header -->

                        <form role="form" action="action/users/adduser.php" method="post" enctype="multipart/form-data"><!-- form start -->
                            <div class="box-body">
                              <div class="form-group">
                                  <label>Nombres</label>
                                  <input type="text" name="fullname" class="form-control" rows="3" placeholder="Nombres de Usuario"></input>
                              </div>
                              <div class="form-group">
                                  <label>Apellidos</label>
                                  <input type="text" name="apellido" class="form-control" rows="3" placeholder="Apellidos de Usuario"></input>
                              </div>
                              <div class="form-group">
                                  <label>Nombre de Usuario</label>
                                  <input type="text" name="username" class="form-control" rows="3" placeholder="Ingresa el mail del usuario"></input>
                              </div>
                              <div class="form-group">
                                  <label>Departamento</label>
                                  <input type="text" name="departemento" class="form-control" rows="3" placeholder="Ingresa departamento al que pertenece el usuario"></input>
                              </div>

                              <div class="form-group">
                              <label>Tipo de usuario</label>
                              <select class="form-control select2" name="is_admin">
                                      <option value="2" selected="selected">Selecione un opcion</option>
                                      <option value="2">Usuario</option>
                                      <option value="1">Operativo</option>
                                      <option value="0">Administrado</option>
                                </select>
                              </div>

                              <div class="form-group">
                                  <label>Contraseña</label>
                                  <input type="password" name="password" class="form-control" rows="3" placeholder="Mayor de 7 digitos, al menos 1 mayúscula, 1 minúscula, 1 número y un digito especial +,-,$,!,@"></input>
                              </div>

                              <div class="form-group">
                                  <label>Confirme Contraseña</label>
                                  <input type="password" name="passwordd" class="form-control" rows="3" placeholder="ingrese la misma contraseña del campo anterior"></input>
                              </div>
                             
                                <div class="form-group">
                                    <span class="btn btn-my-button btn-file" style="width: 100%; margin-top: 5px;">
                                        Selecionar Imagen de Usuario<input type="file" name="filename">
                                    </span>
                                </div>
                            
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Crear Usuario</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php require_once("footer.php"); ?>
