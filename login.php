<?php
	include_once "conexion.php";
	session_start();

	/*if ( isset($_SESSION['user'])!="" ) 
	{
  		header("Location: home.php");
  		exit;
  	}*/

 	$error=false;

 	if( isset($_POST['email']) && isset($_POST['pass']))
 	{
 	$email=trim($_POST['email']);
 	$pass=trim($_POST['pass']);
	}

 	if(empty($email))
 	{
 		$error=true;
 		$emailError="Intrduce tu email";
 	}

  	if(empty($pass))
 	{
 		$error=true;
 		$passError="Intrduce tu contraseña";
 	}

 	if(!$error)
 	{
 		$queryuser="SELECT id, nombre, email, password FROM t_usuarios WHERE email='$email' ";
 		$consulta=mysqli_query($con, $queryuser);

 		if (!$consulta)
 		{
		    die('Invalid query: ' . mysql_error());
		}

 		$fila=mysqli_fetch_array($consulta, MYSQLI_BOTH);
 		$contfila=mysqli_num_rows($consulta);


 		if($contfila == 1 && $fila['password'] == $pass)
 		{
 			$_SESSION['user'] = $fila['id'];
  			header("Location: home.php");
 			exit;
 		}else{
 			$msgError="Datos incorrectos, intenta de nuevo.";
 		}

 	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<title>Login</title>
</head>
<body class="container-fluid">
	<header>
		<h1>TODO</h1>
	</header>
	
	<form method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
		<p>
		<label for="nom">
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
			<input type="submit" value="Entra">
		</label>
		</p>
	</form>

	<p>
		<a href="./registro.php">
			<input type="submit" value="Registrate!">
		</a>
	</p>
</body>
</html>