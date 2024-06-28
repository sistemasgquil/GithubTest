using BlazorCrud.Shared;
// gloria a Dios
namespace BlazorCrud.Client.Services
{
    public interface IParametrosService
    {
        
        Task<List<ParametroDTO>> Lista();
        Task<ParametroDTO> Buscar(string codigo); //int codigo

        Task<string> Insertar(ParametroDTO parametro);
        Task<string> Editar(ParametroDTO parametro);
        Task<bool> Eliminar(string codigo); // eliminar

      
    }
}
