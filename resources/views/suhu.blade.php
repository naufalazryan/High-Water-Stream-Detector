<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suhu') }}
        </h2>
    </x-slot>
    <div class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-1xl pl-5 md:flex">
        <div class="md:flex">
            <div class="p-8 text-center">
                <div class="text-lg mb-10 text-black font-semibold">Nilai Suhu</div>
                <p class="block mt-1 text-lg leading-tight font-medium text-black">°C</p>
                <p class="mt-5 text-slate-500">temperatur menunjukkan derajat atau ukuran panas suatu benda.</p>
            </div>
        </div>
    </div>
</x-app-layout>
