<x-app-layout>
    <div class=" flex flex-col sm:justify-center items-center bg-gray-100 dark:bg-gray-900">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nuevo Qr') }}
            </h2>
        </x-slot>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{route('qr.create')}}" method="POST">
                @csrf
                <div class="input-create" style="margin: 10px 0px ;">
                    <x-input-label for="nombre" :value="__('Nombre')" class="mt-2 mb-2" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>
                <div class="input-create type" style="margin: 10px 0px ;">
                    <div>
                        <x-input-label for="typeQr" :value="__('Tipo')" class="mt-2 mb-2" />

                        <x-select label='typeQr' name="typeQr" idElement="typeQr" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="link">Url</option>
                            <option value="email">Email</option>
                            <option value="geo">Geo</option>
                            <option value="llamada">Llamar</option>
                            <option value="sms">SMS</option>
                            <option value="wifi">Wifi</option>
                        </x-select>
                    </div>
                    <div>
                        <x-input-label for="url" :value="__('Link')" class="mt-2 mb-2" />
                        <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url')" required autofocus autocomplete="url" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>
                </div>
                <x-input-checkbox id="isDinamico" name="isDinamico" label="¿Es Dinamico?" />
                <div id="personalizacion-avanzada" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-center py-1 my-2 px-3">
                    <div class="desplegable-avanzada">
                        <x-input-label :value="__('Personalizacion Avanzada')" class="mt-2 mb-2 " />
                        <span id="icono-desplegable-avanzada">
                            <i class="fa-solid fa-angle-down open"></i>
                            <i class="fa-solid fa-angle-up hidden"></i>
                        </span>
                    </div>
                    <div id="config-avanzada-personalizacion">
                        <div>
                            <x-input-label for="tamanio" :value="__('Tamaño')" class="mt-2 mb-2" />
                            <x-select label='tamanio' name="tamanio" idElement="tamanio" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="link">chico</option>
                                <option value="email">mediano</option>
                                <option value="geo">grande</option>
                            </x-select>
                        </div>
                        <span class="inputEstilo">
                            <x-input-label for="estilo" :value="__('Estilo')" class="my-2 " />
                            <x-select idElement="selectEstilo" type="text" name='estilo'>
                                <option value="square">Cuadrada</option>
                                <option value="dot">Punto</option>
                                <option value="round">Redonda</option>
                            </x-select>
                        </span>
                        <span class="inputColor" id="contentCheckTypeFondo">
                            <x-input-label for="nombre" :value="__('Tipo Fondo')" class="my-2 " />
                            <div id="checkTypeFondo">
                                <x-input-radio label="solido" idElement='radioSolido' name="checkTypeFondo" valueInput="solido" />
                                <x-input-radio label="gradiente" idElement='radioGradiente' name="checkTypeFondo" valueInput="gradiente" />
                            </div>

                        </span>
                        <div id="content-color-qr">
                            <x-input-color class="inputColor" name="colorQr" idElement="inputColorQr" label='Color' />
                            <x-input-color class="inputColor" name="colorFondo" idElement="inputColorFondo" label='Color Fondo' />
                        </div>
                        <span id="contentImgConf">
                            <x-input-label for="imgCentral" :value="__('Imagen Central')" class="my-2 " />
                            <x-text-input type="file" name="imgCentral" />
                        </span>
                    </div>
                </div>
                <div class="flex justify-end items-center">
                    <x-secondary-button type="submit">
                        Cargar
                    </x-secondary-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>