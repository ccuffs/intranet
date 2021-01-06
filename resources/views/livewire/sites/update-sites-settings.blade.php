<x-jet-form-section submit="updateSitesSettings">
    <x-slot name="title">
        {{ __('Configurações gerais') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Essas informações não divulgas publicamente. Elas são utilizadas para identificar você nos sistemas do curso.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Enabled -->
        <div class="col-span-6 sm:col-span-4">
            <x-toggle name="test">dd</x-toggle>
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <!-- Use: https://stackoverflow.com/a/48288795 -->
            <x-jet-label for="name" value="{{ __('Nome') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Salvo.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
