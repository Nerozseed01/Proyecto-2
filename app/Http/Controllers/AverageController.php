<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Average;

class AverageController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'domain' => 'required',
            'puntuality' => 'required',
            'difficulty' => 'required',
            'qualification' => 'required',
        ]);

        $average = new Average();

        $average->domain = $request->domain;
        $average->puntuality = $request->puntuality;
        $average->difficulty = $request->difficulty;
        $average->qualification = $request->qualification;

        $average->user_id = $request->user_id;
        $average->teacher_id = $request->teacher_id;

        $average->save();
        return redirect()->route('teachers.show', $request->teacher_id)->with('info', 'Evaluación realizada');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }



}
