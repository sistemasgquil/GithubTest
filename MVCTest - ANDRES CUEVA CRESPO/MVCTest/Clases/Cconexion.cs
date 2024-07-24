using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Npgsql;

namespace MVCTest.Clases
{
    public class Cconexion
    {
       public string respconex = string.Empty;
       public NpgsqlConnection npconexion= new NpgsqlConnection();
        static String servidor="localhost";
        static String pusuario= "usuario_consulta"; // postgre
        static String pasword="Sysadm753";
        static String puerto="5432";
        static String bd="estudiante";
        public string cadenaconexion = "Server ="+servidor+";" + "User id=" + pusuario + ";" + "Password=" + pasword + ";" + "Database=" + bd + ";" ;
        // + "port="+ puerto + ";"

        public NpgsqlConnection establececonexion()
        {
            try
            {
                npconexion.ConnectionString = cadenaconexion;
                npconexion.Open();
                respconex = "Conexion correcta psql";
             }
            catch(Exception ex)
            {
                Console.WriteLine("No se pudo conectar a psotgreSQL "+ex.Message);
                respconex= "Error conexion";
            }
            return npconexion;
        }



    }
}