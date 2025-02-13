<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
    $books = Book::all();
    $authors = Author::all();
    return view('dashboard', compact('books', 'authors'));
    }
}
