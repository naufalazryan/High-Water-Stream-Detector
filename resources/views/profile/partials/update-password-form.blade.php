<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('messages.changePassword') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('messages.passwordDesc') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('messages.password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full py-2 px-2 text-black" style="background-color: #F5F5F5" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('messages.newPassword')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full bg-white py-2 px-2 text-black" style="background-color: #F5F5F5" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('messages.confirmPassword')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full py-2 px-2 text-black" style="background-color: #F5F5F5" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('messages.save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('messages.passwordSaved') }}</p>
            @endif
        </div>
    </form>
</section>
