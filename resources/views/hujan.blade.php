<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.rain') }}
        </h2>
    </x-slot>
    <div class="flex justify-center">
        <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 ">

            <div
                class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                <div class="md:flex">
                    <div class="p-8 text-center">
                        <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.rainValue') }}</div>
                        <div class="text-black">
                            <span class="text-[40px]" id="nilaihujan"></span>
                        </div>
                        <p class="mt-5 text-slate-500">{{ __('messages.rainDesc') }}</p>
                    </div>
                </div>
            </div>
            <div
                class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                <div class="md:flex">
                    <div class="p-8 text-center">
                        <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.rainCondition') }}</div>

                        <div class="text-black ml-2">

                            <span class="text-[40px]" id="keadaanhujan"></span>

                        </div>

                        <p class="mt-5 text-slate-500">{{ __('messages.rainDesc2') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#nilaihujan").load("{{ url('nilaihujan') }}");
                $("#keadaanhujan").load("{{ url('keadaanhujan') }}");
            }, 1000);
        });
    </script>
</x-app-layout>
