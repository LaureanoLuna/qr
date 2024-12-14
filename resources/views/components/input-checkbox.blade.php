@props(['label'])
@props(['isChecked'])

<div {{$attributes->merge(["class"=>"flex justify-start gap-2 items-center m-1"])}}>
    <input type="checkbox" name="isdinamico" id="isdinamico" class="rounded-md " {{$isChecked ? 'checked' : "" }}  >
    <x-input-label for="isdinamico">
        {{$label}}
    </x-input-label>

</div>