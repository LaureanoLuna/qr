<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Mis Qrs') }}
            </h2>
            <x-nav-link :href="route('qr.create')" style="border:1px solid lightgreen;border-radius: 5px;width: 100px; color: lightgreen; padding: 0px 4px;text-align: center;">
                add
            </x-nav-link>
        </div>
    </x-slot>

    @foreach ($arrQrs as $qr )

    <div class="flex justify-between items-center border rounded-md border-gray-300 p-2 text-white "
        style="margin-left:auto; margin-right: auto;margin-top: 1em; width: 50%; font-size: 0.5cm;">
        <div class="flex justify-start items-center">
            <span class="m-2">
                {{$qr['qrImg']}}
            </span>
            <div style="margin-left: 1em; text-transform: lowercase; letter-spacing: 2px;">
                <h3><span style="font-weight: 100; font-size: 15px; color: gray; ">Nombre:</span> {{$qr['qrData']->nombre}}</h3>
                <h3><span style="font-weight: 100; font-size: 15px; color: gray; ">Url:</span> {{$qr['qrData']->links[0]->url}}</h3>

            </div>
        </div>
        <div class="grid grid-cols-2">

            <a id="btn-descarga-qr" href="{{ asset('qr/' . $qr['qrData']->id) }}.png" class="btn btn-primary" download="qr-{{ $qr['qrData']->id }}.png" style="border: solid 1px lightgray; border-radius: 5px; background-color: lightgray; color: gray;text-align: center; align-content: center;">
                descargar
            </a>

            <div style="display: grid;gap: 5px; text-transform: uppercase; height:100px;width: 100px; margin-left: 10px; margin-right: 20px;">
                <a href="route('qr.create')" style="border: solid 1px lightgreen; border-radius: 5px; background-color: transparent; color: lightgreen;text-align: center; align-content: center; text-transform: uppercase; ">update</a>
                <button style="border: solid 1px orangered; border-radius: 5px; background-color: transparent; color: orangered;text-align: center; align-content: center; text-transform: uppercase; ">delete</button>
            </div>
        </div>
    </div>

    @endforeach
</x-app-layout>