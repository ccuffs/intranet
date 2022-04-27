<x-jet-form-section submit="updateProfilePersonalInformation">
    <x-slot name="title">
        {{ __('Dados pessoais') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Essas informações não divulgas publicamente. Elas são utilizadas para identificar você nos sistemas do curso.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nome') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- enrollment_id -->
        <div class="col-span-3 sm:col-span-2">
            <x-jet-label for="enrollment_id" value="{{ __('Matrícula') }}" />
            <x-jet-input id="enrollment_id" type="text" class="mt-1 block w-full" placeholder="Ex.: 20211XXXXXX" wire:model.defer="state.enrollment_id" />
            <x-jet-input-error for="enrollment_id" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('E-mail') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- uid -->
        <div class="col-span-3 sm:col-span-2">
            <x-jet-label for="uid" value="{{ __('idUFFS') }}" />
            <x-input-iconed id="uid" type="text" class="mt-1 block w-full border-2 border-yellow-400 bg-gray-200 focus:border-yellow-400 focus:outline-yellow-400" readonly wire:model.defer="state.uid" />
            <x-jet-input-error for="uid" class="mt-2" />
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
