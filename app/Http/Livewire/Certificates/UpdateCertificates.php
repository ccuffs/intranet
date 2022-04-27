<?php

namespace App\Http\Livewire\Certificates;

use App\Jobs\ScrapForCertificates;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateCertificates extends Component
{
    public function render()
    {
        return view('livewire.certificates.update-certificates');
    }

    public function updateCertificates()
    {
        $user = Auth::user();

        ScrapForCertificates::dispatchSync($user);

        //TODO implementar atualização da página para exibir registros capturados
    }
}
