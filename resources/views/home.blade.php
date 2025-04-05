@extends('base')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h1 class="text-4xl font-bold text-blue-600">Agence Lorem Ipsum</h1>
            <p class="text-gray-700 mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at dolor earum est facilis, fugiat fugit iste minus modi molestiae mollitia nulla pariatur quia quibusdam sapiente similique sit ut veniam!</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto p-6">
        <h2 class="text-3xl font-semibold text-gray-900 mb-6">Nos derniers biens</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($properties as $property)
                <div class="bg-white shadow-md rounded-lg p-4">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
