@php
    $label ??= ucfirst($name);
    $class ??= null;
    $name ??= '';
    $value ??= collect($value ?? []);
@endphp

<div @class(["mb-4", $class])>
    <label for="{{ $name }}" class="block text-gray-700 font-medium mb-2">{{ $label }}</label>

    <select name="{{ $name }}[]" id="{{ $name }}" multiple
            class="w-full border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring-blue-500 focus:border-blue-500">
        @foreach($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>

    @error($name)
    <div class="mt-1 text-red-500 text-sm flex items-center">
        ⚠️ {{ $message }}
    </div>
    @enderror
</div>

