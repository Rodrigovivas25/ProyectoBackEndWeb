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
			<strong>ERROR!</strong> No puedes estar aquí.
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
if ($permiso==1) {
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
		<title>Gerente</title>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Gerente: <?php echo $_SESSION['usuario']; ?></a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="cerrarsesion.php">
						<span class="glyphicon glyphicon-log-out"></span>
					Cerrar Sesión</a></li>
				</ul>
			</div>
		</nav>
		<div class="container background">
			<h2>GERENTE</h2>
			<p>Administración de la página. Puede realizar cualquiera de las siguientes opciones.</p>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Administración de gerentes</a></li>
				<li><a data-toggle="tab" href="#menu1">Eliminar Usuarios</a></li>
				<li><a data-toggle="tab" href="#menu2">Administración de productos</a></li>
				<li><a data-toggle="tab" href="#menu3">Aumentar Productos</a></li>
			</ul>
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<p>Se muestran a continuación los Usuarios definidos. Los que tienen permiso 1 son los gerentes. Permiso 2 es para usuarios comunes.</p>
					<div class="container">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Usuario</th>
									<th>Nombre</th>
									<th>Apellido Paterno</th>
									<th>Apellido Materno</th>
									<th>Edad</th>
									<th>Permiso</th>
								</tr>
							</thead>
							<tbody>
								<?php
								require('conexion.php');
								$resultado= mysqli_query($conexion,"SELECT * FROM `Usuarios`");
										while ($renglon= mysqli_fetch_array($resultado)) {
											echo "<tr>";
															echo "<td>".$renglon['usuario']."</td>";
															echo "<td>".$renglon['nombre']."</td>";
															echo "<td>".$renglon['ap_paterno']."</td>";
															echo "<td>".$renglon['ap_materno']."</td>";
															echo "<td>".$renglon['edad']."</td>";
															echo "<td>".$renglon['tipo']."</td>";
												}	echo "</tr>";
								?>
							</tbody>
						</table>
					</div>
					<h2>Agregar gerentes</h2>
					<form action="registrogerente.php" method="GET">
						<div class="form group">
							<label for="usuario">Usuario:</label>
							<input type="text" class="form-control" placeholder="Introduce el usuario" name="usuario">
						</div>
						<div class="form group">
							<label for="pwd">Contraseña:</label>
							<input type="password" class="form-control" placeholder="Introduce la contraseña" name="password">
						</div>
						<div class="form group">
							<label for="nombre">Nombre:</label>
							<input type="text" class="form-control" placeholder="Ingresa el nombre" name="nombre">
						</div>
						<div class="form group">
							<label for="paterno">Apellido Paterno:</label>
							<input type="text" class="form-control" placeholder="Ingresa el apellido paterno" name="ap_paterno">
						</div>
						<div class="form group">
							<label for="materno">Apellido Materno:</label>
							<input type="text" class="form-control" placeholder="Ingresa el apellido materno" name="ap_materno">
						</div>
						<div class="form group">
							<label for="edad">Edad:</label>
							<input type="text" class="form-control" placeholder="Ingresa la edad" name="edad">
						</div>
						<br>
						<div class="footer">
							<input type="submit" class="btn btn-primary" name="submit" value="Agregar">
						</div>
					</form>
					<h2>Quitar gerente</h2>
					<p>Introduce el nombre de usuario del gerente que quieres eliminar.</p>
					<form action="borrarusuario.php" method="GET">
						<div class="form group">
							<label for="usuario">Usuario:</label>
							<input type="text" class="form-control" placeholder="Introduce el usuario" name="usuario">
						</div>
						<br>
						<div class="footer">
							<input type="submit" class="btn btn-primary" name="submit" value="Quitar">
						</div>
					</form>
				</div>
				<div id="menu1" class="tab-pane fade">
					<h2>Eliminar usuarios comunes</h2>
					<p>Introduce el nombre de usuario del Usuario común que quieres eliminar.</p>
					<form action="borrarusuario.php" method="GET">
						<div class="form group">
							<label for="usuario">Usuario:</label>
							<input type="text" class="form-control" placeholder="Introduce el usuario" name="usuario">
						</div>
						<br>
						<div class="footer">
							<input type="submit" class="btn btn-primary" name="submit" value="Quitar">
						</div>
					</form>
				</div>
				<div id="menu2" class="tab-pane fade">
					<h2>Agregar productos</h2>
					<div class="container">
						<p>A continuación se muestra una lista de productos ya disponibles</p>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID del producto</th>
									<th>Nombre</th>
									<th>Precio</th>
									<th>Descripción</th>
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
											}	echo "</tr>";
								?>
							</tbody>
						</table>
					</div>
					<form action="productos.php" method="GET">
						<div class="form group">
							<label for="id">ID del producto:</label>
							<input type="text" class="form-control" placeholder="Ingresa el ID del producto" name="id_producto">
						</div>
						<div class="form group">
							<label for="nombre">Nombre del producto:</label>
							<input type="text" class="form-control" placeholder="Ingresa el nombre del producto" name="nombre">
						</div>
						<div class="form group">
							<label for="precio">Precio:</label>
							<input type="text" class="form-control" placeholder="Ingresa el precio del producto" name="precio">
						</div>
						<div class="form group">
							<label for="descripcion">Descripción:</label>
							<input type="text" class="form-control" placeholder="Ingresa una descripción del producto" name="descripcion">
						</div>
						<div class="form group">
							<label for="cantidad">Cantidad:</label>
							<input type="text" class="form-control" placeholder="Ingresa la cantidad que se tendrá de este producto" name="cantidad">
						</div>
						<br>
						<div class="footer">
							<input type="submit" class="btn btn-primary" name="submit" value="Agregar">
						</div>
					</form>
					<h2>Quitar productos</h2>
					<p>Ingresa el ID del producto que deseas eliminar.</p>
					<form action="borrarproductos.php" method="GET">
						<div class="form group">
							<label for="id_producto">ID del producto:</label>
							<input type="text" class="form-control" placeholder="Introduce el ID del producto" name="id_producto">
						</div>
						<br>
						<div class="footer">
							<input type="submit" class="btn btn-primary" name="submit" value="Quitar">
						</div>
					</form>
				</div>
				<div id="menu3" class="tab-pane fade">
					<h2>Aumentar productos</h2>
					<p>Ingresa el ID del producto del cual deseas agregar cantidad</p>
					<form action="aumentarproductos.php" method="GET">
						<div class="form group">
							<label for="id">ID del producto:</label>
							<input type="text" class="form-control" placeholder="Ingresa el ID del producto" name="id_producto">
						</div>
						<div class="form group">
							<label for="cantidad">Cantidad del producto:</label>
							<input type="text" class="form-control" placeholder="Ingresa la cantidad que deseas tener del producto" name="cantidad">
						</div>
						<br>
						<div>
							<input type="submit" class="btn btn-primary" name="submit" value="Aumentar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
				}
				else{
					if ($permiso==2) {
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
					
?>