<html lang="es">
    <head>
         <meta name="viewport" content="widht=device-width, inicial-scale=1"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/maqueta.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php session_start(); ?>
      
       
    </head>
    <body>
        <div class="container">
              <h2 style="text-align:center">Nuevo registro de Agenda</h>
            </div>
              <form class="form-horizontal" method="POST" action="guardarclte.php" autocomplete="on">
                <div class="form-group">
                    
                 <label for="nombre" class="col-sm-2 control-label">Nombres:</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el Nombre"requied>
                 </div>
                 
                  <label for="apellido" class="col-sm-2 control-label">Apellidos:</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el Apellido"requied>
                 </div>
                 
                      <label for="telf" class="col-sm-2 control-label">Teléfono:</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" id="telf" name="telf" placeholder="Teléfono">
                 </div>
                    <label for="direccion" class="col-sm-2 control-label">Dirección:</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
                 </div>
                 
                  <label for="fechaNac" class="col-sm-2 control-label">Fecha de Nacimiento:</label>
                 <div class="col-sm-10">
                    <input type="Date" class="form-control" id="fechanac" name="fechanac" placeholder="fechanac">
                 
                 </div>
                 
                  <label for="usuario" class="col-sm-2 control-label">usuario:</label>
                 <div class="col-sm-10">
                    <input type="text" value="<?php echo $_SESSION['usuario']; ?>" disabled=true class="form-control" id="usuariopk" name="usuariopk" placeholder="usuario del sistema">
                 </div>
                   <label for="documento" class="col-sm-2 control-label">Documento:</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" title="Id único" id="documento" name="documento" placeholder="Documento de Identidad ¡ IMPORTANTE !">
                 </div>
                 
              </div>
                    <div class="col-sm-offset-2 col-sm-10">
                         <a href="clte.php" class="btn btn-default">Regresar</a>
                         <button type="submit" class="btn btn-primary">Guardar</button>
                     </div>
              
              </form>
              <hr>
              </br>
              </br>
              </br>
               
              
              </div>
          
       
        </div>
    </body>
          <footer align="center" class="footer">
                <a href="clte.php">Regresar</a>
                 <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
                <a href="cerrar_sesion.php">Cerrar Sesión</a>
         </footer>
</html>