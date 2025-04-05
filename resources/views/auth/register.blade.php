<x-guest-layout>
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6 mt-10">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">Créer un compte</h1>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nom complet')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                              :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                              :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 hover:text-gray-900 underline"
                   href="{{ route('login') }}">
                    Déjà inscrit ?
                </a>

                <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    {{ __('S’inscrire') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
