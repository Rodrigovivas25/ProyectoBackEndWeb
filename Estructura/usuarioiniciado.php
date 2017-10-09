<?php
	require('conexion.php');
	$usuario=$_GET['usuario'];
	$password=$_GET['password'];
	if(empty($_GET['usuario']) || empty($_GET['usuario'])){
		echo "<center>";
		echo "<div class='alert alert-warning'>";
		echo "</div>";
		echo "<a href='index.html' class='btn btn-warning' role='button'>Inicio</a>";
		echo "</center>";
	}else{
		$query=mysqli_query($conexion,"SELECT * FROM Usuarios WHERE usuario='$usuario' and passwd='$password'");
		$exists = $query->num_rows;
		if($exists != 0){
			$row=mysqli_fetch_assoc($query);
			$permiso=$row["tipo"];
			$nombre=$row["nombre"];
			$password=$row["passwd"];
			$ap_paterno=$row["ap_paterno"];
			$ap_materno=$row["ap_materno"];
			$edad=$row["edad"];
			if($permiso==1){
				echo "<center>";
				echo "<div class='alert alert-info'>";
				echo "<strong>Gerente!</strong>Ha iniciado como gerente";
				echo "</div>";
				echo "<a href='index.html' class='btn btn-primary' role'button'>Inicio</a>";
				echo "</center>";
				session_start();
				$_SESSION['usuario']=$usuario;
				$_SESSION['tipo']=$permiso;
				$_SESSION['password']=$password;
				header("Location: gerente.php");
			}elseif ($permiso==2){
				session_start();
				$_SESSION['usuario']=$usuario;
				$_SESSION['nombre']=$nombre;
				$_SESSION['password']=$password;
				$_SESSION['ap_paterno']=$ap_paterno;
				$_SESSION['ap_materno']=$ap_materno;
				$_SESSION['edad']=$edad;
				$_SESSION['tipo']=$permiso;
				header("Location: datos.php");
			}else{
				echo "<center>";
				echo"<div class='alert alert-warning'>";
					echo "<strong>Error</strong> El usuario no existe";
				echo "</div>";
				echo "<a href='index.html' class='btn btn-warning' role='button'>Regresar";
					echo "</center>";
				}
		}else{
					echo "<center>";
					echo"<div class='alert alert-warning'>";
						echo "<strong>Error</strong>El usuario no existe";
					echo "</div>";
					echo "<a href='index.html' class='btn btn-warning' role='button'>Regresar";
						echo "</center>";
			}
				
	}	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sesion iniciada</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<script src="js/jquery-3.2.0.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	
</body>
</html>