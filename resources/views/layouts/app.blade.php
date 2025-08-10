{{-- 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NINA-DEVELOPER')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'NINA')</title>

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome (CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    @stack('styles')
</head>
<body>

    <section class="header">
        @include('partials.navbar')

     
    </section>

       {{-- Hero Section --}}
    @hasSection('hero')
        @yield('hero')
    @endif

    {{-- Main content --}}
    <main>
        @yield('content')
    </main>

    {{-- Contact section (optional) --}}
    @if ($showContact ?? true)
        @include('partials.contact')
    @endif

    {{-- Footer --}}
    @include('partials.footer')

    @stack('scripts')
</body>
</html>
