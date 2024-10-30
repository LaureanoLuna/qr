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
        <div class="flex">
            <x-nav-link style="border: solid 1px lightgray; width: 80px; border-radius: 5px; background-color: lightgray; color: gray;text-align: center;">
                DWN
            </x-nav-link>
            <div style="display: flex; flex-direction: column;justify-content: space-evenly ;text-transform: uppercase; height:100px;width: 100px; margin-left: 10px; margin-right: 20px;">
                <x-nav-link :href="route('qr.create')" style="border: 1px solid lightyellow; border-radius: 5px; padding: 1px 3px;  text-transform: uppercase; width: 100%;text-align: center;">update</x-nav-link>
                <x-nav-link style="border: 1px solid red; border-radius: 5px; padding: 2px 5px;  text-transform: uppercase; width: 100%;text-align: center; ">delete</x-nav-link>
            </div>
        </div>
    </div>

    @endforeach
</x-app-layout>