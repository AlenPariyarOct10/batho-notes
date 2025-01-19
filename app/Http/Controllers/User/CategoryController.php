<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCategory = Category::withCount('notebook')->where('author', Auth::id())->get();
        return view('user.category.index', compact('allCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategory = Category::all();
        return view('user.category.create', compact('allCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['title'], '-').Auth::id();
        $request['author'] = Auth::id();



        $validated = $request->validate([
            'title'=>'required|max:255',
            'description'=>'required|max:255',
            'slug'=>'required|unique:categories',
            'author'=>'required',
        ]);

        if($request['parent_id']!=="null")
        {
            $category = Category::findOrFail($request['parent_id']);
            $validated['level'] = $category->level + 1;
        }

        $validated['parent_id'] = ($request['parent_id']!=="null")?$request['parent_id']:null;

        if(Category::create($validated))
        {
            return redirect()->back()->with('success','Category created successfully');
        }else{
            return redirect()->back()->with('error','Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $allCategory = Category::all();
        return view('user.category.edit', compact('category'), compact('allCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
