<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{--            <meta http-equiv="refresh" content="5">--}}


    <title>@yield('pageTitle', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hack-font/3.3.0/web/hack.min.css"
          integrity="sha512-XgCw4Srl8lC1ECwcaHwAU0WnxQwHkqmInzg9wJLtGB7DRuMaXPuK2k9WJ2AwRDGdrgK9eJpZl2hUlLi2WQssmw=="
          crossorigin="anonymous"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body class="font-sans antialiased">
<x-jet-banner/>

<div class="min-h-screen bg-gray-100 dark:bg-gray-900 bg-pattern">
@livewire('navigation-menu')

<!-- Page Content -->
    <main class="p-2 md:p-0">
        {{ $slot }}
    </main>
</div>


<x-footer></x-footer>

@stack('modals')

@livewireScripts
@stack('scripts')
@include('popper::assets')

</body>
</html>
