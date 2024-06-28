<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
   <link rel="stylesheet" type="text/css" href="css\css_login.css"> 
          <link href="css/maqueta.css" rel="stylesheet">

</head>
<body>
   
      <div class="container" id="container" align="center">
        
                
                 <div class="left-side">
                        <img src="imagenes/Lapto1.jpg" alt="Fondo de pantalla">
                </div>
          <h2>Iniciar Sesión</h2>
                
            <form action="procesar_login.php" method="POST">
                <table>
                   <td>
                <div class="form-group">
                    <label class="label" for="usuario">Usuario:</label>
                    <input type="text" name="usuario" text="" required><br><br>
               </div> 
                   </td> 
                 
                   <tr>
                      
                         <td>
                              <div class="form-group">
                                <label for="contrasena">Contraseña:</label>
                                 <input type="password" name="contrasena" text="" required><br><br>
                            </div>
                        </td>
                   </tr>
                   <tr>
                         <td>
                            <div class="form-group">
                                 <input type="submit" title="Ingresar al sistema" class="btn btn-primary" value="Iniciar Sesión">
                            </div>
                        </td>
                   </tr>
               </div>
                </table>
            </form>
     </div>
</body>
<footer align="center" class="footer">
   <a href="https://sistemasgquil.es/">Contactos/Ayuda</a>
</footer>
</html>
