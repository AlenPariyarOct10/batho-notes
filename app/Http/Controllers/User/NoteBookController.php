<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NoteBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class NoteBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = NoteBook::with('category')->where('author_id', Auth::id())->get();

        $title = "Delete Notebook !";
        $text = "Are you sure you want to delete this notebook ?";
        confirmDelete($title, $text);
        return view('notebook.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategories = Category::all();
        return view('notebook.create', compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['title'],'-').'-'.Auth::user()->id;
        $request['author_id'] = Auth::user()->id;

        $validation = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'category' => 'required',
            'public' => 'required',
            'slug' => 'string|required|unique:notebooks,slug',
            'author_id' => 'integer|required'
        ]);

        if(NoteBook::create($validation))
        {
            return redirect()->route('notebook.create')->with('success','Notebook created successfully');
        }else{
            return redirect()->route('notebook.create')->with('error','Something went wrong');
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
    public function edit(string $slug)
    {
        //notify()->success('Welcome to Laravel Notify ⚡️');
        Alert::success('Success Title', 'Success Message');

        //drakify('success');

        $notebook = NoteBook::where('slug', $slug)->firstOrFail();

        $categories = Category::all();

        if($notebook->author_id == Auth::id())
        {

            return view('notebook.edit', compact('notebook', 'categories'));
        }else{
            return "invalid user";
        }
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
        if(NoteBook::destroy($id))
        {
            return redirect()->route('notebook.index')->with('success','Notebook deleted successfully');
        }else{
            return redirect()->route('notebook.index')->with('error','Something went wrong');
        }
    }
}
