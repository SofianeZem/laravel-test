<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>@yield('title') | Administration</title>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

<nav class="bg-white shadow-md py-4 px-6">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-gray-800">Agence</a>

        <!-- Liens + Logout -->
        <div class="flex items-center space-x-6">
            <a href="/"
               class="{{ request()->routeIs('admin.property.*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-gray-800 transition' }}">
                Gérer les biens
            </a>
            <a href="{{ route('admin.option.index') }}"
               class="{{ request()->routeIs('admin.option.*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-gray-800 transition' }}">
                Gérer les options
            </a>
                            @auth
                                <form action="{{ route('logout') }}" method="POST" class="ml-4">
                                    @csrf
                                    <button class="text-red-500 hover:underline hover:text-red-700 transition">
                                        Se déconnecter
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </nav>

                <div class="max-w-6xl mx-auto px-6 py-10 space-y-6">
                    @include('shared.flash')

                    @yield('content')
                </div>


</body>
</html>
