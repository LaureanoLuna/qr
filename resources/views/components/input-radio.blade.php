@props(['label'])
@props(['name'])
@props(['idElement'])
@props(['valueInput'])



<div {{$attributes->merge(["class"=>" m-1 border w-full py-3 rounded-md hover:bg-gray-700 hover:cursor-pointer"])}}>
    <input type="radio" name="{{$name}}" id="{{$idElement}}" class="rounded-md " value="{{$valueInput}}">
    <x-input-label for="{{$name}}">
        {{$label}}
    </x-input-label>

</div>