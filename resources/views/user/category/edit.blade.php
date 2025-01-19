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
    <form action="{{route('category.create')}}" method="post">
        @csrf
        <h1 class="text-3xl font-medium">Update a Category</h1>
        <span class="text-gray-600 text-sm">A category contains related notebooks.</span>

        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

        <span class="text-gray-600 text-sm italic">Required fields are marked with an asterisk (*).</span>
        <div id="new-repo-title-section" class="flex gap-3 items-baseline">
            <div class="flex flex-col">
                <span class="font-medium text-secondary">Category name*</span>
                <div>
                    <input type="text" autofocus
                           class="border-[1px] border-gray-600 focus:border-blue outline-blue-500 rounded-md p-1 bg-[#f6f8fa]"
                           name="title" id="name" value="{{$category->title}}">
                </div>
            </div>
        </div>
        <div id="new-repo-desc-section" class="flex gap-3 items-baseline mt-3 w-full">
            <div class="flex flex-col w-full">
                <span class="font-medium text-secondary">Description</span>
                <div class="w-full">
                    <input type="text" autofocus
                           class="w-full border-[1px] border-gray-600 focus:border-blue outline-blue-500 rounded-md p-1 bg-[#f6f8fa]"
                           name="description" id="description" value="{{$category->description}}">
                </div>
            </div>
        </div>

        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

        <div id="new-repo-category-section" class="flex flex-col gap-3 items-baseline mt-3 text-secondary">
            <span class="font-medium text-secondary">Parent Category</span>

            <select name="category" class="px-3 border-[1px]">
                @forelse($allCategory as $cat)

                    @once
                        <option value="null" selected>Select One</option>
                    @endonce
                    <option @selected($cat->id === $category->id) value="{{$cat->id}}">{{$cat->title}}</option>
                @empty
                    <option value="null">No Categories</option>
                @endforelse
            </select>

        </div>

        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="flex justify-center">
            <button class="bg-green-600 px-4 py-2 font-medium text-white hover:bg-green-500 active:bg-gradient-to-b from-green-500 to-green-600">Update</button>
        </div>
    </form>
@endsection
