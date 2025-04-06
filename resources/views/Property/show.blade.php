@extends('base')

@section('title', $property->title)

@section('content')

    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-6 space-y-6 mt-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $property->title }}</h1>
            <h2 class="text-lg text-gray-600 mb-2">
                {{ $property->rooms }} pièces - {{ $property->surface }} m²
            </h2>
            <div class="text-2xl font-semibold text-blue-600">
                {{ number_format($property->price, 0, '', ' ') }} €
            </div>
        </div>

        <hr class="border-gray-200">

        <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
            <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Intéressé par ce bien ?</h4>

            @include('shared.flash')

            <form action="{{ route('property.contact', $property) }}" method="post" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @include('shared.input', ['class' => 'w-full', 'name' => 'firstname', 'label' => 'Prénom'])
                    @include('shared.input', ['class' => 'w-full', 'name' => 'lastname', 'label' => 'Nom',])
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @include('shared.input', ['class' => 'w-full', 'name' => 'phone', 'label' => 'Téléphone'])
                    @include('shared.input', ['type' => 'email', 'class' => 'w-full', 'name' => 'email', 'label' => 'Email'])
                </div>

                @include('shared.input', ['type' => 'textarea', 'class' => 'w-full', 'name' => 'message', 'label' => 'Votre message'])

                <div class="text-center">
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition mb-2">
                        Nous contacter
                    </button>
                    <livewire:booking-manager :propertyId="$property->id" />
                </div>
            </form>
        </div>

        <div>
            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{!! nl2br(e($property->description)) !!}</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Caractéristiques</h2>
                <table class="w-full text-left text-sm text-gray-700 border border-gray-200 rounded-lg">
                    <tbody>
                    <tr class="border-t">
                        <td class="p-2 font-medium">Surface habitable</td>
                        <td class="p-2">{{ $property->surface }} m²</td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-2 font-medium">Pièces</td>
                        <td class="p-2">{{ $property->rooms }}</td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-2 font-medium">Chambres</td>
                        <td class="p-2">{{ $property->bedrooms }}</td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-2 font-medium">Étage</td>
                        <td class="p-2">{{ $property->floor ?: 'Rez-de-chaussée' }}</td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-2 font-medium">Localisation</td>
                        <td class="p-2">{{ $property->address }}<br>{{ $property->city }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Spécificités</h2>
                <ul class="list-disc list-inside text-gray-700">
                    @forelse($property->options as $option)
                        <li>{{ $option->name }}</li>
                    @empty
                        <li>Aucune option disponible</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

@endsection
