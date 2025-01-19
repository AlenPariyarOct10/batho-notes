@extends('templates.auth')

@section('content')
    @if (session('success'))
        <div class="bg-green-200 p-3 text-green-900">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-200 p-3 text-red-900">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{route('notebook.edit', $notebook->id)}}" method="post">
        @csrf
        <h1 class="text-3xl font-medium">Edit a NoteBook</h1>
        <span class="text-gray-600 text-sm">A notebook contains all units and sections</span>

        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

        <span class="text-gray-600 text-sm italic">Required fields are marked with an asterisk (*).</span>
        <div id="new-repo-title-section" class="flex gap-3 items-baseline">
            <div class="flex flex-col">
                <span class="font-medium text-secondary">NoteBook name*</span>
                <div>
                    <input type="text" autofocus
                           class="border-[1px] border-gray-600 focus:border-blue outline-blue-500 rounded-md p-1 bg-[#f6f8fa]"
                           name="title" id="notebook-name" value="{{$notebook->title}}">
                </div>
            </div>
        </div>
        <div id="new-repo-desc-section" class="flex gap-3 items-baseline mt-3 w-full">
            <div class="flex flex-col w-full">
                <span class="font-medium text-secondary">Description</span>
                <div class="w-full">
                    <input type="text" autofocus
                           class="w-full border-[1px] border-gray-600 focus:border-blue outline-blue-500 rounded-md p-1 bg-[#f6f8fa]"
                           name="description" id="notebook-description" value="{{$notebook->description}}">
                </div>
            </div>
        </div>

        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

        <div id="new-repo-category-section" class="flex flex-col gap-3 items-baseline mt-3 text-secondary">
            <span class="font-medium text-secondary">Category</span>

            <select name="category" class="px-3 border-[1px]">
                @forelse($categories as $category)
                    <option @selected($category->id===$notebook->$category) value="{{$category->id}}">{{$category->title}}</option>
                @empty
                    <option selected value="null">No Categories</option>

                @endforelse
            </select>
        </div>

        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

        <div id="new-repo-access-section" class="flex flex-col gap-3 items-baseline mt-3 text-secondary">
            <div class="flex gap-3">
                <input type="radio" autofocus
                       class="border-[1px] border-gray-600 focus:border-blue outline-blue-500 rounded-md p-1 bg-[#f6f8fa]"
                       name="public" id="notebook-access-public" value="1" required
                    @checked($notebook->public === "1")
                >
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
                       name="public" id="notebook-access-private" value="0">
                <label for="notebook-access-private" class="flex flex-row items-center gap-4"
                    @checked($notebook->public === "0")>
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
