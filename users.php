<?php
    // $active5="active";
    require_once("head.php");
    require_once("header.php");
    require_once("aside.php");
    require_once("config/config.php");

?>

    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Búsqueda de usuarios</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Búsqueda usuarios</li>
            </ol>
        </section>

        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Resultado de búsqueda</div>

                    <?php if(isset($_GET['sucesss'])): ?>
                        <p class="alert alert-success">El usuario fue eliminado correctamente</p>
                     <?php elseif(isset($_GET['error'])) : ?>
                     <p class="alert alert-danger">Ocurrio un error al eliminar el usuario</p>
                    <?php endif; ?>
                  <div class="card-body">
                    <table id="tb-user" class="table table-responsive-sm table-bordered table-striped ">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Fecha Creacion</th>
                          <th>Opción</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                            <?php
                                
                                $query = "select * from user";
                                $result = mysqli_query($con, $query);
                                while($user = mysqli_fetch_array($result, MYSQLI_ASSOC)):
                
                            ?>
                        <tr>
                          <td><?php echo $user['fullname'];?></td>
                          <td><?php echo $user['email'];?></td>
                          <td><?php echo date('d-m-Y', strtotime($user['created_at']));?></td>
                          <td>
                            <a  class="label label-danger" href="action/user/deleteuser.php?id=<?php echo $user['id']?>">Eliminar</a>
                            <a  class="label label-warning" href="edit.php?id=<?php echo $user['id']?>">Actualizar</a>
                          </td>
                        </tr>
                        <?php endwhile; ?>
                      </tbody>
                    </table>
               
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
          </div>
        </div>

      </main>
      <aside class="aside-menu">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">
              <i class="icon-list"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
              <i class="icon-speech"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
              <i class="icon-settings"></i>
            </a>
          </li>
        </ul></br>
      </aside>
    </div>
</html>

<?php require_once ("footer.php"); ?>

<script>
  $(document).ready(function() {
    $("#tb-user").DataTable();
  })
</script>
