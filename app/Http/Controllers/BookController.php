<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $books = Book::all();
        return view('books.index', compact('books'));
}

    

    public function create()
    {
        $author=Author :: all(); 
        $student=Student :: all();
        return view('books.create', compact('author','student'));

    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric',
        'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'author_id'=>'required|nullable|integer',
        'student_id'=>'required|nullable|integer',
    ]);

    if ($request->hasFile('cover_image')) {
        $path = $request->file('cover_image')->store('covers', 'public');
        $data['cover_image'] = $path;  
    }
    
    Book::create($data);

    return redirect()->route('books.index')->with('success', 'Book added successfully');
}


    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
{
    // التحقق من صحة البيانات
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric',
        'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'author_id'=>'required|nullable|integer',
        'student_id'=>'required|nullable|integer',
    ]);

    // حفظ الصورة الجديدة وحذف القديمة إذا لزم الأمر
    if ($request->hasFile('cover_image')) {
        if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $path = $request->file('cover_image')->store('covers', 'public');
        $data['cover_image'] = $path;
    }

    // فحص البيانات قبل الحفظ للتأكد من صحتها
    // dd($data); // 🔍 استخدم هذا لاختبار صحة البيانات ثم قم بإزالته بعد التأكد

    // تحديث الكتاب
    $book->update($data);

    // إعادة التوجيه إلى صفحة index مع رسالة نجاح
    return redirect()->route('books.index')->with('success', 'Modified successfully');
}



    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Deleted successfully');
    }
}


