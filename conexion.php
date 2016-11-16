<?php
		 define('DBHOST', 'localhost');
		 define('DBUSER', 'root');
		 define('DBPASS', 'linuxlinux');
		 define('DBNAME', 'notasapp');
		 
		 $con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

		 if ( !$con ) {
		  die("Error de conexión : " . mysql_error());
		 }
		 
?>