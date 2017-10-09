<?php
require('sesion.php');
require('conexion.php');
if (!isset($_SESSION['usuario'])) {
	if (!isset($_SESSION['password'])) {
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>ERROR</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/chuntarostyle.css">
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.js"></script>
	</head>
	<body>
		<div class="alert alert-warning">
			<strong>ERROR 0!</strong> No puedes estar aquí.
		</div>
		<div class="col-xs-4">
			<a href="index.html" class="btn btn-success" role="button">Inicio</a>
		</div>
	</body>
</html>
<?php
}
}
else{
?>
<?php
$usuario=$_SESSION['usuario'];
$password=$_SESSION['password'];
$query=mysqli_query($conexion,"SELECT * FROM Usuarios WHERE usuario='$usuario' and passwd='$password'");
$renglon= mysqli_fetch_assoc($query);
$permiso=$renglon["tipo"];
if ($permiso==2) {
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilos.css">
		<script src="js/jquery-3.2.0.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<title>Datos del usuario</title>
	</head>
	<body>
		<div>
			<center><h1>DATOS DEL USUARIO</h1></center>
		</div>
		<div class="container">
			<div>
				<center>
				<img src="img/usuario.jpg" class="img-circle" width="400">
				</center>
			</div>
			<ul class="list-group">
				<li class="list-group-item">Usuario: <?php echo $_SESSION['usuario']; ?> </li>
				<li class="list-group-item">Nombre: <?php echo $_SESSION['nombre']; ?> </li>
				<li class="list-group-item">Apellido Paterno: <?php echo $_SESSION['ap_paterno']; ?> </li>
				<li class="list-group-item">Apellido Materno: <?php echo $_SESSION['ap_materno']; ?> </li>
				<li class="list-group-item">Edad: <?php echo $_SESSION['edad']; ?> </li>
			</ul>
			<br>
			<div class="footer">
				<a href="http://localhost/ProyectoWeb/cerrarsesion.php" class="btn btn-success" role="button">Cerrar Sesion</a>
				<a href="http://localhost/ProyectoWeb/tienda.php" class="btn btn-info" role="button">Mostrar productos</a>
			</div>
		</div>
	</body>
</html>
<?php
						}
						else{
							if ($permiso==1) {
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>ERROR</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/chuntarostyle.css">
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.js"></script>
	</head>
	<body>
		<div class="alert alert-warning">
			<strong>ERROR!</strong> No puedes estar aquí.
		</div>
		<div class="col-xs-4">
			<a href="datos.php" class="btn btn-success" role="button">Inicio</a>
		</div>
	</body>
</html>
<?php
							}
						}
					}