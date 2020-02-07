<?php	
	session_start();
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['fullname'])) {
           $errors = "Nombre vacío";
        }else if (empty($_POST['username'])){
			$errors = "El nombre de usuario";
		} else if (empty($_POST['password'])){
			$errors = "Contraseña vacío";
		} else if (
			!empty($_POST['fullname']) &&
			!empty($_POST['password'])
		){

		require_once("../../config/config.php");//Contiene funcion que conecta a la base de datos
		
		$fullname=$_POST["fullname"];
		$password=sha1(md5($_POST["password"]));
		$username=$_POST["username"];
		$created_at = "NOW()";
		$default_profile="default.png";
		$sqls = "select * from user where (username= \"$username\")";
		$users = mysqli_query($con,$sqls);
		$count = mysqli_num_rows($users);
		$is_admin = $_POST['is_admin'];


		if ($count>0){
				$error  = "El nombre de usuario, ya se encuentra registrado";
			}else{

			$sql = "insert into user (fullname,username,is_admin,password,image,created_at) ";
			$sql .= "value (\"$fullname\",\"$username\",\"$is_admin\",\"$password\",\"$default_profile\",$created_at)";
		   
		
			$query_new_insert = mysqli_query($con,$sql);
				if ($query_new_insert){
					$messages = base64_encode("El registro ha sido ingresado satisfactoriamente.");
				} else{
					$error = "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
				}
			}	
			
		}else{
			$error  = "Error desconocido.";
		}
		
		if (isset($error)){
			 header("location: ..././newuser.php?error=$error");
		}
		
		if (isset($messages)){
			 header("location: ../../home.php?success=$messages"); 
		}
				
?>
				
