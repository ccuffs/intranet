<?php

namespace App\Http\Livewire\Sites;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;

class UpdateSitesSettings extends Component
{
    public Site $site;

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
        $this->site = Auth::user()->sites()->first();
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
