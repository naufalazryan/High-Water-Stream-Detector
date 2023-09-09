<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.temp') }}
        </h2>
    </x-slot>
    <div class="flex justify-center">
        <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 ">

            <div class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-1xl pl-5 md:flex">
                <div class="md:flex">
                    <div class="p-8 text-center">
                        <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.temperatureValue') }}</div>
                       
                            <div class="text-black ml-2">
                              
                                <span class="text-[40px]" id="nilaiSuhu"></span> 
                                <span class="align-top text-sm">°C</span>
            
                            </div>
                        
                        <p class="mt-5 text-slate-500">{{ __('messages.tempDesc') }}</p>
                    </div>
                </div>
            </div>
            <div class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-1xl pl-5 md:flex">
                <div class="md:flex">
                    <div class="p-8 text-center">
                        <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.temperatureCondition') }}</div>

                            <div class="text-black ml-2">
                                <span class="text-[40px]" id="keadaanSuhu"></span>
                            </div>

                        <p class="mt-5 text-slate-500">{{ __('messages.tempDesc2') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery Realtime -->
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#nilaiSuhu").load("{{ url('nilaisuhu') }}");
                $("#keadaanSuhu").load("{{ url('keadaansuhu') }}");
            }, 1000);
        });
    </script>

    
</x-app-layout>
