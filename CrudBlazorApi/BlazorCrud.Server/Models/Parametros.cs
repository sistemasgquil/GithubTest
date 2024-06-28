using System;
using System.Collections.Generic;

namespace BlazorCrud.Server.Models
{
    public partial class Parametros
    {
        public string? codigo { get; set; } 
        public string descripcion { get; set; } = null!;
        public string? estado { get; set; }
    }
}
