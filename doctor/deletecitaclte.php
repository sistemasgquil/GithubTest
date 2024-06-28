<?php
include('conexion.php');
$id = $_POST['id'];
//$usuariopk=$_POST['usuariopk2'];
$estado="I";// AI
       if($id<1)
        {
            echo"No hay datos para Eliminar";
            return;
        }
      

       $sql = "Update CL_fechas Set CL_estado='$estado',CL_UltModificacion=Now() Where id='$id'";

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
                        <h2>Registro Eliminado con exito!</h2>
                        <?php } else { ?>
                        <h2>Error al Eliminar.</h2
                    <?php } ?>
                        <a href="clte.php" class="btn btn-primary">Regresar</a>
                </div>
           </div>
      </div>
        
    </body>
</html>
