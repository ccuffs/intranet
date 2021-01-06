<x-jet-form-section submit="">
    <x-slot name="title">
        {{ __('Minhas páginas') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Lista dos sites ligados ao seu usuário e de onde eles são obtidos.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-5">
            <p class="font-medium text-xl font-semibold text-gray-200">cc.uffs.edu.br/pessoa/fernando.bevilacqua</p>
        </div>

        <div class="col-span-1">
            <x-toggle name="enabled" checked="{{ $site->enabled }}" wire:model="site.enabled">Ligada?</x-toggle>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <!-- Use: https://stackoverflow.com/a/48288795 -->
            <p class="text-green-300">
                <x-fas-external-link-alt class="h-3 w-3 inline-block mr-1" />
                <a href="" class="font-medium text-sm">cc.uffs.edu.br/pessoa/fernando.bevilacqua</a>
            </p>
            
            <p class="text-green-300">
                <x-fas-external-link-alt class="h-3 w-3 inline-block mr-1" />
                <a href="" class="font-medium text-sm">uffs.cc/fernando.bevilacqua</a>
            </p>
        </div>

        <div class="col-span-7 text-gray-400">
            <p class="text-gray-100">
                <x-fab-github class="h-4 w-4 inline-block mr-1" />
                Conteúdo
            </p>
            <p class="mt-1">O conteúdo dessa página esta vindo de um repositório no Github: <a href="https://github.com/Dovyski/ccuffs-site" class="font-mono">github.com/Dovyski/ccuffs-site</a>.</p>
        </div>

        <div class="col-span-7 text-gray-400">
            <p class="text-gray-100">
                <x-fas-check-circle class="h-4 w-4 text-green-300 inline-block mr-1" />
                Tudo certo
            </p>
            <p class="mt-1">Não há problemas com essa página. A última vez que o conteúdo dela foi atualizado foi em <em>ff</em>.</p>
        </div>

        <x-jet-input-error for="name" class="mt-2" />
    </x-slot>
</x-jet-form-section>
