<x-jet-form-section submit="">
    <x-slot name="title">
        {{ __('Minhas páginas') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Páginas que serão mostradas no site do curso. Seja responsável com o conteúdo de sua página.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-5">
            <p class="font-medium text-xl font-semibold text-gray-100">
                <x-fas-link class="h-5 w-5 inline-block mr-1" />
                <span class="text-gray-400">cc.uffs.edu.br/pessoa/</span>{{ $user->uid }}
            </p>
        </div>

        <div class="col-span-1">
            <x-toggle name="enabled" checked="{{ $site->enabled }}" label="Ativa" wire:model="site.enabled">Inativa</x-toggle>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <!-- Use: https://stackoverflow.com/a/48288795 -->
            <p class="text-green-300">
                <x-fas-external-link-alt class="h-3 w-3 inline-block mr-1" />
                <a href="https://cc.uffs.edu.br/pessoa/{{ $user->uid }}/" class="font-medium text-sm hover:underline">cc.uffs.edu.br/pessoa/{{ $user->uid }}</a>
            </p>
            
            <p class="text-green-300">
                <x-fas-external-link-alt class="h-3 w-3 inline-block mr-1" />
                <a href="https://uffs.cc/{{ $user->uid }}" class="font-medium text-sm hover:underline">uffs.cc/{{ $user->uid }}</a>
            </p>
        </div>

        <div class="col-span-7 text-gray-400">
            <p class="text-gray-100 font-bold">
                <x-fab-github class="h-4 w-4 inline-block mr-1" />
                Conteúdo
            </p>
            <p class="mt-1">O conteúdo dessa página vem de um repositório no Github: <a href="https://github.com/{{ $user->github }}/ccuffs-site" class="font-mono hover:underline">github.com/{{ $user->github }}/ccuffs-site</a>. Atualize o conteúdo desse repositório para que sua página seja atualizada automaticamente.</p>
        </div>

        @if ($site->enabled)
            <div class="col-span-7 text-gray-400">
                @if ($site->buildInfo() !== null)
                    @if ($site->buildInfo()['ret_code'] == 0)
                        <p class="text-gray-100 font-bold">
                            <x-fas-check-circle class="h-4 w-4 text-green-300 inline-block mr-1" />
                            Tudo certo
                        </p>
                        <p class="mt-1">Não há problemas com essa página. A última vez que a página foi atualizada a partir da fonte de conteúdo foi em {{ date('d/m/Y H:i:s', $site->buildInfo()['time']) }}.</p>
                        <x-jet-button type="button" class="mt-2" wire:click="updateSite">
                            {{ __('Atualizar Site') }}
                        </x-jet-button>
                    @else
                        <p class="text-red-400 font-bold">
                            <x-fas-exclamation-circle class="h-4 w-4  inline-block mr-1" />
                            Há algum problema
                        </p>
                        <p class="mt-1">Na última tentativa de atualização às {{ date('H:i:s \d\e d/m/Y', $site->buildInfo()['time']) }}, o código de erro {{ $site->buildInfo()['ret_code'] }} foi gerado com a seguinte mensagem: </p>
                        <pre class="mt-3 text-red-100">{{ join("\n", $site->buildInfo()['output']) }}</pre>
                    @endif
                @else
                    <p class="text-yellow-200 font-bold">
                        <x-fas-clock class="h-4 w-4 inline-block mr-1" />
                        Em preparação
                    </p>
                    <p class="mt-1">Essa página foi ativada recentemente e ainda está sendo preparada. Ela funcioná em alguns instantes. Por favor, aguarde um pouco.</p>
                @endif
            </div>
        @endif
        <x-jet-input-error for="name" class="mt-2" />
    </x-slot>
</x-jet-form-section>
