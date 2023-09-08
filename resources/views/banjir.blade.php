<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.flood') }}
        </h2>
    </x-slot>
    <div class="flex justify-center">
        <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 ">

            <div
                class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                <div class="md:flex">
                    <div class="p-8 text-center">
                        <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.floodValue') }}</div>

                        <div class="text-black ml-2">
                            <span class="text-[40px]" id="nilaibanjir"></span>
                        </div>

                        <p class="mt-5 text-slate-500">{{ __('messages.floodDesc') }}</p>
                    </div>
                </div>
            </div>
            <div
                class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                <div class="md:flex">
                    <div class="p-8 text-center">
                        <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.floodCondition') }}</div>

                        <div class="text-black ml-2">
                            <span class="text-[40px]" id="keadaanbanjir"></span>
                        </div>

                        <p class="mt-5 text-slate-500">{{ __('messages.floodDesc2') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 80%; margin: auto; height: auto; max-width: 100%">
        <canvas id="barChart"></canvas>
    </div>
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#nilaibanjir").load("{{ url('nilaibanjir') }}");
                $("#keadaanbanjir").load("{{ url('keadaanbanjir') }}");
            }, 1000);
        });
    </script>
    <script>
        // Ambil data diagram batang dari controller
        var data = {!! json_encode($data) !!};

        // Mengambil elemen canvas dan membuat objek grafik
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
