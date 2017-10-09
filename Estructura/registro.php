<?php
	require('conexion.php');
	$usuario=$_GET['usuario'];
	$password=$_GET['password'];
	$nombre=$_GET['nombre'];
	$ap_paterno=$_GET['ap_paterno'];
	$ap_materno=$_GET['ap_materno'];
	$edad=$_GET['edad'];
	
	$checandousuario=mysqli_query($conexion,"SELECT * FROM Usuarios WHERE usuario='$usuario'");
	$checar=mysqli_num_rows($checandousuario);
	if($checar>0){
echo '<script language="javascript">alert("El usuario ya existe"); </script>';
}else{
$query = "INSERT INTO `Usuarios` (id_usuario, usuario, nombre, passwd, ap_paterno, ap_materno, edad) VALUES (NULL, '".$usuario."','".$nombre."','".$password."','".$ap_paterno."','".$ap_materno."','".$edad."');";
mysqli_query($conexion,$query);
$query2= "UPDATE Usuarios SET tipo=2 WHERE usuario='$usuario'";
mysqli_query($conexion,$query2);
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
			<strong>Exito!</strong> El usuario se ha creado correctamente.
		</div>
		<div>
			<a href="http://localhost/ProyectoWeb/index.html" class="btn btn-info" role="button">Inicio</a>
		</div>
	</body>
</html>
<?php } ?>