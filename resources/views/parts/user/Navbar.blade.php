<nav class="fixed top-0 left-0 right-0 z-40 bg-gray-200 w-full p-3 flex justify-between items-center">
    <div id="nav-left-part" class="w-1/6">
        <div id="logo-place-holder">

        </div>
        <div id="system-name">
            <h1 class="font-poppins text-xl font-medium">BathoNotes</h1>
        </div>
    </div>
    <div class="w-4/6 flex justify-center">
        <div id="search-box-wrapper"
             class="bg-white px-4 py-2 w-3/6 flex items-center rounded-lg outline-1 outline-black focus-within:ring-2 focus-within:ring-blue-500">
            <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
            <input
                class="w-full border-0 outline-0 pl-2"
                type="text"
                placeholder="Search..."
                aria-label="Search"
            >
        </div>
    </div>

    <div id="nav-right-part" class="flex justify-between items-center w-1/6">
        <div id="profile-img-btn">
            <img id="navbar-profile-img" class="w-10 h-10 object-fit rounded-full cursor-pointer"
                 src="https://st3.depositphotos.com/9998432/13335/v/450/depositphotos_133352010-stock-illustration-default-placeholder-man-and-woman.jpg"
                 alt="">
        </div>
    </div>

    <div id="profile-menu" class="absolute right-4 top-16 mt-2 bg-white shadow-lg rounded-md w-48 hidden">
        <ul>
            <li class="hover:bg-gray-200"><a href="#" class="block px-4 py-2">Profile</a></li>
            <li class="hover:bg-gray-200"><a href="#" class="block px-4 py-2">Settings</a></li>
            <li class="bg-red-500 hover:bg-red-600 text-white"><a href="{{route('logout')}}" class="block px-4 py-2">Logout</a>
            </li>
        </ul>
    </div>

</nav>
