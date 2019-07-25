<?php
	$busqueda=$_GET["modificar_s"];

	$db_host="localhost";
	$db_nombre="proyecto_mg";
	$db_usuario="root";
	$db_contra="";

	$conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

	if (mysqli_connect_errno()){
		echo "Fallo al conectar con la BD";
		exit();
	}
	mysqli_set_charset($conexion, "utf-8"); // caracteres latinos
	$consulta="select * from servicio where id_servicio='$busqueda'";
	$resultados=mysqli_query($conexion, $consulta);

	echo "<h1 align='center'>Sistema de Registro</h1>";
	echo "<h2 align='center'>Modulo de Modificacion de Servicios</h2>";
	while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
		echo "<form action='modificar_servicio2.php' method='get'>";
		echo "Código del Servicio: <input type='text' name='id_servicio_2' value='".$fila['id_servicio']."'><br>";
		echo "Nombre del Servicio: <input type='text' name='nombre_s_2' value='".$fila['nombre_s']."'><br>";
		echo "Precio: <input type='text' name='precio_s_2' value='".$fila['precio']."'><br>";
		echo "Descripción: <input type='text' name='descripcion_s_2' value='".$fila['descripcion_s']."'><br>";
		echo "<input type='submit' value='Actualizar'>";
		echo "</form>";
	}
	mysqli_close($conexion); //cierra la conexion a la BD

	echo "<br>";  // las comillas para el href en PHP se colocan (\")
	echo "<a href=\"acciones_servicios.html\">Volver al formulario de Acciones con Servicios</a>";
?>
