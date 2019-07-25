<?php
  ini_set('date.timezone', 'America/Lima');
  $id_producto=$_GET["id_producto_2"];
	$nombre_p=$_GET["nombre_p_2"];
	$precio_p=$_GET["precio_p_2"];
	$cantidad_p=$_GET["cantidad_p_2"];
	$descripcion_p=$_GET["descripcion_p_2"];
  $time1=date('Y-m-d',time());
  $time2=date('H:i:s', time());

	$db_host="localhost";
	$db_nombre="proyecto_mg";
	$db_usuario="root";
	$db_contra="";

	$conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

	if (mysqli_connect_errno()){
		echo "Fallo al conectar con la BD";
		exit();
	}

	if (empty($_GET['id_producto_2'])==true){
		echo "Error datos no Validos";
	} else {
		mysqli_set_charset($conexion, "utf-8"); // caracteres latinos
		$consulta="update producto set id_producto='$id_producto', nombre_p='$nombre_p', precio='$precio_p', cantidad='$cantidad_p', fecha_mp='$time1', hora_mp='$time2', descripcion_p='$descripcion_p' where id_producto='$id_producto'";

		$resultados=mysqli_query($conexion, $consulta);
		if ($resultados==false){
			echo "Error en la Actualizacion del Registro";
		} else {
			echo "Registro Actualizado";
		}
	}

	mysqli_close($conexion); //cierra la conexion a la BD

	echo "<br>";  // las comillas para el href en PHP se colocan (\")
	echo "<a href=\"acciones_productos.html\">Volver a la pagina anterior</a>";
?>
