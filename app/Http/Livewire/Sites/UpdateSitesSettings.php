<?php

namespace App\Http\Livewire\Sites;

use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
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
        $this->site->save();
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.sites.update-sites-settings');
    }
}
