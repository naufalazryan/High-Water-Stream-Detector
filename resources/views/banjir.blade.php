<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.flood') }}
        </h2>
    </x-slot>
    <div class="flex justify-center mb-6">
        <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">

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
    <div class="container mx-auto my-auto p-4">
        <div class="bg-white shadow-lg p-4 rounded-lg">
            <h1 class="text-2xl font-semibold mb-4">Diagram Banjir</h1>
            <div class="relative" style="height: 400px;">
                <canvas id="barChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>
    <div id="dataTerbaru">
        <!-- Data terbaru akan ditampilkan di sini -->
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
        var labels = {!! json_encode($labels) !!};
        var values = {!! json_encode($values) !!};

        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nilai Banjir (cm)',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 10,
                        min: 0,
                        max: 60,
                        ticks: {
                            callback: function(value) {
                                return value + ' cm';
                            }
                        }
                    },
                    x: {
                        beginAtZero: true,
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        function updateDataAndChart() {
            $.ajax({
                url: '/get-latest-data', // Ganti dengan URL sesuai dengan rute Anda
                dataType: 'json',
                success: function(data) {
                    // Mengambil data terbaru
                    var latestValue = data.nilai_banjir;
                    var latestTime = data.waktu;

                    // Memperbarui data pada chart
                    myChart.data.datasets[0].data.push(latestValue);
                    myChart.data.labels.push(latestTime);

                    // Hapus data yang lebih dari 24 jam yang lalu
                    if (myChart.data.datasets[0].data.length > 24) {
                        myChart.data.datasets[0].data.shift();
                        myChart.data.labels.shift();
                    }

                    // Perbarui chart
                    myChart.update();
                }


            });


        }
    </script>


</x-app-layout>
