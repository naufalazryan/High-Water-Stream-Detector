<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.dashboard') }}
        </h2>
    </x-slot>


    <div class="container mx-auto p-6 overflow-x-auto">
        
        <div style="display: inline">

            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:items-center md:space-x-4 mb-4">

                {{-- <button @click="showModal = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Tampilkan Pesan
                </button>
            
                <!-- Modal -->
                <div v-if="showModal" class="fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        
                        <!-- Bagian modal -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <!-- Tampilkan pesan sesuai dengan logika Anda -->
                                @if ($data_sensor == 'Aman')
                                    <p>Terjadi Penurunan tinggi aliran air, Keadaan saat ini aman dan {{ $keadaan_hujan }}</p>
                                @elseif ($data_sensor == 'Waspada')
                                    <p>Terjadi Peningkatan tinggi aliran air, Keadaan saat ini waspada dan {{ $keadaan_hujan }}</p>
                                @elseif ($data_sensor == 'Bahaya')
                                    <p>Terjadi Peningkatan tinggi aliran air, Keadaan saat ini bahaya dan {{ $keadaan_hujan }}</p>
                                @endif
                            </div>
                            
                            <!-- Tombol Tutup Modal -->
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button @click="showModal = false" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <a href="{{ route('dashboard', ['orderBy' => 'id', 'sortDirection' => 'asc']) }}"
                    class="bg-black text-gray-400 hover:text-gray-100 py-2 px-4 rounded md:w-auto ml-auto">
                    <img src="{{ asset('images/asc.png') }}" class="w-3" style="display: inline" alt="">
                    {{ __('messages.asc') }}
                </a>

                <a href="{{ route('dashboard', ['orderBy' => 'id', 'sortDirection' => 'desc']) }}"
                    class="bg-black text-gray-400 hover:text-gray-100 py-2 px-4 rounded ml-auto md:w-auto">
                    <img src="{{ asset('images/desc.png') }}" class="w-3" style="display: inline" alt="">
                    {{ __('messages.desc') }}
                </a>
            </div>
        </div>


        <div class="bg-white rounded-lg shadow overflow-x-auto w-full h-full md:w-full">
            <table class="min-w-full divide-y divide-gray-200" id="data-table">
                <thead class="bg-black text-center">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.id') }}
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.floodValue') }}
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.floodCondition') }}
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.temperatureValue') }}
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.temperatureCondition') }}
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.humidityValue') }}
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.humidityCondition') }}
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.rainValue') }}
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.rainCondition') }}
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.time') }}
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-300">
                            {{ __('messages.delete') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="alldata bg-white divide-y divide-gray-300" id="content">
                    @foreach ($data_sensor as $item)
                        <tr class="text-black text-center hover:bg-gray-100" id="tr_{{ $item->id }}">
                            <td class="px-6 py-4">{{ $item->id }}</td>
                            <td class="px-6 py-4">{{ $item->nilai_banjir }}</td>
                            <td class="px-6 py-4">{{ $item->keadaan_banjir }}</td>
                            <td class="px-6 py-4">{{ $item->nilai_suhu }}</td>
                            <td class="px-6 py-4">{{ $item->keadaan_suhu }}</td>
                            <td class="px-6 py-4">{{ $item->nilai_kelembapan }}</td>
                            <td class="px-6 py-4">{{ $item->keadaan_kelembapan }}</td>
                            <td class="px-6 py-4">{{ $item->nilai_hujan }}</td>
                            <td class="px-6 py-4">{{ $item->keadaan_hujan }}</td>
                            <td class="px-6 py-4">{{ $item->waktu }}</td>
                            <td class="px-6 py-4">
                                <a href="javascript:void(0)" onclick="deletedata({{ $item->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                {{-- <tbody class="searchdata bg-white divide-y divide-gray-300" id="content"></tbody> --}}

            </table>
        </div>


        <div class="mt-4">
            {{ $data_sensor->links() }}
        </div>
        <div class="flex justify-center">
            <div class="row">
                <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4  ">

                    <div
                        class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                        <div class="md:flex">
                            <div class="p-8 text-center">
                                <div class="text-lg mb-5 text-black font-semibold">
                                    {{ __('messages.temperatureValue') }}</div>
                                <div id="data-list" class="text-black">
                                    <span class="text-[38px]" id="nilaisuhu"></span>
                                </div>
                                <p class="mt-5 text-slate-500">{{ __('messages.tempDesc') }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                        <div class="md:flex">
                            <div class="p-8 text-center">
                                <div class="text-lg mb-5 text-black font-semibold">
                                    {{ __('messages.temperatureCondition') }}</div>

                                <div class="text-black ml-2">

                                    <span class="text-[38px]" id="keadaansuhu"></span>

                                </div>

                                <p class="mt-5 text-slate-500">{{ __('messages.tempDesc2') }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                        <div class="md:flex">
                            <div class="p-8 text-center">
                                <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.humidityValue') }}
                                </div>
                                <div id="data-list" class="text-black">
                                    <span class="text-[38px]" id="nilaikelembapan"></span>
                                </div>
                                <p class="mt-5 text-slate-500">{{ __('messages.humidityDesc') }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                        <div class="md:flex">
                            <div class="p-8 text-center">
                                <div class="text-lg mb-5 text-black font-semibold">
                                    {{ __('messages.humidityCondition') }}</div>

                                <div class="text-black ml-2">

                                    <span class="text-[38px]" id="keadaankelembapan"></span>

                                </div>

                                <p class="mt-5 text-slate-500">{{ __('messages.humidityDesc') }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                        <div class="md:flex">
                            <div class="p-8 text-center">
                                <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.floodValue') }}
                                </div>
                                <div id="data-list" class="text-black">
                                    <span class="text-[38px]" id="nilaibanjir"></span>
                                </div>
                                <p class="mt-5 text-slate-500">{{ __('messages.floodDesc') }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                        <div class="md:flex">
                            <div class="p-8 text-center">
                                <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.floodCondition') }}
                                </div>

                                <div class="text-black ml-2">

                                    <span class="text-[38px]" id="keadaanbanjir"></span>

                                </div>

                                <p class="mt-5 text-slate-500">{{ __('messages.floodDesc2') }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                        <div class="md:flex">
                            <div class="p-8 text-center">
                                <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.rainValue') }}
                                </div>
                                <div id="data-list" class="text-black">
                                    <span class="text-[38px]" id="nilaihujan"></span>
                                </div>
                                <p class="mt-5 text-slate-500">{{ __('messages.rainDesc') }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
                        <div class="md:flex">
                            <div class="p-8 text-center">
                                <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.rainCondition') }}
                                </div>

                                <div class="text-black ml-2">

                                    <span class="text-[38px]" id="keadaanhujan"></span>

                                </div>

                                <p class="mt-5 text-slate-500">{{ __('messages.rainDesc2') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': $value
                },

                success: function(data) {
                    console.log(data);
                    $('#content').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        function deletedata(id) {

            if (confirm("Are you sure to delete this")) {

                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });



                $.ajax({

                    url: 'delete_data/' + id,
                    type: 'DELETE',

                    success: function(result) {
                        $("#" + result['tr']).slideUp("slow");
                    }


                });
            }

        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#nilaisuhu").load("{{ url('nilaisuhu') }}");
                $("#keadaansuhu").load("{{ url('keadaansuhu') }}");
                $("#nilaikelembapan").load("{{ url('nilaikelembapan') }}");
                $("#keadaankelembapan").load("{{ url('keadaankelembapan') }}");
                $("#nilaibanjir").load("{{ url('nilaibanjir') }}");
                $("#keadaanbanjir").load("{{ url('keadaanbanjir') }}");
                $("#nilaihujan").load("{{ url('nilaihujan') }}");
                $("#keadaanhujan").load("{{ url('keadaanhujan') }}");
            }, 1000);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Ketika tombol "Buka Modal" diklik
            $("#openModalButton").click(function() {
                $.ajax({
                    url: "{{ route('dashboard.keadaan') }}",
                    type: "GET",
                    success: function(data) {
                        var keadaanBanjir = data.keadaanBanjir;
                        var keadaanHujan = data.keadaanHujan;
                        var message = data.message;

                        // Menampilkan pesan dalam modal
                        var modalContent = message;
                        $("#modalContent").html(modalContent);
                        $("#myModal").removeClass("hidden");
                    },
                    error: function() {
                        alert("Terjadi kesalahan saat mengambil data keadaan.");
                    }
                });
            });

            // Ketika tombol "Tutup Modal" diklik
            $("#closeModalButton").click(function() {
                $("#myModal").addClass("hidden");
            });
        });
    </script>




</x-app-layout>
