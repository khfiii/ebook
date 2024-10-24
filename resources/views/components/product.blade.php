<!-- CARD 1 -->
<div class="rounded overflow-hidden shadow-lg flex flex-col" x-data="{
    slideOverOpen: false
}">
    <a href="#"></a>
    <div class="relative"><a href="#">
            <img class="w-full"
                src="https://down-id.img.susercontent.com/file/id-11134207-7r98p-lyc5tpdtrk7c59@resize_w450_nl.webp"
                alt="Sunset in the mountains">
            <div
                class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
            </div>
        </a>
        <a href="#!">
            <div
                class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                Moisturizer
            </div>
        </a>
    </div>
    <div class="px-6 py-4 mb-auto">
        <a href="{{ route('product.detail', ['slug' => 'test']) }}"
            class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">Simplest
            Salad Recipe ever</a>
        <p class="text-gray-500 text-sm">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        </p>
    </div>
    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
        <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
            <svg height="13px" width="13px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                    <g>
                        <path
                            d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                        </path>
                    </g>
                </g>
            </svg>
            <span class="ml-1">6 mins ago</span>
        </span>

        <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
            <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                </path>
            </svg>
            <button @click="slideOverOpen=true" class="ml-1 cursor-pointer">39 Comments</button>
        </span>
    </div>

    <template x-teleport="body">
        <div x-show="slideOverOpen" @keydown.window.escape="slideOverOpen=false" class="relative z-[99]">
            <div x-show="slideOverOpen" x-transition.opacity.duration.600ms @click="slideOverOpen = false"
                class="fixed inset-0 bg-black bg-opacity-10"></div>
            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <div x-show="slideOverOpen" @click.away="slideOverOpen = false"
                            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                            class="w-screen max-w-md">
                            <div
                                class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-l shadow-lg border-neutral-100/70">
                                <div class="px-4 sm:px-5">
                                    <div class="flex items-start justify-between pb-1">
                                        <h2 class="text-base font-semibold leading-6 text-gray-900"
                                            id="slide-over-title">Comments</h2>
                                        <div class="flex items-center h-auto ml-3">
                                            <button @click="slideOverOpen=false"
                                                class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                <span>Close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative flex-1 px-4 mt-5 sm:px-5">
                                    <div class="absolute inset-0 px-4 sm:px-5">
                                        <div
                                            class="relative h-full overflow-hidden rounded-md border-neutral-300">
                                            <livewire:form/>
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
