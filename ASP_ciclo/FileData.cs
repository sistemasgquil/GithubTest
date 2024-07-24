using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ASP_ciclo // CicloToroService
{
    public class FileData: IFileData
    {
        public async Task Create(string path)
        {
            using (var x= new StreamWriter(path))
            {
                await Task.Delay(1000);
                await x.WriteAsync("Corriendo con exito");

            }
        }

    }
}
