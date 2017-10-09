<?php
	require('conexion.php');
	require('sesion.php');
	$id_producto=$_GET['id_producto'];
	$cantidad=$_GET['cantidad'];
	$query="UPDATE Productos SET cantidad='$cantidad' WHERE id_producto='$id_producto'";
	mysqli_query($conexion,$query);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registro exitoso</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilos.css">
		<script src="js/jquery-3.2.0.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="alert alert-success">
			<strong>Exito!</strong> La cantidad del producto se ha modificado.
		</div>
		<div>
			<a href="http://localhost/ProyectoWeb/gerente.php" class="btn btn-info" role="button">Inicio</a>
		</div>
	</body>
</html>