<?php

namespace App\Console\Commands;

use App\carAds\ADS;
use Illuminate\Console\Command;

class UpdateCarAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'carAds:update-carAds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the carAds';

    private $carAds;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ADS $ADS)
    {
        parent::__construct();
        $this->carAds = $ADS;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->carAds->update();
        
    }
}
