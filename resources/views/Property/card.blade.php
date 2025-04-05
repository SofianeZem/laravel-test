<div class="bg-white shadow-lg rounded-xl overflow-hidden p-4 transition transform hover:scale-105">
    <h5 class="text-xl font-bold text-gray-900 mb-2">
        <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}"
           class="hover:text-blue-500 transition">
            {{ $property->title }}
        </a>
    </h5>

    <p class="text-gray-600 mb-2">
        {{ $property->surface }} m² - {{ $property->city }} ({{ $property->postal_code }})
    </p>

    <div class="text-lg font-semibold text-blue-600">
        {{ number_format($property->price, 0, '', ' ') }} €
    </div>
</div>
