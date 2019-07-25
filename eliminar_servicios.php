<?php
	$id_servicio=$_GET["eliminar_s"];

	$db_host="localhost";
	$db_nombre="proyecto_mg";
	$db_usuario="root";
	$db_contra="";

	$conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

	if (mysqli_connect_errno()){
		echo "Fallo al conectar con la BD";
		exit();
	}

	if (empty($_GET['eliminar_s'])==true){
		echo "Error dato no Valido";
	} else {
		mysqli_set_charset($conexion, "utf-8"); // caracteres latinos
		$consulta="delete from servicio where id_servicio='$id_servicio'";
		$resultados=mysqli_query($conexion, $consulta);
		if ($resultados==false){
			echo "Error en la eliminacion";
		} else {
			echo "Registro Eliminado";
		}
	}

	mysqli_close($conexion); //cierra la conexion a la BD

	echo "<br>";  // las comillas para el href en PHP se colocan (\")
	echo "<a href=\"acciones_servicios.html\">Volver al formulario de Acciones servicios</a>";
?>
