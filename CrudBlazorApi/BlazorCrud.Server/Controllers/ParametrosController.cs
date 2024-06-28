using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

using BlazorCrud.Server.Models;
using BlazorCrud.Shared;
using Microsoft.EntityFrameworkCore;

namespace BlazorCrud.Server.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ParametrosController : ControllerBase
    {
        private readonly DbcrudBlazorContext _dbContext;

        public ParametrosController(DbcrudBlazorContext dbContext)
        {
            _dbContext = dbContext;
        }

        [HttpGet]
        [Route("Lista")]
        public async Task<IActionResult> Lista()
        {//             lista general de los parametros
            var responseApi = new ResponseAPI<List<ParametroDTO>>();
            var listaParametroDTO = new List<ParametroDTO>();

            try
            {
                foreach (var item in await _dbContext.Parametros.Where(n=>n.estado=="A").ToListAsync())
                {
                    listaParametroDTO.Add(new ParametroDTO
                    {
                        codigo = item.codigo,
                        descripcion = item.descripcion,
                        estado = item.estado                   

                        //.Where(item.estado)
                    });
                }

                responseApi.EsCorrecto = true;
                responseApi.Valor = listaParametroDTO;
            }
            catch (Exception ex)
            {

                responseApi.EsCorrecto = false;
                responseApi.Mensaje = ex.Message;
            }

            return Ok(responseApi);
        }
        //[HttpGet]
        //[Route("Buscar/{codigo}")]
        //public async Task<IActionResult> Buscar(string codigo)
        //{
        //    var responseApi = new ResponseAPI<ParametroDTO>();
        //    var ParametroDTO = new ParametroDTO();

        //    try
        //    {
        //        var dbParametro = await _dbContext.Parametros.FirstOrDefaultAsync(x => x.codigo == codigo);

        //        if (dbParametro != null)
        //        {
        //            ParametroDTO.codigo = dbParametro.codigo;
        //            ParametroDTO.descripcion = dbParametro.descripcion;
        //            ParametroDTO.estado = dbParametro.estado;



        //            responseApi.EsCorrecto = true;
        //            responseApi.Valor = ParametroDTO;
        //        }
        //        else
        //        {
        //            responseApi.EsCorrecto = false;
        //            responseApi.Mensaje = "No encontrado";
        //        }

        //    }
        //    catch (Exception ex)
        //    {

        //        responseApi.EsCorrecto = false;
        //        responseApi.Mensaje = ex.Message;
        //    }

        //    return Ok(responseApi);
        //}

        [HttpPost]
        [Route("Insertar")]
        public async Task<IActionResult> Insertar(ParametroDTO Parametros)
        {
            var responseApi = new ResponseAPI<string>();

            try
            {
                var dbparametro = new Parametros
                {
                    codigo = Parametros.codigo,
                    descripcion = Parametros.descripcion,
                    estado = Parametros.estado,

                };

                _dbContext.Parametros.Add(dbparametro);
                await _dbContext.SaveChangesAsync();

                if (dbparametro.codigo != "")
                {
                    responseApi.EsCorrecto = true;
                    responseApi.Valor = dbparametro.codigo;
                }
                else
                {
                    responseApi.EsCorrecto = false;
                    responseApi.Mensaje = "No guardado";
                }

            }
            catch (Exception ex)
            {

                responseApi.EsCorrecto = false;
                responseApi.Mensaje = ex.Message;
            }

            return Ok(responseApi);
        }


        //[HttpPut]
        //[Route("Editar/{codigo}")]
        //public async Task<IActionResult> Editar(ParametroDTO Parametros, string codigo)
        //{
        //    var responseApi = new ResponseAPI<string>();

        //    try
        //    {

        //        var dbparametro = await _dbContext.Parametros.FirstOrDefaultAsync(e => e.codigo == codigo);

        //        if (dbparametro != null)
        //        {

        //            dbparametro.codigo = Parametros.codigo;
        //            dbparametro.descripcion = Parametros.descripcion;
        //            dbparametro.estado = Parametros.estado;


        //            _dbContext.Parametros.Update(dbparametro);
        //            await _dbContext.SaveChangesAsync();


        //            responseApi.EsCorrecto = true;
        //            responseApi.Valor = dbparametro.codigo;


        //        }
        //        else
        //        {
        //            responseApi.EsCorrecto = false;
        //            responseApi.Mensaje = "Parametro no econtrado";
        //        }

        //    }
        //    catch (Exception ex)
        //    {

        //        responseApi.EsCorrecto = false;
        //        responseApi.Mensaje = ex.Message;
        //    }

        //    return Ok(responseApi);
        //}


        //[HttpDelete]
        //[Route("Eliminar/{codigo}")]
        //public async Task<IActionResult> Eliminar(string codigo)
        //{
        //    var responseApi = new ResponseAPI<int>();

        //    try
        //    {

        //        var dbparametro = await _dbContext.Parametros.FirstOrDefaultAsync(e => e.codigo == codigo);

        //        if (dbparametro != null)
        //        {
        //            _dbContext.Parametros.Remove(dbparametro);
        //            await _dbContext.SaveChangesAsync();


        //            responseApi.EsCorrecto = true;
        //        }
        //        else
        //        {
        //            responseApi.EsCorrecto = false;
        //            responseApi.Mensaje = "Parametro no econtrado";
        //        }

        //    }
        //    catch (Exception ex)
        //    {

        //        responseApi.EsCorrecto = false;
        //        responseApi.Mensaje = ex.Message;
        //    }

        //    return Ok(responseApi);
        //}
    }
}
