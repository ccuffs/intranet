<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informações de perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Informações divulgadas publicamente ou para outros usuários de sistemas do curso.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Foto do perfil') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecionar foto nova') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remover foto') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- bio -->
        <div class="col-span-8 sm:col-span-6">
            <x-jet-label for="bio" value="{{ __('Bio') }}" />
            <x-textarea name="bio" class="mt-1 p-2 block w-full" placeholder="Ex.: Gosto de café, prefiro tabs do que espaço, gosto de viajar." wire:model.defer="state.bio"></x-textarea>
            <x-jet-input-error for="bio" class="mt-2" />
        </div>

        <!-- github -->
        <div class="col-span-3 sm:col-span-2">
            <x-jet-label for="github" value="{{ __('Github') }}" />
            <x-jet-input id="github" type="text" class="mt-1 block w-full" placeholder="Ex.: meuGithub" wire:model.defer="state.github" />
            <x-jet-input-error for="github" class="mt-2" />
        </div>

        <!-- linkedin -->
        <div class="col-span-3 sm:col-span-2">
            <x-jet-label for="linkedin" value="{{ __('LinkedIn') }}" />
            <x-jet-input id="linkedin" type="text" class="mt-1 block w-full" placeholder="Ex.: meuLinkedin" wire:model.defer="state.linkedin" />
            <x-jet-input-error for="linkedin" class="mt-2" />
        </div>

        <!-- google -->
        <div class="col-span-3 sm:col-span-2">
            <x-jet-label for="google" value="{{ __('Google/Gmail') }}" />
            <x-jet-input id="google" type="text" class="mt-1 block w-full" placeholder="Ex.: exemplo@exemplo.com" wire:model.defer="state.google" />
            <x-jet-input-error for="google" class="mt-2" />
        </div>

        <!-- twitter -->
        <div class="col-span-3 sm:col-span-2">
            <x-jet-label for="twitter" value="{{ __('Twitter') }}" />
            <x-jet-input id="twitter" type="text" class="mt-1 block w-full" placeholder="Ex.: meuTwitter" wire:model.defer="state.twitter" />
            <x-jet-input-error for="twitter" class="mt-2" />
        </div>

        <!-- facebook -->
        <div class="col-span-3 sm:col-span-2">
            <x-jet-label for="facebook" value="{{ __('Facebook') }}" />
            <x-jet-input id="facebook" type="text" class="mt-1 block w-full" placeholder="Ex.: meuFacebook" wire:model.defer="state.facebook" />
            <x-jet-input-error for="facebook" class="mt-2" />
        </div>

        <!-- instagram -->
        <div class="col-span-3 sm:col-span-2">
            <x-jet-label for="instagram" value="{{ __('Instagram') }}" />
            <x-jet-input id="instagram" type="text" class="mt-1 block w-full" placeholder="Ex.: meuInstagram" wire:model.defer="state.instagram" />
            <x-jet-input-error for="instagram" class="mt-2" />
        </div>

        <!-- lattes -->
        <div class="col-span-4 sm:col-span-3">
            <x-jet-label for="lattes" value="{{ __('Currículo Lattes') }}" />
            <x-jet-input id="lattes" type="text" class="mt-1 block w-full" placeholder="Ex.: lattes.cnpq.br/7744662926303212" wire:model.defer="state.lattes" />
            <x-jet-input-error for="lattes" class="mt-2" />
        </div>

        <!-- website -->
        <div class="col-span-4 sm:col-span-3">
            <x-jet-label for="website" value="{{ __('Website pessoal') }}" />
            <x-jet-input id="website" type="text" class="mt-1 block w-full" placeholder="Ex.: https://meusite.com" wire:model.defer="state.website" />
            <x-jet-input-error for="website" class="mt-2" />
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
