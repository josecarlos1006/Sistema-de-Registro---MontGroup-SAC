<?php
  ini_set('date.timezone', 'America/Lima');
	$nombre_s=$_POST["nombre_servicio"];
	$precio_s=$_POST["precio_servicio"];
	$descripcion_s=$_POST["descripcion_servicio"];
  $time1=date('Y-m-d', time());
  $time2=date('H:i:s', time());

	$db_host="localhost";
	$db_nombre="proyecto_mg";
	$db_usuario="root";
	$db_contra="";

  $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);
  //Consulta para insertar
  $insertar = "insert into servicio(nombre_s, precio, fecha_cs, hora_cs, fecha_ms, hora_ms, descripcion_s) values ('$nombre_s', '$precio_s', '$time1', '$time2', '$time1', '$time2', '$descripcion_s')";
  //Ejecturar Consulta
  $resultado= mysqli_query($conexion, $insertar);
  if(!$resultado){
    echo "Error al registrarse";
  }else{
    echo "Servicio registrado exitosamente";
  }
  //Cerrar conexion
  mysqli_close($conexion);
  echo "<br>";
  echo "<a href=\"acciones_productos.html\">Volver al formulario de Registrar Servicio</a>";
?>
