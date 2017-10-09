<?php
  require('conexion.php');
  require('sesion.php');
  $id_producto=$_GET['id_producto'];
  $nombre=$_GET['nombre'];
  $precio=$_GET['precio'];
  $descripcion=$_GET['descripcion'];
  $cantidad=$_GET['cantidad'];
  $checandoproducto=mysqli_query($conexion,"SELECT * FROM Productos WHERE id_producto='$id_producto'");
  $checar=mysqli_num_rows($checandoproducto);
  if($checar>0){
echo '<script language="javascript">alert("El producto ya existe!"); </script>';
}else{
$query = "INSERT INTO `Productos` (id_producto, nombre, precio, descripcion, cantidad) VALUES ('".$id_producto."','".$nombre."','".$precio."','".$descripcion."','".$cantidad."');";
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
      <strong>Exito!</strong> El producto se ha registrado correctamente.
    </div>
    <div>
      <a href="http://localhost/ProyectoWeb/gerente.php" class="btn btn-info" role="button">Inicio</a>
    </div>
  </body>
</html>
<?php } ?>