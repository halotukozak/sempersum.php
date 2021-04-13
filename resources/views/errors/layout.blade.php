<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>svg#freepik_stories-404-error-with-a-cute-animal:not(.animated) .animable {
            opacity: 0;
        }

        svg#freepik_stories-404-error-with-a-cute-animal.animated #freepik--Error--inject-14 {
            animation: 1.5s Infinite linear heartbeat;
            animation-delay: 0s;
        }

        svg#freepik_stories-404-error-with-a-cute-animal.animated #freepik--Character--inject-14 {
            animation: 1.5s Infinite linear wind;
            animation-delay: 0s;
        }

        @keyframes heartbeat {
            0% {
                transform: scale(1);
            }
            10% {
                transform: scale(1.1);
            }
            30% {
                transform: scale(1);
            }
            40% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            60% {
                transform: scale(1);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes wind {
            0% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(1deg);
            }
            75% {
                transform: rotate(-1deg);
            }
        }        </style>
</head>
<body>
<main class="bg-white relative overflow-hidden h-screen relative">
    <div class="container mx-auto h-screen pt-32 md:pt-0 px-6 z-10 flex items-center justify-between">
        <div class="container mx-auto px-6 flex flex-col-reverse justify-between items-center relative">
            <div class="w-full mb-16 text-center ">
                <a href="{{ route('start') }}">
                    <x-jet-button>Strona główna</x-jet-button>
                </a>
            </div>
            <div class="block w-full mx-auto relative max-w-md ">
                @switch($code)
                    @case(401)
                    <x-illustrations.401></x-illustrations.401>
                    @break
                    @case(403)
                    <x-illustrations.403></x-illustrations.403>
                    @break
                    @case(404)
                    <x-illustrations.404></x-illustrations.404>
                    @break
                    @case(419)
                    <x-illustrations.419></x-illustrations.419>
                    @break
                    @case(429)
                    <x-illustrations.429></x-illustrations.429>
                    @break
                    @case(500)
                    <x-illustrations.500></x-illustrations.500>
                    @break
                    @case(503)
                    <x-illustrations.503></x-illustrations.503>
                    @break

                @endswitch
            </div>
        </div>
    </div>
</main>


<footer class="text-xs">
    <a href="https://storyset.com/web">Illustration by Freepik Storyset</a>
</footer>
</body>
</html>
