@extends('admin.admin')

@section('title', 'Toutes les options')

@section('content')

    <div class="grid grid-cols-1 gap-4 p-4">
        <h1 class="text-amber-950 text-3xl text-center font-bold">@yield('title')</h1>
        <a href="{{ route('admin.option.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded-lg text-center w-fit mx-auto hover:bg-blue-700 transition">
            Ajouter une option
        </a>
    </div>

    <div class="overflow-x-auto p-4">
        <table class="w-full text-center border border-gray-300 shadow-md bg-white">
            <thead class="bg-gray-200">
            <tr class="border-b">
                <th class="p-2">Nom</th>
                <th class="p-2">Actions</th> <!-- Ajout d'une colonne pour aligner les boutons -->
            </tr>
            </thead>
            <tbody>
            @foreach($options as $option)
                <tr class="border-b hover:bg-gray-100">
                    <td class="p-2">{{ $option->name }}</td>
                    <td class="p-2 text-center">
                        <div class="flex items-center justify-center gap-3">
                            <!-- Modifier -->
                            <a href="{{ route('admin.option.edit', $option) }}"
                               class="text-blue-500 hover:text-blue-700 transition">
                                Modifier
                            </a>

                            <!-- Supprimer -->
                            <form action="{{ route('admin.option.destroy', $option) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $options->links('pagination::tailwind') }}
    </div>

@endsection
