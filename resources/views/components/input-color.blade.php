@props(['label'])
@props(['name'])
@props(['idElement'])
@props(['defaultValor'])


<div id="{{$idElement}}" {{$attributes->merge(["class"=>"flex items-center gap-2 "])}}>
    <input type="color" name="{{$name}}" class=" rounded-2xl w-12 h-12 " value="{{$defaultValor}}">
    <x-input-label for="{{$name}}">
        {{$label}}
    </x-input-label>

</div>