<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Assistente virtual Aura') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-ccuffs overflow-hidden sm:rounded-lg">
                <div class="p-1 sm:px-20">
                    <div class="flex justify-center p-2 mb-2">
                        <svg class="w-20" viewBox="0 0 679 679" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M165.747 437.009C110.843 342.786 143.138 222.513 238.141 167.401C333.144 112.288 455.409 142.899 512.216 236.018C569.023 329.136 539.177 450.022 445.312 507L401.057 436.074C455.495 403.03 472.814 332.937 439.88 278.95C406.945 224.963 336.045 207.225 280.947 239.187C225.849 271.15 207.11 340.888 238.941 395.515L165.747 437.009Z" fill="#FCAE17" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M324 622.819H355.865V654.684H324V622.819Z" fill="#71C9B8" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M324 24.9652H355.865V56.8301H324V24.9652Z" fill="#71C9B8" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M241.841 645.237C109.683 602.134 20.1692 479.007 19.9311 339.998C19.6931 200.988 108.785 77.5552 240.795 34L241.841 59.9202C121.034 99.7794 47.0079 212.738 47.2257 339.951C47.4435 467.164 120.898 579.842 241.841 619.288V645.237Z" fill="#71C9B8" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M436.931 645.237C569.089 602.134 658.603 479.007 658.841 339.998C659.079 200.988 569.987 77.5552 437.977 34L436.931 59.9202C557.738 99.7794 631.764 212.738 631.546 339.951C631.329 467.164 557.874 579.842 436.931 619.288V645.237Z" fill="#71C9B8" />
                        </svg>
                    </div>

                    <div class="aura-container mt-2">
                        <form onsubmit="event.preventDefault();" role="search">
                            <label for="search">Search for stuff</label>
                            <input id="search" type="search" placeholder="Ex.: minhas horas de acc" autofocus required />
                            <button type="submit">Enter</button>
                            
                            <div class="icon-holder">
                                <div class="icon" id="gas">
                                    <div class="base"></div>
                                    <div class="tooltip">Gas</div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="mt-8 text-gray-200 text-lg font-semibold">
                        <x-fas-arrow-alt-circle-right class="w-7 h-7 float-left mr-2" /> Siga o desenvolvimento
                    </div>

                    <div class="mt-3 text-gray-400">
                        <p>A assistente virtual do curso ainda está em desenvolvimento. Ela é baseada em tecnologias web, machine learning, inteligência artificial e visão computacional. Se você se interessa por esses assuntos, talvez queira <a href="https://github.com/ccuffs/aura" class="underline">contribuir com a criação de nossa assistente</a>.</p>
                        <p class="mt-2">O desenvolvimento é open-source e feito no Github. Qualquer ajuda, seja documentação, código, design, ideias, enfim é bem-vinda!</p>
                    </div>

                    <div class="mt-8 text-green-300">
                        <a href="https://github.com/ccuffs/aura" class="hover:underline">
                            <x-fab-github class="w-6 h-6 float-left mr-2" /> ccuffs/aura
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>