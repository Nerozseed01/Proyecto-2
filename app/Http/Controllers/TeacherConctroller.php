<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Department;
use App\Models\Center;
use App\Models\Average;

use App\Models\Subject;

use Illuminate\Support\Facades\DB;


class TeacherConctroller extends Controller
{

    public function index()
    {
        $teachers = Teacher::paginate(5);
        return view('teachers.teacherIndex', compact('teachers'));
    }

    public function create()
    {
        $universities = University::all();
        $departments  = Department::all();
        $centers      = Center::all();

        return view('teachers.teacherCreate', compact('universities', 'departments', 'centers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'university_id' => 'required',
            'department_id' => 'required',
            'center_id' => 'required',
            'code' => 'required'
        ]);

        $teacher = new Teacher();
        $teacher->name = strtoupper($request->name);
        $teacher->university_id = $request->university_id;
        $teacher->department_id = $request->department_id;
        $teacher->center_id = $request->center_id;


        $teacher->save();

        $subject = new Subject();
        $subject->code = $request->code;
        $subject->teacher_id = $teacher->id;
        $subject->save();

        return redirect()->route('teachers.index')->with('infor', 'Profesor creado correctamente');
    }

    public function show(Teacher $teacher)
    {
        $id = $teacher->id;
        $dominio     = Average::all()->where('teacher_id', '=', $id)->avg('domain');
        $puntualidad = Average::all()->where('teacher_id', '=', $id)->avg('puntuality');
        $dificultad  = Average::all()->where('teacher_id', '=', $id)->avg('difficulty');
        $alumnos  = Average::all()->where('teacher_id', '=', $id)->count();
        $average  = Average::all()->where('teacher_id', '=', $id)->avg('qualification');

        return view('teachers.teacherShow', compact('teacher', 'dominio', 'puntualidad', 'dificultad', 'alumnos', 'average'));
    }

    public function edit(Teacher $teacher)
    {
        $universities = University::all();
        $departments  = Department::all();
        $centers      = Center::all();
        $subject =  Subject::where('teacher_id', $teacher->id)->first();

        return view('teachers.teacherEdit', compact('teacher', 'universities', 'departments', 'centers', 'subject'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
            'university_id' => 'required',
            'department_id' => 'required',
            'center_id' => 'required',
        ]);

        $teacher->name = strtoupper($request->name);
        $teacher->university_id = $request->university_id;
        $teacher->department_id = $request->department_id;
        $teacher->center_id = $request->center_id;

        $teacher->update();

        return redirect()->route('teachers.index')->with('info', 'Profesor editado correctamente');

    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('info', 'Profesor eliminado correctamente');
    }

}
