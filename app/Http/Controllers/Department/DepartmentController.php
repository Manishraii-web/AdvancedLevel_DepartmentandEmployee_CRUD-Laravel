<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\StoreDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;
use App\Models\Department;
use App\Services\Department\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct(protected DepartmentService $departmentService) {}

    public function index(){
        $department = $this->departmentService->getall();
        return view('department.index', compact('departments'));
    }

    public function create(){
        return view('department.create');
    }

    public function store(StoreDepartmentRequest $request){
        $this->departmentService->store($request->validated());

        return redirect()->route('department.index')->with('success','Congo');

    }
    public function edit(Department $department){
        return view('department.edit', compact('department'));

    }

    public function update(UpdateDepartmentRequest $request, Department $department){
        $this->departmentService->update($department, $request->validated());
        return redirect()-> route('department.index')->with('sucess','Sucessfully!!!');


    }

    public function delete(Department $department){
        $this->departmentService->delete($department);
        return redirect()->route('department.index')->with('success','delting sucess');
    }
}
