using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BlazorCrud.Shared
{
    public class ParametroDTO
    {
        [Required(ErrorMessage = "El campo {0} es requerido.")]
        public string ? codigo { get; set; }
        public string descripcion { get; set; } = null!;
        public string? estado { get; set; }
    }
}
