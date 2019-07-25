<?php
	$busqueda=$_GET["buscar_s"];

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
  $consulta="select * from servicio where id_servicio LIKE '%$busqueda%'";
	$resultados=mysqli_query($conexion, $consulta);
	echo "<h1 align='center'>Sistema de Registro</h1>";
	echo "<h2 align='center'>Modulo de Consulta de Registros</h2>";
  echo "<table border='2' bordercolor='black' width='80%' align='center'><tr><td width='10%'>";
  echo "Id_Servicio" ."</td><td width='10%'>";
  echo "Nombre del Servicio" ."</td><td width='10%'>";
  echo "Precio" ."</td><td width='10%' align='center'>";
	echo "Fecha de creación" ."</td><td width='10%' align='center'>";
	echo "Hora de creación" ."</td><td width='10%' align='center'>";
  echo "Fecha de última modificación" ."</td><td width='10%'>";
	echo "Hora de última modificación" ."</td><td width='10%'>";
  echo "Descripción" ."</td></tr></table>";
	while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
		echo "<table border='2' bordercolor='black' width='80%' align='center'><tr><td width='10%'>";
		echo $fila['id_servicio'] ."</td><td width='10%'>";
		echo $fila['nombre_s'] ."</td><td width='10%'>";
		echo $fila['precio'] ."</td><td width='10%' align='center'>";
		echo $fila['fecha_cs'] ."</td><td width='10%'>";
		echo $fila['hora_cs'] ."</td><td width='10%'>";
		echo $fila['fecha_ms'] ."</td><td width='10%'>";
		echo $fila['hora_ms'] ."</td><td width='10%'>";
		echo $fila['descripcion_s'] ."</td></tr></table>";
	}
	mysqli_close($conexion); //cierra la conexion a la BD
	echo "<br>";  // las comillas para el href en PHP se colocan (\")
	echo "<a href=\"acciones_servicios.html\">Volver a la pagina anterior</a>";
?>
