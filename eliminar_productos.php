<?php
	$id_producto=$_GET["eliminar_p"];

	$db_host="localhost";
	$db_nombre="proyecto_mg";
	$db_usuario="root";
	$db_contra="";

	$conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

	if (mysqli_connect_errno()){
		echo "Fallo al conectar con la BD";
		exit();
	}

	if (empty($_GET['eliminar_p'])==true){
		echo "Error dato no Valido";
	} else {
		mysqli_set_charset($conexion, "utf-8"); // caracteres latinos
		$consulta="delete from producto where id_producto='$id_producto'";
		$resultados=mysqli_query($conexion, $consulta);
		if ($resultados==false){
			echo "Error en la eliminacion";
		} else {
			echo "Registro Eliminado";
		}
	}

	mysqli_close($conexion); //cierra la conexion a la BD

	echo "<br>";  
	echo "<a href=\"acciones_productos.html\">Volver al formulario de Acciones productos</a>";
?>
