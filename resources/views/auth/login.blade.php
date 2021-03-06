<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-app-logo width=300 height="300" />
        </x-slot>


        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-white">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf


            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                @if(env('APP_DEBUG'))
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="juan@email" required
                    autofocus />
                @else
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
                @endif
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                @if(env('APP_DEBUG'))
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" value="abc.1234"
                    required autocomplete="current-password" />
                @else
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" value="" required
                    autocomplete="current-password" />
                @endif

            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-200">{{ __('Remember me') }}</span>
                </label>
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-200 hover:text-yellow-300 mr-2" href="{{ route('register') }}">
                    {{ __('Quiero registrarme') }}
                </a>
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-200 hover:text-yellow-300" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-button-light class="ml-4">
                    {{ __('Login') }}
                </x-button-light>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
