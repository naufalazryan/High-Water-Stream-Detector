<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suhu') }}
        </h2>
    </x-slot>
    <div class="flex justify-center">
        <div class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-1xl pl-5 md:flex">
            <div class="md:flex">
                <div class="p-8 text-center">
                    <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.temperatureValue') }}</div>
                    @foreach ($suhu as $items => $item)
                        @if ($items == 0)
                        <div class="text-black ml-2">
                            <span class="text-[40px]">{{ $item->nilai_suhu }}</span>
                            <span class="align-top text-sm">°C</span>
                        </div>
                        @endif
                    @endforeach
                    <p class="mt-5 text-slate-500">temperatur menunjukkan derajat atau ukuran panas suatu benda.</p>
                </div>
            </div>
        </div>
        <div class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-1xl pl-5 md:flex">
            <div class="md:flex">
                <div class="p-8 text-center">
                    <div class="text-lg mb-5 text-black font-semibold">{{ __('messages.temperatureCondition') }}</div>
                    @foreach ($suhu as $items => $item)
                        @if ($items == 0)
                        <div class="text-black ml-2">
                            <span class="text-[40px]">{{ $item->keadaan_suhu }}</span>
                        </div>
                        @endif
                    @endforeach
                    <p class="mt-5 text-slate-500">temperatur menunjukkan derajat atau ukuran panas suatu benda.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
