<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\StoreDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;
use App\Models\Department;
use App\Services\Department\DepartmentService;


class DepartmentController extends Controller
{
    public function __construct(protected DepartmentService $departmentService) {}

    public function index(){
        $departments = $this->departmentService->getAll();
        return view('department.index', compact('departments'));
    }

    public function create(){
        return view('department.create');
    }

    public function store(StoreDepartmentRequest $request){
        $this->departmentService->store($request->validated());

        return redirect()->route('departmenty.index')->with('success','Congo');

    }
    public function edit(Department $department){
        return view('department.edit', compact('department'));

    }

    public function update(UpdateDepartmentRequest $request, Department $department){
        $this->departmentService->update($department, $request->validated());
        return redirect()-> route('departmenty.index')->with('success','Sucessfully!!!');


    }

    public function destroy(Department $department){
        $this->departmentService->delete($department);
        return redirect()->route('departmenty.index')->with('success','delting sucess');
    }
}
