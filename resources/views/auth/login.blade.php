<x-guest-layout>
    <!-- Session Status -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.3/dist/full.css" rel="stylesheet" type="text/css" /> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('messages.email')" />
            <x-text-input id="email" class="block mt-1 w-full py-2 px-2" style="background-color: #F5F5F5;"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('messages.password')" />

            <x-text-input id="password" class="block mt-1 w-full py-2 px-2" style="background-color: #F5F5F5;"
                type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('messages.forgotPassword') }}
                </a>
            @endif
            @if (Route::has('register'))
                <a class="ml-4 bg-[#202937] hover:bg-[#384151] text-white rounded-md w-[75px] h-[31px] text-center p-1 uppercase text-xs font-medium tracking-wider flex items-center justify-center"
                    href="{{ route('register') }}">
                    {{ __('messages.register') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('messages.login') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
