<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Session\Store;

class EmployeeController extends Controller
{
    public function __construct(protected EmployeeService $employeeService) {}
    public function index()
    {
        $employees = $this->employeeService->getAll();
        return view('employee.index', compact('employees'));
    }

    public function create(){
        $departments = Department::all();
        return view('employee.create', compact('departments'));
    }

    public function store(StoreEmployeeRequest $request){
        $this->employeeService->store($request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    public function edit(Employee $employee){
        $departments = Department::all();
        return view('employee.edit', compact('employee', 'departments'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee){
        $this->employeeService->update($employee, $request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    public function  destroy(Employee $employee){
        $this->employeeService->delete($employee);
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
