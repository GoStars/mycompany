<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::with(['payments' => function($query) {
                $query->whereDay('created_at', Carbon::today());
            }])->where('role', 'employee')->paginate(10);

        return view('director.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('director.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $attributes['role'] = 'employee';

        User::create($attributes);

        flash('An employee has been added.');

        return redirect()->route('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(User $employee)
    {   
        $payments = $employee->payments()->latest()->paginate(10);

        return view('director.employees.show', compact('employee', 'payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(User $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        //
    }
}
