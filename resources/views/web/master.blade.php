<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hola') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />        <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/validator/13.6.0/validator.min.js"></script>
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    <style>
        {!! Vite::content('resources/css/app.css') !!}
    </style>
    <script>
        {!! Vite::content('resources/js/app.js') !!}
    </script>
{{--    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">--}}
    <style>
        .max-h-64 {
            max-height: 16rem;
        }
        /*Quick overrides of the form input as using the CDN version*/
        .form-input,
        .form-textarea,
        .form-select,
        .form-multiselect {
            background-color: #edf2f7;
        }
    </style>
</head>
<body class="font-sans antialiased bg-white">
    <div class="min-h-screen bg-gray-100">
        <x-web.navigation-web  :categorias="$categorias" />

        <!-- Page Content -->
        <main id="app">
            @yield('content')
        </main>

    </div>
    <footer class="bg-gray-800 text-gray-300 py-6">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Sección de Enlaces -->
            <div class="space-x-4">
                <a href="#" class="hover:text-gray-500">Inicio</a>
                <a href="{{url('/terminos-servicio')}}" class="hover:text-gray-500">Terminos del servicio</a>
                <a href="#" class="hover:text-gray-500">Servicios</a>
                <a href="#" class="hover:text-gray-500">Contacto</a>
            </div>

            <!-- Derechos de Autor -->
            <div>
                &copy; 2023 {{ config('app.name') }}. Todos los derechos reservados.
            </div>
        </div>
    </footer>
@yield('script')
</body>
</html>
