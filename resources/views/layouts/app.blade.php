<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Si 'app.css' no es el nombre de tu archivo compilado, cámbialo al nombre correcto -->
</head>
<body>
    @if(Auth::check()) <!-- Verifica si el usuario ha iniciado sesión -->
        <div class="w-full bg-gray-200 py-4 mb-4">
            <nav class="flex justify-center">
                <ul class="flex space-x-4">
                    <li><a href="/dashboard" class="text-blue-500 hover:text-blue-700">Inicio</a></li>
                    <li><a href="/profile" class="text-blue-500 hover:text-blue-700">Perfil</a></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="confirmLogout()" class="text-blue-500 hover:text-blue-700">Cerrar Sesión</a>
                    </li>
                </ul>
            </nav>
        </div>
    @endif

    <div id="app">
        @yield('content')
    </div>

    <!-- Aquí puedes incluir cualquier script necesario -->

    <script>
        function confirmLogout() {
            if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            }
        }
    </script>
</body>
</html>
