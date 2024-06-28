<?php
include ('conexion.php');

$id = $_POST['id'];
$obs= $_POST['obs'];
$fecha= $_POST['fecha'];
$hora= $_POST['hora'];
$usuariopk=$_POST['usuariopk'];
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
            date_default_timezone_set('America/Lima');
    //echo date('Y-m-d H:i:s');
    $fechaHora = date('Y-m-d H:i:s'); // Formato: Año-Mes-Día Hora:Minuto:Segundo
    $sql = "Update CL_fechas Set obs='$obs', fecha='$fecha',hora='$hora',US_usuariomod='$usuariopk',CL_UltModificacion=Now() Where id='$id'";

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
                        <h2>Registro de Cita modificado con exito!</h2>
                        <?php } else { ?>
                        <h2>Error al Modificar.</h2
                    <?php } ?>
                        <a href="clte.php" class="btn btn-primary">Regresar</a>
                </div>
           </div>
      </div>
        
    </body>
</html>
