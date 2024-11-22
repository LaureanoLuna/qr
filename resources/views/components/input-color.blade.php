@props(['label'])
@props(['name'])
@props(['idElement'])
@props(['defaultValor'])


<div id="{{$idElement}}" {{$attributes->merge(["class"=>"flex flex-col items-center justify-between h-full gap-2 border w-full"])}}>
    <x-input-label for="{{$name}}">
        {{$label}}
    </x-input-label>
    <input type="color" name="{{$name}}" class="rounded-md w-full " value="{{$defaultValor}}">

</div>