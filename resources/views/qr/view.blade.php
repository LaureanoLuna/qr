blade
@if($qr->links->isNotEmpty())
    {{$qr->links[0]->url}} <!-- Muestra la URL -->
    <div>
        <a href="{{$qr->links[0]->url}}" target="_blank" rel="noopener noreferrer">Abrir enlace</a>
    </div>
@else
    <p>No hay enlaces disponibles para este QR.</p>
@endif