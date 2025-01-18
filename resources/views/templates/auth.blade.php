<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col h-screen">
@include('parts.user.Navbar')
<div class="flex w-full mt-4 p-3 space-x-4">
    <div class="w-1/5 flex-shrink-0 bg-gray-100">
        @include('parts.user.LeftSidebar')
    </div>
    <div class="pt-16 w-3/5 bg-white">
        @yield('content')
    </div>
    <div class="w-1/5 flex-shrink-0 bg-gray-100">
        @include('parts.user.RightSidebar')
    </div>
</div>

</body>
<script>
    document.getElementById('profile-img-btn').addEventListener('click', () => {


        if (document.getElementById('profile-menu').classList.contains('hidden')) {
            document.getElementById('profile-menu').classList.remove('hidden');
            document.getElementById('navbar-profile-img').classList.add('border-[2px]', 'border-gray-300');

        } else {
            document.getElementById('profile-menu').classList.add('hidden');
            document.getElementById('navbar-profile-img').classList.remove('border-[2px]', 'border-gray-300');
        }
    })

    document.querySelectorAll('[data-collapse-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const menuId = button.getAttribute('aria-controls');
            const menu = document.getElementById(menuId);
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    });

</script>
</html>
