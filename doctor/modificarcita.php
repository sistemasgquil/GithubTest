<?php
include("conexion.php");

         $id = $_GET['id'];
$sql="Select * from CL_fechas Where id = '$id'";

session_start();
     if (!isset($_SESSION['usuario'])) 
            {
                header("Location: index.php"); // Redirige si el usuario no ha iniciado sesión
            }   
            
            
      if($_SESSION['usuario']==null){$usuariopk="NA"; $username=$_SESSION['usuario'];}else{$usuariopk=$_SESSION['usuario'];}  
      
               $resultado = $conn->query($sql);
                $row = $resultado->fetch_array(MYSQLI_ASSOC);
       
?>
<html lang="es">
    <head>
        <meta name="viewport" content="widht=device-width, inicial-scale=1"/>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/bootstrap-theme.css" rel="stylesheet">
            <link href="css/maqueta.css" rel="stylesheet">
            <link href="css/linea.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
            <!-- Agrega los enlaces a los archivos JavaScript de Bootstrap, jQuery y Bootstrap Datepicker -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

         <script>
        // Inicializar el control de fecha
        $(document).ready(function(){
            // Control fecha ac
           // $('#fecha').datepicker();
             // Inicializar el control de hora
            $('.clockpicker').clockpicker();
        });
    </script>
        
    </head>
    <body>
        <div class="container">
           
            <div class="row">
                 <h2 style="text-align:center">Modificar Citas del Cliente</h>
                 
            </div>
               <div class="linea-divisoria">
                   <hr>       
               </div>
            <form class="form-horizontal" method="POST" action="updatecitaclte.php" autocomplete="off
            <div class="form-group" align="centers">
            <table colspan="4">
            <tr>
            <td>
            <label for="idunico" class="col-sm-2 control-label">ID:</label>
            </td>
            <td>
             <input type="text" visible=false readonly=true id="id" name="id" value="<?php echo $row['id']; ?>"/>
            </td>
            </tr>
            <tr>
            <td>
               <label for="Observacion" class="col-sm-2 control-label">Observación:</label>
                     
            </td>
            <td>
                <input type="text" class="form-control" id="obs" name="obs" placeholder="Nombre_Observacion"
                value="<?php echo $row['obs']; ?>" requied>
            </td>
            </tr>
            <tr>
            <td>
                <label for="Fecha" class="col-sm-2 control-label">Fecha:</label>
            </td>
            <td>
              <input type="text" class="form-control" id="fecha" title="Formato AAAA-MM-DD" name="fecha" placeholder="Fecha YYYY-mm-dd" value="<?php echo $row['fecha']; ?>" requied>
            </td>
            </tr>
              <td>
                <label for="Hora" class="col-sm-2 control-label">Hora:</label>
            </td>
            <td>
                <input type="text" class="form-control" id="hora" name="hora" placeholder="Hora" value=" <?php echo trim($row['hora']); ?>" >
            </td>
            </tr>
             </tr>
              <td>
                <label for="usuario" class="col-sm-2 control-label">usuario:</label>
            </td>
            <td>
                 <input type="text" disabled=true class="form-control" id="usuariopk" name="usuariopk" placeholder="usuario del sistema" value="<?php echo $_SESSION['usuario'] ?>" >
            </td>
            </tr>
            </table>
            
                  
                 </div>
  
                
              </div>
                <div class="col-sm-offset-2 col-sm-10">
                     <a href="clte.php" title="Regresar a pagina Inicial" class="btn btn-default">Regresar</a>
                     <button type="submit" title="Modificar Cita del Cliente" class="btn btn-primary">Guardar</button>
                 </div>
              
                
            </form>
     
                        
            </div>
</br> </br>
             <div class="linea-divisoria">
                   <hr>       
               </div>
            
            <form class="form-horizontal" method="POST" action="deletecitaclte.php" autocomplete="off>
                    <div class="form-group" align="left">
                         <div class="col-sm-10">
                           <input type="text" hidden=true visible=false readonly=true id="id" name="id" value="<?php echo $row['id']; ?>"/>
                         </div>
                            </br>
                   
                           <div class="col-sm-offset-2 col-sm-10">
                               <h3>¿Deseo Eliminar Cita del Cliente?
                                <button type="submit" title=" Eliminar cita del Cliente " class="btn btn-primary">Eliminar</button>
                               </h3>
                            
                           
                         </div>
                          
                         
                   </div>
                
                  </form>
                   
        </div>
             
            
    </body
    
        <footer align="center" class="footer">
          </br>  
        <center>
                <a href="clte.php">Regresar</a>
                 <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
                <a href="cerrar_sesion.php">Cerrar Sesión</a>
        </center>
         </footer>
</html>

