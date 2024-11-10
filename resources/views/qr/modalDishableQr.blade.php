<x-danger-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirma-deshabilita-qr . {{$qrID}}')"><svg style="width: 25px; margin: auto;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
        <path fill="#fff" d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L489.3 358.2l90.5-90.5c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114l-96 96-31.9-25C430.9 239.6 420.1 175.1 377 132c-52.2-52.3-134.5-56.2-191.3-11.7L38.8 5.1zM239 162c30.1-14.9 67.7-9.9 92.8 15.3c20 20 27.5 48.3 21.7 74.5L239 162zM406.6 416.4L220.9 270c-2.1 39.8 12.2 80.1 42.2 110c38.9 38.9 94.4 51 143.6 36.3zm-290-228.5L60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5l61.8-61.8-50.6-39.9z" />
    </svg>
</x-danger-button>

<x-modal name="confirma-deshabilita-qr . {{$qrID}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('qr.destroy') }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Estas segure de deshabilitar el Qr?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Si deshabilitas el Qr, todo aquel que quiera usarlo, se lo redirigira a una pagina de aviso que el Qr esta fuera de servicio') }}
        </p>

        <div class="mt-6">
            <input type="text" value="{{$qrID}}" name="qrId">
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

            <x-danger-button class="ms-3">
                {{ __('Deshabilitar') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>