<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Qrs') }}
        </h2>
    </x-slot>

    @foreach ($arrQrs as $qr )

    <div class="flex justify-start items-center border rounded-md border-gray-300 p-2 text-white " 
            style="margin-left:auto; margin-right: auto;margin-top: 1em; width: 50%; font-size: 0.5cm;">
        <span class="m-2">
            {{$qr['qrImg']}}
        </span>
        <div style="margin-left: 1em; text-transform: lowercase; letter-spacing: 2px;">
            <h3><span style="font-weight: 100; font-size: 15px; color: gray; ">Nombre:</span> {{$qr['qrData']->nombre}}</h3>
            <h3><span style="font-weight: 100; font-size: 15px; color: gray; ">Url:</span> {{$qr['qrData']->links[0]->url}}</h3>

        </div>
    </div>

    @endforeach
</x-app-layout>