<?php
  ini_set('date.timezone', 'America/Lima');
	$nombre_p=$_POST["nombre_producto"];
	$precio_p=$_POST["precio_producto"];
	$cantidad_p=$_POST["cantidad_producto"];
	$descripcion_p=$_POST["descripcion_producto"];
  $time1=date('Y-m-d',time());
  $time2=date('H:i:s', time());
	$db_host="localhost";
	$db_nombre="proyecto_mg";
	$db_usuario="root";
	$db_contra="";

  $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);
  //Consulta para insertar
  $insertar = "insert into producto(nombre_p, precio, cantidad, fecha_cp, hora_cp, fecha_mp, hora_mp, descripcion_p) values ('$nombre_p', '$precio_p', '$cantidad_p', '$time1','$time2', '$time1', '$time2', '$descripcion_p')";
  //Ejecturar Consulta
  $resultado= mysqli_query($conexion, $insertar);
  if(!$resultado){
    echo "Error al registrarse";
  }else{
    echo "Producto registrado exitosamente a las: ".$time2.'<br>';
  }
  //Cerrar conexion
  mysqli_close($conexion);
  echo "<br>";
  echo "<a href=\"registrar_producto.html\">Volver al formulario de Registrar Producto</a>";
?>
