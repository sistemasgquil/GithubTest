<?php
include ('conexion.php');

   session_start();
            if (!isset($_SESSION['usuario'])) 
            {
                header("Location: index.php"); // Redirige si el usuario no ha iniciado sesión
            }
$Where="";
$ordenar=" order by fecha asc";
 $eluser = $_SESSION['usuario'];

if(!empty($_POST))
{
    $valor=$_POST['campo'];

    if(!empty($valor))
    {
       $Where="  and c.CL_apellido LIKE '%$valor%'"    ;
       
    }

}

  $sql="Select d.id,d.CL_idobs,c.CL_nombre,c.CL_apellido,c.CL_telf,d.fecha,d.hora,d.obs from CL_Clientes c inner join CL_fechas d on c.id=d.CL_idobs
  where c.CL_estado='A' and d.CL_estado='A' 
  and c.US_usuarioPK='$eluser' $Where $ordenar";
        $resultado=$conn->query($sql);
       
     // echo $eluser;    
?>
<html lang="es">
    <head>
        <meta name="viewport" content="widht=device-width, inicial-scale=1"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/bootstrap-theme.css" rel="stylesheet">
            <link href="css/maqueta.css" rel="stylesheet">
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
            
                $('.debug-url').html('deleteclte.php?=<?php echo $row['id']; ?><strong>'+ $(this).find('btn-ok').attr('href') + '</strong>');
            });
        </script
  
        
    </head>
    <body>
        <div class="container">
           
            <div class="row">
                 <h2 style="text-align:center">Listado de General de Agendados</h>
            </div>
            </br>
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" align=Left>
                 <b>Apellidos:</b><input type="text" id="campo" name="campo" placeholder="Apellido a Buscar" />
                 <input type="submit" id="enviar" class="btn btn-info" name="enviar" value="Buscar"/>
             </form>
            </br>
          
            </br>
            <div class="row-table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Hora
                            </th>
                            <th>
                                Obs
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Apellido
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                          

                        <?php while($row = $resultado->fetch_assoc())
                        {
          
                        ?>
                         <tr>
                             <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["fecha"]; ?></td>
                            <td><?php echo $row["hora"]; ?></td>
                            <td><?php echo $row["obs"]; ?></td>
                            <td><?php echo $row["CL_nombre"]; ?></td>
                            <td><?php echo $row["CL_apellido"]; ?></td>
                            
                       
                            
                            <td><a href="modificarcita.php?id=<?php echo $row['id']; ?>"
                                <span class="glyphicon glyphicon-pencil"></span>ModificarCita</a>
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
        <a href="clte.php"> Regresar..</a>
         <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
        <a href="cerrar_sesion.php">Cerrar Sesión</a>
    </footer>
</html>