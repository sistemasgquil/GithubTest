using MVCTest.Clases;
using Npgsql;
using System;
using System.Collections.Generic;
using System.Configuration.Provider;
using System.Data.Entity;
using System.EnterpriseServices;
using System.Linq;
using System.Web;

namespace MVCTest.Models
{
    public class MVCTestContext : DbContext 
    {
       static string cadena;
      // public NpgsqlConnection npconexion = new NpgsqlConnection();
        public  static string cadenacone()
        {
            Cconexion conex=new Cconexion();
           
        if (conex.npconexion.ToString() != string.Empty)
            conex.establececonexion();
            cadena = conex.npconexion.ConnectionString; // cadenaconexion; // conex.ConecctionString();

            

            return cadena; //"name="+
        }

        public MVCTestContext() : base("name=DefaultConnection")  //cadenacone()       :base("name=MVCTestAndresCuevaContext")
        {

            //string connectionString = "Host=servidor;Port=puerto;Username=usuario;Password=contraseña;Database=nombre_base_de_datos";


            // cadena = "Data Source=(localdb)\\MSSQLLocalDB; Initial Catalog=MVCTestContext-20160906072914; Integrated Security=True; MultipleActiveResultSets=True; AttachDbFilename=|DataDirectory|MVCTestContext-20160906072914.mdf|providerName=System.Data.SqlClient"; // providerName = "System.Data.SqlClient"
            //:base(cadena);
        }
        // aqui es la magia, coge mi estructura, para luego llamarla.
        public System.Data.Entity.DbSet<MVCTest.Models.Students> Students { get; set; }
    }
}
