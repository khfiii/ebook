<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Best Ebooks') }}
        </h2>
    </x-slot>

    <div class="bg-white">

        <div class="px-[1rem] sm:px-[1.5rem] md:px-[2rem] xl:px-[4.7rem] pb-[2rem] text-black">
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                <x-ebook title="Airpods" id="1" author="Bagas Adi Ardiansyah" alt="nama_gambar" :image="asset('book.png')" :key="1"></x-ebook>
            </div>
        </div>
    </div>
</x-app-layout> 