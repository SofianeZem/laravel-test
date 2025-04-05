@php
    $label ??= ucfirst($name);
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp

<div @class(["mb-4", $class])>
    <label for="{{ $name }}" class="block text-gray-700 font-medium mb-2">{{ $label }}</label>
    @if($type == 'textarea')
        <textarea
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            class="w-full px-4 py-3 border rounded-lg shadow-sm text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500
               @error($name) border-red-500 @enderror">{{old($name, $value)}}</textarea>
    @else
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ old($name, $value) }}"
            class="w-full px-4 py-3 border rounded-lg shadow-sm text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500
               @error($name) border-red-500 @enderror"
        >
    @endif

    @error($name)
    <div class="mt-1 text-red-500 text-sm flex items-center">
        ⚠️ {{ $message }}
    </div>
    @enderror
</div>
