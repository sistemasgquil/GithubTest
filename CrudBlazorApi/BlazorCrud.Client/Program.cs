using BlazorCrud.Client;
using Microsoft.AspNetCore.Components.Web;
using Microsoft.AspNetCore.Components.WebAssembly.Hosting;

using BlazorCrud.Client.Services;
using CurrieTechnologies.Razor.SweetAlert2; // para  mensajes perzonalizados

var builder = WebAssemblyHostBuilder.CreateDefault(args);
builder.RootComponents.Add<App>("#app");
builder.RootComponents.Add<HeadOutlet>("head::after");

builder.Services.AddScoped(sp => new HttpClient { BaseAddress = new Uri("http://localhost:5253") });
// añado las interfaces a los clientes desde la carpeta de servicios..    2023
builder.Services.AddScoped<IDepartamentoService,DepartamentoService>();
builder.Services.AddScoped<IEmpleadoService,EmpleadoService>();
builder.Services.AddScoped<IParametrosService, ParametroService>();

builder.Services.AddSweetAlert2();

await builder.Build().RunAsync();
