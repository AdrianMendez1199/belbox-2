<?php
    require_once("./head.php"); 
    require_once("./header.php"); 
    require_once("./aside.php");
    
?>

    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Retornar Archivo</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Retornar Archivo</li>
            </ol>
        </section>

        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Retornar Archivo</h3>
                        </div><!-- /.box-header -->

                        <form role="form" action="action/file/return.php" method="post" enctype="multipart/form-data"><!-- form start -->
                            <div class="box-body">
                              <div class="form-group">
                                  <label>NOMBRE DE ARCHIVO / CUR</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NOMBRE DEL ARCHIVO CON LETRAS MAYÚSCULAS Y DIGITOS NUMÉRICOS SIN ESPACIO ENTRE SÍ Y SIN CARACTERES ESPECIALES')"></i>
                                    <input type="text" required name="namecur" class="form-control" rows="3" placeholder="Ej: CURXXXXXXXXXXX"></input>
                              </div>
                              <div class="form-group">
                                  <label>UNIDAD EJECUTORA</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="unidad" onClick="alert('INGRESAR EL ID REGISTRADO PARA LA UNIDAD EJECUTORA')"></i>
                                    <input type="text" required name="unidad" class="form-control" rows="3" placeholder="Ej: 201"></input>
                              </div>

                              <div class="form-group">
                                  <label>FECHA ENTREGA</label>
                                  <input type="date" required name="datecur" class="form-control" rows="3" placeholder=""></input>
                              </div>

                              <div class="form-group">
                                  <label>RECIBIDO POR:</label>
                                  <input type="text" required name="received_by" class="form-control" rows="3" placeholder=""></input>
                              </div>
                              <!-- <div class="form-group">
                                  <label>NIT</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="nit" onClick="alert('INGRESAR EL NÚMERO DE NIT SIN GUIÓN')"></i>
                                    <input type="text" required name="nit" class="form-control" rows="3" placeholder="Ej: 12345678"></input>
                              </div>
                              <div class="form-group">
                                  <label>CAJA NÚMERO</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NÚMERO DE CAJA A LA QUE PERTENECE EL CUR')"></i>
                                    <input type="text" required name="caja" class="form-control" rows="3" placeholder="Ingresa Nombre de empresa beneficiaria"></input>
                              </div>

                              <div class="form-group">
                                  <label>NUMERO PAGINAS CUR</label> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-question-circle" alt="namecur" onClick="alert('INGRESAR EL NÚMERO DE CAJA A LA QUE PERTENECE EL CUR')"></i>
                                    <input type="text" required name="number_page" class="form-control" rows="3" placeholder="Ingresa Nombre de empresa beneficiaria"></input>
                              </div>

                              <div class="form-group">
                                    <label>DESCRIPCIÓN</label>
                                    <textarea name="description" required class="form-control" rows="3" placeholder="Observaciones adicionales"></textarea>
                                </div> -->
                            
                            
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Entregar Cur</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

