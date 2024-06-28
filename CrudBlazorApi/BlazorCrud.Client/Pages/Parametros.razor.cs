

using BlazorCrud.Shared;
using CurrieTechnologies.Razor.SweetAlert2;

namespace BlazorCrud.Client.Pages
{
    public partial class Parametros
    {
        List<ParametroDTO>? listaParametros=null;
        protected override async Task OnInitializedAsync() 
        {
            listaParametros = await parametroService.Lista();

        }
        private async Task Eliminar(string codigo)
        {//SweetAlertOptions
            var resultado = await Swal.FireAsync(new SweetAlertOptions
            {
                Title = "Eliminar Parametro",
                Text = "Deseo eliminar el parametro",
                Icon=SweetAlertIcon.Question,
                ShowCancelButton = true
            });
            if(resultado.IsConfirmed==true)
            {
                var eliminado= await parametroService.Eliminar(Convert.ToString(codigo));
                if(eliminado)
                {
                    listaParametros = listaParametros!.FindAll(e => e.codigo!=codigo);
                }
            }
        }
    }
}
