<x-app-layout>
    @if($qr->links->isNotEmpty())

    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Personaliza tu Qr') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex" style="gap: 10px;">
                <div>
                    <span id="img-qr">
                        <img src={asset()} alt="">
                    </span>
                    <a href="https://{{$qr->links[0]->url}}" class="block w-1/3 p-6 bg-white border border-gray-200 rounded-l-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$qr->nombre}}</h5>
                    </a>
                </div>
                <div class="w-full text-white" style="margin: 10px;">

                    <form action="">
                        <div style="display: flex;  gap: 5px; margin: 15px; color: white; font-weight: 500; letter-spacing: 2px;">
                            <label for="colorQr">
                                <h4>Color del Qr:</h4>
                            </label>
                            <input type="color" style="border: none; width: 100px; " name="colorQr" id="colorQr">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @else
    <p>No hay enlaces disponibles para este QR.</p>
    @endif



</x-app-layout>