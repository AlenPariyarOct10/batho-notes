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

    @endif
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Register your account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        @if (session('message'))
            <div class="bg-red-200 p-3 text-red-900">
                {{ session('message') }}
            </div>
        @endif

        <form class="space-y-6" action="{{route('auth.register')}}" method="POST">
            @csrf
            <div class="flex justify-between">
                <div>
                    <label for="fname" class="block text-sm/6 font-medium text-gray-900">First name</label>
                    <div class="mt-2">
                        <input type="text" name="fname" id="fname" autocomplete="fname" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    @error('fname')
                    <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="lname" class="block text-sm/6 font-medium text-gray-900">Last name</label>
                    <div class="mt-2">
                        <input type="text" name="lname" id="lname" autocomplete="lname" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    @error('lname')
                    <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <label for="username" class="block text-sm/6 font-medium text-gray-900">Username</label>
                <div class="mt-2">
                    <input type="text" name="username" id="username" autocomplete="name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
                @error('username')
                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                <div class="mt-2">
                    <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
                @error('email')
                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
                @error('password')
                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">Confirm Password</label>
                </div>
                <div class="mt-2">
                    <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">

                </div>
                @error('password_confirmation')
                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-500">
            Already a member?
            <a href="{{route('auth.login')}}" class="font-semibold text-indigo-600 hover:text-indigo-500">Login</a>
        </p>
    </div>
</div>
</body>
</html>
