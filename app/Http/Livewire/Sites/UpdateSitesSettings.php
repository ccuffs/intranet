<?php

namespace App\Http\Livewire\Sites;

use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateSitesSettings extends Component
{
    public Site $site;
    public User $user;

    protected $rules = [
        'site.enabled' => 'required|bool'
    ];

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->user = Auth::user();
        $this->site = $this->user->sites()->first();
    }

    public function updated()
    {
        $github = preg_replace("/[^A-Za-z0-9 ]/", '', $this->user->github);

        $this->site->serve_url = $this->user->uid;
        $this->site->source_type = 'git';
        $this->site->source_url = "https://github.com/$github/ccuffs-site";
        $this->site->save();
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.sites.update-sites-settings');
    }

    /**
     * Sets the site to update now
     *
     * @return void
     */
    public function updateSite(){

        $this->site->update_now = true;
        $this->site->save();
        $this->emit('saved');
    }
}
