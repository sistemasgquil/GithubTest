<?php
include ('conexion.php');

   session_start();
            if (!isset($_SESSION['usuario'])) 
            {
                header("Location: index.php"); // Redirige si el usuario no ha iniciado sesión
            }
$Where="";
 $eluser = $_SESSION['usuario'];

if(!empty($_POST))
{
    $valor=$_POST['campo'];

    if(!empty($valor))
    {
       $Where="  and CL_nombre LIKE '%$valor%'"    ;
       
    }

}

  $sql="Select * from CL_Clientes where CL_estado='A' and US_usuarioPK='$eluser' $Where";
        $resultado=$conn->query($sql);
       
     // echo $eluser;    
?>
<html lang="es">
    <head>
        <meta name="viewport" content="widht=device-width, inicial-scale=1"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/maqueta.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
         <style>
             .activo {
            background-color: blue;
            color: white;
        }

        .inactivo {
            background-color: red;
            color: white;
        }
    </style>
              <script>
            $('#confirm-delete').on('show.bs.modal',function(e){
                $(this).find('.btn-ok').attr('href',$(e.relatedTarget).data('href'));
                
               // $('.debug-url').html('Borrar URL:<strong>'+ $(this).find('btn-ok').attr('href') + '</strong>');
               // $('.debug-url').html('deleteclte.php?=<?php echo $row['id']; ?>'+ $(this).find('btn-ok').attr('href') + '</strong>');
                $('.debug-url').html('deleteclte.php?=<?php echo $row['id']; ?><strong>'+ $(this).find('btn-ok').attr('href') + '</strong>');
            });
        </script
  
        
    </head>
    <body>
        <div class="container">
        
              <div class="row">
                 <h2 style="text-align:center">Mantenimiento de Agenda</h>
            </div>
            
            </br>
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" align=Left>
                 <b>Nombre:</b><input type="text" id="campo" name="campo" placeholder="Nombre a Buscar" />
                 <input type="submit" id="enviar" class="btn btn-info" name="enviar" value="Buscar"/>
             </form>
            </br>
               <div class="row">
                 <a href="nuevoclte.php" class="btn btn-primary" title="Nuevo Cliente...">Nuevo Registro</a>
            </div>
            </br>
            <div class="row-table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Apellidos
                            </th>
                            <th>
                                Tel&eacute;fono
                            </th>
                            <th>
                                Estado
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                          

                        <?php while($row = $resultado->fetch_assoc())
                        {
          
                        //$clase_css = ($row["CL_estado"] == 'A') ? 'activo' : 'inactivo';
                        ?>
                         <tr>
                             <td><?php echo $row["id"]; ?></td>
                            
                            <td><?php echo $row["CL_nombre"]; ?></td>
                            <td><?php echo $row["CL_apellido"]; ?></td>
                            <td><?php echo $row["CL_telf"]; ?></td>
                            <td><b><?php echo $row["CL_estado"]; ?></b></td>
                            
                            <td><a href="modificarclte.php?id=<?php echo $row['id']; ?>"
                                <span class="glyphicon glyphicon-pencil"></span>Modificar</a>
                            </td>
                            
                            <td>
                                <a href="listacitaclte.php?id=<?php echo $row['id']; ?>"
                                <span class="glyphicon glyphicon-search" title="Ver Agenda!"></span>Buscar</a>
            <!--
                                 <a href="#" data-href="deleteclte.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete">
                                <span class="glyphicon glyphicon-trash"></span>
                                     </a>
                -->
               

                            </td>
                         </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
       
        
         <!-- Modal  -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
             <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-tittle" id="myModalLabel">Eliminar Registro</h4>
                    </div>
                    <div class="modal-body">
                        ¿Desea Eliminar el Registro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">Cancelar
                        </button>
                       <button type="button" class="btn btn-danger btn-ok"
                            data-dismiss="modal">Borrar
                        </button>
                       
                        
                    </div>
                </div>
            </div>
       </div>  
      
    </body>
    <footer align="center" class="footer">
        <a href="citasgeneral.php">Todos los Agendados</a>
         <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
        <a href="cerrar_sesion.php">Cerrar Sesión</a>
    </footer>
</html>