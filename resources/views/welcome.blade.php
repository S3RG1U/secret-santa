<x-layout>
    <div class="relative flex justify-center items-center min-h-screen bg-dots-darker bg-center">
        @if(isset($elf) && $elf->attempts === 1)
            <img src="{{ asset('images/no_santa.png') }}" alt="" class="absolute inset-0 w-full h-full object-cover">
        @elseif(isset($elf) && $elf->attempts >= 2)
            <img src="{{ asset('images/angry-santa.png') }}" alt="" class="absolute inset-0 w-full h-full object-cover">
        @else
            <img src="{{ asset('images/santa.png') }}" alt="" class="absolute inset-0 w-full h-full object-cover">
        @endif
        <div
            x-data="{
                isAttempted: {{isset($elf) && $elf->attempts !== 0 ? 'false' : 'true' }},
                atBottom: false,
                playSiren: {{ isset($elf) && $elf->attempts === 3 ? 'true' : 'false' }}
                }"
            x-init="
                if (playSiren) {
                    document.getElementById('sirenSound').play();
                }
                if (isAttempted) {
                    setTimeout(() => { atBottom = true }, 1000);
                }
            "
            :class="atBottom ? 'bottom-0' : 'bottom-1/2 translate-y-1/2'"
            class="z-20 px-4 py-6 sm:px-0 transition-transform duration-1000 ease-in-out"
        >
            <audio id="sirenSound" src="{{ asset('audio/siren.mp4') }}" preload="auto"></audio>
            <div x-show="playSiren" class="animate-pulse">
                <p class="text-6xl text-red-500 font-bold text-center">PUT IT BACK!!!</p>
            </div>
            <form x-show="!playSiren" action="{{ route('check') }}" method="POST" class="z-20 w-full max-w-md">
                @csrf
                <div class="flex items-center" :class="{ 'justify-center': !isAttempted, 'justify-end': isAttempted }">
                    <div class="mx-2 bg-white rounded-lg">
                        <div class="rounded-lg bg-red-500 flex items-center justify-center py-0.5 font-semibold text-white px-2">
                            <p>Have you really been a good human being?</p>
                        </div>
                        <div class="-mt-1 bg-red-500 h-16 bg-opacity-25"></div>
                        <div class="-mt-6 mx-6 shadow-xl rounded" :class="{ 'bg-red-500': !isAttempted, 'bg-white': isAttempted }">
                            <div x-show="isAttempted" class="py-3 flex flex-col items-center">
                                <div class="flex items-end">
                                    <img src="{{asset('images/cute_present_1.png')}}" alt="" class="w-20 h-20">
                                    <div>
                                        <p class="font-bold text-lg">Human love</p>
                                        <p class="text-sm">Is the most precious present</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="bg-red-500 rounded-2xl flex items-center justify-between py-2 px-4 space-x-6">
                                        <p class="text-white">Calculated price: </p>
                                        <div class="flex items-center">
                                            <img src="{{asset('images/infinity.svg')}}" alt="" class="w-6 h-4 invert">
                                            <p class="text-white">$</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div x-show="!isAttempted" class="py-3 flex flex-col items-center">
                                <div class="text-center p-3">
                                    <p class="font-bold text-lg text-white">Ups, this present belongs to another person. I kindly ask you to put it back.</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            @if(isset($elf) && $elf->attempts >=2)
                                <p class="text-xl font-semibold text-red-500">Don't underestimate me you naughty, naughty!!!</p>
                            @else
                                <p class="text-xl font-semibold text-red-500">Let me check if this present is for you</p>
                                <p class="text-[12px]">Can you please write you name down?</p>
                            @endif
                            <div class="mt-3 flex items-center justify-between space-x-2">
                                <input type="text" name="name" class="w-full bg-red-500 bg-opacity-10 rounded-lg px-2 py-2 border border-red-200" placeholder="Your name, sweetheart ❤">
                                <button type="submit" class="bg-red-500 rounded-lg text-white p-2 font-semibold">Check!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>

