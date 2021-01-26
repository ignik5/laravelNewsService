<?php

namespace App\Console\Commands;
use App\news;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\category;

class savejson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:json';

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
     * @return mixed
     */
    public function handle()
    {
        file::put(storage_path()."/news.json", json_encode(news::$news, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) );
        file::put(storage_path()."/categories.json", json_encode(category::$categories, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) );
    }
}
