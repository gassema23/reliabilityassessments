<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class clearcache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:clearall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all cache';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        Artisan::call('cache:clear');
//        Artisan::call('route:cache');
//        Artisan::call('config:cache');
//        Artisan::call('view:clear');
        Cache::flush();
        return Command::SUCCESS;
    }
}
