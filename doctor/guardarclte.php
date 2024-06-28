<?php

include ('conexion.php');
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$telf= $_POST['telf'];
$direccion= $_POST['direccion'];
$fecha_nac=$_POST['fechanac'];
$usuariopk=$_POST['usuariopk'];
$documento=$_POST['documento'];
$estado="A";
$username ="";
//$fechaFormateada = $fecha_nac->format('Y/m/d'); // Cambiar el formato a día/mes/año
session_start();
     if (!isset($_SESSION['usuario'])) 
            {
                header("Location: index.php"); // Redirige si el usuario no ha iniciado sesión
            }// else{session_destroy();}
      if($_SESSION['usuario']==null){$usuariopk="NA"; $username=$_SESSION['usuario'];}else{$usuariopk=$_SESSION['usuario'];}   
      
         date_default_timezone_set('America/Lima');
    //echo date('Y-m-d H:i:s');
    $fechaHora = date('Y-m-d H:i:s'); // Formato: Año-Mes-Día Hora:Minuto:Segundo
   
           $sql = "INSERT INTO CL_Clientes (CL_nombre,CL_apellido,CL_telf,CL_direccion,US_usuarioPK,CL_FechaReg,CL_UltModificacion,US_usuariomod,CL_Documento,CL_estado,CL_fecha_nac) VALUES ('$nombre', '$apellido','$telf','$direccion','$usuariopk',Now(),NULL,NULL,'$documento', '$estado','$fecha_nac')";

        $resultado=$conn->query($sql);
 
?>

<html lang="es">
    <head>
        <meta name="viewport" content="widht=device-width, inicial-scale=1"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/bootstrap-theme.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="row" style="style-align=center">
                    <?php if($resultado){ ?>
                        <h2>Registro guardado con exito!</h2>
                        <?php } else { ?>
                        <h2>Error al Guardar.</h2
                    <?php } ?>
                        <a href="clte.php" class="btn btn-primary">Regresar</a>
                </div>
           </div>
      </div>
        
    </body>
    <footer align="center">
        <p><?php echo 'La fecha y hora actual es: ' . $fechaHora;?>+</p>
    </footer>
</html>
