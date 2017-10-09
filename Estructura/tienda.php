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
		<title>Tienda de productos</title>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Usuario: <?php echo $_SESSION['usuario']; ?></a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="cerrarsesion.php">Cerrar Sesión</a></li>
				</ul>
			</div>
		</nav>
		<center><h1>PRODUCTOS</h1></center>
		<div class="container background">
			<div>
				<center>
				<img src="img/carrito.jpg" class="img-rounded" width="200">
				</center>
			</div>
			<div class="container">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id_producto</th>
							<th>Nombre</th>
							<th>Precio</th>
							<th>Descripción</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require('conexion.php');
						$resultado= mysqli_query($conexion,"SELECT * FROM `Productos`");
								while ($renglon= mysqli_fetch_array($resultado)) {
									echo "<tr>";
											echo "<td>".$renglon['id_producto']."</td>";
											echo "<td>".$renglon['nombre']."</td>";
											echo "<td>".$renglon['precio']."</td>";
											echo "<td>".$renglon['descripcion']."</td>";
											echo "<td>".$renglon['cantidad']."</td>";
								}	echo "</tr>";
						?>
					</tbody>
				</table>
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
			<strong>ERROR2!</strong> No puedes estar aquí.
		</div>
		<div class="col-xs-4">
			<a href="gerente.php" class="btn btn-success" role="button">Inicio</a>
		</div>
	</body>
</html>
<?php
							}
						}
					}