<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'gender' => 'required|boolean',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->gender = $request->gender;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->storeAs('public/photos', $request->file('photo')->getClientOriginalName());
            $student->photo = basename($photoPath);
        }
        

        $student->save();

        return redirect('/students')->with('success', 'Student created successfully!');
    }

    //edit student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'gender' => 'required|boolean',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        ]);
    
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->storeAs('public/photos', $request->file('photo')->getClientOriginalName());
            $student->photo = basename($photoPath);
        }
        $student->save();
    
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    //Delete a student
    public function destroy(Student $student)
    {
        $student->delete();
    
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
