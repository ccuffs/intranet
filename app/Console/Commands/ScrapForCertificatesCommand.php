<?php

namespace App\Console\Commands;

use App\Jobs\ScrapForCertificates;
use App\Models\User;
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
    protected $description = 'Scraping for certificates';

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
        $users = User::all();

        foreach ($users as $user) {
            ScrapForCertificates::dispatchSync($user);
        }
    }
}
