<x-guest-layout>

    <div class="flex items-center justify-center  bg-gray-100 w-100">
        <div class="flex bg-white shadow-lg rounded-lg overflow-hidden  w-full m-4">

            <!-- Image -->
            <div class="w-1/2  sm:block">
                <img src="{{ asset('storage/photos/452140-PG1YNB-3.jpg') }}" 
                     alt="photo" 
                     class="h-full w-full object-cover">
            </div>

            <!-- Formulaire -->
            <div class="w-1/2 p-1">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full"
                            type="email" name="email" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Mot de passe')" />
                        <x-text-input id="password" class="block mt-1 w-full"
                            type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between mt-4">
                        <label class="text-sm text-gray-600">
                            <input type="checkbox" class="mr-1">
                           Se souvenir de moi
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:underline"
                                href="{{ route('password.request') }}">
                                Mot de passe oublié?
                            </a>
                        @endif
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        Vous n'avez pas de compte ? 
                            <a class="text-sm text-indigo-600 hover:underline"
                                href="{{ route('register') }}">
                                  Inscrivez-vous
                            </a>
                    </div>

                    <!-- Button -->
                    <x-primary-button class="w-full mt-6 justify-center">
                        {{ __('Connexion') }}
                    </x-primary-button>

                     

                </form>
            </div>

        </div>
    </div>

</x-guest-layout>