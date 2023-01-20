<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter antialiased bg-slate-100 text-slate-600">

    <main class="bg-white">

        <div class="relative flex">

            <!-- Content -->
            <div class="w-full md:w-1/2">

                <div class="min-h-screen h-full flex flex-col after:flex-1">

                    <!-- Header -->
                    <div class="flex-1">
                        <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                            <!-- Logo -->
                            <a class="block" href="{{ route('dashboard') }}">
                                <img class="mt-4" width="64" height="64" viewBox="0 0 64 364"
                                    src={{ asset('images/bgldp.png') }}>
                            </a>
                        </div>
                    </div>

                    <div class="w-full max-w-sm mx-auto px-4 py-8">
                        {{ $slot }}
                    </div>

                </div>

            </div>

            <!-- Image -->
            <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/1" aria-hidden="true">
                <img class="object-cover w-full h-full" src="{{ asset('images/bg.png') }}" width="1280" height="720"
                    alt="Authentication image" />
            </div>


        </div>

    </main>
</body>

</html>
