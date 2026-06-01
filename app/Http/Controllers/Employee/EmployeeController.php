<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Services\Department\DepartmentService;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function __construct(protected EmployeeService $employeeService ,protected DepartmentService $department) {}
    public function index()
    {
        $employees = $this->employeeService->getAll();
        return view('employee.index', compact('employees'));
    }

    // public function create(){
    //     $departments = Department::all();
    //     return view('employee.create', compact('departments'));
    // }

    public function store(StoreEmployeeRequest $request){
        $this->employeeService->store($request->validated());
        return redirect()->route('admin.employees.index')->with('success', 'Employee created successfully');
    }

    public function edit($id){
        $employee = $this->employeeService->find($id);
        $departments = $this->department->getAll();
        return view('employee.edit', compact('employee', 'departments'));
    }

    public function update(UpdateEmployeeRequest $request, $id){
        $this->employeeService->update($id, $request->validated());
        return redirect()->route('admin.employees.index')->with('success', 'Employee updated successfully');
    }

    public function pending(){
        $employees = $this->employeeService->getPendingEmployees();
        return view('employee.pending', compact('employees'));
    }

    public function approve($id){
        $this->employeeService->approve($id);
        return redirect()->back()->with('success','Employee approved.!!!');
    }

    public function  destroy($id){
        $this->employeeService->delete($id);
        return redirect()->route('admin.employees.index')->with('success', 'Employee deleted successfully');
    }

    public function employeeDashboard(){
        $employees = $this->employeeService->getAllApproved();
        return view('employee.dashboard', compact('employees'));
    }
}
