<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        session(['departmentsData' => $departments]);
        dd($departments);
        // Răspundem cu un mesaj de succes
        return response()->json(['status' => 'success']);
    }
    public function showDepartments()
    {
        // Preia datele din sesiune
        $departments = session('departmentsData');
        // dd($departments);

        // Trimiți datele către view
        return view('pages.assignedDepartment', [
            'departments' => $departments
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $attributes = request()->validate(
            [
                'name' => ['required'],
                'description' => ['required']
            ]
        );
        $department = Department::create($attributes);
        return redirect('/tables');
    }


    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
