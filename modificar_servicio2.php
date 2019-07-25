<?php
  ini_set('date.timezone', 'America/Lima');
  $id_servicio=$_GET["id_servicio_2"];
	$nombre_s=$_GET["nombre_s_2"];
	$precio_s=$_GET["precio_s_2"];
	$descripcion_s=$_GET["descripcion_s_2"];
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

	if (empty($_GET['id_servicio_2'])==true){
		echo "Error datos no Validos";
	} else {
		mysqli_set_charset($conexion, "utf-8"); // caracteres latinos
		$consulta="update servicio set id_servicio='$id_servicio', nombre_s='$nombre_s', precio='$precio_s', fecha_ms='$time1', hora_ms='$time2', descripcion_s='$descripcion_s' where id_servicio='$id_servicio'";

		$resultados=mysqli_query($conexion, $consulta);
		if ($resultados==false){
			echo "Error en la Actualizacion del Registro";
		} else {
			echo "Registro Actualizado";
		}
	}

	mysqli_close($conexion); //cierra la conexion a la BD

	echo "<br>";  // las comillas para el href en PHP se colocan (\")
	echo "<a href=\"acciones_servicios.html\">Volver a la pagina anterior</a>";
?>
