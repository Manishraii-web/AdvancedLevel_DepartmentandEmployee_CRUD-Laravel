<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Services\Employee\EmployeeService;
use App\Http\Resources\EmployeeResource\EmployeeResource;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
   public function __construct(protected EmployeeService $employeeService){}


   public function index(){
    $employee = $this->employeeService->getall();

    return response()->json([
        'success' => true,
        'message'=> 'Employee List',
        'data'=> EmployeeResource::collection($employee)
    ]);
   }
    public function find($id){
        return $this->employee->with('department')->findOrFail($id);
    }

    public function show($id){
        $employee = $this->employeeService->find($id);
      return response()->json([
             'success' => true,
        'message' => 'Employee fetched successfully',
        'data' => new EmployeeResource($employee)
      ]);
    }

    public function store(StoreEmployeeRequest $request){
        $employee = $this->employeeService->store($request->validated());

        return response()->json([
             'success' => true,
        'message' => 'Employee created successfully',
        'data' => new EmployeeResource($employee)
        ]);
    }

    public function update(UpdateEmployeeRequest $request, $id){
        $employee = $this->employeeService->update($id, $request->validated());

        return response()->json([
             'success' => true,
        'message' => 'Employee updated successfully',
        'data' => new EmployeeResource($employee)
        ]);
    }
    public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'success' => true,
        'message' => 'Logged out successfully'
    ]);
}

   }

