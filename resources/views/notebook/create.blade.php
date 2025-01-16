@extends('templates.auth')

@section('content')
    <form action="" method="post">
        @csrf
    <h1 class="text-3xl font-medium">Create a new NoteBook</h1>
    <span class="text-gray-600 text-sm">A notebook contains all units and sections</span>

    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

    <span class="text-gray-600 text-sm italic">Required fields are marked with an asterisk (*).</span>
    <div id="new-repo-title-section" class="flex gap-3 items-baseline">
        <div class="flex flex-col">
            <span class="font-medium text-secondary">NoteBook name*</span>
            <div>
                <input type="text" autofocus
                       class="border-[1px] border-gray-600 focus:border-blue outline-blue-500 rounded-md p-1 bg-[#f6f8fa]"
                       name="notebook-name" id="notebook-name">
            </div>
        </div>
    </div>
    <div id="new-repo-desc-section" class="flex gap-3 items-baseline mt-3 w-full">
        <div class="flex flex-col w-full">
            <span class="font-medium text-secondary">Description</span>
            <div class="w-full">
                <input type="text" autofocus
                       class="w-full border-[1px] border-gray-600 focus:border-blue outline-blue-500 rounded-md p-1 bg-[#f6f8fa]"
                       name="notebook-name" id="notebook-name">
            </div>
        </div>
    </div>

    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

    <div id="new-repo-access-section" class="flex flex-col gap-3 items-baseline mt-3 text-secondary">
        <div class="flex gap-3">
            <input type="radio" autofocus
                       class="border-[1px] border-gray-600 focus:border-blue outline-blue-500 rounded-md p-1 bg-[#f6f8fa]"
                       name="notebook-access" id="notebook-access-public" value="public">
            <label for="notebook-access-public" class="flex flex-row items-center gap-4">
                <i class="fa-solid fa-globe text-2xl"></i>
                <span class="flex flex-col">
                    <span class="font-medium">Public</span>
                    <span class="text-gray-600 text-sm">Anyone on the internet can see this notebook.</span>
                </span>
            </label>
        </div>
        <div class="flex gap-3">
            <input type="radio" autofocus
                       class="border-[1px] border-gray-600 focus:border-blue outline-blue-500 rounded-md p-1 bg-[#f6f8fa]"
                       name="notebook-access" id="notebook-access-private" value="private">
            <label for="notebook-access-private" class="flex flex-row items-center gap-4">
                <i class="fa-solid fa-lock  text-2xl"></i>
                <span class="flex flex-col">
                    <span class="font-medium">Private</span>
                    <span class="text-gray-600 text-sm">You choose who can see this notebook.</span>
                </span>
            </label>
        </div>
    </div>

    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

    <div class="flex justify-center">
        <button class="bg-green-600 px-4 py-2 font-medium text-white hover:bg-green-500 active:bg-gradient-to-b from-green-500 to-green-600">Create</button>

    </div>
    </form>
@endsection
