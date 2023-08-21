<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelembapan') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="max-w-md mx-auto bg-white rounded-xl mt-10 md:mt-10 shadow-md overflow-hidden md:max-w-2x1 md:pl-5">
            <div class="md:flex">
                <div class="p-8 text-center">
                    <div class="text-lg mb-10 text-black font-semibold">Nilai Kelembapan</div>
                    <p class="block mt-1 text-lg leading-tight font-medium text-black">%</p>
                    <p class="mt-5 text-slate-500">ukuran kadar uap air yang berada dalam bentuk gas di udara</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
