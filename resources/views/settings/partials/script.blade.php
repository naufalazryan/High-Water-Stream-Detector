<section>
    <header class="flex items-center">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('messages.generatePy') }}
        </h2>
    </header>

    <div class="rounded-md">
        <form method="POST" action="{{ route('save-python-script') }}" class="mt-6 space-y-6 rounded" @csrf <div>
            <textarea name="python_script" id="python_script" rows="10"
                class="mt-1 block w-full py-2 px-2 text-black bg-gray-100 resize-znone" required autofocus></textarea>
    </div>

    <div>
        <x-primary-button
            class="btn bg-[#202937]  hover:bg-[#384151] text-gray-100">{{ __('messages.download') }}</x-primary-button>
    </div>
    </form>
    <h2 class="text-lg font-medium text-gray-900 mt-[50px]">
        {{ __('messages.templatePy') }}
    </h2>
    <form method="POST" action="{{ route('download.python.template') }}" class="mt-6 space-y-6 rounded">
        @csrf
        <div>
            <x-primary-button
                class="btn bg-[#202937] hover:bg-[#384151] text-gray-100">{{ __('messages.template') }}</x-primary-button>
        </div>
    </form>
    </div>
</section>
