<?php

namespace App\Http\Controllers;

use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section = section::all();
        return response()->json($section);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "class_id" => "required|integer",
            "section_name" => "required|unique:sections",
        ]);

        section::create($request->all());

        return response("Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $section =  section::find($id);

        return response()->json($section);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            "class_id" => "required",
            "section_name" => "required",
        ]);

        // DB::table("sections")->where("id", $id)->update($req);
        section::where("id", $id)->update([
            "class_id" => $request->class_id,
            "section_name" => $request->section_name,
        ]);

        return response("updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $section =  section::find($id);
        $section->delete();

        return response("deleted");
    }
}
