<?php
include("conexion.php");
$id = $_GET['id'];
$sql="Select * from CL_Clientes Where id = '$id'";
session_start();
     if (!isset($_SESSION['usuario'])) 
            {
                header("Location: index.php"); // Redirige si el usuario no ha iniciado sesión
            }// else{session_destroy();}
      if($_SESSION['usuario']==null){$usuariopk="NA"; $username=$_SESSION['usuario'];}else{$usuariopk=$_SESSION['usuario'];}  
      
               $resultado = $conn->query($sql);
                $row = $resultado->fetch_array(MYSQLI_ASSOC);
        
          
?>
<html lang="es">
    <head>
        <meta name="viewport" content="widht=device-width, inicial-scale=1"/>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/bootstrap-theme.css" rel="stylesheet">
            <link href="css/linea.css" rel="stylesheet">
            <link href="css/maqueta.css" rel="stylesheet">
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
            $('#fecha').datepicker();
             // Inicializar el control de hora
            $('.clockpicker').clockpicker();
        });
    </script>
        
    </head>
    <body>
           <div class="container">
           
            <div class="row">
                 <h2 style="text-align:center">Modificar el Cliente</h>
            </div>
            <form class="form-horizontal" method="POST" action="updateclte.php" autocomplete="off
                 
                 
            <div class="form-group">
                
                     <label for="nombre" class="col-sm-2 control-label">Nombres:</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                        value="<?php echo $row['CL_nombre']; ?>" requied>
                     </div>
                                                         
                
                
                  <label for="apellido" class="col-sm-2 control-label">Apellidos:</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido"    value="<?php echo $row['CL_apellido']; ?>" requied>
                 </div>
                      <label for="telf" class="col-sm-2 control-label">Teléfono:</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" id="telf" name="telf" placeholder="Telefono" value=" <?php echo trim($row['CL_telf']); ?>" >
                 </div>
                    <label for="direccion" class="col-sm-2 control-label">Dirección:</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" value="<?php echo trim($row['CL_direccion']); ?>" >
                 </div>
                  <label for="fechaNac" class="col-sm-2 control-label">Fecha de Nacimiento:</label>
                 <div class="col-sm-10">
                    <input type="Date" class="form-control" id="fechanac" name="fechanac" placeholder="fecha DE Nacimiento"  value="<?php echo $row['CL_fecha_nac']; ?>" >
                 
                 </div>
                  <label for="usuario" class="col-sm-2 control-label">usuario:</label>
                 <div class="col-sm-10">
                    <input type="text" disabled=true class="form-control" id="usuariopk" name="usuariopk" placeholder="usuario del sistema" value="<?php echo $_SESSION['usuario'] ?>" >
                 </div>
                   <label for="documento" class="col-sm-2 control-label">Documento:</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" id="documento" name="documento" placeholder="Documento Cedula_Ruc" value="<?php echo $row['CL_documento']; ?>" >
                 </div>
                   <label for="idunico" class="col-sm-2 control-label">ID:</label>
                 <div class="col-sm-10">
                   <input type="text" visible=false readonly=true id="id" name="idpk" value="<?php echo $row['id']; ?>"/>
                 </div>
                 
                
              </div>
                <div class="col-sm-offset-2 col-sm-10">
                     <a href="clte.php" title="Regresar a pagina Inicial" class="btn btn-default">Regresar</a>
                     <button type="submit" title="Modificar Cliente" class="btn btn-primary">Guardar</button>
                 </div>
              
                
            </form>
             </br>
                  <form class="form-horizontal" method="POST" action="deleteclte.php" autocomplete="off>
                    <div class="form-group" align="left">
                         <div class="col-sm-10">
                           <input type="text" hidden=true visible=false readonly=true id="id" name="id" value="<?php echo $row['id']; ?>"/>
                         </div>
                            </br>
                      
                           <div class="col-sm-offset-2 col-sm-10">
                               <h3>¿Deseo Eliminar el Registro de Cliente?
                                <button type="submit" title="Eliminar Cliente si no tiene historial de agendamientos" class="btn btn-primary">Eliminar</button>
                               </h3>
                            
                           
                         </div>
                          
                         
                   </div>
                
                  </form>
                  </br>
         </br>
         </br>
                   <div class="linea-divisoria">
                                    <hr>       
                             </div>
                         <form class="form-horizontal" method="POST" action="guardacitaclte.php" autocomplete="on">
                    <h3 align="center">Nuevo Control de Fechas de Agendamiento:</h3>
                    
                    <div class="form-group">
                        <label for="usuario" class="col-sm-2 control-label">Agendamiento:</label>
                         <div class="col-sm-10">
                             <input type="text" visible=false readonly=true id="id" name="idpk" value="<?php echo $row['id']; ?>"/>  
                            <input type="text" class="form-control" rows="2" id="obs" title="Ingrese una Observación" name="obs" placeholder="Observación de Agendado">
                       
                      
                     </div>
                    
                     
                   <div class="form-group">
                       <label for="fechaobs" class="col-sm-2 control-label">Selecciona una fecha:</label>
                        <div class="col-sm-10">
                            
                             <input type="Date" class="form-control" id="fechaobs" name="fechaobs" placeholder="Fecha del agendamiento">
                           </div>  
                        
                        <label for="hora" class="col-sm-2 control-label">Selecciona una hora:</label>  
                            <div class="col-sm-10">
                                <input type="time" id="hora" class="form-control" name="hora" placeholder="Ponga la hora">
                                 <input type="text" disabled=true class="form-control" id="usuariopk" name="usuariopk" placeholder="usuario del sistema" value="<?php echo $_SESSION['usuario'] ?>" >
                            </div>
                       </div>
                   
                       
                        
                   </div>
                   
                </div>
                 <div class="col-sm-offset-2 col-sm-10">
            
                         <button type="submit" title="Guardar fecha de agendamiento" class="btn btn-primary">Guardar</button>
                     </div>
              
                </form>  
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            
    </body>
 
</html>

