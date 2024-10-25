@props(['label'])

<div {{$attributes->merge(["class"=>"flex justify-start gap-2 items-center m-5"])}}>
    <input type="checkbox" name="isdinamico" id="isdinamico" class="rounded-md mx-5">
    <x-input-label for="isdinamico">
        {{$label}}
    </x-input-label>

</div>