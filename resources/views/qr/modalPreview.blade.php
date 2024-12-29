   
<x-modal name="modal-preview" id="modal-preview" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('qr.create') }}" class="p-6">
        @csrf
        @method('POST')
        
        

        <div class="mt-6">
            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-3/4"
                placeholder="{{ __('Password') }}" />

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-button class="ms-3">
                {{ __('Crear') }}
            </x-button>
        </div>
    </form>
</x-modal>
