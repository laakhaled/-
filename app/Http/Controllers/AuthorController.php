<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        $books = Book::all();
        return view('authors.create', compact('books'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'nullable|string',
        'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048', 
        'email' => 'nullable|email', 
        'book_id' =>'required|integer|nullable',
    ]);

    if ($request->hasFile('profile_image')) {
        $path = $request->file('profile_image')->store('profiles', 'public');
        $data['profile_image'] = $path;
    }

    Author::create($data);

    return redirect()->route('authors.index')->with('success', 'Author added successfully');
}

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'nullable|string',
        'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048', 
        'email' => 'nullable|email', 
        'book_id' =>'integer|nullable',
    ]);

    if ($request->hasFile('profile_image')) {
        if ($author->profile_image) {
            Storage::disk('public')->delete($author->profile_image);
        }
        $path = $request->file('profile_image')->store('profiles', 'public');
        $data['profile_image'] = $path;
    }

    $author->update($data);

    return redirect()->route('authors.index')->with('success', 'Author updated successfully');
}


    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }
}

