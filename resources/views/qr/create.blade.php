<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center m-52  bg-gray-100 dark:bg-gray-900">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Crear Qr') }}
            </h2>
        </x-slot>
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{route('qr.create')}}" method="POST">
                @csrf
                <div class="input-create">
                    <x-input-label for="nombre" :value="__('Nombre del Qr')" class="mt-2 mb-2" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>
                <div class="input-create">
                    <x-input-label for="url" :value="__('Link del Qr')" class="my-6" />
                    <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url')" required autofocus autocomplete="url" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>
                <x-input-radio id="isDinamico" name="isDinamico" label="¿Es Dinamico?" class="p-10" style="margin: 10px;" />

                <div class="flex justify-end items-center">
                    <x-secondary-button type="submit">
                        Cargar
                    </x-secondary-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>