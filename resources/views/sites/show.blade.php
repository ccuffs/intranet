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
                <x-jet-section-border />
            @else
                <div class="bg-ccuffs overflow-hidden shadow-xl sm:rounded-lg border border-gray-900">
                    <div class="p-8 bg-green-200 sm:px-20 border-b border-gray-900">
                        <div class="text-2xl text-gray-900">
                            Quase lá!
                        </div>

                        <div class="mt-6 text-gray-800">
                            Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                        </div>
                    </div>
                </div>

                <div class="mt-2 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-green-300"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-300 leading-7 font-semibold"><a href="https://laravel.com/docs">Documentation</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-400">
                                Laravel has wonderful documentation covering every aspect of the framework. Whether you're new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end.
                            </div>

                            <a href="https://laravel.com/docs">
                                <div class="mt-3 flex items-center text-sm font-semibold text-green-300">
                                        <div>Explore the documentation</div>

                                        <div class="ml-1 text-green-400">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-green-300"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-300 leading-7 font-semibold"><a href="https://laravel.com/docs">Documentation</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-400">
                                Laravel has wonderful documentation covering every aspect of the framework. Whether you're new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end.
                            </div>

                            <a href="https://laravel.com/docs">
                                <div class="mt-3 flex items-center text-sm font-semibold text-green-300">
                                        <div>Explore the documentation</div>

                                        <div class="ml-1 text-green-400">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
