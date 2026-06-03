<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeMfaController extends Controller
{
    //------------------------------------------------------------------
   public function show(){
    return view('employee-auth.mfa');
   }
//-----------------------------------------------------------------------------------
   public function verify(Request $request){
    $request->validate([
        'otp' => 'required|numeric'
    ]);

     $employeeId = session('mfa_employee_id');
    if(!$employeeId) {
        return redirect()->route('employee.login');
    }

    $employee = Employee::find($employeeId);
    if(!$employee){
        return redirect()->route('employee.login');
    }

    if((string)$employee->otp_code !== (string)$request->otp ){
         return back()->withErrors(['otp'=>"Invalid OTP..."]);
    }
    if(!$employee->otp_expires_at ||
    now()->greaterThan($employee->otp_expires_at)){
      return back()->withErrors(['otp'=> 'Already Expired']);
    }
    $employee->update([
        'otp_code'=>null,
        'otp_expires_at' =>null,
    ]);

    Auth::guard('employee')->login($employee);
    session()->forget('mfa_employee_id');
    // session(['employee_mfa_verified' => true]);
    return redirect()->route('employee.dashboard');
   }
}
