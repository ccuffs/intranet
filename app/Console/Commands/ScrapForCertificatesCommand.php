<?php

namespace App\Console\Commands;

use App\Jobs\ScrapForCertificates;
use Illuminate\Console\Command;

class ScrapForCertificatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrap-for-certificates';

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
        ScrapForCertificates::dispatchSync(1);

    }
}
