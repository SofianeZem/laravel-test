<x-guest-layout>
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6 mt-10">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">Se connecter</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-center text-sm text-green-600" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full"
                              type="email" name="email" :value="old('email')"
                              required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password" name="password"
                              required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                       name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">
                    Se souvenir de moi
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900 underline"
                       href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif

                <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    Se connecter
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
