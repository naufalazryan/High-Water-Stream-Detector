<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.dashboard') }}
        </h2>
    </x-slot>


    <div class="container mx-auto p-6 overflow-x-auto">

        <div style="display: inline">

            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:items-center md:space-x-4 mb-4">
                <a href="{{ route('export.sensor_data') }}" class="bg-black text-gray-400 hover:text-gray-100 py-2 px-4 rounded md:w-auto ml-auto">
                    <img src="{{ asset('images/export.png') }}" class="w-3" style="display: inline" alt="">
                    Export Data</a>

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
            </table>
        </div>
    </div>






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

</x-app-layout>
