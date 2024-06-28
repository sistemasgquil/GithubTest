<?php
include ('conexion.php');

$id = $_POST['idpk'];
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$telf= $_POST['telf'];
$direccion= $_POST['direccion'];
$fecha_nac=$_POST['fechanac'];
$usuariopk=$_POST['usuariopk'];
$documento=$_POST['documento'];
$estado="A";
session_start();
     if (!isset($_SESSION['usuario'])) 
            {
                header("Location: index.php"); // Redirige si el usuario no ha iniciado sesión
            }// else{session_destroy();}
      if($_SESSION['usuario']==null){$usuariopk="NA"; $username=$_SESSION['usuario'];}else{$usuariopk=$_SESSION['usuario'];}  
        
        if($id<1)
        {
            echo"No hay datos para modificarlo";
            return;
        }
        
    $sql = "Update CL_Clientes Set CL_nombre='$nombre', CL_apellido='$apellido',CL_fecha_nac='$fecha_nac',CL_telf='$telf',CL_direccion='$direccion',US_usuariomod='$usuariopk',CL_documento='$documento',CL_estado='$estado',CL_UltModificacion=Now() Where id='$id'";

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
                        <h2>Registro modificado con exito!</h2>
                        <?php } else { ?>
                        <h2>Error al Modificar.</h2
                    <?php } ?>
                        <a href="clte.php" class="btn btn-primary">Regresar</a>
                </div>
           </div>
      </div>
        
    </body>
</html>
