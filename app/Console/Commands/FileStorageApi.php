<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class FileStorageApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:api-example {example}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $command = $this->argument('example');

        switch($command){

            case 'create':
                Storage::put('file.txt', 'kontent pliku no defafultowym dysku');
                $this->info("OK");
                break;
            case 'read':
                $content = Storage::get('file.txt');
                $this->info($content);
                break;
            case 'exist':
                $exists = Storage::exists('file.txt');
                $missing = Storage::missing('file.txt');
                $this->info("Exists: $exists");
                $this->info("Missing: ". ((int)$missing));
                break;
            // case 'download':
            //     $name = 'nameForDownload.txt';
            //     Storage::download('file.txt');
            //     Storage::download('file.txt', $name);
            //     break;
            case 'localization':
                // $url = Storage::disk('public')->url('file.txt');
                $url = Storage::url('file.txt');
                $path = Storage::path('file.txt');
                $this->info("url: $url");
                $this->info("path: $path");
                break;
            case 'relocation':
                Storage::copy('file.txt', 'new_file.txt');
                Storage::move('new_file.txt', 'moved_file.txt');
                break;
            case 'delete':
                Storage::delete(['moved_file.txt', 'file.txt']);
                break;
            case 'dirOperation':
                $dir = 'testDir';
                Storage::makeDirectory($dir);
                Storage::deleteDirectory($dir);
                break;
        }
        $this->info("OK");
        return 0;
    }
}
