@extends('admin.admin')

@section('title', $property->exists ? "Éditer un bien" : "Créer un bien")

@section('content')

    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-6">
        <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">@yield('title')</h1>

        <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store',  $property) }}" method="post" class="space-y-6">
            @csrf
            @method($property->exists ? 'put' : 'post')

            @include("shared.input", ['label' => 'Titre', 'name' => 'title', 'value' => $property->title])

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @include("shared.input", ['label' => 'Surface (m²)', 'name' => 'surface', 'value' => $property->surface])
                @include("shared.input", ['label' => 'Prix (€)', 'name' => 'price', 'value' => $property->price])
            </div>

            @include("shared.input", ['type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'value' => $property->description])

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @include("shared.input", ['label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
                @include("shared.input", ['label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
                @include("shared.input", ['label' => 'Étage', 'name' => 'floor', 'value' => $property->floor])
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @include("shared.input", ['label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
                @include("shared.input", ['label' => 'Ville', 'name' => 'city', 'value' => $property->city])
                @include("shared.input", ['label' => 'Code postal', 'name' => 'postal_code', 'value' => $property->postal_code])
            </div>

            <div class="flex items-center space-x-2">
                @include("shared.select", ['label' => 'Option', 'name' => 'options', 'value' => $property->options()->pluck('id'), 'multiple' => true])
                @include("shared.checkbox", ['label' => 'Vendu', 'name' => 'sold', 'value' => $property->sold, 'options' => $options])
            </div>

            <div class="text-center mt-6">
                <button class="bg-blue-500 text-white px-6 py-3 rounded-lg text-lg font-medium shadow-md hover:bg-blue-600 transition">
                    {{ $property->exists ? 'Modifier' : 'Créer' }}
                </button>
            </div>

        </form>
    </div>

@endsection
