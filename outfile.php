<?php
    $active5="active";
    include "head.php";
    include "header.php";
    include "aside.php";

    $folders = mysqli_query($con, "select * from file where user_id=$my_user_id and is_folder=1 and folder_id is NULL order by created_at desc");

?>

    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Salidas de Archivo</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Seguimiento Archivos</a></li>
                <li class="active">Salidas</li>
            </ol>
        </section>

        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong>"; echo base64_decode($_GET['success']); "</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-warning'> <i class=' fa fa-exclamation-circle'></i>"; echo base64_decode($_GET['error']);  "</p>";
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Crear Salida de Archivo</h3>
                        </div><!-- /.box-header -->

                        <form role="form" action="action/file/outfile.php" method="post" enctype="multipart/form-data"><!-- form start -->
                            <div class="box-body">
                              <div class="form-group">
                                  <label>NOMBRE DE ARCHIVO / CUR</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NOMBRE DEL ARCHIVO CON LETRAS MAYÚSCULAS Y DIGITOS NUMÉRICOS SIN ESPACIO ENTRE SÍ Y SIN CARACTERES ESPECIALES')"></i>
                                    <input type="text" name="cur" class="form-control" rows="3" placeholder="Ej: CURXXXXXXXXXXX"></input>
                              </div>
                              <div class="form-group">
                                  <label>UNIDAD EJECUTORA</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL ID REGISTRADO PARA LA UNIDAD EJECUTORA')"></i>
                                    <input type="text" name="unidad" class="form-control" rows="3" placeholder="Ej: 201"></input>
                              </div>
                              <div class="form-group">
                                  <label>NIT</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NÚMERO DE NIT SIN GUIÓN')"></i>
                                    <input type="text" name="nit" class="form-control" rows="3" placeholder="Ej: 12345678"></input>
                              </div>
                              <div class="form-group">
                                  <label>FECHA DEL CUR</label>
                                  <input type="date" name="fechacur" class="form-control" rows="3" placeholder=""></input>
                              </div>
                              <div class="form-group">
                                  <label>CAJA NÚMERO</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NÚMERO DE CAJA A LA QUE PERTENECE EL CUR UNICAMENTE CON DIGITOS NUMÉRICOS')"></i>
                                    <input type="text" name="caja" class="form-control" rows="3" placeholder="Ej: 16"></input>
                              </div>
                              <div class="form-group">
                                  <label>NUMERO PAGINAS CUR</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="" onClick="alert('INGRESAR EL NÚMERO DE CAJA A LA QUE PERTENECE EL CUR')"></i>
                                    <input type="text" name="number_page" class="form-control" rows="3" placeholder="Ingresa Nombre de empresa beneficiaria"></input>
                              </div>

                              <div class="form-group">
                                  <label>NOMBRE A QUIEN SE ENTREGA EL CUR</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NOMBRE DE LA PERSONA A QUIEN SE LE ESTÁ ENTREGANDO EL CUR, TODO CON LETRAS MAYÚSCULAS')"></i>
                                    <input type="text" name="nombre" class="form-control" rows="3" placeholder="Ej: CARLOS ESTUARDO LOPEZ LOPEZ"></input>
                              </div>
                              <div class="form-group">
                                  <label>MINISTERIO O DEPENDENCIA A LA QUE PERTENECE</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NOMBRE DEL MINISTERIO O LA DEPENDENCIA A LA QUE PERTENCE LA PERSONA A LA QUE SE LE ESTÁ ENTREGANDO EL CUR, TODO CON LETRAS MAYÚSCULAS')"></i>
                                    <input type="text" name="ministerio" class="form-control" rows="3" placeholder="Ej: MINISTERIO DE CULTURA Y DEPORTES"></input>
                              </div>
                              <div class="form-group">
                                  <label>DEPARTAMENTO AL QUE PERTENECE</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NOMBRE DEL DEPARTAMENTO EN EL QUE LABORA, TODO CON LETRAS MAYÚSCULAS')"></i>
                                    <input type="text" name="departamento" class="form-control" rows="3" placeholder="Ej: CONTABILIDAD"></input>
                              </div>
                              <div class="form-group">
                                  <label>FECHA DE ENTREGA DEL CUR</label>
                                  <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR LA FECHA EN LA QUE SE ESTÁ ENTREGANDO EL CUR AL MINISTERIO O DEPENDENCIA')"></i>
                                  <input type="date" name="fechaentrega" class="form-control" rows="3" placeholder=""></input>
                              </div>
                         
                            
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>
