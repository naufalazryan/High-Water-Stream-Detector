<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('messages.informationProfile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('messages.informationDesc') }}
        </p>
    </header>

    <form>
        
    </form>

    <form>
      

        <div>
            <x-input-label for="" :value="" />
            <x-text-input id="" name="" type="text" style="background-color: #F5F5F5" class="mt-1 block w-full py-2 px-2 text-black" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" />
        </div>

        

        {{-- <div class="flex items-center gap-4">
            <x-primary-button>{{ __('messages.save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Tersimpan') }}</p>
            @endif
        </div> --}}
    </form>
</section>
