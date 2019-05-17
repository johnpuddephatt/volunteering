<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class WarmCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'warmcache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears the application cache. Scheduled to run nightly.';

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
      Cache::forget('home_categories');
      Cache::forget('home_suitabilities');
      Cache::forget('home_locations');

      Cache::forget('index_categories');
      Cache::forget('index_organisations');
      Cache::forget('index_suitabilities');
      Cache::forget('index_locations');

      Cache::forget('opportunity_count');
    }
}
