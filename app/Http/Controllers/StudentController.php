<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "class_id" => "required_if:classes,id|integer",
            "section_id" => "required_if:sections,id|integer",
            "student_name" => "required|string|max:25",
            "student_phone" => "required|min:4|max:15",
            "student_email" => "required|string|email",
            "student_address" => "required|string",
            "student_roll" => "required|integer",
            "image" => "image|mimes:jpg,jpeg,png|max:2080"
        ]);

        $image = Str::slug($request->student_name) . "." . $request->image->getClientOriginalExtension();

        if (file_exists(public_path("assets/images/users/" . $image))) {
            unlink(public_path("assets/images/users/" . $image));
        }

        $request->image->move(public_path("assets/images/users/"), $image);

        Student::create([
            "class_id" => $request->class_id,
            "section_id" => $request->section_id,
            "student_name" => $request->student_name,
            "student_phone" => $request->student_phone,
            "student_email" => $request->student_email,
            "student_address" => $request->student_address,
            "student_roll" => $request->student_roll,
            "image" => "assets/images/users/" . $image,
        ]);

        return response("created");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $student =  Student::find($id);

        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            "class_id" => "required_if:classes,id|integer",
            "section_id" => "required_if:sections,id|integer",
            "student_name" => "required|string|max:25",
            "student_phone" => "required|min:4|max:15",
            "student_email" => "required|string|email",
            "student_address" => "required|string",
            "student_roll" => "required|integer",
            "image" => "image|mimes:jpg,jpeg,png|max:2080"
        ]);

        $image = Str::slug($request->student_name) . "." . $request->image->getClientOriginalExtension();

        if (file_exists(public_path("assets/images/users/" . $image))) {
            unlink(public_path("assets/images/users/" . $image));
        }

        $request->image->move(public_path("assets/images/users/"), $image);

        Student::where("id", $id)->update([
            "class_id" => $request->class_id,
            "section_id" => $request->section_id,
            "student_name" => $request->student_name,
            "student_phone" => $request->student_phone,
            "student_email" => $request->student_email,
            "student_address" => $request->student_address,
            "student_roll" => $request->student_roll,
            "image" => "assets/images/users/" . $image,
        ]);

        return response("updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $student =  Student::find($id)->first();

        if ($student->image) {
            unlink($student->image);
        }

        $student->delete();

        return response("deleted");
    }
}
