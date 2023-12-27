<x-layout>
    <div x-data="{ showText: false }" x-init="setTimeout(() => showText = true, 500)" class="relative flex justify-center items-center min-h-screen bg-center">
        <img src="{{asset('images/santa.png')}}" alt="" class="absolute inset-0 w-full h-full object-cover">
        <div class="z-20" x-show="showText"
             :enter="transition ease-out duration-1000"
             :enter-start="transform translate-y-full"
             :enter-end="transform translate-y-0">
            <div class="bg-white p-3 flex flex-col bg-red-100 bg-opacity-75 items-center justify-center rounded-2xl">
                <img src="{{asset('images/congrats.png')}}" alt="" class="py-3 w-64">
                <img src="{{asset('images/opened_gift.png')}}" alt="" class="w-40 h-40 rounded-3xl">
                <div class="bg-white rounded-xl p-3 -mt-3 bg-red-400 bg-opacity-75 shadow-lg">
                    <p class="text-red-500 font-bold text-xl">YES, you are the one and only!</p>
                </div>
                <div class="grid grid-cols-3 mt-4 gap-2">
                    <div class="bg-white rounded-2xl border border-red-500 p-3">
                        <p class="text-center text-red-500 font-semibold">Smart</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-500 p-3">
                        <p class="text-center text-red-500 font-semibold">Gorgeous</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-500 p-3">
                        <p class="text-center text-red-500 font-semibold">Beautiful</p>
                    </div>
                </div>
            </div>
            <div class="bg-red-500 rounded-xl mt-5 p-3">
                <p class="text-white text-lg font-semibold">🎉 Grab that gift and open it, darling! 🎉</p>
            </div>
        </div>
    </div>
</x-layout>
