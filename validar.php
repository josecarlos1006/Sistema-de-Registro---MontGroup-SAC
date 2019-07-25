<?php
  //Recibimos de los campos usuario y contraseña del formulario de inicio de sesión y lo almacenamos en las variables declaradas
  $usuario=$_POST['usuario'];
  $contra=$_POST['contra'];

  //Declaramos las variables para realizar la conexión a la base de datos
  $db_host="localhost";
	$db_nombre="proyecto_mg";
	$db_usuario="root";
	$db_contra="";

  //conexion a la base de datos
  $conexion=mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);
	if (mysqli_connect_errno()){
		echo "Fallo al conectar con la BD";
		exit();
	}

  //Almacenamos en la variable una consulta sql de la tabla usuario
  $consulta="SELECT * FROM usuario WHERE usuario='$usuario' and clave='$contra'";
  //Ejecutamos la conexion y la consulta almacenando en la variable $resultado
  $resultado=mysqli_query($conexion, $consulta);

  //Me va a obtener el número de filas y si se realiza la conexión me devolverá un dato que se almacenará en la variable $filas
  $filas=mysqli_num_rows($resultado);

  if(isset($_COOKIE["block".$usuario])){
    echo "Usuario $usuario está bloqueado por 1 minuto";
  }else{

    if ($filas==1) {
      header("location:inicio.html"); //Nos redireccionará a otra pagina si encuentra el registro
    }else {
      //echo "Error en la autentificación"; En caso no encuentre ningún dato nos enviará un dato de error
      if(isset($_COOKIE["$usuario"])){
        $cont = $_COOKIE["$usuario"];
        $cont++;
        setcookie($usuario, $cont,time()+ 120);
        if($cont >=3){
          setcookie("block".$usuario,$cont,time()+60);
        }
      }else{
        setcookie($usuario,1,time()+120);
      }
    }
  }

  mysqli_free_result($resultado); //Me libera los resultados para que no consuma espacio en memoria
  mysqli_close($conexion); //Me cerrará la conexión para que no quede en memoria y no consuma demasiados recursos

 ?>
