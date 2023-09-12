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
                class="mt-1 block w-full py-2 px-2 text-black bg-gray-100 resize-none" required autofocus></textarea>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('messages.download') }}</x-primary-button>
        </div>
    </form>
    {{-- @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('send.email') }}">
        @csrf

        <div class="mb-4">
            <label for="recipient_email" class="block text-gray-700">Alamat Email Penerima:</label>
            <input type="email" name="recipient_email" id="recipient_email" required
                class="border rounded-md p-2 w-full focus:ring focus:ring-blue-300">
        </div>

        <!-- Tambahkan input-form untuk data sensor atau konten email -->
        <!-- Contoh: -->
        <!--
    <div class="mb-4">
        <label for="sensor_data" class="block text-gray-700">Data Sensor:</label>
        <textarea name="sensor_data" id="sensor_data" rows="4"
            class="border rounded-md p-2 w-full focus:ring focus:ring-blue-300"></textarea>
    </div>
    -->

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Kirim Email
            </button>
        </div>
    </form> --}}


</section>
