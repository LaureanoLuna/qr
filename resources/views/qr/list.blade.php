<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Mis Qrs') }}
            </h2>
            <a href="/create" class="flex justify-center items-center gap-2 uppercase transition hover:bg-white hover:text-black" style="border:1px solid white;border-radius: 5px;width: auto; color: white; text-align: center; padding: 5px 15px;">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 20px; margin: auto;">
                    <path fill='#fff' d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                </svg>
                <h4>Nuevo</h4>

            </a>
        </div>
    </x-slot>

    @foreach ($arrQrs as $qr )

    <div class="flex justify-between items-center border rounded-md border-gray-300 p-2 text-white" style="margin-left:auto; margin-right: auto;margin-top: 1em; width: 50%; font-size: 0.5cm;">
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

            @if ($qr['qrData']->deshabilitado)
            <a id="btn-descarga-qr" href="{{ asset('qr/' . $qr['qrData']->id) }}.png" class="btn btn-primary" download="qr-{{ $qr['qrData']->id }}.png" style="border: solid 1px #a3a3a3; border-radius: 5px; background-color: transparent;align-content: center; cursor:not-allowed; pointer-events: none;">
                <svg style="width: 50px; margin: auto;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#a3a3a3" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm3 -->68 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                </svg>
            </a>
            <div style="display: grid;gap: 5px; text-transform: uppercase; height:100px;width: 100px; margin-left: 10px; margin-right: 20px;">
                <a href="route('qr.create')" style="border: solid 1px #a3a3a3; border-radius: 5px; background-color: transparent; color: yellow;text-align: center; align-content: center; text-transform: uppercase; cursor:not-allowed; pointer-events: none;">
                    <svg style="width: 25px; margin: auto;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#a3a3a3" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                    </svg></a>

                @include('qr.modalHabilitaQr',['qrID' => $qr['qrData']->id])

            </div>
            @else

            <a id="btn-descarga-qr" aria-disabled="true" href="{{ asset('qr/' . $qr['qrData']->id) }}.png" class="btn btn-primary" download="qr-{{ $qr['qrData']->id }}.png" style="border: solid 1px lightblue; border-radius: 5px; background-color: transparent;align-content: center;">
                <svg style="width: 50px; margin: auto;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#7ac6ff" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm3 -->68 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                </svg>
            </a>
            <div style="display: grid;gap: 5px; text-transform: uppercase; height:100px;width: 100px; margin-left: 10px; margin-right: 20px;">
                <a href="/edit/{{$qr['qrData']->id}}" style="border: solid 1px yellow; border-radius: 5px; background-color: transparent; color: yellow;text-align: center; align-content: center; text-transform: uppercase; ">
                    <svg style="width: 25px; margin: auto;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#FFD43B" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                    </svg></a>

                @include('qr.modalDishableQr',['qrID' => $qr['qrData']->id])

            </div>
            @endif



        </div>
    </div>

    @endforeach
</x-app-layout>