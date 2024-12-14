<x-app-layout>
    <div class=" flex flex-col sm:justify-center items-center bg-gray-100 dark:bg-gray-900">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nuevo Qr') }}
            </h2>
        </x-slot>

        {{$qr?? ""}}
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{route('qr.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-create" style="margin: 10px 0px ;">
                    <x-input-label for="nombre" :value="__('Nombre')" class="mt-2 mb-2" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" value="{{$qr->nombre ?? ''}}" required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>
                <div class=" flex items-center justify-between gap-2" style="margin: 10px 0px ;">
                    <div class="w-1/3">
                        <x-input-label for="tipo" :value="__('Tipo')" class="mt-2 mb-2" />

                        <x-select label='tipo' name="tipo" idElement="tipo" required :value="old('tipo')" class="w-full uppercase border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="link" {{$qr->tipo == 'link' ? 'selected' : ''}} >Url</option>
                            <option value="email" {{$qr->tipo == 'email' ? 'selected' : ''}}>Email</option>
                            <option value="geo" {{$qr->tipo == 'geo' ? 'selected' : ''}}>Geo</option>
                            <option value="llamada" {{$qr->tipo == 'llamada' ? 'selected' : ''}}>Llamar</option>
                            <option value="sms" {{$qr->tipo == 'sms' ? 'selected' : ''}}>SMS</option>
                            <option value="wifi" {{$qr->tipo == 'wifi' ? 'selected' : ''}}>Wifi</option>
                        </x-select>
                    </div>
                    <div class="w-full">
                        <x-input-label for="url" :value="__('Link')" class="mt-2 mb-2" />
                        <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url')" value="{{$qr->links[0]->url ?? ''}}" required autofocus autocomplete="url" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>
                </div>
                <x-input-checkbox id="isDinamico" name="isDinamico" label="¿Es Dinamico?" isChecked="{{$qr->isdinamico ? true : false }}" />
                <div id="personalizacion-avanzada" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-center py-1 my-2 px-3">
                    <div class="desplegable-avanzada">
                        <x-input-label :value="__('Personalizacion Avanzada')" class="mt-2 mb-2 " />
                        <span id="icono-desplegable-avanzada">
                            <i class="fa-solid fa-angle-down open"></i>
                            <i class="fa-solid fa-angle-up hidden"></i>
                        </span>
                    </div>
                    <div id="config-avanzada-personalizacion " class="p-3 mb-1  ">
                        <span class="flex items-center justify-around gap-2 border rounded-md shadow-md shadow-gray-600 p-2 mt-2 bg-gray-800">
                            <span class="w-1/3">
                                <x-input-label for="tamanio" :value="__('Tamaño')" class="mt-2 mb-2" />
                                <x-select label='tamanio' name="tamanio" idElement="tamanio" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="small">chico</option>
                                    <option value="medium">mediano</option>
                                    <option value="large">grande</option>
                                </x-select>
                            </span>
                            <span class="w-full">
                                <x-input-label for="estilo" :value="__('Estilo')" class="my-2 " />
                                <x-select idElement="selectEstilo" type="text" name='estilo'>
                                    <option value="square">Cuadrada</option>
                                    <option value="dot">Punto</option>
                                    <option value="round">Redonda</option>
                                </x-select>
                            </span>
                        </span>
                        <span class="inputColor block border rounded-md shadow-md shadow-gray-600 p-2 mt-2 bg-gray-800" id="contentCheckTypeFondo">
                            <x-input-label  :value="__('Fondo')" class="my-2 " />
                            <div id="checkTypeFondo">
                                <x-input-radio label="solido" idElement='radioSolido' name="tipoFondo" valueInput="solido" />
                                <x-input-radio label="gradiente" idElement='radioGradiente' name="tipoFondo" valueInput="gradiente" />
                            </div>
                        </span>
                        <span id="content-color-qr" class="block border rounded-md shadow-md shadow-gray-600 p-2 mt-2 bg-gray-800">
                            <x-input-label  :value="__('Color')" class="my-2" />

                            <span>
                                <x-input-color class="inputColor" name="color" idElement="inputColorQr" label='Color Qr' defaultValor="#000000" />
                                <span class="flex gap-2">
                                    <x-input-color class="inputColor" name="fondo" idElement="inputColorFondo" label='Color Fondo Qr' defaultValor="#ffffff" />
                                    <x-input-color class="inputColor hidden" name="fondo" idElement="inputColorFondo" label='' defaultValor="#ffffff" />
                                </span>
                            </span>
                        </span>
                        <span id="contentImgConf" class="block border rounded-md shadow-md shadow-gray-600 p-2 mt-2 bg-gray-800">
                            <x-input-label for="imgCentral" :value="__('Imagen Central')" class="my-2 " />
                            <x-text-input type="file" name="imgCentral" />
                        </span>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-4 ">
                    <x-danger-button type="reset">
                        Cancelar
                    </x-danger-button>
                    <x-secondary-button type="submit">
                        Visualizar
                    </x-secondary-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>