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
    <canvas id="myChart"></canvas>

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
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['01:00', '02:00', '03:00', ...'00:00'],
                datasets: [{
                    label: 'Data',
                    data: [dataJam0100, dataJam0200, dataJam0300, ...dataJam0000],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang batang
                    borderColor: 'rgba(75, 192, 192, 1)', // Warna garis tepi batang
                    borderWidth: 1
                }]
            },
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
