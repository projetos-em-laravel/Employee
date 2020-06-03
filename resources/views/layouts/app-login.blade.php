<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name', 'Employee') }}</title>
        <!-- Icons de validação -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/font-awesome.min.css') }}">
        <!-- icon eyes -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/material-design-iconic-font.min.css') }}">
        <!-- body login -->
        <link rel="stylesheet" type="text/css" href="{{ asset('custom/css/main.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('vendor/js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('vendor/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="particles-js">
            <div class="wrap-login100">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>

        <script src="{{ asset('vendor/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('custom/js/main.js') }}"></script>
        <script src="{{ asset('vendor/js/particles.min.js') }}"></script>
        <script>
            particlesJS.load('particles-js', "{{ asset('vendor/js/particles.json')}}", function() {
                console.log('callback - particles.js config loaded');
            });
        </script>

        <script>

        </script>
    </body>
</html>
