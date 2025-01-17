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
    <div>
        <div id="search-box-wrapper" class="bg-white px-4 py-2">
            <input type="text" name="" id="">
        </div>
    </div>
    <div id="nav-right-part" class="flex justify-between items-center">
        <div id="profile-img-btn">
            <img id="navbar-profile-img" class="w-10 h-10 object-fit rounded-full cursor-pointer" src="https://st3.depositphotos.com/9998432/13335/v/450/depositphotos_133352010-stock-illustration-default-placeholder-man-and-woman.jpg" alt="">
        </div>
    </div>

    <div id="profile-menu" class="absolute right-4 top-16 mt-2 bg-white shadow-lg rounded-md w-48 hidden">
        <ul>
            <li class="hover:bg-gray-200"><a href="#" class="block px-4 py-2">Profile</a></li>
            <li class="hover:bg-gray-200"><a href="#" class="block px-4 py-2">Settings</a></li>
            <li class="bg-red-500 hover:bg-red-600 text-white"><a href="{{route('logout')}}" class="block px-4 py-2">Logout</a></li>
        </ul>
    </div>

</nav>
<div class="flex w-full mt-4 p-3">
    <aside class="w-1/5">
        <div class="flex justify-between mr-8">
            <span>Your NoteBooks</span>
            <a href="{{route('notebook.create')}}" class="text-white text-sm bg-green-600 hover:bg-green-500 px-3 py-0.5 rounded-md">
                <i class="fa-solid fa-book"></i> New
            </a>
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
<script>
    document.getElementById('profile-img-btn').addEventListener('click',()=>{


        if(document.getElementById('profile-menu').classList.contains('hidden'))
        {
            document.getElementById('profile-menu').classList.remove('hidden');
            document.getElementById('navbar-profile-img').classList.add('border-[2px]', 'border-gray-300');

        }else{
            document.getElementById('profile-menu').classList.add('hidden');
            document.getElementById('navbar-profile-img').classList.remove('border-[2px]', 'border-gray-300');
        }
    })
</script>
</html>
