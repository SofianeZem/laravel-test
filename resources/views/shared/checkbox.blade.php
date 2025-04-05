@php
    $class ??= null;
@endphp

<div @class(["flex items-center space-x-3", $class])>

    <input type="hidden" value="0" name="{{ $name }}">

    <input
        type="checkbox"
        id="{{ $name }}"
        name="{{ $name }}"
        value="1"
        @checked(old($name, $value ?? false))
        class="appearance-none w-10 h-5 bg-gray-300 rounded-full relative transition
               checked:bg-blue-500 checked:after:translate-x-5 after:content-[''] after:w-5 after:h-5 after:bg-white
               after:rounded-full after:absolute after:top-0 after:left-0 after:transition
               border @error($name) border-red-500 @enderror"
        role="switch"
    >

    <label for="{{ $name }}" class="text-gray-700 font-medium">{{ $label }}</label>

    @error($name)
    <div class="mt-1 text-red-500 text-sm flex items-center">
        ⚠️ {{ $message }}
    </div>
    @enderror
</div>
