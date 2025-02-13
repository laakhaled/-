<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $students = Student::all();
        return view('students.index', compact('students'));
}

    

    public function create()
    {
        $students = Student :: all();
        return view('students.create', compact('students'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|required',
        'phone' => 'nullable|numeric',
        
    ]);

    
    Student::create($data);

    return redirect()->route('students.index')->with('success', 'Book added successfully');
}


public function edit(Student $student)
{
    return view('students.edit', compact('student')); 
}

    public function update(Request $request, student $student)
{

    $data = $request->validate([
       'name' => 'required|string|max:255',
        'email' => 'nullable|email|required',
        'phone' => 'nullable|numeric',
    ]);

     // حفظ الصورة الجديدة
   
    

     $student->update($data);

   return redirect()->route('students.index')->with('success', 'Modified successfully');


}
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Deleted successfully');
    }

}