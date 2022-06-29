<?php

namespace App\Console\Commands;

use App\Helpers\StringHelper;
use App\Models\User;
use Illuminate\Console\Command;

class UpdateGithubFieldCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-github-field';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ajusta campo github de usuários que criaram-no erroneamente usando a url completa';

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
            $user->github = $this->removeGitUrlDomain($user->github);
            $user->save();
        }
    }

    protected function removeGitUrlDomain($githubUser)
    {
        $url = $githubUser;
        if (StringHelper::checkIfContains($url, "https://github.com/") || StringHelper::checkIfContains($url, "https://github.com/")) {
            $githubUser = StringHelper::getText("/github.com\/(.*)/i", $url);
        }

        $githubUser = str_replace("/", "", $githubUser);

        return $githubUser;
    }
}
