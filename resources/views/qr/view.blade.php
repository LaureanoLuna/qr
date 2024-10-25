<x-app-layout>
    @if($qr->links->isNotEmpty())

    <div class="text-white mt-5 w-1/2 m-auto border-2 border-white rounded-md shadow-md">
        <h3>{{$qr->nombre}}:</h3>
        <a href="https://{{$qr->links[0]->url}}" target="_blank" rel="noopener noreferrer">Abrir enlace</a>
    </div>
    @else
    <p>No hay enlaces disponibles para este QR.</p>
    @endif
</x-app-layout>