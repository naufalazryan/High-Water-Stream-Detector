<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('messages.informationSettings') }}
        </h2>
        

        <p class="mt-1 text-md text-gray-600 mt-5 font-semibold">
            {{ __('messages.informationFloodSettings') }}
        </p>
    </header>



    <form method="post" {{-- action="{{ route('profile.update') }}" --}} class="mt-6 space-y-6">
        {{-- @csrf
        @method('patch') --}}

        <div>
            <x-input-label for="safe" :value="__('messages.safe')" />
            <x-text-input type="text" style="background-color: #F5F5F5" class="mt-1 block w-full py-2 px-2 text-black"
                required autofocus autocomplete="safe" />
            {{-- <x-input-error class="mt-2" }}:messages="$errors->get('name')" /> --}}
        </div>

        <div>
            <x-input-label for="warning" :value="__('messages.warning')" />
            <x-text-input type="text" style="background-color: #F5F5F5"
                class="mt-1 block w-full py-2 px-2 text-black" required autofocus autocomplete="warning" />
            {{-- <x-input-error class="mt-2" }}:messages="$errors->get('name')" /> --}}
        </div>

        <div>
            <x-input-label for="danger" :value="__('messages.danger')" />
            <x-text-input type="text" style="background-color: #F5F5F5"
                class="mt-1 block w-full py-2 px-2 text-black" required autofocus autocomplete="danger" />
            {{-- <x-input-error class="mt-2" }}:messages="$errors->get('name')" /> --}}
        </div>
        <div>
            <x-input-label for="danger" :value="__('messages.ssid')" />
            <x-text-input type="text" style="background-color: #F5F5F5"
                class="mt-1 block w-full py-2 px-2 text-black" required autofocus autocomplete="danger" />
            {{-- <x-input-error class="mt-2" }}:messages="$errors->get('name')" /> --}}
        </div>

        <div>
            <x-input-label for="danger" :value="__('messages.password')" />
            <x-text-input type="password" style="background-color: #F5F5F5"
                class="mt-1 block w-full py-2 px-2 text-black" required autofocus autocomplete="danger" />
            {{-- <x-input-error class="mt-2" }}:messages="$errors->get('name')" /> --}}
        </div>
        <div>
            <x-input-label for="danger" :value="__('messages.server')" />
            <x-text-input type="text" style="background-color: #F5F5F5"
                class="mt-1 block w-full py-2 px-2 text-black" required autofocus autocomplete="danger" />
            {{-- <x-input-error class="mt-2" }}:messages="$errors->get('name')" /> --}}
        </div>
        <div>
            <x-input-label for="danger" :value="__('messages.sms')" />
            <x-text-input type="text" style="background-color: #F5F5F5"
                class="mt-1 block w-full py-2 px-2 text-black" required autofocus autocomplete="danger" />
            {{-- <x-input-error class="mt-2" }}:messages="$errors->get('name')" /> --}}
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('messages.save') }}</x-primary-button>

            {{-- @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Tersimpan') }}</p>
            @endif --}}
        </div>
    </form>
</section>
