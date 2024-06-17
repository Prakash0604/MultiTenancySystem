<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student=Student::all();
        return view('Student.View',['students'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Student.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:20',
            'email'=>'required|email|unique:students',
            'address'=>'required|string|max:50',
            'contact'=>'required|numeric|min:7',
            'image'=>'required|mimes:jpg,png,jpeg',
        ]);
        $filename=$request->file('image');
        if($filename){
            $filepath=time().'.'.$filename->getClientOriginalName();
            $filename->storeAs('public/images/'.$filepath);
        }
        Student::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'image'=>$filepath,
        ]);
        return redirect()->route('students.index')->with(['message'=>'Student has been added successfully']);
        // dd($request->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('Student.Edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'=>'required|string|max:20',
            'email'=>'required|email',
            'address'=>'required|string|max:50',
            'contact'=>'required|numeric|min:7',
            'image'=>'mimes:jpg,png,jpeg',
        ]);
        $filepath=$student->image;
        if($request->hasFile('image')){
            if($filepath){
                Storage::delete($filepath);
            }
            $newimage=$request->file('image');
            $filepath=time().'.'.$newimage->getclientOriginalName();
            $newimage->storeAs('public/images/'.$filepath);
        }
        $student->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'image'=>$filepath,
        ]);
        return redirect()->route('students.index')->with(['message'=>'Student has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with(['message'=>'Student has been deleted successfully']);
    }
}
