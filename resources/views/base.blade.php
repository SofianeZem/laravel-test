<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    ...
    @livewireStyles
    <title>@yield('title') | MonAgence</title>
</head>
<body class="bg-gray-100 text-gray-900">

<nav class="bg-white shadow-md py-4 px-6">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-gray-800">Agence</a>

        <div class="flex space-x-6">
            <a href="{{route('property.index')}}"
               class="{{ request()->routeIs('admin.property.*') ? 'text-blue-500 font-bold' : 'text-gray-600 hover:text-gray-800' }}">
                Biens
            </a>
        </div>
    </div>
</nav>

    @yield('content')

@livewireScripts
</body>
</html>
