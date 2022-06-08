<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('student.index', compact('student'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required',
                'course' =>  'required',
                'profile_image' =>  'required',
            ],
            [
                'name.required' => 'Student Nama tidak boleh kosong',
                'email.required' => 'Student Email tidak boleh kosong',
                'course.required' => 'Student Course tidak boleh kosong',
                'profile_image.required' => 'Gambar tidak boleh kosong'
            ]
        );

        $student = new Student;

        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/students/', $filename);

            $student->profile_image = $filename;
        }

        $student->save();
        // return redirect()->back()->with('status', 'Student Image Added Successfully');
        return redirect('students')->with('status', 'Student Image Added Successfully');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required',
                'course' =>  'required',
                'profile_image' =>  'required',
            ],
            [
                'name.required' => 'Student Nama tidak boleh kosong',
                'email.required' => 'Student Email tidak boleh kosong',
                'course.required' => 'Student Course tidak boleh kosong',
                'profile_image.required' => 'Gambar tidak boleh kosong'
            ]
        );

        $student = Student::find($id);

        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');

        if ($request->hasFile('profile_image')) {
            $destination = 'uploads/students/' . $student->profile_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/students/', $filename);

            $student->profile_image = $filename;
        }

        $student->update();
        // return redirect()->back()->with('status', 'Student Image Updated Successfully');
        return redirect('students')->with('status', 'Student Image Updated Successfully');
    }


    public function destroy($id)
    {
        $student = Student::find($id);
        $destination = 'uploads/students/' . $student->profile_image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $student->delete();
        return redirect()->back()->with('status', 'Student Image Deleted Successfully');
    }
}
