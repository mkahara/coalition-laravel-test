<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <title>Coalition Task Manager</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script type="application/javascript" async src="{{ mix('js/app.js') }}"></script>

</head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 px-4 sm:px-0">
            <div class="min-w-full">

                <!-- Header section with logo and nav menu -->
                <div class="flex justify-between pt-2 sm:pt-0 max-w-4xl mx-auto border-b py-4">
                    <a href="{{ route('tasks.index') }}">
                        <img src="{{ asset('images/logo.png') }}" class="w-36 sm:w-48" alt="Coalition Task Manager">
                    </a>
                    <nav class="site-menu ui-menu flex items-center">
                        <a href="{{ route('tasks.index') }}" class="hover:text-primary ui-menu-item mr-4 {{ request()->is('/') || request()->is('task/*') ? 'current font-bold text-primary underline' : '' }}">Tasks</a>
                        <a href="{{ route('projects.index') }}" class="hover:text-primary ui-menu-item {{ request()->is('project*') || request()->is('project/*') ? 'current font-bold text-primary underline' : '' }}">Projects</a>
                    </nav>
                </div>

                <!-- Main content section -->
                @if (session('success'))
                    <div class="alert alert-success max-w-4xl mx-auto text-center mt-8 bg-secondary text-white rounded font-bold">{{ session('success') }}</div>
                @else
                    <div class="alert alert-error max-w-4xl mx-auto text-center mt-8 bg-red-400 text-white rounded font-bold">{{ session('error') }}</div>
                @endif
                @yield('content')
                <!-- End main content section -->

                <!-- Load custom js -->
                @yield('customjs')
                <!-- End custom js -->

                <!-- Footer section -->
                <div class="flex justify-center mt-4 sm:items-center sm:justify-between max-w-4xl mx-auto">
                    <div class="text-left  text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center text-primary">
                            Task Manager App
                        </div>
                    </div>

                    <div class="ml-4 text-left text-sm text-gray-500 sm:text-right sm:ml-0 text-primary">
                        Laravel test for
                        <a href="https://coalitiontechnologies.com" class="ml-1 underline text-gray-500">
                            Coalition Technologies
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
