<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col">
<nav class="bg-gray-200 w-full p-3 flex justify-between items-center">
    <div id="nav-left-part">
        <div id="logo-place-holder">

        </div>
        <div id="system-name">
            <h1 class="font-poppins text-xl font-medium">BathoNotes</h1>
        </div>
    </div>
    <div id="nav-right-part" class="flex justify-between items-center">
        <div id="nav-search-bar">
            <input type="text" name="" id="">
        </div>
        <div id="profile-img-btn">
            <img class="w-10 h-10 object-fit rounded-full" src="https://st3.depositphotos.com/9998432/13335/v/450/depositphotos_133352010-stock-illustration-default-placeholder-man-and-woman.jpg" alt="">
        </div>
    </div>
</nav>
<div class="flex w-full mt-4">
    <aside class="w-1/5">
        <div>
            <span>Your NoteBooks</span>
            <button>
                New
            </button>
        </div>
        <div>
            <input type="text" name="" id="" placeholder="Find a notebook">
        </div>
        <div>
            <ul>
                <li>List</li>
                <li>List</li>
                <li>List</li>
                <li>List</li>
                <li>List</li>
            </ul>
            <a href="#">Show more</a>
        </div>
    </aside>
    <div class="w-3/5">
        @yield('content')
    </div>
    <aside class="w-1/5">
        SideBar - BookMarkedNoteBooks
    </aside>
</div>
</body>
</html>
