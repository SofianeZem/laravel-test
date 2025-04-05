@extends('admin.admin')
@section('title', 'Tous les biens ')
@section('content')

    <div class="grid grid-cols-1 gap-4 p-4">
        <h1 class="text-amber-950 text-3xl text-center font-bold">@yield('title')</h1>
        <a href="{{ route('admin.property.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded-lg text-center w-fit mx-auto hover:bg-blue-700 transition">
            Ajouter un bien
        </a>
    </div>

    <div class="overflow-x-auto p-4">
        <table class="w-full text-center border border-gray-300 shadow-md bg-white">
            <thead class="bg-gray-200">
            <tr class="border-b">
                <th class="p-2">Titre</th>
                <th class="p-2">Surface</th>
                <th class="p-2">Prix</th>
                <th class="p-2">Ville</th>
                <th class="p-2 text-end">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($properties as $property)
                <tr class="border-b hover:bg-gray-100">
                    <td class="p-2">{{ $property->title }}</td>
                    <td class="p-2">{{ $property->surface }} m²</td>
                    <td class="p-2">{{ number_format($property->price, 0, '', ' ') }} €</td>
                    <td class="p-2">{{ $property->city }}</td>
                    <td class="p-2 text-end">
                        <a href="{{ route('admin.property.edit', $property) }}"
                           class="bg-blue-500 text-white px-4 py-2 rounded-lg text-center w-fit mx-auto hover:bg-blue-700 transition">Modifier</a>
                        <form action="{{ route('admin.property.destroy', $property) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg text-center w-fit mx-auto hover:bg-red-700 transition">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $properties->links('pagination::tailwind') }}
    </div>

@endsection
