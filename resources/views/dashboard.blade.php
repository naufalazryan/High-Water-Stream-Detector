<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6 overflow-x-auto">
        <div class="bg-white rounded-lg shadow overflow-x-auto w-full h-full md:w-full">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-black text-center">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">{{ __('messages.id') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">{{ __('messages.floodValue') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">{{ __('messages.floodCondition') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">{{ __('messages.temperatureValue') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">{{ __('messages.temperatureCondition') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">{{ __('messages.humidityValue') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">{{ __('messages.humidityCondition') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">{{ __('messages.rainValue') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">{{ __('messages.rainCondition') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">{{ __('messages.time') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-300">
                    @foreach ($data_sensor as $item)
                        <tr class="text-black text-center hover:bg-gray-100">
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
        
        <div class="mt-4">
            {{ $data_sensor->links() }}
        </div>
    </div>
    
</x-app-layout>
