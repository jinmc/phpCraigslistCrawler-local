<?php

namespace App\Console\Commands;

use App\Models\Book;
use Illuminate\Console\Command;

class crawlCraigslist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:crawlCraigslist';

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
//        Book::truncate();
//        \Log::info('cleared database!!!  ' . \Carbon\Carbon::now());


    }


}
