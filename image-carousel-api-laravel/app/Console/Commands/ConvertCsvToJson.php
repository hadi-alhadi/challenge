<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class ConvertCsvToJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:csv-to-json {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = $this->argument('file');
        $path = storage_path("app/{$filename}");

        if (!file_exists($path)) {
            $this->error("The file {$filename} does not exist.");
            return 1;
        }

        $handle = fopen($path, "r");
        $csvData = [];

        if (($headers = fgetcsv($handle, 1000, ",")) !== false) {
            while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                $csvData[] = array_combine($headers, $row);
            }
        }

        fclose($handle);

        $json = json_encode($csvData, JSON_PRETTY_PRINT);

        $jsonFilename = str_replace('.csv', '.json', $filename);
        Storage::disk('local')->put($jsonFilename, $json);

        $this->info("Successfully converted {$filename} to JSON.");
        return 0;
    }
}
