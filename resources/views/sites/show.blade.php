<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Sites pessoais') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if ($available)
                @livewire('sites.update-sites-settings')
            @else
                <div class="bg-ccuffs overflow-hidden shadow-xl sm:rounded-lg border border-gray-900">
                    <div class="p-8 bg-green-200 sm:px-20 border-b border-gray-900">
                        <div class="text-2xl text-gray-900">
                            Quase lá!
                        </div>

                        <div class="mt-6 text-gray-800">
                            Para utilizar os sites pessoais do curso, você precisa informar seu <a href="https://github.com" class="underline">Github</a> nas <a href="{{ route('profile.show') }}" class="underline">Informações de perfil</a> das Configurações da sua conta.
                            Se você ainda não tem uma conta no <a href="https://github.com" class="underline">Github</a>, ela é grátis e muito útil. Você pode salvar suas atividades acadêmicas lá, que servirão como um portifólio online (além da página maravilhosa que você terá no site do curso ;).
                        </div>
                    </div>
                </div>

                <div class="mt-2 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-green-300"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-300 leading-7 font-semibold">O que são esses sites pessoais?</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-400">
                                São páginas pessoais mostradas junto com o site do curso. O endereço dessa página será <code>cc.uffs.edu.br/pessoa/iduffs</code>, onde <code>iduffs</code> será substituído pelo seu idUFFS. Veja o exemplo abaixo:
                            </div>

                            <a href="https://cc.uffs.edu.br/pessoa/fernando.bevilacqua">
                                <div class="mt-3 flex items-center text-sm font-semibold text-green-300">
                                    <div>cc.uffs.edu.br/pessoa/fernando.bevilacqua</div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-green-300"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-300 leading-7 font-semibold">Porque quero uma página?</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-400">
                                Simples: ter uma página pessoal no seu curso mostra pró-atividade, preocupação com sua presença virtual e interesse com a qualidade do seu trabalho. Isso diferencia você no mercado de trabalho.
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-green-300"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-300 leading-7 font-semibold">uffs.cc</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-400">
                                Como um brinde, você ganha uma URL personalizada e linda no encurtador de links oficial do curso: <code>uffs.cc/seu-id-uffs</code>. Veja o exemplo abaixo:
                            </div>

                            <a href="https://uffs.cc/fernando.bevilacqua">
                                <div class="mt-3 flex items-center text-sm font-semibold text-green-300">
                                    <div>uffs.cc/fernando.bevilacqua</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
