<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Cardápio R.U. - Câmpus Chapecó') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-ccuffs overflow-hidden sm:rounded-lg">
                <div class="p-1 sm:px-20">
                    @if ($data == null)
                        <p class="mt-3 text-gray-400">Os dados não estão disponíveis no momento, por favor conslute mais tarde.</p>
                    @else
                        @foreach ($data->cardapios as $cardapio)
                            <h2 class="mt-4 text-white"><b>{{$cardapio->semana}}</b></h2>
                            <hr style="margin-top: 1%;margin-bottom: 2%;"/>
                            <table class="table table-bordered" style="text-align:left;">
                                <thead>
                                <tr>
                                    <th scope="col" class="mt-3 text-gray-400" style="width: 20%">Segunda-Feira</th>
                                    <th scope="col" class="mt-3 text-gray-400" style="width: 20%">Terça-Feira</th>
                                    <th scope="col" class="mt-3 text-gray-400" style="width: 20%">Quarta-Feira</th>
                                    <th scope="col" class="mt-3 text-gray-400" style="width: 20%">Quinta-Feira</th>
                                    <th scope="col" class="mt-3 text-gray-400" style="width: 20%">Sexta Feira</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach ($cardapio->cardapio as $cardapioSemana)
                                        <td class="mt-3 text-gray-400" style="padding: 1%">
                                            <p>{{$cardapioSemana->salada}}</p>
                                            <p>{{$cardapioSemana->salada1}}</p>
                                            <p>{{$cardapioSemana->salada2}}</p>
                                            <p>{{$cardapioSemana->graos}}</p>
                                            <p>{{$cardapioSemana->graos1}}</p>
                                            <p>{{$cardapioSemana->graos2}}</p>
                                            <p>{{$cardapioSemana->acompanhamento}}</p>
                                            <p>{{$cardapioSemana->mistura}}</p>
                                            <p>{{$cardapioSemana->mistura_vegana}}</p>
                                            <p>{{$cardapioSemana->sobremesa}}</p>
                                        </td>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
