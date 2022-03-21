<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;

class UniversityController extends Controller
{

    public function index()
    {
        $universities = University::all();
        return view('universities.universityIndex', compact('universities'));
    }

    public function create()
    {

        return view('universities.universityCreate');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $university = new University();
        $university->name = $request->name;
        $university->save();

        return redirect()->route('universities.index')->with('info', 'Universidad creada correctamente');

    }

    public function show($university)
    {
        //
    }

    public function edit(University $university)
    {

        return view('universities.universityEdit', compact('university'));
    }

    public function update(Request $request, University $university)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $university->name = $request->name;
        $university->save();

        return redirect()->route('universities.index')->with('info', 'Universidad editada correctamente');
    }

    public function destroy(University $university)
    {
        $university->delete();
        return redirect()->route('universities.index')->with('info', 'Universidad eliminada correctamente');
    }

}
