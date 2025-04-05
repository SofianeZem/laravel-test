@extends('admin.admin')

@section('title', $option->exists ? "Éditer une option" : "Créer une option")

@section('content')

    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-6">
        <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">@yield('title')</h1>

        <form action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store',  $option) }}" method="post" class="space-y-6">
            @csrf
            @method($option->exists ? 'put' : 'post')

            @include("shared.input", ['label' => 'Nom', 'name' => 'name', 'value' => $option->name])

            <div class="text-center mt-6">
                <button class="bg-blue-500 text-white px-6 py-3 rounded-lg text-lg font-medium shadow-md hover:bg-blue-600 transition">
                    {{ $option->exists ? 'Modifier' : 'Créer' }}
                </button>
            </div>

        </form>
    </div>

@endsection
