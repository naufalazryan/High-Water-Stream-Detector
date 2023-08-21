<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        {{-- <div class="container mx-auto p-6">
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-black">
                        <tr>

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Nilai Banjir</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Keadaan Banjir</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Nilai Suhu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Keadaan Suhu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Nilai Kelembapan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Keadaan Kelembapan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Nilai Hujan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Keadaan Hujan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        @foreach ($data_sensor as $item)
                        <tr class="text-black">
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
                    </tr>
                        @endforeach

                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div> --}}
        <div class="w-full overflow-x-auto">
            <table class="table-auto w-full bg-gray-100 shadow-md rounded-lg">
                <thead class="bg-black text-white">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <!-- Add more headers here -->
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-200 transition duration-300">
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">John Doe</td>
                        <td class="px-4 py-2">john@example.com</td>
                        <!-- Add more data columns here -->
                    </tr>
                    <!-- Add more rows here -->
                </tbody>
            </table>
        </div>
        

</x-app-layout>
