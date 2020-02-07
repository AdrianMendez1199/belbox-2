<?php
    $active5="active";
    require_once("head.php");
    require_once("header.php");
    require_once("aside.php");

    
    require_once("./config/config.php");

    $id = $_GET['id'];
    $query = "SELECT *FROM user WHERE id={$id}";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_array($result);

?>


<div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Editar Usuario</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Editar Usuario</li>
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
                        
                        <form role="form" action="action/users/edituser.php" method="post" enctype="multipart/form-data"><!-- form start -->
                        <input type="hidden" name="id" value="<?php echo $user['id'];?>"></input>
                            <div class="box-body">
                              <div class="form-group">
                                  <label>Nombres</label>
                                  <input type="text" name="fullname" class="form-control" rows="3" value="<?php echo isset($user['fullname']) ? $user['fullname'] : '';?>"></input>
                              </div>
                              <div class="form-group">
                                  <label>Correo Electrónico</label>
                                  <input type="email" name="email" class="form-control" rows="3" value="<?php echo isset($user['email']) ? $user['email'] : '';?>"></input>
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
                                        <input type="file" class="form-control" name="filename">
                                </div>
                            
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Editar Usuario</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->