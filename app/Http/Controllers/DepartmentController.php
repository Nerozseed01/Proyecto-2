<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::paginate(5);
        return view('departments.departmentIndex', compact('departments'));
    }

    public function create()
    {
        return view('departments.departmentCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->save();

        return redirect()->route('departments.index')->with('info', 'Departamento creado correctamente');
    }

    public function show($department)
    {
        //
    }

    public function edit(Department $department)
    {
        return view('departments.departmentEdit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $department->name = $request->name;
        $department->save();

        return redirect()->route('departments.index')->with('info', 'Departamento editado correctamente');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('info', 'Deparmento eliminado correctamente');
    }
}
