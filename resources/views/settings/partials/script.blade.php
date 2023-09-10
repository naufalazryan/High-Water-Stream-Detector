<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('messages.generatePy') }}
        </h2>

    
    </header>

    <form method="POST" action="{{ route('save-python-script') }}" class="mt-6 space-y-6">
        @csrf

        <div>
           
            <textarea name="python_script" id="python_script" rows="10"
                class="mt-1 block w-full py-2 px-2 text-black bg-gray-100 resize-none"
                required autofocus></textarea>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('messages.download') }}</x-primary-button>
        </div>
    </form>
</section>
