<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use Illuminate\Http\Request;

class ClasssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = Classs::all();
        // dd($class);
        return response()->json($class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "class_name" => "required|unique:classes|max:25",
        ]);

        Classs::create([
            "class_name" => $request->class_name,
        ]);

        return response("done");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $class =  Classs::find($id);
        return response("$class");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "class_name" => "required|unique:classes|max:25",
        ]);

        Classs::where("id", $id)->update([
            "class_name" => $request->class_name,
        ]);

        return response("updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Classs::destroy($id);

        return response("deleted");
    }
}
