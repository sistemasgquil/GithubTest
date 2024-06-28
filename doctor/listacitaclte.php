<?php
include ('conexion.php');

   session_start();
            if (!isset($_SESSION['usuario'])) 
            {
                header("Location: index.php"); // Redirige si el usuario no ha iniciado sesión
            }
            
$id = $_GET['id'];
$Where="";
$ordenar=" order by fecha asc";
 $eluser = $_SESSION['usuario'];



  $sql="Select d.id,d.CL_idobs,c.CL_nombre,c.CL_apellido,c.CL_telf,d.fecha,d.hora,d.obs from CL_Clientes c inner join CL_fechas d on c.id=d.CL_idobs
  where c.CL_estado='A' and d.CL_estado='A' 
  and c.US_usuarioPK='$eluser' and d.CL_idobs='$id' $ordenar";
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
                 <h2 style="text-align:center">Listado de Especifico de Agendados</h>
            </div>
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
                            
                          </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
       
    </body>

           <footer align="center" class="footer">
        <a href="citasgeneral.php">Todos los Agendados</a>
         <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
        <a href="cerrar_sesion.php">Cerrar Sesión</a>
    </footer>
</html>