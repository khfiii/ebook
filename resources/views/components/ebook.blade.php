@props(['id', 'image', 'alt', 'author', 'title'])
@php
  $alt = 'hai manis'
@endphp

<div x-data="{
isOpenDetail:false,
isOpenBuy:false,
openDetail(){
 this.isOpenDetail = true
},
openBuy(){
 this.isOpenBuy = true
}   

}" class="relative flex flex-col text-gray-700 bg-white shadow-md rounded-xl w-[21rem] md:w-[18rem]">
  <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-72">
    <div class="">
      <img src="{{ $image }}" alt="{{ $alt }}" class="object-contain w-full h-full" />
    </div>
  </div>
  <div class="p-6">
    <div class="w-full flex justify-between mb-1">
      <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
        {{ $title }}
      </p>

      <small class="font-bold">Rp. 12.000</small>
    </div>
    <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75 pb-2">
      Author : {{ $author }}
    </p>

    <div class="flex w-full justify-between">
      <div class="inline-flex gap-2 mb-4">
        <x-heroicon-o-star class="w-5 text-yellow-400 fill-yellow-500" />
        <x-heroicon-o-star class="w-5 text-yellow-400 fill-yellow-500" />
        <x-heroicon-o-star class="w-5 text-yellow-400 fill-yellow-500" />
        <x-heroicon-o-star class="w-5 text-yellow-400 fill-yellow-500" />
        <x-heroicon-o-star class="w-5 fill-gray-400 text-gray-400" />
      </div>

      <small>4/5</small>
    </div>
    <div class="div">
      <div class="inline-flex gap-2">
        <button @click="openDetail()" class="btn btn-outline btn-sm  border-black text-black">Detail</button>
        <button @click="openBuy()" class="btn bg-black btn-sm border-black text-white">Beli</button>
      </div>
    </div>

    <!-- Detail Template -->
    <template x-teleport="body">
      <div x-show="isOpenDetail" @keydown.window.escape="isOpenDetail=false" class="relative z-[99]">
        <div x-show="isOpenDetail" x-transition.opacity.duration.600ms @click="isOpenDetail = false"
          class="fixed inset-0 bg-black bg-opacity-10"></div>
        <div class="fixed inset-0 overflow-hidden">
          <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
              <div x-show="isOpenDetail" @click.away="isOpenDetail = false"
                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                class="w-screen max-w-md">
                <div
                  class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-l shadow-lg border-neutral-100/70">
                  <div class="px-4 sm:px-5">
                    <div class="flex items-start justify-between pb-1">
                      <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title">Detail Ebook
                      </h2>
                      <div class="flex items-center h-auto ml-3">
                        <button @click="isOpenDetail=false"
                          class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                          </svg>
                          <span>Close</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="relative flex-1 px-4 mt-5 sm:px-5">
                    <div class="absolute inset-0 px-4 sm:px-5">
                      <div class="relative h-full overflow-hidden rounded-md border-neutral-300">
                        <div>
                          <h2 class="text-base text-black">{{ $title }}</h2>
                          <small>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus itaque a quibusdam
                            id perspiciatis saepe, culpa non error necessitatibus? Magnam, consectetur rem consequuntur
                            quod sed natus? Quaerat, animi ad natus minus quis, quo fugit nam provident, a libero facere
                            vitae dolore? Similique, molestias sunt soluta explicabo ut adipisci voluptatem
                            iusto?</small>
                        </div>
                        <!-- <form>
                          <label class="form-control w-full max-w-xs">
                            <div class="label">
                              <label for="nama" class="label-text">Nama Lengkap</label>
                            </div>
                            <input id="nama" type="text" placeholder="Masukan nama lengkap" class="input input-bordered input-sm bg-white w-full max-w-xs focus:outline-none" />
                          </label>
                          <label class="form-control w-full max-w-xs">
                            <div class="label">
                              <label for="email" class="label-text">Email</label>
                            </div>
                            <input id="email" type="email" placeholder="Masukan email" class="input input-bordered input-sm bg-white w-full max-w-xs focus:outline-none" />
                            <small>Ebook akan dikirimkan langsung melalui email</small>
                          </label>

                          <button class="btn btn-sm bg-black mt-2">Bayar</button>
                        </form> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>

    <!-- Buy Template -->
    <template x-teleport="body">
      <div x-show="isOpenBuy" @keydown.window.escape="isOpenBuy=false" class="relative z-[99]">
        <div x-show="isOpenDetail" x-transition.opacity.duration.600ms @click="isOpenBuy = false"
          class="fixed inset-0 bg-black bg-opacity-10"></div>
        <div class="fixed inset-0 overflow-hidden">
          <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
              <div x-show="isOpenBuy" @click.away="isOpenBuy = false"
                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                class="w-screen max-w-md">
                <div
                  class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-l shadow-lg border-neutral-100/70">
                  <div class="px-4 sm:px-5">
                    <div class="flex items-start justify-between pb-1">
                      <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title">Detail
                        Transaction</h2>
                      <div class="flex items-center h-auto ml-3">
                        <button @click="isOpenBuy=false"
                          class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                          </svg>
                          <span>Close</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="relative flex-1 px-4 mt-5 sm:px-5">
                    <div class="absolute inset-0 px-4 sm:px-5">
                      <div class="relative h-full overflow-hidden rounded-md border-neutral-300">
                        <livewire:form :$id />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
  </div>
</div>