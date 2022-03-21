<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Center;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::paginate(5);
        return view('centers.centerIndex', compact('centers'));
    }

    public function create()
    {
        return view('centers.centerCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $center = new Center();
        $center->name = $request->name;
        $center->save();

        return redirect()->route('centers.index')->with('info', 'Centro creado correctamente');
    }

    public function show($center)
    {
        //
    }

    public function edit(Center $center)
    {
        return view('centers.centerEdit', compact('center'));
    }

    public function update(Request $request, Center $center)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $center->name = $request->name;
        $center->save();

        return redirect()->route('centers.index')->with('info', 'Centro editado correctamente');
    }

    public function destroy(Center $center)
    {
        $center->delete();
        return redirect()->route('centers.index')->with('info', 'Centro eliminado correctamente');
    }
}
