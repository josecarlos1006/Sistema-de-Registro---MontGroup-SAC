<?php
	$busqueda=$_GET["modificar_p"];

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
	$consulta="select * from producto where id_producto='$busqueda'";
	$resultados=mysqli_query($conexion, $consulta);

	echo "<h1 align='center'>Sistema de Registro</h1>";
	echo "<h2 align='center'>Modulo de Modificacion de Productos</h2>";
	while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
		echo "<form action='modificar_producto2.php' method='get'>";
		echo "Código del Producto: <input type='text' name='id_producto_2' value='".$fila['id_producto']."'><br>";
		echo "Nombre del Producto: <input type='text' name='nombre_p_2' value='".$fila['nombre_p']."'><br>";
		echo "Precio: <input type='text' name='precio_p_2' value='".$fila['precio']."'><br>";
		echo "Cantidad: <input type='text' name='cantidad_p_2'
		value='".$fila['cantidad']."'><br>";
		echo "Descripción: <input type='text' name='descripcion_p_2' value='".$fila['descripcion_p']."'><br>";
		echo "<input type='submit' value='Actualizar'>";
		echo "</form>";
	}
	mysqli_close($conexion); //cierra la conexion a la BD

	echo "<br>";  // las comillas para el href en PHP se colocan (\")
	echo "<a href=\"acciones_productos.html\">Volver al formulario de Acciones con Productos</a>";
?>
