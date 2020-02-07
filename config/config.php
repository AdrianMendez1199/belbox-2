<?php

	/*Datos de conexion a la base de datos*/
	// define('DB_HOST', 'us-cdbr-iron-east-04.cleardb.net');//DB_HOST:  generalmente suele ser "127.0.0.1"
	// define('DB_USER', 'b331019a8a83ee');//Usuario de tu base de datos
	// define('DB_PASS', '034922920262915');//Contraseña del usuario de la base de datos
	// define('DB_NAME', 'heroku_6295293fb1cbf1b');//Nombre de la base de datos


    define('DB_HOST', '127.0.0.1');//DB_HOST:  generalmente suele ser "127.0.0.1"
	define('DB_USER', 'root');//Usuario de tu base de datos
	define('DB_PASS', '');//Contraseña del usuario de la base de datos
	define('DB_NAME', 'belbox');//Nombre de la base de datos

    $con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($con, "utf8");
    
    if(!$con){
        @die("<h2 style='text-align:center'>Imposible conectarse a la base de datos! </h2>".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        @die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>
