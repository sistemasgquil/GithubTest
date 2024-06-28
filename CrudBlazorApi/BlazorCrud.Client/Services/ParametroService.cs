
using BlazorCrud.Shared;
using System.Net.Http.Json;

namespace BlazorCrud.Client.Services
{
    public class ParametroService: IParametrosService
    {
        private readonly HttpClient _http;
        // constructor
        public ParametroService(HttpClient http)
        {
            _http = http;
        }
        // hago los cambios, con los datos q son de responseApi
        public async Task<List<ParametroDTO>> Lista()
        {
            var result = await _http.GetFromJsonAsync<ResponseAPI<List<ParametroDTO>>>("api/Parametros/Lista");

            if (result!.EsCorrecto)
                return result.Valor!;
            else
                throw new Exception(result.Mensaje);
        }
        public async Task<ParametroDTO> Buscar(string codigo) 
        {
            var result = await _http.GetFromJsonAsync<ResponseAPI<ParametroDTO>>($"api/Parametros/Buscar/{codigo}");
            
            if (result!.EsCorrecto)
                return result.Valor!;
            else
                throw new Exception(result.Mensaje);
        }
            public async Task<string> Insertar(ParametroDTO parametro)
            {
            var result = await _http.PostAsJsonAsync("api/Parametros/Insertar",parametro);
            var response = await result.Content.ReadFromJsonAsync<ResponseAPI<string>>();
            if (response!.EsCorrecto)
                return response.Valor!;
            else
                throw new Exception(response.Mensaje);
        }
        public async Task<string> Editar(ParametroDTO parametro)
        {
            var result = await _http.PutAsJsonAsync($"api/Parametros/Editar/{parametro.codigo}", parametro);
            var response = await result.Content.ReadFromJsonAsync<ResponseAPI<string>>();
            if (response!.EsCorrecto)
                return response.Valor!;
            else
                throw new Exception(response.Mensaje);
        }

        public async Task<bool> Eliminar(string codigo)//int
        {
            var result = await _http.DeleteAsync($"api/Parametros/Editar/{codigo}");
            var response = await result.Content.ReadFromJsonAsync<ResponseAPI<string>>();
            if (response!.EsCorrecto)
                return response.EsCorrecto!;
            else
                throw new Exception(response.Mensaje);
        }

 
    }
}
