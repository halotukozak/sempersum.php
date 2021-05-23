<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-jet-authentication-card-logo class="inline align-middle"/>
                <span class="text-3xl align-middle p-5">+</span>
                <i class="fab fa-deezer text-7xl align-middle"></i>
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <video controls src="{{asset('video/deezer.mp4')}}">
                    Niestety, Twoja przeglądarka nie wspiera odtwarzania video.
                </video>
            </div>
        </div>
    </div>
</x-guest-layout>
