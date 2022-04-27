<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Certificados') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-ccuffs overflow-hidden sm:rounded-lg">
                <div class="p-1 sm:px-20">
                    @if (count($data)==0)
                        <p class="mt-3 text-gray-400">Não foram encontrados certificados válidos para emissão.</p>
                    @else
                        <table class="table table-bordered" style="text-align:left;">
                            <thead>
                            <tr>
                                <th scope="col" class="mt-3 text-gray-400">Tipo de Certificado</th>
                                <th scope="col" class="mt-3 text-gray-400">Evento</th>
                                <th scope="col" class="mt-3 text-gray-400" style="width:17%;">Período</th>
                                <th scope="col" class="mt-3 text-gray-400" style="width:13%;padding-left:1%;">Carga
                                    Horária
                                </th>
                                <th scope="col" class="mt-3 text-gray-400">Emitir</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $certificate)
                                <tr>
                                    <td class="mt-3 text-gray-400">{{ $certificate->certificate_type }}</td>
                                    <td class="mt-3 text-gray-400">{{ $certificate->event }}</td>
                                    <td class="mt-3 text-gray-400">{{ $certificate->date }}</td>
                                    <td class="mt-3 text-gray-400"
                                        style="padding-left:1%;">{{ $certificate->hours }}</td>
                                    <td><a class="btn" href="{{ $certificate->link }}">
                                            <x-fas-download class="w-4 h-4 text-gray-400"/>
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @livewire('certificates.update-certificates')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
