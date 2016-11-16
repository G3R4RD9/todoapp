<?php
	session_start();
 	/*if( isset($_SESSION['user'])!="" )
 	{
 		 header("Location: home.php");
 	}
 	*/
 	include_once 'conexion.php';

 	$error = false;

 	if( isset($_POST['btn_registro']) )
 	{

 		if( isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['pass']))
 	 	{
 	 		$nom=trim($_POST['nom']);
 			$email=trim($_POST['email']);
 			$pass=trim($_POST['pass']);
		}


		  if (empty($nom)) 
		  {
   				$error = true;
   				$nomError = "Introduce tu nombre.";
   		  }

		  if (!filter_var($email,FILTER_VALIDATE_EMAIL) ) 
		  {
   				$error = true;
   				$emailError = "Introduce un email válido.";
   		  }

		  if (empty($pass)) 
		  {
   				$error = true;
   				$passError = "Introduce tu password.";
   		  }




   		  if(!$error)
   		  {
   		  	$query="INSERT INTO t_users(nombre, email, password) VALUES ('$nom', '$email', '$pass')";
   		  	$consulta=mysqli_query($con, $query);
   		  	if($consulta == TRUE)
   		  	{
			    $errTyp = "success";
			    $msgError = "Registro satisfactorio! Ya puedes iniciar sesión!";
			    unset($nom);
			    unset($email);
			    unset($pass);
   		  	}else{
			    $errTyp = "danger";
			    $msgError = "Ups! Algo ha ido mal, intentalo de nuevo..."; 
   		  	}
   		  }
 	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<title>Registro</title>
</head>
<body class="container-fluid">
<header>
		<h1>TODO</h1>
		<h3>Registro</h3>
	</header>
	
	<form method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
		<p>
		<label for="nom">
			NOM:<input type="text" name="nom">
		</label>
		<span><?php if(isset($nomError))  echo $nomError; ?></span>
		</p>

		<p>
		<label for="email">
			Email:<input type="text" name="email">
		</label>
		<span><?php if(isset($emailError))  echo $emailError; ?></span>
		</p>

		<p>
		<label for="password">
			Password:<input type="password" name="pass">
		</label>
		<span><?php if(isset($passError))  echo $passError; ?></span>
		</p>
		<span><p><?php if(isset($msgError))  echo $msgError; ?></p></span>

		<p>
		<label for="boton">
			<button type="submit" name="btn_registro">Registrate!</button>
		</label>
		</p>
	</form>
	
</body>
</html>