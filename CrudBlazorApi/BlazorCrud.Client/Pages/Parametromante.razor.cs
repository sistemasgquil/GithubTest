
using BlazorCrud.Client.Services;
using BlazorCrud.Shared;
using Microsoft.AspNetCore.Components;

namespace BlazorCrud.Client.Pages
{
    public partial class Parametromante
    {
      
         [Parameter] public string ?codigoEditar { get; set; }

        string titulo= string.Empty;
        string btnTexto=string.Empty;   

        ParametroDTO param=new ParametroDTO();

        List<ParametroDTO> listParametros = new List<ParametroDTO>();
        protected override async Task OnInitializedAsync()
        {
            if (codigoEditar != null)
            {
                param = await parametroService.Buscar(codigoEditar);
                btnTexto = "Actualizado registro";
                titulo = "Editar parametro";
            }
            else
            {
                btnTexto = "Guardar parametro";
                titulo = "Nuevo parametro";
            }
        }
        private async Task OnValidSubmit()  // es igual a OnSubmit() pero validado
        {
            string idDevuelto = "";
            if (codigoEditar == "")
                idDevuelto = await parametroService.Insertar(param);
            else
                idDevuelto = await parametroService.Editar(param);


            if (idDevuelto != "")
                navegacion.NavigateTo("/parametros");

        }


    }
}
