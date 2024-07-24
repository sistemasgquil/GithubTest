using ASP_ciclo;

namespace ASP_work
{
    public class Worker : BackgroundService
    {
        private readonly ILogger<Worker> _logger;


        #region"Inject en el constructor"
        // variables
        private int contador = 0;
        private string _path=Directory.GetCurrentDirectory()+@"\Files\";
        private IFileData _fileData;

        #endregion

        #region"Metodos"
         public Worker(ILogger<Worker> logger, IFileData fileData)
        {
            _logger = logger;
            _fileData = fileData;
        }
        #endregion

        protected override async Task ExecuteAsync(CancellationToken stoppingToken)
        {
            while (!stoppingToken.IsCancellationRequested)
            {
                //if (_logger.IsEnabled(LogLevel.Information))
                //{
                    _logger.LogInformation("Worker running at: {time}", DateTimeOffset.Now);
                //}
                // await Task.Delay(1000, stoppingToken);
                await _fileData.Create($"{_path}{contador++}.txt");
            }
        }
    }
}
