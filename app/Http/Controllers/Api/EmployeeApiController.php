<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;
use App\Http\Resources\EmployeeResource\EmployeeResource;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
   public function __construct(protected EmployeeService $employeeService){}

   public function index(){
    $employee = $this->employeeService->getAll();

    return response()->json([
        'success' => true,
        'message'=> 'Employee List',
        'data'=> EmployeeResource::collection($employee)
    ]);
   }
}
