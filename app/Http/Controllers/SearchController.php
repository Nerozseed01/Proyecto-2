<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class SearchController extends Controller
{

    public function teachers(Request $request) {

        $term = $request->get('term');
        $querys = Teacher::where('name', 'LIKE' ,'%' . $term . '%')->get();

        $data = [];
        foreach ( $querys as $query) {

            $data[] = [
                'label' => $query->name,
            ];
        }

        return $data;
        // return $querys;
        // return $term;
    }


    public function findTeacher(Request $request) {

        $request->validate([
            'name' => 'required'
        ]);


        $name = $request->name;

        // $teacher = Teacher::where('name', 'LIKE' ,'%' . $name . '%')->get()->first();
        $teacher = Teacher::where('name', $name)->first();

        // dd( $teacher->id, $name );
        return redirect()->route('teachers.show', compact('teacher'));
    }

}
