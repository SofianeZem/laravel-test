@extends('base')

@section('title', 'Tous nos biens')

@section('content')

    <div class="max-w-6xl mx-auto p-6">
        <div class="bg-white shadow-lg rounded-xl p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-4">Recherchez votre bien idéal</h1>

            <form action="" method="get" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <input type="number" placeholder="Surface minimum" name="surface"
                       value="{{ $input['surface'] ?? '' }}"
                       class="w-full border-gray-300 rounded-lg p-2 focus:border-blue-500 focus:ring-blue-500">

                <input type="number" placeholder="Nombre de pièces minimum" name="rooms"
                       value="{{ $input['rooms'] ?? '' }}"
                       class="w-full border-gray-300 rounded-lg p-2 focus:border-blue-500 focus:ring-blue-500">

                <input type="number" placeholder="Budget max" name="price"
                       value="{{ $input['price'] ?? '' }}"
                       class="w-full border-gray-300 rounded-lg p-2 focus:border-blue-500 focus:ring-blue-500">

                <input type="text" placeholder="Mot clé" name="title"
                       value="{{ $input['title'] ?? '' }}"
                       class="w-full border-gray-300 rounded-lg p-2 focus:border-blue-500 focus:ring-blue-500">

                <div class="md:col-span-2 lg:col-span-4 flex justify-center">
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($properties as $property)
                <div class="bg-white shadow-md rounded-lg p-4">
                    @include('property.card')
                </div>
            @empty
                <div class="col-span-full text-center text-gray-600 text-lg">
                    Aucun bien ne correspond à votre recherche.
                </div>
            @endforelse
        </div>

        <div class="mt-6 flex justify-center">
            {{ $properties->links('pagination::tailwind') }}
        </div>
    </div>

@endsection
