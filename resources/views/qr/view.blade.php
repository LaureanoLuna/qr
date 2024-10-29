<x-app-layout>
    @if($qr->links->isNotEmpty())
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-center items-center">
                <span id="img-qr">{{$qrCode}}</span>
                <a href="https://{{$qr->links[0]->url}}" class="block w-1/3 p-6 bg-white border border-gray-200 rounded-l-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$qr->nombre}}</h5>
                </a>
            </div>
        </div>
    </div>

    @else
    <p>No hay enlaces disponibles para este QR.</p>
    @endif



</x-app-layout>