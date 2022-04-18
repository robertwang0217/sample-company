<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    public function report() {

    	$employees = Employee::orderBy('first_name')->paginate(10);
    	$companies = Company::orderBy('name')->pluck('id', 'name')->toArray();

    	return view('employee.index', ['employees' => $employees, 'companies' => $companies]);
    }

    public function edit(Int $id) {

        $employee = Employee::find($id);
        $companies = Company::orderBy('name')->pluck('id', 'name')->toArray();

        return view('employee.edit', ['employee' => $employee, 'companies' => $companies]);
    }

    public function store(Request $request) {

        Employee::create([

            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'company_id' => $request->companyId,
            'email' => $request->email,
            'phone' => $request->phone,

        ]);

        return redirect()->route('employee.report')->with('success', 'Employee was successfully added!');
    }

    public function update(Int $id, Request $request) {

    	info($request->all());

        $employee = Employee::find($id);

        $employee->update([

            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'company_id' => $request->companyId,
            'email' => $request->email,
            'phone' => $request->phone,

        ]);

        return redirect()->route('employee.report')->with('success', 'Employee was successfully updated!');
    }

    public function delete(Int $id) {

        Employee::find($id)->delete();

        return redirect()->route('employee.report')->with('success', 'Employee was successfully deleted!');
    }
}
